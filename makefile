dev:  #install dev dependencies
	composer install

clear: #clears cache
	php bin/console cache:clear

lint: #lints complet projekt
	@dev

clean: #clean up vendor folder
	