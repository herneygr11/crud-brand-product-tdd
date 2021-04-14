<!-- PROJECT LOGO -->
<br />
<p align="center">
  <h3 align="center">LARAVEL CRUD MARCAS, PRODUCTOS TDD</h3>
</p>

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
  * [Run Project](#run-project)
* [API documentation](#api-documentation)
* [Why testing is important](#why-testing-is-important)
  * [Integration run test](#integration-run-test)
* [Contact](#contact)



<!-- ABOUT THE PROJECT -->
## About The Project

CRUD of brands and products applying tdd and good practices

With TDD:
* Development with quality and you keep improving.

### Built With

* [Laravel](https://laravel.com)
* [TailwindCSS](https://tailwindcss.com/)
* [mysql](https://dev.mysql.com/doc/)


<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

* PHP >= 7.3
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### Installation

1. Clone the repo
```sh
git clone https://github.com/herneygr11/crud-brand-product-tdd.git
```

2. Install Composer packages
```sh
composer install
```

3. Install Npm packages
```sh
npm install && npm run dev
```

4. Create Databases
```sh
    crud_brand_product_tdd and crud_brand_product_tdd_test
```

### Run Project

1. copy the environment variable file
```sh
cp .env.example .env
php artisan key:generate
```

2. run migrations and seeders
```sh
php artisan migrate --seed
```

3. run server local
```sh
php artisan serve
```

## API documentation
```sh
 php artisan l5-swagger:generate
```

```sh
  go: http://127.0.0.1:8000/api/documentation
```

## Why testing is important
At a high level, software testing is necessary to detect bugs in the software and to test whether the software meets the customer's requirements. This helps the development team correct bugs and deliver a good quality product.

### Integration run test

```sh
php artisan test
```
<!-- CONTACT -->
## Contact

Herney Ruiz - herneyruiz36@gmail.com

---
[HerneyRuiz](https://github.com/RuizHerney) with ❤️