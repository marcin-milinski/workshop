# PHP Training

A series of PHP trainings, including SOLID Principles and hopefully more in the near future.

Trainign files are placed in `/web/app/src` folder and the whole project is built upon
 great "Docker running Nginx, PHP-FPM, Composer, MySQL and PHPMyAdmin" start pack. It can be downloaded from https://github.com/nanoninja/docker-nginx-php-mysql

If you want to run these examples, scroll down for the instruction.

Some examples my not work due to the missing dependencies eg. database, the aim of this training is just to show the proper way of creating better software.

## SOLID Principles

In object-oriented computer programming, SOLID is a mnemonic acronym for five design principles intended to make software designs more understandable, flexible and maintainable.

### SRP - Single Responsibility Principle

- A class should have one and only one reason to change
- Gather together the things that change for the same reasons, separate those things that change for different reasons
- Ultimately: a class should have a single responsibility and that responsibility should be entirely encapsulated by the class

Extra resources: https://blog.cleancoder.com/uncle-bob/2014/05/08/SingleReponsibilityPrinciple.html

### OCP - Open-Closed Principle

- Entities should be open for extension, but closed for modification
- Open for extension - it should be simple to change the behaviour of a particular entity (class)
- Closed for modification - change behaviour without modifying source  code;  this is a goal, hard to achieve, but something we should strive for

**Solution**: modify the behaviour through the extension

**How?**

_“When you have a module that you want to extend without modifying separate the extensible behaviour behind an interface and flip the dependencies” - Robert C. Martin, “Clean Code” author_

**A side note**: _Extension_ keyword is much broader in this context and allows class extension through composition as well, not just inheritance.

Extra resources: https://springframework.guru/principles-of-object-oriented-design/open-closed-principle/

### LSP - Liskov Substitution Principle

- Objects in a program should be replaceable with instances of their subtypes without altering the correctness of that program
- If an override method does nothing or just throws an exception, then the code  probably violates the LSP
- A list of ways to adhere  to the LSP:
    - Signature must match
    - Preconditions can’t be greater
    - Post conditions at least equal to
    - Exception types must match

Solutions:
- correct inheritance hierarchy
- interface segregation

### ISP - Interface Segregation Principle

- ISP states that a client should not be forced to implement an interface that it doesn’t use
- Thus many client-specific interfaces are better than one general-purpose interface
- ISP splits interfaces that are very large (fat) into smaller and more specific ones so that clients will only have to know about the methods that are of interest to them
- Such shrunken interfaces are also called role interfaces
- ISP is intended to keep a system decoupled and thus easier to refactor, change, and redeploy

### DIP - Dependency Inversion Principle

Conventional application architecture follows a top-down design approach where a high-level problem is broken into smaller parts. In other words, the high-level design is described in terms of these smaller parts. As a result, high-level modules that gets written directly depend on the smaller (low-level) modules.

DIP says instead:

- Depend on abstractions, not on concretions
- Dependency Inversion != Dependency Injection
- High level modules should not depend on low level modules, instead they should depend on abstractions
- Low level modules should also depend on abstractions
- High level code - isn’t as concerned with details
- Low level code - is more concerned with details and specifics

All of this is about decoupling the code


# If you want to pull it a try yourself...
___

## Install prerequisites

For now, this project has been mainly created for Unix `(Linux/MacOS)`. Perhaps it could work on Windows.

All requisites should be available for your distribution. The most important are :

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install/)

Check if `docker-compose` is already installed by entering the following command : 

```sh
which docker-compose
```

Check Docker Compose compatibility :

* [Compose file version 3 reference](https://docs.docker.com/compose/compose-file/)

The following is optional but makes life more enjoyable :

```sh
which make
```

On Ubuntu and Debian these are available in the meta-package build-essential. On other distributions, you may need to install the GNU C++ compiler separately.

```sh
sudo apt install build-essential
```

### Images to use

* [Nginx](https://hub.docker.com/_/nginx/)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHP-FPM](https://hub.docker.com/r/nanoninja/php-fpm/)
* [Composer](https://hub.docker.com/_/composer/)
* [PHPMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)
* [Generate Certificate](https://hub.docker.com/r/jacoelho/generate-certificate/)

You should be careful when installing third party web servers such as MySQL or Nginx.

This project use the following ports :

| Server     | Port |
|------------|------|
| MySQL      | 8989 |
| PHPMyAdmin | 8080 |
| Nginx      | 8000 |
| Nginx SSL  | 3000 |

___

## Clone the project

To install [Git](http://git-scm.com/book/en/v2/Getting-Started-Installing-Git), download it and install following the instructions :

```sh
git clone https://github.com/nanoninja/docker-nginx-php-mysql.git
```

Go to the project directory :

```sh
cd docker-nginx-php-mysql
```

### Project tree

```sh
.
├── Makefile
├── README.md
├── data
│   └── db
│       ├── dumps
│       └── mysql
├── doc
├── docker-compose.yml
├── etc
│   ├── nginx
│   │   ├── default.conf
│   │   └── default.template.conf
│   ├── php
│   │   └── php.ini
│   └── ssl
└── web
    ├── app
    │   ├── composer.json.dist
    │   ├── phpunit.xml.dist
    │   ├── src
    │   │   └── Foo.php
    │   └── test
    │       ├── FooTest.php
    │       └── bootstrap.php
    └── public
        └── index.php
```

___

## Configure Nginx With SSL Certificates

You can change the host name by editing the `.env` file.

If you modify the host name, do not forget to add it to the `/etc/hosts` file.

1. Generate SSL certificates

    ```sh
    source .env && sudo docker run --rm -v $(pwd)/etc/ssl:/certificates -e "SERVER=$NGINX_HOST" jacoelho/generate-certificate
    ```

2. Configure Nginx

    Do not modify the `etc/nginx/default.conf` file, it is overwritten by  `etc/nginx/default.template.conf`

    Edit nginx file `etc/nginx/default.template.conf` and uncomment the SSL server section :

    ```sh
    # server {
    #     server_name ${NGINX_HOST};
    #
    #     listen 443 ssl;
    #     fastcgi_param HTTPS on;
    #     ...
    # }
    ```

___

## Configure Xdebug

If you use another IDE than [PHPStorm](https://www.jetbrains.com/phpstorm/) or [Netbeans](https://netbeans.org/), go to the [remote debugging](https://xdebug.org/docs/remote) section of Xdebug documentation.

For a better integration of Docker to PHPStorm, use the [documentation](https://github.com/nanoninja/docker-nginx-php-mysql/blob/master/doc/phpstorm-macosx.md).

1. Get your own local IP address :

    ```sh
    sudo ifconfig
    ```

2. Edit php file `etc/php/php.ini` and comment or uncomment the configuration as needed.

3. Set the `remote_host` parameter with your IP :

    ```sh
    xdebug.remote_host=192.168.0.1 # your IP
    ```
___

## Run the application

1. Copying the composer configuration file : 

    ```sh
    cp web/app/composer.json.dist web/app/composer.json
    ```

2. Start the application :

    ```sh
    sudo docker-compose up -d
    ```

    **Please wait this might take a several minutes...**

    ```sh
    sudo docker-compose logs -f # Follow log output
    ```

3. Open your favorite browser :

    * [http://localhost:8000](http://localhost:8000/)
    * [https://localhost:3000](https://localhost:3000/) ([HTTPS](#configure-nginx-with-ssl-certificates) not configured by default)
    * [http://localhost:8080](http://localhost:8080/) PHPMyAdmin (username: dev, password: dev)

4. Stop and clear services

    ```sh
    sudo docker-compose down -v
    ```
