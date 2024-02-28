<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    @if(env('APP_ENV') === 'production')
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MVQ925DR');
        </script>
    @endif
    <!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Portfolio de Mbassi Loic Aron - Développeur Web -">
  <meta name="keywords" content="Cameroun,ENSPY,Intelligence Artificielle,full,full stack, full-stack,fullstack ,développeur web, portfolio, Laravel, PHP">
  <meta name="author" content="Mbassi Ewolo Loic Aron">
  <title>Mbassi Loic Aron</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="styleheet">
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVQ925DR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <!--
    - #MAIN
  -->

  <main>

    <!--
      - #SIDEBAR
    -->

    <aside class="sidebar" data-sidebar>

      <div class="sidebar-info">

        <figure class="avatar-box">
          {{-- <img src="{{asset('assets/images/my-avatar.png')}}" alt="Mbassi Loic Aron" width="80"> --}}
          <img src="{{asset('assets/images/utilisateur.png')}}" alt="Mbassi Loic Aron" width="80">

        </figure>

        <div class="info-content">
          <h1 class="name" title="Mbassi Loic Aron">Mbassi Loic Aron</h1>

          <p class="title">Developpeur Web Full Stack</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
          <span>Show Contacts</span>

          <ion-icon name="chevron-down"></ion-icon>
        </button>

      </div>

      <div class="sidebar-info_more">

        <div class="separator"></div>

        <ul class="contacts-list">

          <li class="contact-item">

            <div class="icon-box">

              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Email</p>

              <a href="mailto:wwwmbassiloic@gmail.com" class="contact-link">wwwmbassiloic@gmail.com</a>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="phone-portrait-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Phone</p>

              <a href="tel:+12133522795" class="contact-link">+237 656820591</a>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="calendar-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Birthday</p>

              <time datetime="2001-10-09">October 09, 2001</time>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Location</p>

              <address>Cradat, Yaoundé, Cameroun</address>
            </div>

          </li>

        </ul>

        <div class="separator"></div>

        <ul class="social-list">

          {{-- <li class="social-item">
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li> --}}
          <li class="social-item">
            <a href="https://github.com/Nameless0l" class="social-link" target="_blank">
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </li>
          <li class="social-item">
            <a href="https://www.linkedin.com/in/mbassi-loic-3942a9246" class="social-link" target="_blank">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>
          <li class="social-item">
            <a href="https://wa.me/656820591" class="social-link" target="_blank" >
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>
          <li class="social-item">
            <a href="https://twitter.com/MbassiLoic/" class="social-link" target="_blank">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li class="social-item">
            <a href="https://www.instagram.com/mbassiloicaron/" class="social-link" target="_blank">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
        </ul>

      </div>

    </aside>





    <!--
      - #main-content
    -->

    <div class="main-content">

      <!--
        - #NAVBAR
      -->

      <nav class="navbar">

        <ul class="navbar-list">
            <li class="navbar-item">
                <button class="navbar-link"><a style="color: white" href="#">Commentaires</a></button>
            </li>
            <li class="navbar-item">
            <button class="navbar-link"><a style="color: white" href="{{route('home')}}">Retour</a></button>
            </li>
        </ul>

      </nav>





      <!--
        - #ABOUT
      -->

      <article class="about  active" data-page="about">

        <header>
          <h2 class="h2 article-title">Blog</h2>
        </header>


        <!--
          - service
        -->



        @if (Route::currentRouteName()== 'blog-decouverte-laravel-10')
            <h3 class="h3 service-title blog-detail-gold">Debuter avec Larevel</h3>
            <section class="blog-detail">
                <li class="blog-post-item">
                    <a href="#">

                    <figure class="blog-banner-box">
                        <img src="{{asset('assets/images/téléchargement.png')}}" alt="Best fonts every designer" loading="lazy">
                    </figure>
                    </a>
                    <a href="#">
                    <div class="blog-content">

                        <div class="blog-meta">
                        <p class="blog-category">Mbassi Loic</p>

                        <span class="dot"></span>

                        <time datetime="2022-02-23">Fevrier 28, 2024</time>
                        </div>

                        <h3 class="h3 blog-item-title">Laravel c'est quoi ?</h3>

                        <p class="blog-text">
                            <code class ="blog-detail-gold"></code>
                            <code class ="blog-detail-gold">Laravel</code> est un <code class ="blog-detail-gold">framework PHP</code> moderne et puissant qui simplifie le processus de développement d'applications.Etant basé sur le modèle MVC (Modèle-Vue-Contrôleur), il offre une syntaxe élégante et expressive, ainsi qu'une multitude de fonctionnalités pour accélérer le développement tout en garantissant la qualité  du code. Dans ce guide, nous allons explorer les bases de Laravel et vous guider pas à pas pour commencer à créer vos propres api avec <code class ="blog-detail-gold">Laravel</code>.
                        </p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <h3 class="h3 blog-item-title">Prérequis :Avant de commencer, vous devez avoir :</h3>
                        <ol class="timeline-list">
                            <li class="timeline-item">

                                <h4 class="h4 timeline-item-title">Connaissances de base en PHP et en POO</h4>
                            </li>
                            <li class="timeline-item">
                                <h4 class="h4 timeline-item-title">Notions d'HTML5 et CSS</h4>
                            </li>
                            <li class="timeline-item">

                                <h4 class="h4 timeline-item-title">Outils de développement installés (serveur web local, PHP, Composer)</h4>
                            </li>
                        </ol>
                        <p></p>
                        <p></p>
                        <p></p>
                        <h3 class="h3 blog-item-title">Installation de laravel</h3>
                        <P class="blog-text">La facon la plus simple d'installer laravel est d'utiliser composer</P>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> composer global require laravel/installer</code></p>
                        </div>
                        <h3 class="h3 blog-item-title">Création d'un nouveau projet</h3>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> laravel new nom_de_votre_projet</code></p>
                            <P class="blog-text">/puis acceder au projet/</P>
                            <p class="blog-category"><code class ="blog-detail-gold"> cd nom_de_votre_projet</code></p>
                        </div>

                        <p></p>
                        <p></p>
                        <p></p>
                        <h3 class="h3 blog-item-title">Structure du projet</h3>
                        <P class="blog-text">Un projet Laravel est composé de plusieurs fichiers et dossiers importants :</P>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> app: </code></p><P class="blog-text">/Contient les classes PHP de votre application./</P>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> config: </code></p><P class="blog-text">/Contient les fichiers de configuration de l'application./</P>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> database: </code></p><P class="blog-text">/Contient les migrations et les modèles de base de données./</P>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> public: </code></p><P class="blog-text">/Contient les fichiers accessibles par le navigateur web (assets, CSS, JavaScript)./</P>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> resources: </code></p><P class="blog-text">/Contient les vues Blade et les fichiers de traduction./</P>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> routes: </code></p><P class="blog-text">/ Contient les routes de l'application./</P>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> tests: </code></p><P class="blog-text">/ Contient les tests unitaires et d'intégration./</P>
                        </div>

                        <p></p>
                        <p></p>
                        <p></p>
                        <h3 class="h3 blog-item-title">Premier pas</h3>
                        <P class="blog-text">Créez un nouveau contrôleur et une nouvelle vue pour afficher une page simple</P>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> php artisan make:controller HomeController </code></p>
                        </div>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold">php artisan make:view home </code></p>
                        </div>
                        <P class="blog-text">Ajoutez une route à votre fichier routes/web.php pour afficher la vue home.</P>
                        <div class="blog-meta" style="margin-left: 20px">
                            <span class="dot"></span>
                            <p class="blog-category"><code class ="blog-detail-gold"> Route::get('/', 'HomeController@index'); </code></p>
                        </div>
                        <P class="blog-text">Créez la méthode index dans votre contrôleur HomeController.</P>
                        <figure class="blog-banner-box">
                            <img src={{asset('assets/images/PostController.php-2024-02-28-11-02-45.png')}} alt="Code" loading="lazy">
                        </figure>
                        <p class="blog-text" style="margin-top: 10px"> 🤑 Démarrez le serveur web local(<code class ="blog-detail-gold"> php artisan serve --port 8000</code>) et accédez à l'URL <code class ="blog-detail-gold"> http://localhost:8000 </code>pour voir votre page. </p>
                    </div>
                    </a>
                </li>
            </section>
        @elseif (Route::currentRouteName()=='blog-laravel-10-api')
            <h3 class="h3 service-title blog-detail-gold">Creation d'une API  avec laravel 10</h3>
            <section class="blog-detail">
                <li class="blog-post-item">
                    <a href="#">

                    <figure class="blog-banner-box">
                        <img src="{{asset('assets/images/api.jpeg')}}" alt="Best fonts every designer" loading="lazy">
                    </figure>
                </li>
                <h3 class="h3 blog-item-title" style="margin:15px 0 15px 15px">Incomplet 🙃!</h3>
            </section>
        @elseif (Route::currentRouteName()=='blog-laravel-10-api-react')
            <h3 class="h3 service-title blog-detail-gold">Connection d'une api laravel a une application React</h3>
            <section class="blog-detail">
                <li class="blog-post-item">
                    <a href="#">

                    <figure class="blog-banner-box">
                        <img src="{{asset('assets/images/react-blog.jpeg')}}" alt="Best fonts every designer" loading="lazy">
                    </figure>
                </li>
                <h3 class="h3 blog-item-title" style="margin:15px 0 15px 15px">Incomplet 🙃!</h3>
            </section>
        @endif

      </article>


    <article class="contact" data-page="contact">

        <header>
          <h2 class="h2 article-title">Contact</h2>
        </header>

        <section class="mapbox" data-mapbox>
          <figure>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15923.024233880169!2d11.4999684!3d3.8624388!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf1cb1ad8e11%3A0xc55007018088e100!2sMbassi%20Ewolo%20Loic%20Aron!5e0!3m2!1sfr!2scm!4v1707915773790!5m2!1sfr!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </figure>
        </section>


    </article>
    </div>

  </main>






  <!--
    - custom js link
  -->
  <script src="{{asset('assets/js/script.js')}}"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
