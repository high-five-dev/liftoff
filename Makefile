start:
	ddev start
	ddev auth ssh

install:
	ddev composer install
	ddev npm ci
	ddev craft install
	ddev craft plugin/install hyperdrive
	ddev craft plugin/install vite
	make build

dev:
	ddev npm run dev

build:
	ddev npm run build

launch:
	ddev launch

stan:
	ddev exec ./vendor/bin/phpstan --memory-limit=1G

cs-check:
	ddev exec ./vendor/bin/ecs check --ansi

cs-fix:
	ddev exec ./vendor/bin/ecs check --fix --ansi
