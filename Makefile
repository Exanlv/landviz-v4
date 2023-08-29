start:
	php -S localhost:8080 -t ./ public/index.php

test:
	./vendor/bin/phpunit --display-warnings

cs:
	composer csf
