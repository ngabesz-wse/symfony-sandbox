## Symfony Sandbox dockerized

First step:
```
./composer install 
```

# Quick start

```sh
# boot containers
docker-compose up -d

# browse website
http://localhost

#phpmyadmin
http://localhost:8080

# run Symfony console from outside of continer
./console

# run Symfony console from outside of continer
./composer

# graphql explorer
http://localhost/app_dev.php/graphiql

# graphql endpoint
http://localhost/app_dev.php/graphql
```
