# Wymagania

1. Docker
2. Docker-compose
3. Symfony Mailer

# Instalacja

1. Sklonuj projekt
2. Wejdź do folderu projektu, następnie do folderu /docker
3. Uruchom ```docker-compose up -d```
4. Uruchom polecenie ```docker-compose exec php-bash```
5. Pobierz composer: ```curl -sS https://getcomposer.org/installer | php```
6. Uruchom polecenie ```./composer.phar install```
7. Zainstaluj Symfony Mailer ```php composer.phar require symfony/mailer```
8. Wyjdź z kontenera php: ```exit```
