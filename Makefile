start:
	php -S localhost:8080 -t ./ public/server.php

test:
	./vendor/bin/phpunit --display-warnings

cs:
	composer csf

deploy:
	git pull;
	composer install --no-dev;
	composer dump-autoload -o;
