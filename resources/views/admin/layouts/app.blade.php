<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration') | Portfolio Mbassi Loic</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js pour les interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles personnalisés -->
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-active {
            background-color: rgba(17, 24, 39, 1);
            color: white;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: true }" class="flex min-h-screen">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="bg-gray-800 text-white transition-all duration-300 ease-in-out">
            <div class="p-4 flex justify-between items-center">
                <h1 :class="sidebarOpen ? 'block' : 'hidden'" class="text-xl font-bold">Portfolio Admin</h1>
                <button @click="sidebarOpen = !sidebarOpen" class="p-1 rounded-full hover:bg-gray-700">
                    <i :class="sidebarOpen ? 'fa-solid fa-chevron-left' : 'fa-solid fa-chevron-right'" class="text-white"></i>
                </button>
            </div>

            <nav class="mt-8">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-gauge-high w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.profile') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.settings.profile') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-user w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Mon profil</span>
                        </a>
                    </li>
                    <li class="mt-4 border-t border-gray-700 pt-4">
                        <p :class="sidebarOpen ? 'block' : 'hidden'" class="px-4 text-xs text-gray-400 uppercase tracking-wider mb-2">Portfolio</p>
                    </li>
                    <li>
                        <a href="{{ route('admin.about-settings.edit') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.about-settings.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-id-card w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">About Me</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.services.index') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.services.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-briefcase w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.projects.index') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.projects.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-folder-open w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Projets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.skills.index') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.skills.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-code w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Compétences</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.experiences.index') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.experiences.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-graduation-cap w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Expériences</span>
                        </a>
                    </li>
                    <li class="mt-4 border-t border-gray-700 pt-4">
                        <p :class="sidebarOpen ? 'block' : 'hidden'" class="px-4 text-xs text-gray-400 uppercase tracking-wider mb-2">Blog</p>
                    </li>
                    <li>
                        <a href="{{ route('admin.posts.index') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.posts.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-newspaper w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.categories.*') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-tag w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Catégories</span>
                        </a>
                    </li>
                    <li class="mt-4 border-t border-gray-700 pt-4">
                        <a href="{{ route('admin.settings.index', 'general') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.settings.*') && !request()->routeIs('admin.settings.profile') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-cog w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Paramètres</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.analytics') }}" class="flex items-center py-3 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.analytics') ? 'sidebar-active' : '' }}">
                            <i class="fa-solid fa-chart-line w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Statistiques</span>
                    </li>
                    <li class="mt-8">
                        <a href="{{ route('admin.logout') }}" class="flex items-center py-3 px-4 hover:bg-red-700 text-red-400 hover:text-white">
                            <i class="fa-solid fa-sign-out-alt w-6"></i>
                            <span :class="sidebarOpen ? 'block' : 'hidden'" class="ml-2">Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('header', 'Tableau de bord')</h2>
                    <div class="flex items-center space-x-4">
                        <a href="{{ url('/') }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                            <i class="fa-solid fa-external-link"></i> Voir le site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
