Создаём БД

```
sudo -u postgres psql

CREATE DATABASE name_database;
CREATE USER user_name WITH password 'qwerty';
GRANT ALL ON DATABASE name_database TO user_name;
ALTER DATABASE name_database OWNER TO user_name;
\q
```
Создаём проект

```
cd /var/www/

git clone https://github.com/filippVasin/allmax.git 

cd allmax

cp .env.example .env

php artisan key:generate
```

Прописываем доступы к БД в файле .env и заканчиваем установку

```
composer install

php artisan migrate

php artisan db:seed

php artisan cache:clear

```
