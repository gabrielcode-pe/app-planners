<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{config('app.name')}}</title>
    <!-- slick slider-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/slick-carousel/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/slick-carousel/slick-theme.css')}}"/>
    <!-- /slick slider-->

    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    <main>
        <header class="header-wrapper @yield('header-extra-class')">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/images/logo-main.png')}}" alt="Escuela de proyectistas"></a>
            </div>
            <nav class="menu-container">
                <ul class="main-menu">
                    <li class="btn-submenu">
                        <a  href="/">Inicio</a>
                        <ul class="submenu">
                            <li><a href="{{route('about')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>Acerca de Escuela de Proyectistas</a></li>
                            <li><a href="{{route('js.consultores')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>Acerca de JS Consultores</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('posts')}}">Blog</a></li>
                    <li><a href="{{route('testimonies')}}">Testimonios</a></li>
                    <li class="btn-submenu">
                        <a class="active" href="#">Cursos</a>
                        <ul class="submenu">
                            <li><a href="{{route('courses')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>Escuela de proyectistas</a></li>
                            <li><a href="{{route('courses.institutionls')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>Institucionales</a></li>
                        </ul>
                    </li>
                    <li><a target="_blank" href="https://www.youtube.com/channel/UCD1Zjd-Z-mfXzFoZsUM1mEw">YouTube</a></li>
                    <li><a href="{{route('contact')}}">Contacto</a></li>
                </ul>

                <ul class="extra-menu">
                    <li><a target="_blank" href="http://aulavirtual.escueladeproyectistas.com/">Iniciar sesión</a></li>
                    <li><a href="{{route('shop.cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
            <!-- está sección será visible cuando el header tenga la clase with-bg -->
            @yield('info-absolute-when-has-bg')
        </header>

        <section class="page-wrapper">
            <!-- agregar aqui otro contenido-->
            <!-- Page content-->
            <div class="page-content">

                @yield('content')
            </div>
            <!--/Page content-->
        </section>
        <footer class="footer-wrapper">
            <div class="footer-container">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">SERVICIOS</a></li>
                        <li><a href="#">¿QUIENES SOMOS?</a></li>
                        <li><a href="#">CURSOS</a></li>
                        <li><a href="#">CONTACTO</a></li>
                        <li><a href="#">ASESORÍAS</a></li>
                        <li><a href="{{route('frequent.questions')}}">PREGUNTAS FRECUENTES</a></li>
                    </ul>
                </div>

                <div class="footer-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                    </ul>
                </div>

                <div class="footer-copy"><p>&copy; {{date('Y')}} Escuela de Proyectistas. Todos los derechos reservados.</p></div>
                
            </div>
            
        </footer>

        <!-- Redes solciales absoluto-->
        <div class="social-fixed">
            <ul>
                <li><a class="btn social-item youtube" href="#" title="YouTube"><i class="fa fa-youtube"></i></a></li>
                <li><a class="btn social-item facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a class="btn social-item linkedin" href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="btn social-item whatsapp" href="#" title="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                <!--<li><a class="btn social-item twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>-->
            </ul>
        </div>
        <!-- Redes solciales absoluto-->

    </main>

    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    
    @yield('scripts')
</body>
</html>