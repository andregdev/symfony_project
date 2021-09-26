composer req --dev maker ormfixtures fakerphp/faker

composer req doctrine twig

cp .env .env.local

DATABASE_URL="mysql://root:secret@database:3306/symfony_docker?serverVersion=8.0"

symfony console make:entity Products

symfony console make:entity Categories

symfony console make:entity Attributes

Set api platform with JWT authentication
https://www.leaseweb.com/labs/2019/06/create-jwt-authentication-api-platform/

run http://localhost:8080/