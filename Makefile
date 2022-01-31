.PHONY: help install run test

help:
	@cat $(MAKEFILE_LIST) | grep -e "^[a-zA-Z_\-]*: *.*## *" | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' | sort

install: ## Install the project
	docker-compose run --rm php composer install

run: ## Run index.php in a container without any parameter
	@read -p "Enter expression: " expression; \
	read -p "Enter target currency: " currency; \
    docker-compose run --rm php php src/index.php "$$expression" $$currency

test: ## Run tests
	docker-compose run --rm -T php php /var/www/html/vendor/phpunit/phpunit/phpunit --configuration /var/www/html/phpunit.xml.dist
