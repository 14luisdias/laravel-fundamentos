#!/usr/bin/env bash
set -e

cd /var/www/html

update_env() {
  local key="$1"
  local value="$2"

  if grep -q "^${key}=" .env 2>/dev/null; then
    sed -i "s#^${key}=.*#${key}=${value}#" .env
  else
    printf '\n%s=%s\n' "$key" "$value" >> .env
  fi
}

ensure_env() {
  local key="$1"
  local value="$2"
  local legacy_value="${3:-}"

  if grep -q "^${key}=" .env 2>/dev/null; then
    local current_value
    current_value=$(grep "^${key}=" .env | head -n 1 | cut -d'=' -f2-)

    if [ -n "$legacy_value" ] && [ "$current_value" = "$legacy_value" ]; then
      sed -i "s#^${key}=.*#${key}=${value}#" .env
    fi
  else
    printf '\n%s=%s\n' "$key" "$value" >> .env
  fi
}

echo "🚀 Preparando o Laravel..."

if [ ! -f .env ]; then
  cp .env.example .env
fi

mkdir -p bootstrap/cache storage/framework/{cache,sessions,testing,views}

update_env APP_URL "http://localhost:9030"
ensure_env DB_CONNECTION "pgsql" "sqlite"
ensure_env DB_HOST "host.docker.internal" "127.0.0.1"
ensure_env DB_PORT "5432" "3306"
ensure_env DB_DATABASE "laravel" "/var/www/html/database/database.sqlite"
ensure_env DB_USERNAME "postgres" "root"
ensure_env DB_PASSWORD "postgres"
update_env SESSION_DRIVER "file"
update_env CACHE_STORE "file"
update_env QUEUE_CONNECTION "sync"
update_env APP_MAINTENANCE_DRIVER "file"
update_env APP_MAINTENANCE_STORE "file"

chown -R www-data:www-data storage bootstrap/cache >/dev/null 2>&1 || true
chmod -R ug+rwX storage bootstrap/cache >/dev/null 2>&1 || true

if [ ! -f vendor/autoload.php ]; then
  echo "📦 Instalando dependências PHP (apenas na primeira vez)..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
else
  echo "✅ Dependências PHP já estão prontas."
fi

if [ ! -f node_modules/.package-lock.json ]; then
  echo "📦 Instalando dependências Node (apenas na primeira vez)..."
  npm ci
else
  echo "✅ Dependências Node já estão prontas."
fi

if [ ! -f public/build/manifest.json ]; then
  echo "🎨 Gerando assets do Vite..."
  npm run build
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force
fi

php artisan config:clear >/dev/null 2>&1 || true
php artisan cache:clear >/dev/null 2>&1 || true
php artisan migrate --force || true

exec php artisan serve --host=0.0.0.0 --port=8000
