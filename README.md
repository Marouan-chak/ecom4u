# Ecom4u

Ecommerce website using Symfony 4

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Before startingg, you have to clone the project:

```shell
$ git clone https://github.com/Marouan-chak/ecom4u.git
$ cd ecom4u
```

1. Install PHP 7.2.5 or higher and these PHP extensions (which are installed and enabled by default in most PHP 7 installations): Ctype, iconv, JSON, PCRE, Session, SimpleXML, and Tokenizer.
2. Install [composer], which is used to install PHP packages;
3. Install [symfony], which creates in your computer a binary called symfony that provides all the tools you need to develop your application locally.

[composer]: https://getcomposer.org/download/
[symfony]: https://symfony.com/download

The symfony binary provides a tool to check if your computer meets these requirements. Open your console terminal and run this command:
```shell
$ symfony check:requirements
```shell
4. Install [doctrine] support via the orm Symfony pack, as well as the MakerBundle, which will help generate some code:
[doctrine]: https://symfony.com/doc/current/doctrine.html

```shell
$ composer require symfony/orm-pack
```shell


### Configuring the Database

The database connection information is stored as an environment variable called DATABASE_URL. For development, you can find and customize this inside .env:


```
# .env (or override DATABASE_URL in .env.local to avoid committing your changes)

# customize this line!
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"

# to use sqlite:
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"
```

Now that your connection parameters are setup, Doctrine can create the db_name database for you:

```shell
$ php bin/console doctrine:database:create
```shell

End with an example of getting some data out of the system or using it for a little demo

## Migrations: Creating the Database Tables/Schema

Create migration for the database:
```shell
$ php bin/console make:migration
```shell

then migrate:
```shell
php bin/console doctrine:migrations:migrate
```shell


### Run the website

From the project folder, run the following command:

```shell
$ symfony server:start
```shell
 then **You must access the URL localhost/produits to populate the database with products**. After that you can access the website from localhost/index








## Authors

* **Marouan Chakran** 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


