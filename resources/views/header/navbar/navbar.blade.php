@php
    use App\Models\Serveur;

    // Récupérer les jeux uniques
    $jeux = Serveur::getJeux();

    // Créer un tableau pour stocker les jeux et leurs serveurs respectifs
    $menuItems = [];

    foreach ($jeux as $jeu) {
        // Récupérer les serveurs associés à ce jeu
        $serveurs = Serveur::getServeurByJeu($jeu);

        // Dropdown spécifique pour le jeu
        $dropDownJeu = [
            [
                'serveur' => 'Serveurs',
                'url' => '#', // URL pour le jeu (à adapter)
                'dropdown' => $serveurs, // Liste des serveurs pour le dropdown
            ],
            [
                'serveur' => 'Forum',
                'url' => '#', // URL pour le forum (à adapter)
                'dropdown' => null, // Pas de dropdown pour le forum
            ],
            [
                'serveur' => 'Boutique',
                'url' => '#', // URL pour la boutique (à adapter)
                'dropdown' => null, // Pas de dropdown pour la boutique
            ],
            [
                'serveur' => 'Vote',
                'url' => '#', // URL pour les votes (à adapter)
                'dropdown' => null, // Pas de dropdown pour les votes
            ],
        ];

        // Ajouter le jeu et ses serveurs dans le menu
        $menuItems[] = [
            'name' => $jeu,
            'url' => '#', // URL pour le jeu (à adapter)
            'dropdown' => $dropDownJeu, // Liste des serveurs pour le dropdown
        ];
    }

    // Ajouter un élément "Contact" dans le menu
    $menuItems[] = [
        'name' => 'Contact',
        'url' => '#', // URL pour le forum (à adapter)
        'dropdown' => null, // Pas de dropdown pour le forum
    ];

    // Ajouter un élément "Discord" dans le menu
    $menuItems[] = [
        'name' => 'Discord',
        'url' => '#', // URL pour le discord (à adapter)
        'dropdown' => null, // Pas de dropdown pour le discord
    ];
@endphp

<nav class="navbar bg-gray-800 px-4 md:px-8 py-4 sticky top-0 z-50">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-mobile');
            const mobileNav = document.getElementById('nav-content-mobile');

            menuButton.addEventListener('click', function() {
                const isOpen = mobileNav.classList.contains('translate-x-0');
                mobileNav.classList.toggle('-translate-x-full', isOpen);
                mobileNav.classList.toggle('translate-x-0', !isOpen);
                menuButton.setAttribute('aria-expanded', !isOpen);
                menuButton.classList.toggle('is-open', !isOpen);
            });
        });
    </script>

    <style>
        /* CSS pour le bouton de menu */
        .is-open svg line:nth-child(1) {
            transform: rotate(45deg) translate(1px, -2px);
            transform-origin: center;
        }

        .is-open svg line:nth-child(2) {
            opacity: 0;
        }

        .is-open svg line:nth-child(3) {
            transform: rotate(-45deg) translate(1px, -5px);
            transform-origin: center;
        }

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
        @foreach ($menuItems as $item)
            <div class="relative group w-40 text-center">
                <a href="{{ $item['url'] }}" class="text-white">{{ $item['name'] }}</a>
                <span
                    class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full group-hover:left-0"></span>

                <!-- Dropdown Menu -->
                @if (!empty($item['dropdown']))
                    <div class="absolute left-1/2 transform -translate-x-1/2 hidden group-hover:block w-48 bg-white text-gray-800 rounded-lg shadow-lg z-10">
                        <ul class="py-2">
                            @foreach ($item['dropdown'] as $dropdownItem)
                                <li class="relative group">
                                    <a href="{{ $dropdownItem['url'] ?? '#' }}" class="block px-4 py-2 hover:bg-gray-100">
                                        {{ $dropdownItem['serveur'] }}
                                    </a>

                                    <!-- Sous-menu pour les serveurs -->
                                    @if (!empty($dropdownItem['dropdown']))
                                        <div class="absolute left-full top-0 hidden group-hover:block w-40 bg-gray-200 text-gray-800 rounded-lg shadow-lg">
                                            <ul class="py-2">
                                                @foreach ($dropdownItem['dropdown'] as $serveur)
                                                    <li>
                                                        <a href="{{ $serveur['url'] ?? '#' }}" class="block px-4 py-2 hover:bg-gray-300">
                                                            {{ $serveur['nom_serv'] ?? 'Serveur Inconnu' }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
