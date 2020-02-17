bash: shell
sh: shell
shell:
	docker-compose exec php-fast sh

build:
	docker build --tag kraynel/builder-front:latest -f docker/builder-front/Dockerfile .
	docker-compose build
