# Comprana

Comprana es una aplicación web monolítica que permite comprar víveres desde casa y recibirlos en la puerta. Ofrece una amplia gama de productos, una interfaz intuitiva para buscar y comprar.

## Contenido

* [Capturas](#capturas)
* [Requerimientos](#requerimientos)
* [Instalación](#instalación)
* [Tecnologías](#tecnologías)
* [License](#license)

## Capturas

![inicio](https://raw.github.com/stivenm0/comprana/main/public/img/inicio.png)

![tienda](https://raw.github.com/stivenm0/comprana/main/public/img/tienda.png)

![carritos](https://raw.github.com/stivenm0/comprana/main/public/img/carritos.png)

![pedidos](https://raw.github.com/stivenm0/comprana/main/public/img/pedidos.png)

![compra](https://raw.github.com/stivenm0/comprana/main/public/img/compra.png)

![admin](https://raw.github.com/stivenm0/comprana/main/public/img/admin.png)



## Requerimientos

Package | Version
--- | ---
[Node](https://nodejs.org/en/) | V18
[Npm](https://nodejs.org/en/)  | V8.18.0
[Composer](https://getcomposer.org/)  | V2.4.1
[Php](https://www.php.net/)  | V8.1.10
[Mysql](https://www.mysql.com/)  |V 8.0.30


## Instalación 🔧
Así es como puede ejecutar el proyecto localmente:

1. Clonar repositorio
    ```sh
    git clone https://github.com/stivenm0/comprana.git
    ```

1. Ingresa al directorio raíz del proyecto
    ```sh
    cd comprana
    ```

1. Copie el archivo .env.example al archivo .env
    ```sh
    cp .env.example .env
    ```
1. Crea base de datos `comprana` 

1. Crea enlace simbólico 
    ```sh
        php artisan storage:link
    ```

1. Instala dependencias PHP 
    ```sh
    composer install
    ```

1. Genera key 
    ```sh
    php artisan key:generate
    ```

1. Instala dependencias front-end
    ```sh
    npm install && npm run build
    ```

1. Ejecuta migration
    ```
    php artisan migrate
    ```
    
1. Ejecuta seeder
    ```
    php artisan db:seed
    ```


## Construido con 🛠️

* Laravel 10
* Livewire 3
* Filament 
* MySQL
* TailwindCss
* Apine
