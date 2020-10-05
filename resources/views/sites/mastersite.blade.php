<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->

    <?php 
        if(!isset($_SESSION))
        {
            session_start();
        }
    ?>
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <title>Electro Store | Home</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
        />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta tag Keywords -->

        <!-- Custom-Files -->
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap css -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- Main css -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.css') }}">
        <!-- Font-Awesome-Icons-CSS -->
        <link href="{{ asset('assets/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- pop-up-box -->
        <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- menu style -->
        <!-- //Custom-Files -->

        <!-- web fonts -->
        <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
            rel="stylesheet">
        <!-- //web fonts -->

    </head>

    <body>
        <!-- top-header -->
        <div class="agile-main-top">
            <div class="container-fluid">
                <div class="row main-top-w3l py-2">
                    <div class="col-lg-4 header-most-top">
                        <p class="text-white text-lg-left text-center">Meilleurs Offres et réductions d’offres
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </p>
                    </div>
                    <div class="col-lg-8 header-right mt-lg-0 mt-2">
                        <!-- header lists -->
                        <ul>
                        
                        <?php

                                use Illuminate\Contracts\Encryption\DecryptException;
                                use Illuminate\Support\Facades\Crypt;

                                try {
                                    if( isset($_COOKIE['email']) && isset($_COOKIE['password']) && isset($_COOKIE['tel']))
                                    {
                                        $cookieEmail = Crypt::decrypt($_COOKIE['email']);
                                        $cookiePassword = Crypt::decrypt($_COOKIE['password']);
                                        $cookieTel = Crypt::decrypt($_COOKIE['tel']);
                                    }elseif (isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['tel'])) {
                                        $sessionEmail = Crypt::decrypt($_SESSION['email']);
                                        $sessionPassword = Crypt::decrypt($_SESSION['password']);
                                        $sessionTel = Crypt::decrypt($_SESSION['tel']);
                                    }

                                } catch (DecryptException $e) {
                                    setcookie('email', '', time()-3600, null, null, false, true);
                                    setcookie('password', '', time()-3600, null, null, false, true);
                                    setcookie('tel', '', time()-3600, null, null, false, true);
                                    setcookie('nom', '', time()-3600, null, null, false, true);
                                    setcookie('prenom', '', time()-3600, null, null, false, true);
                                    setcookie('adresse', '', time()-3600, null, null, false, true);
                                    session_destroy();
                                    header('Location : http://localhost:8000');
                                    Exit();
                                }
                         ?>


                        @if(session()->has('email') && session()->has('password')  && session()->has('tel')) 
                                                                  
                            <li class="text-center border-right text-white">
                                <i class="fas fa-phone mr-2"></i>{!! session('tel') !!}
                            </li>
                            <li class="text-center text-white" style="margin-left: 20px; margin-right: 20px;">
                            <i class="fa fa-envelope" aria-hidden="true"></i>{!! session('email') !!}
                            </li>
                            <li class="text-center border-left text-white">
                                <a href="{{ route('disconected')  }}" class="text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Deconnexion </a>
                            </li>
                        @elseif( isset($_COOKIE['email']) && isset($_COOKIE['password']) && isset($_COOKIE['tel']))

                            <li class="text-center border-right text-white">
                                <i class="fas fa-phone mr-2"></i>{!! $cookieTel ?? '' !!}
                            </li>
                            <li class="text-center text-white" style="margin-left: 20px; margin-right: 20px;">
                                <i class="fa fa-envelope" aria-hidden="true"></i>{!! $cookieEmail ?? '' !!}
                            </li>
                            <li class="text-center border-left text-white">
                                <a href="{{ route('disconected')  }}" class="text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Deconnexion </a>
                            </li>
                        @elseif(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['tel']))

                            <li class="text-center border-right text-white">
                                <i class="fas fa-phone mr-2"></i>{!! $sessionTel ?? '' !!}
                            </li>
                            <li class="text-center text-white" style="margin-left: 20px; margin-right: 20px;">
                                <i class="fa fa-envelope" aria-hidden="true"></i>{!! $sessionEmail ?? '' !!}
                            </li>
                            <li class="text-center border-left text-white">
                                <a href="{{ route('disconected')  }}" class="text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Deconnexion </a>
                            </li>

                        @else

                            <li class="text-center border-right text-white">
                                <a href="{{ route('signinForm') }}" class="text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Se Connecter </a>
                            </li>
                            <li class="text-center text-white">
                                <a href="{{ route('showForm') }}" class="text-white">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Inscription </a>
                            </li>
                        @endif
                        </ul>
                        <!-- //header lists -->
                    </div>
                </div>
            </div>
        </div>

        <!-- header-bottom-->
        <div class="header-bot">
            <div class="container">
                <div class="row header-bot_inner_wthreeinfo_header_mid">
                    <!-- logo -->
                    <div class="col-md-3 logo_agile">
                        <h1 class="text-center">
                            <a href="{{ route('site.contenu') }}" class="font-weight-bold font-italic">
                                <img src="{{ asset('assets/images/logo2.png') }}" alt=" " class="img-fluid">Boutique
                            </a>
                        </h1>
                    </div>
                    <!-- //logo -->
                    <!-- header-bot -->
                    <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                        <div class="row">
                            <!-- search -->
                            <div class="col-8 agileits_search">
                                <form class="form-inline" action="#" method="post">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" required>
                                    <button class="btn my-2 my-sm-0" type="submit">Rechercher</button>
                                </form>
                            </div>
                            <!-- //search -->
                            <!-- cart details -->
                            <a  class="text-muted" href="{{ route('cart.index') }}"><span class="fas fa-shopping-cart ml-1" style="margin-right: 10px;">({{ Cart::count() }})</span>  GNF{{ Cart::subtotal() }}</a>
                            <!-- //cart details -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop locator (popup) -->
        <!-- //header-bottom -->
        <!-- navigation -->
        <div class="navbar-inner">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto text-center mr-xl-5">
                            <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                                <a class="nav-link" href="{{route('site.contenu')}}">Accueil
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                                <a class="nav-link" href="{{ route('apropos') }}">Apropos de Nous</a>
                            </li>
                            <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                                <a class="nav-link" href="{{ route('allproduit') }}">Nos Produits par categorie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contactez-Nous</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->

       @yield('content')
       <!-- middle section -->
       <div class="join-w3l1 py-sm-5 py-4">
           <div class="container py-xl-4 py-lg-2">
               <div class="row">
                   <div class="col-lg-6">
                       <div class="join-agile text-left p-4">
                           <div class="row">
                               <div class="col-sm-7 offer-name">
                                   <h6>Lisse, Riche et Audio Loud</h6>
                                   <h4 class="mt-2 mb-3">Casque de marque</h4>
                                   <p>Vente jusqu’à 25% de rabais sur tous les magasins</p>
                               </div>
                               <div class="col-sm-5 offerimg-w3l">
                                   <img src="{{ asset('assets/images/off1.png') }}" alt="" class="img-fluid">
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6 mt-lg-0 mt-5">
                       <div class="join-agile text-left p-4">
                           <div class="row ">
                               <div class="col-sm-7 offer-name">
                                   <h6>Un téléphone plus grand</h6>
                                   <h4 class="mt-2 mb-3">Téléphones intelligents 5</h4>
                                   <p>Commande d’expédition gratuite de plus de 100 $</p>
                               </div>
                               <div class="col-sm-5 offerimg-w3l">
                                   <img src="{{ asset('assets/images/off2.png') }}" alt="" class="img-fluid">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- middle section -->


        <!-- footer -->
        <footer>
            <div class="footer-top-first">
                <div class="container py-md-5 py-sm-4 py-3">
                    <!-- footer first section -->
                    <h2 class="footer-top-head-w3l font-weight-bold mb-2">Électroniques :</h2>
                    <p class="footer-main mb-4">
                        Si vous envisagez un nouvel ordinateur portable, à la recherche d’une nouvelle voiture stéréo puissante ou de shopping pour un nouveau TÉLÉVISEUR HD, nous le
                         trouver exactement ce dont vous avez besoin à un prix que vous pouvez vous permettre. Nous offrons chaque jour des prix bas sur les téléviseurs, ordinateurs portables, téléphones cellulaires, tablettes
                        iPads, jeux vidéo, ordinateurs de bureau, appareils photo et caméscopes, audio, vidéo et plus encore.</p>
                    <!-- //footer first section -->
                    <!-- footer second section -->
                    <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                        <div class="col-md-4 offer-footer">
                            <div class="row">
                                <div class="col-4 icon-fot">
                                    <i class="fas fa-dolly"></i>
                                </div>
                                <div class="col-8 text-form-footer">
                                    <h3>Livraison gratuite</h3>
                                    <p>sur les commandes de plus de 100 $</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offer-footer my-md-0 my-4">
                            <div class="row">
                                <div class="col-4 icon-fot">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="col-8 text-form-footer">
                                    <h3>Livraison rapide</h3>
                                    <p>dans le monde entier</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offer-footer">
                            <div class="row">
                                <div class="col-4 icon-fot">
                                    <i class="far fa-thumbs-up"></i>
                                </div>
                                <div class="col-8 text-form-footer">
                                    <h3>Grand choix</h3>
                                    <p>des produits</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //footer second section -->
                </div>
            </div>
            <!-- footer third section -->
            <div class="w3l-middlefooter-sec">
                <div class="container py-md-5 py-sm-4 py-3">
                    <div class="row footer-info w3-agileits-info">
                        <!-- footer categories -->
                        <!-- //footer categories -->
                        <!-- quick links -->
                        <div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
                            <h3 class="text-white font-weight-bold mb-3">Liens rapides</h3>
                            <ul>
                                <li class="mb-3">
                                    <a href="{{route('apropos')}}">Apropos de Nous</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{route('contact')}}">Contactez-Nous</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{route('aide')}}">Aide</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{route('faq')}}">Faq</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{route('terme')}}">Termes D Utilisation</a>
                                </li>
                                <li>
                                    <a href="{{route('politique')}}">Politique de confidentialité</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
                            <h3 class="text-white font-weight-bold mb-3">Entrez en contact</h3>
                            <ul>
                                <li class="mb-3">
                                    <i class="fas fa-map-marker"></i> Thedatax à Nongo, GUINEE.</li>
                                <li class="mb-3">
                                    <i class="fas fa-mobile"></i> +224 628-36-13-36 </li>
                                <li class="mb-3">
                                    <i class="fas fa-phone"></i> +224 660-55-61-14 </li>
                                <li class="mb-3">
                                    <i class="fas fa-envelope-open"></i>
                                    <a href="mailto:example@mail.com">electronique@gmail.com</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope-open"></i>
                                    <a href="mailto:example@mail.com"> boutique@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
                            <!-- newsletter -->
                            <h3 class="text-white font-weight-bold mb-3">Newsletter</h3>
                            <p class="mb-3">Livraison gratuite sur votre première commande!</p>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                    <input type="submit" value="Aller">
                                </div>
                            </form>
                            <!-- //newsletter -->
                            <!-- social icons -->
                            <div class="footer-grids  w3l-socialmk mt-3">
                                <h3 class="text-white font-weight-bold mb-3">Suivez-nous sur</h3>
                                <div class="social">
                                    <ul>
                                        <li>
                                            <a class="icon fb" href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="icon tw" href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="icon gp" href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- //social icons -->
                        </div>
                    </div>
                    <!-- //quick links -->
                </div>
            </div>
            <!-- //footer third section -->

            <!-- footer fourth section -->
            <div class="agile-sometext py-md-5 py-sm-4 py-3">
                <div class="container">
                    <!-- payment -->
                    <div class="sub-some child-momu mt-4">
                        <h5 class="font-weight-bold mb-3"> Méthode Paiement</h5>
                        <ul>
                            <li>
                                <img src="{{ asset('assets/images/orangeicon.jpg') }}" alt="">
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/areebaicon.jpg') }}" alt="">
                            </li>
                        </ul>
                    </div>
                    <!-- //payment -->
                </div>
            </div>
            <!-- //footer fourth section (text) -->
        </footer>
        <!-- //footer -->
        <!-- copyright -->
        <div class="copy-right py-3">
            <div class="container">
                <p class="text-center text-white">© 2018 Electro Store. All rights reserved | Design by
                    <a href="http://w3layouts.com"> W3layouts.</a>
                </p>
            </div>
        </div>
        <!-- //copyright -->

        <!-- js-files -->
        <!-- jquery -->
        <script src="{{ asset('assets/js/jquery-2.2.3.min.js') }}"></script>
        <!-- //jquery -->

        <!-- nav smooth scroll -->
        <script>
            $(document).ready(function () {
                $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                        $(this).toggleClass('open');
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                        $(this).toggleClass('open');
                    }
                );
            });
        </script>
        <!-- //nav smooth scroll -->

        <!-- popup modal (for location)-->
        <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });

            });
        </script>
        <!-- //popup modal (for location)-->

        <!-- cart-js -->
        <script src="{{ asset('assets/js/minicart.js') }}"></script>
        <script>
            paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

            paypals.minicarts.cart.on('checkout', function (evt) {
                var items = this.items(),
                    len = items.length,
                    total = 0,
                    i;

                // Count the number of each item in the cart
                for (i = 0; i < len; i++) {
                    total += items[i].get('quantity');
                }

                if (total < 3) {
                    alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                    evt.preventDefault();
                }
            });
        </script>
        <!-- //cart-js -->

        <!-- password-script -->
        <script>
            window.onload = function () {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("password2").value;
                var pass1 = document.getElementById("password1").value;
                if (pass1 != pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity('');
                //empty string means no validation error
            }
        </script>
        <!-- //password-script -->

        <!-- scroll seller -->
        <script src="{{ asset('assets/js/scroll.js') }}"></script>
        <!-- //scroll seller -->

        <!-- smoothscroll -->
        <script src="{{ asset('assets/js/SmoothScroll.min.js') }}"></script>
        <!-- //smoothscroll -->

        <!-- start-smooth-scrolling -->
        <script src="{{ asset('assets/js/move-top.js') }}"></script>
        <script src="{{ asset('assets/js/easing.js') }}"></script>
        <script>
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <!-- //end-smooth-scrolling -->

        <!-- smooth-scrolling-of-move-up -->
        <script>
            $(document).ready(function () {
                /*
                var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                };
                */
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <!-- //smooth-scrolling-of-move-up -->

        <!-- for bootstrap working -->
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
        <!-- //for bootstrap working -->
        <!-- //js-files -->
    </body>

    </html>
