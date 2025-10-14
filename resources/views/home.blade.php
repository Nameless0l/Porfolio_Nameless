<!DOCTYPE html>
<html lang="fr">

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

  <meta name="keywords" content="{{ $seoSettings['meta_keywords'] ?? 'Cameroun,ENSPY,Intelligence Artificielle,full,full stack, full-stack,fullstack ,développeur web, portfolio, Laravel, PHP' }}">
  <meta name="author" content="{{ $seoSettings['meta_author'] ?? 'Mbassi Ewolo Loic Aron' }}">

  <!-- Métadonnées pour le partage social - à ajouter dans la section head de welcome.blade.php -->
  <meta property="og:title" content="{{ $generalSettings['site_name'] ?? 'Mbassi Loic Aron - Portfolio' }}">
  <meta property="og:description" content="{{ $seoSettings['meta_description'] ?? 'Portfolio de Mbassi Loic Aron - Développeur Web Full Stack spécialisé en Laravel, React et intelligence artificielle' }}">
  <meta property="og:image" content="{{ asset('assets/images/portfolio-share.jpg') }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $generalSettings['site_name'] ?? 'Mbassi Loic Aron - Portfolio' }}">
  <meta name="twitter:description" content="{{ $seoSettings['meta_description'] ?? 'Portfolio de Mbassi Loic Aron - Développeur Web Full Stack spécialisé en Laravel, React et intelligence artificielle' }}">
  <meta name="twitter:image" content="{{ asset('assets/images/portfolio-share.jpg') }}">

  <title>{{ $generalSettings['site_name'] ?? 'Mbassi Loic Aron' }}</title>

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
          @if(isset($personalSettings['profile_photo']))
            <img src="{{asset('storage/' . $personalSettings['profile_photo'])}}" alt="{{ $personalSettings['owner_name'] ?? 'Mbassi Loic Aron' }}" width="80">
          @else
            <img src="{{asset('assets/images/utilisateur.png')}}" alt="{{ $personalSettings['owner_name'] ?? 'Mbassi Loic Aron' }}" width="80">
          @endif
        </figure>

        <div class="info-content">
          <h1 class="name" title="{{ $personalSettings['owner_name'] ?? 'Mbassi Loic Aron' }}">{{ $personalSettings['owner_name'] ?? 'Mbassi Loic Aron' }}</h1>

          <p class="title">{{ $personalSettings['owner_title'] ?? 'Développeur Web Full Stack' }}</p>
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

              <a href="mailto:{{ $personalSettings['owner_email'] ?? 'wwwmbassiloic@gmail.com' }}" class="contact-link">{{ $personalSettings['owner_email'] ?? 'wwwmbassiloic@gmail.com' }}</a>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="phone-portrait-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Phone</p>

              <a href="tel:{{ $personalSettings['owner_phone'] ?? '+237 656820591' }}" class="contact-link">{{ $personalSettings['owner_phone'] ?? '+237 656820591' }}</a>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="calendar-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Birthday</p>

              <time datetime="{{ $personalSettings['owner_birthday'] ?? 'October 09, 2001' }}">{{ $personalSettings['owner_birthday'] ?? 'October 09, 2001' }}</time>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Location</p>

              <address>{{ $personalSettings['owner_location'] ?? 'Cradat, Yaoundé, Cameroun' }}</address>
            </div>

          </li>

        </ul>

        <div class="separator"></div>

        <ul class="social-list">
          @if(isset($socialSettings['github_url']))
          <li class="social-item">
            <a href="{{ $socialSettings['github_url'] }}" class="social-link" target="_blank">
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </li>
          @endif

          @if(isset($socialSettings['linkedin_url']))
          <li class="social-item">
            <a href="{{ $socialSettings['linkedin_url'] }}" class="social-link" target="_blank">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>
          @endif

          @if(isset($socialSettings['whatsapp_url']))
          <li class="social-item">
            <a href="{{ $socialSettings['whatsapp_url'] }}" class="social-link" target="_blank" >
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>
          @endif

          @if(isset($socialSettings['twitter_url']))
          <li class="social-item">
            <a href="{{ $socialSettings['twitter_url'] }}" class="social-link" target="_blank">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          @endif

          @if(isset($socialSettings['instagram_url']))
          <li class="social-item">
            <a href="{{ $socialSettings['instagram_url'] }}" class="social-link" target="_blank">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          @endif
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
            <button class="navbar-link active" data-nav-link>About</button>
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

      <article class="about active" data-page="about">

        <header>
          <h2 class="h2 article-title">{{ setting('about_me_title', 'About me') }}</h2>
        </header>

        <section class="about-text">
          {!! nl2br(e(setting('about_me_description', 'Je suis un développeur web fullstack...'))) !!}

          @if(setting('about_me_additional'))
            <p>
              {!! nl2br(e(setting('about_me_additional'))) !!}
            </p>
          @endif
        </section>

        <!--
          - service
        -->

        <section class="service">

          <h3 class="h3 service-title">{{ setting('services_section_title', 'Ce que je fais') }}</h3>

          <ul class="service-list">

            @forelse($services as $service)
              <li class="service-item">

                <div class="service-icon-box">
                  @if($service->icon)
                    @if(str_starts_with($service->icon, 'services/'))
                      <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }} icon" width="40">
                    @else
                      <img src="{{ asset($service->icon) }}" alt="{{ $service->title }} icon" width="40">
                    @endif
                  @else
                    <img src="{{ asset('assets/images/icon-dev.svg') }}" alt="{{ $service->title }} icon" width="40">
                  @endif
                </div>

                <div class="service-content-box">
                  <h4 class="h4 service-item-title">{{ $service->title }}</h4>

                  <p class="service-item-text">
                    {{ $service->description }}
                  </p>
                </div>

              </li>
            @empty
              <li class="service-item">
                <div class="service-content-box">
                  <p class="service-item-text text-gray-500">Aucun service n'est configuré pour le moment.</p>
                </div>
              </li>
            @endforelse

          </ul>

        </section>

        <!--
          - testimonials
        -->

        {{-- <section class="testimonials">

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
                        Loic est un professionnel passionné par la programmation. Il est un professionnel capable de travailler en équipe et a une grande capacité d'adaptation aux changements du temps.J'ai travaillé avec Lui pendant plus de six mois pour mon site de E-commerce Bazel Square.
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
                    Loic est le comcepteur de mon site web pour l'agence de marketing King Digital. Je suis très satisfaite de l'expérience que j'ai eue avec vous ! Me contacter au num : +237 653 53 14 07 ou via le site web King digital : https://www.kingdigital.bazelsquare.com
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </section> --}}


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

        {{-- <section class="clients">

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

        </section> --}}

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
            @if(isset($experiences['education']) && count($experiences['education']) > 0)
              @foreach($experiences['education'] as $education)
                <li class="timeline-item">
                  <h4 class="h4 timeline-item-title">{{ $education->title }}</h4>
                  <span>{{ $education->formatted_date_range }}</span>
                  <p class="timeline-text">
                    {{ $education->description }}
                  </p>
                </li>
              @endforeach
            @else
            <li class="timeline-item">
                <h4 class="h4 timeline-item-title">Ecole Nationale Superieure Polytechnique Yaounde</h4>
                <span>2023 — Present</span>
                <p class="timeline-text">
                  Troisième Année au Génie Informatique
                </p>
              </li>
            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">Ecole Nationale Superieure  Polytechnique Yaounde</h4>
              <span>2021 — 2023</span>
              <p class="timeline-text">
                MSP (Mathematiques et Sciences Physiques): Classes préparatoires pour la formation d'Ingenieur.
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
            @endif
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
            @if(isset($experiences['work']) && count($experiences['work']) > 0)
              @foreach($experiences['work'] as $work)
                <li class="timeline-item">
                  <h4 class="h4 timeline-item-title">{{ $work->title }}</h4>
                  @if($work->company)
                    <h5 class="h5">{{ $work->company }}</h5>
                  @endif
                  <span>{{ $work->formatted_date_range }}</span>
                  <p class="timeline-text">
                    {{ $work->description }}
                  </p>
                </li>
              @endforeach
            @else
            <li class="timeline-item">
                <h4 class="h4 timeline-item-title">Développeur web Full-Stack freelance</h4>
                <span>2022 - Aujourd'hui</span>
                <p class="timeline-text">
                    Je travaille sur des projets variés
                </p>
              </li>
            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">Stage de 3 mois chez Togettech&LegionWeb.</h4>
              <span>2022( juin - Septembre )</span>
              <p class="timeline-text">
               Stage en developpement Web et Mobile
              </p>
            </li>
            <li class="timeline-item">
              <h4 class="h4 timeline-item-title">2 eme Prix du concours projets 8 mars 2023</h4>
              <span>Mars 2023</span>
              <p class="timeline-text">
                Model de classification automatique des vidéos et des images à caractère violent utilisant le Deep Learning
              </p>
            </li>
            @endif
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
            @if(isset($skillsByCategory) && count($skillsByCategory) > 0)
              @foreach($skillsByCategory as $categoryKey => $skills)
                @foreach($skills as $skill)
                  <li class="skills-item">
                    <div class="title-wrapper">
                      <h5 class="h5">{{ $skill->name }}</h5>
                      <data value="{{ $skill->percentage }}">{{ $skill->percentage }}%</data>
                    </div>
                    <div class="skill-progress-bg">
                      <div class="skill-progress-fill" style="width: {{ $skill->percentage }}%;"></div>
                    </div>
                  </li>
                @endforeach
              @endforeach
            @else
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
            @endif
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
              <button class="active" data-filter-btn data-filter-value="all">Tous</button>
            </li>

            @foreach($projectTypes as $type)
              <li class="filter-item">
                <button data-filter-btn data-filter-value="{{ $type['slug'] }}">{{ $type['name'] }}</button>
              </li>
            @endforeach

          </ul>

          <div class="filter-select-box">

            <button class="filter-select" data-select>

              <div class="select-value" data-selecct-value>Choisir la catégorie</div>

              <div class="select-icon">
                <ion-icon name="chevron-down"></ion-icon>
              </div>

            </button>

            <ul class="select-list">

              <li class="select-item">
                <button data-select-item data-filter-value="all">Tous</button>
              </li>

              @foreach($projectTypes as $type)
                <li class="select-item">
                  <button data-select-item data-filter-value="{{ $type['slug'] }}">{{ $type['name'] }}</button>
                </li>
              @endforeach

            </ul>

          </div>

          <ul class="project-list">
            @if(isset($projects) && count($projects) > 0)
              @foreach($projects as $project)
                <li class="project-item active" data-filter-item data-category="{{ $project->type }}">
                  <a href="{{ $project->link ?? '#' }}" target="_blank">
                    <figure class="project-img">
                      <div class="project-item-icon-box">
                        <ion-icon name="eye-outline"></ion-icon>
                      </div>
                      @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" loading="lazy">
                      @else
                        <img src="{{ asset('assets/images/project-placeholder.jpg') }}" alt="{{ $project->title }}" loading="lazy">
                      @endif
                    </figure>
                    <h3 class="project-title">{{ $project->title }}</h3>
                    <p class="project-category">{{ $project->formatted_type }}</p>
                  </a>
                </li>
              @endforeach
            @else
              <li class="project-item active">
                <div style="text-align: center; padding: 2rem; width: 100%;">
                  <p style="color: var(--light-gray);">Aucun projet disponible pour le moment.</p>
                </div>
              </li>
              @endif
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
              @if(isset($recentPosts) && count($recentPosts) > 0)
                @foreach($recentPosts as $post)
                  <li class="blog-post-item">
                    <a href="{{ route('blog.show', $post->slug) }}">
                      <figure class="blog-banner-box">
                        @if($post->featured_image)
                          <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
                        @else
                          <img src="{{ asset('assets/images/blog-placeholder.jpg') }}" alt="{{ $post->title }}" loading="lazy">
                        @endif
                      </figure>
                      <div class="blog-content">
                        <div class="blog-meta">
                          <p class="blog-category">{{ $post->category ? $post->category->name : 'Non catégorisé' }}</p>
                          <span class="dot"></span>
                          <time datetime="{{ $post->published_at->format('Y-m-d') }}">{{ $post->published_at->format('F d, Y') }}</time>
                        </div>
                        <h3 class="h3 blog-item-title">{{ $post->title }}</h3>
                        <p class="blog-text">
                          {{ $post->excerpt }} <code class="blog-detail-gold">voir plus</code>
                        </p>
                      </div>
                    </a>
                  </li>
                @endforeach
              @else
                <li class="blog-post-item">
                  <div class="blog-content" style="text-align: center; padding: 2rem;">
                    <p class="blog-text">Aucun article publié pour le moment.</p>
                    <p class="blog-text" style="margin-top: 1rem;">
                      <a href="{{ route('blog.index') }}" style="color: var(--orange-yellow-crayola);">Découvrez tous nos articles</a>
                    </p>
                  </div>
                </li>
              @endif
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2615.5591487700117!2d2.0706195763166386!3d49.03799117135711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f523f500715b%3A0x60dd9bd11a812475!2sLes%2C%207%20Rue%20des%20Ch%C3%AAnes%20d&#39;Or%2C%2095000%20Cergy!5e0!3m2!1sfr!2sfr!4v1760355969050!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
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
    <script src="{{asset('assets/js/script.js')}}?v={{ time() }}"></script>

    <!--
      - ionicon link
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  </body>
  </html>
