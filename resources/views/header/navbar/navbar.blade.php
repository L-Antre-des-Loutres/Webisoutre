<nav class="navbar bg-gray-800 px-4 md:px-8 py-4 sticky top-0 z-50">
    <!-- Script pour le menu mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-mobile');
            const mobileNav = document.getElementById('nav-content-mobile');

            menuButton.addEventListener('click', function() {
                const isOpen = mobileNav.classList.contains('translate-x-0');
                mobileNav.classList.toggle('-translate-x-full', isOpen); // cache le menu
                mobileNav.classList.toggle('translate-x-0', !isOpen); // affiche le menu
                menuButton.setAttribute('aria-expanded', !isOpen); // Met à jour l'état du bouton

                // Ajoute ou supprime la classe pour la croix
                menuButton.classList.toggle('is-open', !isOpen);
            });
        });
    </script>

    <style>
        /* CSS pour le bouton de menu */
        .is-open svg line:nth-child(1) {
            transform: rotate(45deg) translate(1px, -2px);
            /* Ligne du haut */
            transform-origin: center;
            /* Centrer la rotation */
        }

        .is-open svg line:nth-child(2) {
            opacity: 0;
            /* Cache la ligne du milieu */
        }

        .is-open svg line:nth-child(3) {
            transform: rotate(-45deg) translate(1px, -5px);
            /* Ligne du bas */
            transform-origin: center;
            /* Centrer la rotation */
        }

        /* Ajout de transitions pour l'animation */
        svg line {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
    </style>



    <div class="relative flex items-center justify-between mb-4">
        <!-- Bouton Menu Mobile -->
        <div class="md:hidden flex items-center relative z-10">
            <button id="menu-mobile" aria-expanded="false"
                class="bg-transparent text-white hover:bg-white hover:bg-opacity-20 rounded p-2 transition flex items-center justify-center w-12 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Connexion -->
        <div>
            <a href="#" class="hidden md:flex text-sm font-medium text-white">Connexion</a>
        </div>

        <!-- Titre centré -->
        <div class="absolute inset-x-0 flex justify-center">
            <a href="#" class="text-2xl font-bold text-white">Antre des loutres</a>
        </div>

        <!-- Logo à gauche -->
        <div>
            <a href="#">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Logo du site" class="h-10 md:h-12" />
            </a>
        </div>
    </div>

    <!-- Menu principal (nav-content) -->
    <div id="nav-content" class="hidden md:flex justify-center space-x-20 text-lg">
        @php
            $menuItems = [
                ['name' => 'Accueil', 'url' => '#'],
                ['name' => 'Articles', 'url' => '#'],
                ['name' => 'Contact', 'url' => '#'],
                ['name' => 'Serveur', 'url' => '#'],
            ];
        @endphp

        @foreach ($menuItems as $item)
            <div class="relative group w-32 text-center">
                <a href="{{ $item['url'] }}" class="text-white">{{ $item['name'] }}</a>
                <span
                    class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full group-hover:left-0 mt-2"></span>
            </div>
        @endforeach
    </div>

    <!-- Menu mobile -->
    <div id="nav-content-mobile"
        class="fixed top-0 left-0 h-full w-40 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-center space-y-4 text-lg">
        @foreach ($menuItems as $item)
            <a href="{{ $item['url'] }}" class="text-white">{{ $item['name'] }}</a>
        @endforeach
    </div>
</nav>
