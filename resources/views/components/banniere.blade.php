@php
    // Vérification de l'existence de la variable $image
if (!isset($image) || empty($image)) {
    // Si $image n'est pas défini ou est vide, on essaie de le récupérer à partir de la requête
        if (function_exists('request') && request()->has('serveur')) {
            // Vérifier si la clé 'serveur' existe dans la requête
            $image = request()->query('serveur');
        } else {
            $image = 'La Vanilla'; // Valeur par défaut
        }
    }

    // Vérification de l'existence de la variable $titre
if (!isset($titre) || empty($titre)) {
    $titre = null; // Valeur par défaut
}

// Vérification de l'existence de la variable $description
    if (!isset($description) || empty($description)) {
        $description = null; // Valeur par défaut
    }

    $imageUrl = 'img/banners/' . $image . '.png';
@endphp

<!-- Bannière Parallax -->
<section class="relative  h-[40vh] md:h-[60vh] sm:h-[40vh] bg-cover bg-center bg-fixed z-1"
    style="background-image: url('{{ asset($imageUrl) }}');">
    <div class="h-full w-full flex flex-col items-center justify-center banner-content">
        @if ($titre != null)
            <h1 class="text-4xl font-bold">{{ $titre }}</h1>
        @endif
        @if ($titre != null)
            <p class="mt-4">{{ $description }}</p>
        @endif
    </div>
</section>

<!-- Style de la bannière Parallax -->
<style>
    /* Contenu de la bannière */
    .banner-content {
        color: white;
        text-align: center;
        background: rgba(0, 0, 0, 0.3);
        /* Fond semi-transparent pour lisibilité */
        border-radius: 5px;
        padding: 20px;
        /* Ajoutez du padding pour aérer le texte */
    }
</style>
