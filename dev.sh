#!/usr/bin/env bash
set -e

DC="docker compose"
APP="app"
COMMAND="${1:-help}"

case "$COMMAND" in
  help)
    cat <<'EOF'
Uso: ./dev.sh <comando>

Comandos:
  up                Sobe os containers
  build             Sobe reconstruindo a imagem
  down              Para os containers
  restart           Reinicia os containers
  logs              Mostra logs em tempo real
  ps                Lista status dos containers
  shell             Abre shell no container app
  artisan ...       Roda um comando artisan
  migrate           Executa as migrations
  seed              Executa os seeders
  fresh             Recria banco e roda seed
  status            Mostra status das migrations
  clear             Limpa caches do Laravel
  test              Roda os testes
  composer-install  Instala dependências PHP
  npm-build         Gera build do front
EOF
    ;;
  up)
    $DC up -d
    ;;
  build)
    $DC up -d --build
    ;;
  down)
    $DC down
    ;;
  restart)
    $DC restart
    ;;
  logs)
    $DC logs -f
    ;;
  ps)
    $DC ps
    ;;
  shell)
    $DC exec $APP bash
    ;;
  artisan)
    shift
    $DC exec $APP php artisan "$@"
    ;;
  migrate)
    $DC exec $APP php artisan migrate
    ;;
  seed)
    $DC exec $APP php artisan db:seed
    ;;
  fresh)
    $DC exec $APP php artisan migrate:fresh --seed
    ;;
  status)
    $DC exec $APP php artisan migrate:status
    ;;
  clear)
    $DC exec $APP php artisan optimize:clear
    ;;
  test)
    $DC exec $APP php artisan test
    ;;
  composer-install)
    $DC exec $APP composer install
    ;;
  npm-build)
    $DC exec $APP npm run build
    ;;
  *)
    echo "Comando inválido: $COMMAND"
    echo "Use: ./dev.sh help"
    exit 1
    ;;
esac
