<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comprana</title>
        <link rel="shortcut icon" href="{{asset('srcs/favicon.ico')}}" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .bg-image {
                background-image: url({{asset('srcs/bg.jfif')}})
            }
        </style>
    </head>
    <body class="antialiased bg-yellow-400 animate__animated animate__fadeIn bg-opacity-85">
     
            @if (Route::has('login'))
                <nav class="z-10 flex gap-2 p-6 text-right sm:fixed sm:top-0 sm:right-0">   
                    @auth
                        <a href="{{ url('/dashboard') }}" class="relative">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-gray-700 rounded"></span>
                            <span class="relative inline-block w-full h-full px-3 py-1 text-base font-bold text-white transition duration-100 bg-black border-2 border-black rounded fold-bold hover:bg-gray-900 hover:text-yellow-500 dark:bg-black">{{__('Dashboard')}}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="relative ">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-gray-700 rounded "></span>
                            <span class="relative inline-block w-full h-full px-3 py-1 text-base font-bold text-white transition duration-100 bg-black border-2 border-black rounded fold-bold hover:bg-gray-900 hover:text-yellow-500 dark:bg-black">{{__('Login')}}</span>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="relative">
                                <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-gray-700 rounded"></span>
                                <span class="relative inline-block w-full h-full px-3 py-1 text-base font-bold text-white transition duration-100 bg-black border-2 border-black rounded fold-bold hover:bg-gray-900 hover:text-yellow-500 dark:bg-black">{{__('Register')}}</span>
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

    <section class="flex flex-wrap ">
        <div class="w-full sm:w-8/12">
            <div class="container h-full mx-auto sm:p-10">
                <nav class="flex items-center justify-between px-4">
                    <div class="text-4xl font-bold animate__animated animate__flipInX">
                        Compra<span class="text-red-700">na</span>
                    </div>
                </nav>
                <header class="container items-center h-full px-4 mt-10 lg:flex lg:mt-0 ">
                    <div class="w-full">
                        <h1 class="text-4xl font-bold lg:text-6xl">Donde la Comodidad y la Variedad se Encuentran.
                        </h1>
                        <div class="w-20 h-2 my-4 bg-red-700"></div>
                        <p class="mb-10 text-xl">
                            <span class="text-red-600 ">Supermercado</span> virtual colombiano lleno de productos frescos, ofertas
                            exclusivas y conveniencia sin salir de casa. Explora nuestro extenso catálogo, elige entre
                            una amplia gama de productos y disfruta de la facilidad de recibir tus compras directamente
                            en tu
                            puerta. Comprana, donde tus necesidades se encuentran con la modernidad del comercio en
                            línea
                        </p>
                    </div>
                </header>
            </div>
        </div>
        <img src="{{asset('srcs/landing.jpeg')}}" alt="Leafs" class="object-cover w-full h-48 sm:h-screen sm:w-4/12">
    </section>

    <section class="max-w-full p-5 mx-auto sm:p-10 md:p-16 bg-image ">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3 sm:grid-cols-2">

            <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover shadow-2xl shadow-red-700"
                style="height: 450px; background-image:url({{asset('srcs/img1.webp')}});">
                <div class="absolute top-0 bottom-0 left-0 right-0 mt-20 bg-gradient-to-b from-transparent to-gray-900">
                </div>
                <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-2">
                    <a href="#"
                        class="px-5 py-2 text-xs text-white uppercase transition duration-500 ease-in-out bg-indigo-600 hover:bg-white hover:text-indigo-600">com</a>
                </div>
                <main class="z-10 p-5">
                    <p  class="font-medium leading-7 tracking-tight text-white text-md font-regular hover:underline">
                        Refresca tu día con nuestra selección de bebidas irresistibles. Desde jugos naturales hasta bebidas energéticas, Comprana tiene todo lo que necesitas para mantenerte hidratado y lleno de energía.
                    </p>
                </main>

            </div>

            <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover shadow-2xl shadow-yellow-700"
                style="height: 450px; background-image:url({{asset('srcs/img2.webp')}});">
                <div class="absolute top-0 bottom-0 left-0 right-0 mt-20 bg-gradient-to-b from-transparent to-gray-900">
                </div>
                <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-2">
                    <a href="#"
                        class="px-5 py-2 text-xs text-white uppercase transition duration-500 ease-in-out bg-indigo-600 hover:bg-white hover:text-indigo-600">Politics</a>

                </div>
                <main class="z-10 p-5">
                    <p href="#"
                        class="font-medium leading-7 tracking-tight text-white text-md font-regular hover:underline">
                        Descubre la frescura y la calidad de nuestras verduras seleccionadas cuidadosamente. Comprana te brinda opciones saludables para cada comida.
                    </p>
                </main>
            </div>

            <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover shadow-2xl shadow-cyan-700"
                style="height: 450px; background-image:url({{asset('srcs/img4.webp')}});">
                <div class="absolute top-0 bottom-0 left-0 right-0 mt-20 bg-gradient-to-b from-transparent to-gray-900">
                </div>
                <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-2">
                    <a href="#"
                        class="px-5 py-2 text-xs text-white uppercase transition duration-500 ease-in-out bg-indigo-600 hover:bg-white hover:text-indigo-600">Politics</a>
                </div>
                <main class="z-10 p-5">
                    <p 
                        class="font-medium leading-7 tracking-tight text-white text-md font-regular hover:underline">
                        Desde cereales hasta productos de limpieza, nuestra selección cuidadosa garantiza que tengas todo lo que necesitas, entregado directamente en tu puerta.
                    </p>
                </main>
            </div>

        </div>
    </section>

    <!-- Testimonials section -->
    <section class="py-16 text-black ">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="mb-8 text-4xl font-bold">Testimonios</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="p-8 bg-white rounded-lg shadow">
                    <p class="mb-4 text-gray-700">
                        "¡Comprana ha transformado la forma en que hago mis compras! La frescura de los productos y la rapidez de la entrega son increíbles. ¡Ahora puedo dedicar más tiempo a lo que realmente importa!"
                    </p>
                    <p class="font-medium text-gray-700">- María G.</p>
                </div>
                <div class="p-8 bg-white rounded-lg shadow">
                    <p class="mb-4 text-gray-700">
                        "Siempre busco las ofertas de Comprana. Los precios son geniales, y la calidad de los productos es insuperable. ¡Una experiencia de compra en línea que realmente vale la pena!"
                    </p>
                    <p class="font-medium text-gray-700">- Juan R.</p>
                </div>
                <div class="p-8 bg-white rounded-lg shadow">
                    <p class="mb-4 text-gray-700">
                        "Comprana ha simplificado mi vida. No tengo que preocuparme por cargar bolsas pesadas ni hacer filas. Todo llega directamente a mi puerta. ¡Tan conveniente y confiable!"
                    </p>
                    <p class="font-medium text-gray-700">- Ana M.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="w-full bg-gray-300">
        <div class="justify-between max-w-screen-lg px-4 py-5 mx-auto text-gray-800 sm:px-6 sm:flex">
            <div class="p-5 border-r sm:w-2/12">
                <div class="text-sm font-bold text-indigo-600 uppercase">Menu</div>
                <ul>
                    <li class="my-2">
                        <a class="hover:text-indigo-600" href="#">Home</a>
                    </li>
                    <li class="my-2">
                        <a class="hover:text-indigo-600" href="#">Services</a>
                    </li>
                    <li class="my-2">
                        <a class="hover:text-indigo-600" href="#">Products</a>
                    </li>
                    <li class="my-2">
                        <a class="hover:text-indigo-600" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
            <div class="p-5 text-center border-r sm:w-7/12">
                <h3 class="mb-4 text-xl font-bold text-red-600">Comprana</h3>
                <p class="mb-10 text-sm text-gray-500">Tu destino digital de compras: calidad fresca, ofertas
                    irresistibles y la comodidad de tenerlo todo a solo un clic de distancia.</p>
            </div>
            <div class="p-5 sm:w-3/12">
                <div class="text-sm font-bold text-indigo-600 uppercase">Contact Us</div>
                <ul>
                    <li class="my-2">
                        <a class="hover:text-indigo-600" href="#">XXX XXXX, Bogotá </a>
                    </li>
                    <li class="my-2 ">
                        <a class="hover:text-indigo-600 text-wrap" href="#">@comprana.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    </body>
</html>
