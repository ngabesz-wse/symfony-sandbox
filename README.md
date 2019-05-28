## Symfony Overblog Graphqlbundle integration

docs: https://github.com/overblog/GraphQLBundle

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

## tasks
Implement connections: Product - Manufacturer (many-to-one), Product - Categories (many-to-many)
Implement mutations: delete product, update product (patrial), insert product, CRUD relations through owning side


