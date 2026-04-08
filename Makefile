DC=docker compose
APP=app

.PHONY: help up build down restart logs ps shell artisan migrate seed fresh status clear test composer-install npm-build

help:
	@echo "Comandos disponíveis:"
	@echo "  make up              - sobe os containers"
	@echo "  make build           - sobe reconstruindo a imagem"
	@echo "  make down            - para os containers"
	@echo "  make restart         - reinicia os containers"
	@echo "  make logs            - mostra logs em tempo real"
	@echo "  make ps              - lista status dos containers"
	@echo "  make shell           - abre shell no container app"
	@echo "  make artisan cmd='route:list' - roda comando artisan"
	@echo "  make migrate         - executa as migrations"
	@echo "  make seed            - executa os seeders"
	@echo "  make fresh           - recria banco e roda seed"
	@echo "  make status          - mostra status das migrations"
	@echo "  make clear           - limpa caches do Laravel"
	@echo "  make test            - roda os testes"
	@echo "  make composer-install - instala dependências PHP"
	@echo "  make npm-build       - gera build do front"

up:
	$(DC) up -d

build:
	$(DC) up -d --build

down:
	$(DC) down

restart:
	$(DC) restart

logs:
	$(DC) logs -f

ps:
	$(DC) ps

shell:
	$(DC) exec $(APP) bash

artisan:
	$(DC) exec $(APP) php artisan $(cmd)

migrate:
	$(DC) exec $(APP) php artisan migrate

seed:
	$(DC) exec $(APP) php artisan db:seed

fresh:
	$(DC) exec $(APP) php artisan migrate:fresh --seed

status:
	$(DC) exec $(APP) php artisan migrate:status

clear:
	$(DC) exec $(APP) php artisan optimize:clear

test:
	$(DC) exec $(APP) php artisan test

composer-install:
	$(DC) exec $(APP) composer install

npm-build:
	$(DC) exec $(APP) npm run build
