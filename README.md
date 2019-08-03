## How to run

1. [Install Docker and Docker Compose](https://docs.docker.com/compose/install/)
2. Clone this repository
3. Run ```docker-compose up -d```
4. Run ```docker-compose exec php /bin/sh```
5. Install Composer: ```curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer```
6. Navigate to app directory: ```cd /var/www/html```
7. Run ```composer install```
8. Run ```php script.php input.csv```
