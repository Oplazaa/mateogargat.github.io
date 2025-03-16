<?php
$projects = [
    [
        "title" => "Site Web Mondoclowns",
        "description" => "Création d'un site web dynamique pour le festival Mondoclowns, permettant d'afficher les spectacles, les artistes et d'acheter des billets en ligne.",
        "link" => "Views/mondoclowns.php"
    ],
    [
        "title" => "Application de gestion de bibliothèques",
        "description" => "Développement de SortBook, application permettant la gestion de bibliothèques pour un restaurateur de livres en utilisant la classification Dewey.",
        "link" => "Views/sortbook.php"
    ],
    [
        "title" => "Garonn'Hack Première Place",
        "description" => "Participation et victoire à un CTF (Capture The Flag) en cybersécurité, où nous avons exploité des failles pour résoudre des défis techniques.",
        "link" => "Views/garonnhack.php"
    ],
    [
        "title" => "Techday 3 fois Première Place",
        "description" => "Un événement de présentation des projets de l'école devant un jury de professionnels, récompensé trois fois en tant que meilleur projet.",
        "link" => "Views/techday.php"
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mon Portfolio</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
    />
    <style>
        :root {
            /* Taille du “super-dégradé” */
            --bg-size: 400%;
            /* Couleurs du dégradé (peuvent être changées) */
            --start-color: #b1dee3;
            --end-color:   #fd8d3f;
        }

        /* On va gérer l’arrière-plan dans un pseudo-élément pour pouvoir le flouter */
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa; /* Couleur de base, si jamais le gradient ne charge pas */
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Pseudo-élément pour le fond flou et animé */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Derrière le contenu */
            background: radial-gradient(circle at center, var(--start-color), var(--end-color));
            background-size: var(--bg-size);
            background-position: center;
            filter: blur(80px); /* Le flou pour effet lumineux */
            transition: background-position 0.1s;
            pointer-events: none;
        }

        /* Section Hero */
        .hero {
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            flex-direction: column;
            padding: 2rem 1rem;
            /* Pour que le texte ressorte sur le fond flou, on met un léger effet */
            position: relative;
            z-index: 1;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #333;
        }
        .hero p {
            max-width: 600px;
            margin: 0 auto 1.5rem auto;
            line-height: 1.6;
            color: #444;
        }
        .btn-hero {
            background-color: #fff;
            color: #ffa556;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-hero:hover {
            background-color: #ffd2b0;
            color: #ff7b24;
        }

        /* Section portfolio */
        #portfolio {
            padding: 3rem 1rem;
        }
        #search {
            max-width: 400px;
            margin: 0 auto 2rem auto;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        /* Animation des cartes */
        .project-card {
            opacity: 0; /* invisible tant qu’on n’a pas “scrolled” */
            transform: translateY(60px); /* descendue de 60px */
            transition: all 0.8s ease;
        }
        .project-card.appear { /* classe ajoutée via JS => visible */
            opacity: 1;
            transform: translateY(0);
        }

        /* Survol + animations plus dynamiques */
        .card {
            transition: transform 0.4s, background-color 0.2s;
            transform-origin: center;
        }
        .card:hover {
            transform: translateY(-10px) rotate3d(0,0,1,2deg) scale(1.03);
            background-color: #ffe8d2;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .card-title {
            color: #ff7b24;
            font-weight: 700;
        }
        .card-text {
            font-size: 0.95rem;
            color: #555;
        }
        .card-footer {
            background-color: transparent;
            border-top: none;
        }
        .btn-primary {
            background-color: #ff7b24;
            border-color: #ff7b24;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #cc6320;
            border-color: #cc6320;
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<!-- Bannière d'accueil (hero) -->
<section class="hero" id="hero">
    <h1>Matéo GARGAT | Portfolio</h1>
    <p>
        Découvrez mes projets et réalisations :
        d’un site web pour un festival de clowns
        à un hackathon de cybersécurité,
        en passant par une application de gestion de livres !
    </p>
    <a href="#portfolio" class="btn btn-hero px-4 py-2">Voir mes projets</a>
</section>

<!-- Section Portfolio (recherche + cartes) -->
<section id="portfolio">
    <div class="container">
        <div class="text-center">
            <input
                    type="text"
                    id="search"
                    class="form-control mb-4"
                    placeholder="Rechercher un projet..."
                    onkeyup="filterProjects()"
            >
        </div>
        <div class="row" id="projects">
            <?php foreach ($projects as $project): ?>
                <div
                        class="col-md-6 col-lg-4 mb-4 project-card"
                        data-title="<?php echo strtolower($project['title']); ?>"
                >
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><?php echo $project['title']; ?></h5>
                                <p class="card-text"><?php echo $project['description']; ?></p>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <!-- Pas de target='_blank' => même onglet -->
                            <a href="<?php echo $project['link']; ?>" class="btn btn-primary">
                                Voir le projet
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    // 1) Filtrage des projets
    function filterProjects() {
        let input = document.getElementById('search').value.toLowerCase();
        let cards = document.querySelectorAll('.project-card');
        cards.forEach(card => {
            let title = card.getAttribute('data-title');
            card.style.display = title.includes(input) ? 'block' : 'none';
        });
    }

    // 2) Animation du background en fonction des mouvements de souris (sur tout le body)
    const body = document.querySelector('body');
    document.addEventListener('mousemove', (e) => {
        let x = e.clientX / window.innerWidth;
        let y = e.clientY / window.innerHeight;
        // On déplace le background du pseudo-élément body::before
        let posX = 50 + (x * 50);
        let posY = 50 + (y * 50);
        body.style.setProperty('--bg-pos-x', posX + '%');
        body.style.setProperty('--bg-pos-y', posY + '%');
        // On applique la position
        body.before.style = `background-position: ${posX}% ${posY}%;`;
    });

    // Pour cibler le style du pseudo-élément ::before en JS pur,
    // on va plutôt manipuler le style via la variable CSS:
    // => on va injecter la position dans la variable, puis la réutiliser dans un “style” plus bas.
    // Une alternative : on peut directement manipuler “document.styleSheets”
    // ou utiliser requestAnimationFrame. Pour rester simple, on va mettre
    // un snippet de CSS inline.

    // 3) Apparition progressive des cartes via Intersection Observer
    const cards = document.querySelectorAll('.project-card');
    const observerOptions = {
        root: null,        // viewport
        rootMargin: '0px',
        threshold: 0.1     // 10% visible
    };
    const appearOnScroll = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('appear');
            obs.unobserve(entry.target);
        });
    }, observerOptions);

    cards.forEach(card => {
        appearOnScroll.observe(card);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Méthode alternative pour mettre à jour la position du background avec la variable CSS -->

</body>
</html>
