
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Faire votre note de calcule" />
        <meta name="author" content="" />
        <title>Faite votre note de calcule avec ma révision</title>
        <link rel="icon" type="image/x-icon" href="{{asset('img/calculatrice.png')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Font awsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/welcome.css')}}" rel="stylesheet" />
        <style>
            .loading-gif {
                max-width: 500px;
            }

            .pre-loader {
                position: fixed;
                z-index: 100; /** make sure this is the highest value compared to all other divs **/
                top: 0;
                left: 0;
                background: #191f26;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                width: 100%;
            }

            .pre-loader.hidden {
                animation: fadeOut 2s; /** change to 1s */
                animation-fill-mode: forwards;
            }

            @keyframes fadeOut {
                100% {
                    opacity: 0;
                    visibility: hidden;
                }
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="/">
                    <img style="width:200px;" src="{{asset('img/logo.png')}}" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="dashboard">Tableaux de bord</a></li>
                        <div class="user auth">
                            @guest
                                <li class="nav-item"><a style="color:white;" class="nav-link me-lg-3 btn btn-success" href="{{ route('login') }}">Connexion</a></li>
                            @else
                                <div class="dropdown">
                                    <li>
                                        <a class="dropdown-toggle d-flex align-items-center black nav-link me-lg-3" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bxs-user-circle"></i>{{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item d-flex align-items-center users">
                                                    <i class="bx bx-log-out"></i> Déconnexion
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                </div>
                            @endguest
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h2 style="font-size:38px;" class="title mb-3">Votre outil pour le calcul et la gestion des révisions des Prix</h2>
                            <p class="lead fw-normal text-muted">Pour garantir l’équilibre économique entre acheteurs public et titulaires des marchés public , Et éviter les impacts des variations économiques pendant l’exécution du marché. </p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                                <a class="btn btn-success" href="/dashboard">Commencez maintenant</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Masthead device mockup feature-->
                        <img class="rounded pe-5" style="width:120%" src="{{asset('img/img1.jpg')}}" alt="image">
                    </div>
                </div>
            </div>
        </header>
        <!-- Start section 2-->
        {{-- <section class="container px-5">
            <div class="gx-5 align-items-center">
                <div class="row">
                    <div class="col-md-4 mx-2 rounded shadow p-4 block">
                        <div class="icon">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        <p>gigsmfgUSGDQFMGVPSGMDQGG</p>
                    </div>
                    <div class="col-md-4 mx-2 rounded shadow p-4 block">
                        <div class="icon">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        <p>gigsmfgUSGDQFMGVPSGMDQGG</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start section 3--> --}}
        <section class="container px-5">
            <div class="gx-5 align-items-center">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <img class="rounded" style="width:100%" src="{{asset('img/img4.jpg')}}" alt="image">
                    </div>
                     <div class="col-md-6" style="padding:20px 0px;">
                        <div class="content">
                            <h2>Faciliter la vie des entrepreneurs</h2>
                            <p>Avec des solutions innovantes et un soutien dédié, nous simplifions chaque étape de votre parcours entrepreneurial, vous permettant de vous concentrer sur ce qui compte vraiment : la croissance de votre entreprise. </p>
                            <a class="btn btn-success" href="/dashboard">En savoire plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End section 3-->
        <!-- Start section 4-->
        <div class="block-3">
             <section class="container px-5">
                <div class="gx-5 align-items-center">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6" style="padding:20px 0px;">
                            <div class="content">
                                <h2>Se concentrer dans ce qui est important </h2>
                                <p>Se concentrer sur ce qui est vraiment important vous permet de maximiser votre efficacité et d'atteindre vos objectifs plus rapidement.</p>
                                <a class="btn btn-success" href="/dashboard">En savoire plus</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="rounded" style="width:100%" src="{{asset('img/img6.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End section 4-->
         <!-- Start section 5-->
        <section class="container px-5">
            <div class="gx-5 align-items-center">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <img class="rounded" style="width:100%" src="{{asset('img/img5.jpg')}}" alt="image">
                    </div>
                     <div style="padding:20px 0px;" class="col-md-6">
                        <div class="content">
                            <h2>Faite votre calcul en toute confiance</h2>
                            <p>Réaliserez votre note de calcul en deux minutes avec une simplicité sans pareille..</p>
                            <a class="btn btn-success" href="/dashboard">En savoire plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End section 5-->
        <div class='pre-loader'>
            <img class='loading-gif' alt='loading' src="https://media0.giphy.com/media/11FuEnXyGsXFba/source.gif"/>
        </div>
        <!-- Strat Footer-->
        <footer class="bg-dark text-white py-4">
            <div class="container gx-5 align-items-center">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="d-flex justify-content-start align-items-center py-2">
                    		<img style="width:200px;" src="{{asset('img/logo2.png')}}" alt="logo" />
                		</div>
                        <p>Bureau d’études techniques LandLab .</p>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h5>Contactez-nous</h5>
                            <address>
                                <p><i class="bi bi-geo-alt"></i> Imm 172/N 2 Portes de Marrakech, Marrakech, Maroc</p>
                                <p><i class="bi bi-telephone"></i> +212 5 25 01 35 61</p>
                                <p><i class="bi bi-envelope"></i> <a href="mailto:landlab4@gmail.com" target="_blank">landlab4@gmail.com</a></p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h5>Suivez nous</h5>
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa-brands fa-facebook"></i><span class="mx-2">Facebook</span></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin"></i><span class="mx-2">Linkedin</span></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i><span class="mx-2">Twitter</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-center">© 2023 Landlab. Tous droits réservés.</p>
            </div>
        </footer>
        <!-- End Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!-- js to hide preloader loading is done -->
        <script type='text/javascript'>
            window.addEventListener('load', function () {
                document.querySelector('.pre-loader').className += ' hidden';
            });
        </script>
    </body>
</html>
