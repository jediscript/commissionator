## How to run

1. [Install Docker and Docker Compose](https://docs.docker.com/compose/install/)
2. Clone this repository using Terminal
3. Run ```docker-compose up -d```
4. Connect to PHP Docker service by running ```docker-compose exec php /bin/sh```
5. Once connected to PHP Docker service, install Composer by running ```curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer```
6. Navigate to app directory by running ```cd /var/www/html```
7. Run ```composer install```
8. Run ```php script.php input.csv```
