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
  <meta name="description" content="{{ $seoSettings['meta_description'] ?? 'Blog de Mbassi Loic Aron - Articles sur le développement web et l\'intelligence artificielle' }}">
  <meta name="keywords" content="{{ $seoSettings['meta_keywords'] ?? 'blog, développement web, portfolio, Laravel, PHP' }}">
  <meta name="author" content="{{ $seoSettings['meta_author'] ?? 'Mbassi Ewolo Loic Aron' }}">
  <title>Blog | {{ $generalSettings['site_name'] ?? 'Mbassi Loic Aron' }}</title>

  <!-- OpenGraph Meta Tags pour le partage social -->
  <meta property="og:title" content="Blog | {{ $generalSettings['site_name'] ?? 'Mbassi Loic Aron' }}">
  <meta property="og:description" content="{{ $seoSettings['meta_description'] ?? 'Blog de Mbassi Loic Aron - Articles sur le développement web et l\'intelligence artificielle' }}">
  <meta property="og:image" content="{{ asset('assets/images/portfolio-share.jpg') }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVQ925DR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <!-- Main -->
  <main>
    <!-- Sidebar -->
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
          <!-- Email -->
          <li class="contact-item">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>
            <div class="contact-info">
              <p class="contact-title">Email</p>
              <a href="mailto:{{ $personalSettings['owner_email'] ?? 'wwwmbassiloic@gmail.com' }}" class="contact-link">{{ $personalSettings['owner_email'] ?? 'wwwmbassiloic@gmail.com' }}</a>
            </div>
          </li>

          <!-- Phone -->
          <li class="contact-item">
            <div class="icon-box">
              <ion-icon name="phone-portrait-outline"></ion-icon>
            </div>
            <div class="contact-info">
              <p class="contact-title">Phone</p>
              <a href="tel:{{ $personalSettings['owner_phone'] ?? '+237 656820591' }}" class="contact-link">{{ $personalSettings['owner_phone'] ?? '+237 656820591' }}</a>
            </div>
          </li>

          <!-- Location -->
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

        <!-- Social Links -->
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

          @if(isset($socialSettings['twitter_url']))
          <li class="social-item">
            <a href="{{ $socialSettings['twitter_url'] }}" class="social-link" target="_blank">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Navigation -->
      <nav class="navbar">
        <ul class="navbar-list">
          <li class="navbar-item">
            <a href="{{ route('home') }}" class="navbar-link">Retour à l'accueil</a>
          </li>
        </ul>
      </nav>

      <!-- Blog Content -->
      <article class="blog active">
        <header>
          <h2 class="h2 article-title">Blog</h2>

          @if(isset($categoriesWithPosts) && count($categoriesWithPosts) > 0)
          <div class="category-filter mt-4 mb-8">
              <div class="flex flex-wrap gap-2">
                  <a href="{{ route('blog.index') }}" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full text-sm {{ !request('category') ? 'bg-indigo-100 text-indigo-800' : 'text-gray-700' }}">
                      Tous
                  </a>

                  @foreach($categoriesWithPosts as $category)
                  <a href="{{ route('blog.index') }}?category={{ $category->slug }}" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full text-sm {{ request('category') == $category->slug ? 'bg-indigo-100 text-indigo-800' : 'text-gray-700' }}">
                      {{ $category->name }} ({{ $category->posts_count }})
                  </a>
                  @endforeach
              </div>
          </div>
          @endif
        </header>

        <section class="blog-posts">
          <ul class="blog-posts-list">
            @if(isset($posts) && count($posts) > 0)
              @foreach($posts as $post)
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
              <div class="text-center py-10">
                <p class="text-gray-500">Aucun article n'a été publié pour le moment.</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-900">
                  Retour à l'accueil
                </a>
              </div>
            @endif
          </ul>

          <!-- Pagination -->
          @if(isset($posts) && $posts->lastPage() > 1)
          <div class="mt-10">
            {{ $posts->links() }}
          </div>
          @endif
        </section>
      </article>
    </div>
  </main>

  <!-- Scripts -->
  <script src="{{asset('assets/js/script.js')}}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
