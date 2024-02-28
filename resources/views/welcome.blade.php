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
            <button class="navbar-link  active" data-nav-link>About</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Resume</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Portfolio</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Blog</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Contact</button>
          </li>

        </ul>

      </nav>





      <!--
        - #ABOUT
      -->

      <article class="about  active" data-page="about">

        <header>
          <h2 class="h2 article-title">About me</h2>
        </header>

        <section class="about-text">
        <p>
            Je suis un développeur web fullstack passionné par l'architecture backend, le machine learning et la modélisation de bases de données. Basé à Yaoundé, Cameroun,<br>
            J'excelle dans la conception de solutions web qui offrent une expérience utilisateur fluide, tout en priorisant la performance et l'évolutivité. Ma force réside dans la transformation de défis techniques complexes en applications intuitives et conviviales.
        </p>
        <P>
            Modélisation de bases de données: Compétence en modélisation conceptuelle, normalisation et optimisation de schémas pour les bases de données SQL.
        </P>
             {{-- et des pipelines de traitement de données optimisés. --}}
        </section>


        <!--
          - service
        -->

        <section class="service">

          <h3 class="h3 service-title">Ce que je fais</h3>

          <ul class="service-list">

            <li class="service-item">

              <div class="service-icon-box">
                <img src="{{asset('assets/images/icon-design.svg')}}
                " alt="design icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Développement Backend</h4>

                <p class="service-item-text">
                    Maîtrise des langages backend  Python, PHP. Je conçois des environnements côté serveur robustes et efficaces, des APIs robustes.
                </p>
              </div>

            </li>

            <li class="service-item">

              <div class="service-icon-box">
                <img src="{{asset('assets/images/icon-dev.svg')}}" alt="developpement web icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Capacité Fullstack</h4>

                <p class="service-item-text">
                    Compétences front-end (ReactJS, NextJs) lorsque cela est nécessaire pour réaliser des projets web complets.
                </p>
              </div>

            </li>

            <li class="service-item">

              <div class="service-icon-box">
                <img src="{{asset('assets/images/icon-dev.svg')}}" alt="mobile app icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Machine Learning</h4>

                <p class="service-item-text">
                    Expérimenté dans l'application d'algorithmes de ML (classification, régression) pour construire des fonctionnalités intelligentes et tirer des enseignements à partir des données.
                </p>
              </div>

            </li>

          </ul>

        </section>


        <!--
          - testimonials
        -->

        <section class="testimonials">

          <h3 class="h3 testimonials-title">Temoignages</h3>

          <ul class="testimonials-list has-scrollbar">

            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="{{asset('assets/images/avatar-4.png')}}" alt="Daniel lewis" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Louis Paul ZEBAZE</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                        Loic est un professionnel passionné par la programmation. Il est un professionnel capable de travailler en équipe et a une grande capacité d’adaptation aux changements du temps.J'ai travaillé avec Lui pendant plus de six mois pour mon site de E-commerce Bazel Square.
                        Me contacter a traver mon site web : https://www.bazelsquare.com , et je suis certain de vous recevoir dans un délai record !
                  </p>
                </div>

              </div>
            </li>

             <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="{{asset('assets/images/avatar-1.png')}}" alt="Jessica miller" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Essah Mama Francky</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    Loic est le comcepteur de mon site web pour l’agence de marketing King Digital. Je suis très satisfaite de l'expérience que j'ai eue avec vous ! Me contacter au num : +237 653 53 14 07 ou via le site web King digital : https://www.kingdigital.bazelsquare.com
                  </p>
                </div>

              </div>
            </li>
{{--
            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="{{asset('assets/images/avatar-3.png')}}" alt="Emily evans" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Emily evans</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    Loic was hired to create a corporate identity. We were very pleased with the work done. he has a
                    lot of experience
                    and is very concerned about the needs of client. Lorem ipsum dolor sit amet, ullamcous cididt
                    consectetur adipiscing
                    elit, seds do et eiusmod tempor incididunt ut laborels dolore magnarels alia.
                  </p>
                </div>

              </div>
            </li>

            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="{{asset('assets/images/avatar-1.png')}}" alt="Henry william" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Henry william</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    Loic was hired to create a corporate identity. We were very pleased with the work done. he has a
                    lot of experience
                    and is very concerned about the needs of client. Lorem ipsum dolor sit amet, ullamcous cididt
                    consectetur adipiscing
                    elit, seds do et eiusmod tempor incididunt ut laborels dolore magnarels alia.
                  </p>
                </div>

              </div>
            </li> --}}

          </ul>

        </section>


        <!--
          - testimonials modal
        -->

        <div class="modal-container" data-modal-container>

          <div class="overlay" data-overlay></div>

          <section class="testimonials-modal">

            <button class="modal-close-btn" data-modal-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="modal-img-wrapper">
              <figure class="modal-avatar-box">
                <img src="{{asset('assets/images/avatar-1.png')}}" alt="Daniel lewis" width="80" data-modal-img>
              </figure>

              <img src="{{asset('assets/images/icon-quote.svg')}}" alt="quote icon">
            </div>

            <div class="modal-content">

              <h4 class="h3 modal-title" data-modal-title>Daniel lewis</h4>

              <time datetime="2021-06-14">14 June, 2021</time>

              <div data-modal-text>
                <p>
                  Loic was hired to create a corporate identity. We were very pleased with the work done. he has a
                  lot of experience
                  and is very concerned about the needs of client. Lorem ipsum dolor sit amet, ullamcous cididt
                  consectetur adipiscing
                  elit, seds do et eiusmod tempor incididunt ut laborels dolore magnarels alia.
                </p>
              </div>

            </div>

          </section>

        </div>


        <!--
          - clients
        -->

        <section class="clients">

          <h3 class="h3 clients-title">Clients</h3>

          <ul class="clients-list has-scrollbar">

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-1-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-2-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-3-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-4-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-5-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-6-color.png" alt="client logo">
              </a>
            </li>

          </ul>

        </section>

      </article>





      <!--
        - #RESUME
      -->

      <article class="resume" data-page="resume">

        <header>
          <h2 class="h2 article-title">Resume</h2>
        </header>

        <section class="timeline">

          <div class="title-wrapper">
            <div class="icon-box">
              <ion-icon name="book-outline"></ion-icon>
            </div>

            <h3 class="h3">Education</h3>
          </div>

          <ol class="timeline-list">

            <li class="timeline-item">

                <h4 class="h4 timeline-item-title">Ecole Nationale Superieure  Polytechnique Yaounde</h4>

                <span>2023 — Present</span>

                <p class="timeline-text">
                  Troisième Année au Génie Informatique
                </p>
              </li>

            <li class="timeline-item">

              <h4 class="h4 timeline-item-title">Ecole Nationale Superieure  Polytechnique Yaounde</h4>

              <span>2021 — 2023</span>

              <p class="timeline-text">
                MSP (Mathematiques et Sciences Physiques): Classes préparatoires pour la formation d'Ingenieur .
              </p>

            </li>

            <li class="timeline-item">

              <h4 class="h4 timeline-item-title">Faculté des sciences de l'université de Yaoundé I</h4>

              <span>2020-2021</span>

              <p class="timeline-text">
               Licence I en filière Maths-Info : Mension Assez-Bien (AB).
              </p>

            </li>

            <li class="timeline-item">

              <h4 class="h4 timeline-item-title">Baccalauréat en Mathématiques et Sciences Physiques - Lycée Nkolnda - Yaoundé</h4>

              <span>2019-2020</span>

              <p class="timeline-text">
                Baccalauréat C : Mension Assez-Bien (AB)
              </p>

            </li>

          </ol>

        </section>

        <section class="timeline">

          <div class="title-wrapper">
            <div class="icon-box">
              <ion-icon name="book-outline"></ion-icon>
            </div>

            <h3 class="h3">Experience</h3>
          </div>

          <ol class="timeline-list">

            <li class="timeline-item">

                <h4 class="h4 timeline-item-title">Développeur web Full-Stack freelance</h4>

                <span>2022 - Aujourd'hui</span>

                <p class="timeline-text">
                    Je travaille sur des
                </p>

              </li>

            <li class="timeline-item">

              <h4 class="h4 timeline-item-title">Stage de 3 mois chez Togettech&LegionWeb.</h4>

              <span>2022( juin - Septembre )</span>

              <p class="timeline-text">
               Stage en developpement Web et Mobile chez
              </p>

            </li>

            <li class="timeline-item">

              <h4 class="h4 timeline-item-title">2 eme Prix du concours projets 8 mars 2023</h4>

              <span>Mars 2023</span>

              <p class="timeline-text">
                Model de classification automatique des vidéos et des images à caractère violent utilisant le Deep Learning
              </p>

            </li>

          </ol>

        </section>
        <section class="timeline">

            <div class="title-wrapper">
              <div class="icon-box">
                <ion-icon name="book-outline"></ion-icon>
              </div>

              <h3 class="h3">Domaines d'expertise</h3>
            </div>

            <ol class="timeline-list">

              <li class="timeline-item">

                  <h4 class="h4 timeline-item-title">Laravel</h4>

                  <span>2022 - Aujourd'hui</span>

                  <p class="timeline-text">
                    Framework PHP robuste et populaire pour le développement web fullstack.
                  </p>

                </li>

              <li class="timeline-item">

                <h4 class="h4 timeline-item-title">HTML/CSS</h4>
                <p class="timeline-text">
                    <span>HTML/CSS</span> Langages fondamentaux du web pour la création de structures et de styles de pages web.
                    <span>JavaScript</span>Langage de programmation côté client pour des interactions et animations web.
                    <span>Bases de données MySQL</span>Stockage et gestion des données pour les applications web.
                    <span>Responsive design</span>Adaptation des sites web à tous les supports (ordinateurs, tablettes, mobiles).
                    <span>SEO (Search Engine Optimization)</span> Optimisation des sites web pour les moteurs de recherche.
                </p>

              </li>

              <li class="timeline-item">

                <h4 class="h4 timeline-item-title">ReactJs</h4>

                <span>2023 — Aujourd'hui</span>

                <p class="timeline-text">
                  Librairie Javacript pour La conception des interfaces web robustes et rapides
                </p>

              </li>

            </ol>

          </section>

        <section class="skill">

          <h3 class="h3 skills-title">My skills</h3>

          <ul class="skills-list content-card">

            <li class="skills-item">

              <div class="title-wrapper">
                <h5 class="h5">Developpement Web</h5>
                <data value="80">80%</data>
              </div>

              <div class="skill-progress-bg">
                <div class="skill-progress-fill" style="width: 80%;"></div>
              </div>

            </li>
            <li class="skills-item">

                <div class="title-wrapper">
                  <h5 class="h5">Php</h5>
                  <data value="80">80%</data>
                </div>

                <div class="skill-progress-bg">
                  <div class="skill-progress-fill" style="width: 80%;"></div>
                </div>

              </li>
              <li class="skills-item">

                <div class="title-wrapper">
                  <h5 class="h5">Laravel</h5>
                  <data value="70">70%</data>
                </div>

                <div class="skill-progress-bg">
                  <div class="skill-progress-fill" style="width: 70%;"></div>
                </div>

              </li>
            <li class="skills-item">

                <div class="title-wrapper">
                  <h5 class="h5">WordPress</h5>
                  <data value="50">50%</data>
                </div>

                <div class="skill-progress-bg">
                  <div class="skill-progress-fill" style="width: 50%;"></div>
                </div>

              </li>
              <li class="skills-item">

                <div class="title-wrapper">
                  <h5 class="h5">React</h5>
                  <data value="40">40%</data>
                </div>

                <div class="skill-progress-bg">
                  <div class="skill-progress-fill" style="width: 40%;"></div>
                </div>

              </li>
            <li class="skills-item">

              <div class="title-wrapper">
                <h5 class="h5">Machine Learning</h5>
                <data value="30">30%</data>
              </div>

              <div class="skill-progress-bg">
                <div class="skill-progress-fill" style="width: 30%;"></div>
              </div>

            </li>


          </ul>

        </section>

      </article>





      <!--
        - #PORTFOLIO
      -->

      <article class="portfolio" data-page="portfolio">

        <header>
          <h2 class="h2 article-title">Portfolio</h2>
        </header>

        <section class="projects">

          <ul class="filter-list">

            <li class="filter-item">
              <button class="active" data-filter-btn>All</button>
            </li>
            <li class="filter-item">
                <button data-filter-btn>developpement web</button>
              </li>

            {{-- <li class="filter-item">
              <button data-filter-btn>Web design</button>
            </li> --}}

            <li class="filter-item">
              <button data-filter-btn>intelligence artificielle</button>
            </li>


          </ul>

          <div class="filter-select-box">

            <button class="filter-select" data-select>

              <div class="select-value" data-selecct-value>Choisir la categorie</div>

              <div class="select-icon">
                <ion-icon name="chevron-down"></ion-icon>
              </div>

            </button>

            <ul class="select-list">

              <li class="select-item">
                <button data-select-item>All</button>
              </li>
              <li class="select-item">
                <button data-select-item>developpement web</button>
              </li>
              {{-- <li class="select-item">
                <button data-select-item>Web design</button>
              </li> --}}

              <li class="select-item">
                <button data-select-item>intelligence ar</button>
              </li>



            </ul>

          </div>

          <ul class="project-list">

            <li class="project-item  active" data-filter-item data-category="developpement web">
              <a href="https://www.bazelsquare.com/contact" target="_blank">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="{{asset('assets/images/Bazelsquare.png')}}" alt="Bazelsquare" loading="lazy">
                </figure>

                <h3 class="project-title">Bazelsquare</h3>

                <p class="project-category">developpement web</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="developpement web">
              <a href="https://www.kingdigital.bazelsquare.com/contactez-nous" target="_blank">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="{{asset('assets/images/King_digital.png')}}" alt="king digital" loading="lazy">
                </figure>

                <h3 class="project-title">King Digital</h3>

                <p class="project-category">Developpement Web</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="intelligence artificielle">
                <a href="" target="_blank">

                  <figure class="project-img">
                    <div class="project-item-icon-box">
                      <ion-icon name="eye-outline"></ion-icon>
                    </div>

                    <img src="{{asset('assets/images/ArticialI.png')}}" alt="king digital" loading="lazy">
                  </figure>

                  <h3 class="project-title">Inaya</h3>

                  <p class="project-category">Intelligence Artificielle</p>

                </a>
              </li>

            <li class="project-item  active" data-filter-item data-category="developpement web">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="{{asset('assets/images/SosDocta.png')}}" alt="sos docta" loading="lazy">
                </figure>

                <h3 class="project-title">SOS DOCTA</h3>

                <p class="project-category">Site Web De consultation en ligne</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="developpement web">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="{{asset('assets/images/quebec.png')}}" alt="brawlhalla" loading="lazy">
                </figure>

                <h3 class="project-title">Nettoi Quebec</h3>

                <p class="project-category">Site Web</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="developpement web">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="{{asset('assets/images/Schedule.png')}}" alt="Schedule." loading="lazy">
                </figure>

                <h3 class="project-title">Schedule</h3>

                <p class="project-category">API</p>

              </a>
            </li>




          </ul>

        </section>

      </article>





      <!--
        - #BLOG
      -->

      <article class="blog" data-page="blog">

        <header>
          <h2 class="h2 article-title">Blog</h2>
        </header>

        <section class="blog-posts">
          <ul class="blog-posts-list">
            <li class="blog-post-item">
              <a href="{{route('blog-decouverte-laravel-10')}}">

                <figure class="blog-banner-box">
                  <img src="{{asset('assets/images/téléchargement.png')}}" alt="Decouverte de Laravel 10" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Mbassi Loic</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fevrier 28, 2024</time>
                  </div>

                  <h3 class="h3 blog-item-title">Decouverte de Laravel 10</h3>

                  <p class="blog-text">
                    Laravel est un framework PHP open-source populaire qui facilite le développement d'applications web robustes et élégantes...<code class ="blog-detail-gold">voir plus</code>
                  </p>

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="{{route('blog-laravel-10-api')}}">

                <figure class="blog-banner-box">
                  <img src="{{asset('assets/images/api.jpeg')}}" alt="Decouverte de Laravel 10" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Mbassi Loic</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fevrier 28, 2024</time>
                  </div>

                  <h3 class="h3 blog-item-title">API avec Laravel 10 : application au projet e-shop</h3>

                  <p class="blog-text">
                    Les APIs (Application Programming Interfaces) sont des interfaces qui permettent à deux applications de communiquer entre elles. ...<code class ="blog-detail-gold">voir plus</code>
                  </p>
      ?

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="{{route('blog-laravel-10-api-react')}}">

                <figure class="blog-banner-box">
                  <img src="{{asset('assets/images/react.png')}}" alt="Decouverte de Laravel 10" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Mbassi Loic</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fevrier 28, 2024</time>
                  </div>

                  <h3 class="h3 blog-item-title">Connection d'une app Reactjs à notre api laravel (cadre du projet e-shop)</h3>

                  <p class="blog-text">
                    ReactJS est une bibliothèque JavaScript open-source pour créer des interfaces utilisateur interactives. Elle est devenue l'une ....<code class ="blog-detail-gold">voir plus</code>
                    {{-- <p>ReactJS est une bibliothèque JavaScript open-source pour créer des interfaces utilisateur interactives. Elle est devenue l'une des technologies front-end les plus populaires, utilisée par des entreprises comme Facebook, Netflix et Airbnb.</p> --}}
                  </p>

                </div>

              </a>
            </li>
          </ul>

        </section>

      </article>





      <!--
        - #CONTACT
      -->

      <article class="contact" data-page="contact">

        <header>
          <h2 class="h2 article-title">Contact</h2>
        </header>

        <section class="mapbox" data-mapbox>
          <figure>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15923.024233880169!2d11.4999684!3d3.8624388!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf1cb1ad8e11%3A0xc55007018088e100!2sMbassi%20Ewolo%20Loic%20Aron!5e0!3m2!1sfr!2scm!4v1707915773790!5m2!1sfr!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </figure>
        </section>

        <section class="contact-form">

          <h3 class="h3 form-title">Contact Form</h3>

            <form action="{{route('contact')}}" method="POST" class="form" data-form>
              @csrf
              <div class="input-wrapper">
                <input type="text" name="fullname" class="form-input" placeholder="Nom Et Prenom" required data-form-input>

                <input type="email" name="email" class="form-input" placeholder="Addresse Email" required data-form-input>
              </div>

              <textarea name="message" class="form-input" placeholder="Votre Message" required data-form-input></textarea>

            <button class="form-btn" type="submit" disabled data-form-btn>
              <ion-icon name="paper-plane"></ion-icon>
              <span>Envoyer</span>
            </button>

          </form>

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
