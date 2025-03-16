<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SortBook | Application de Gestion de Bibliothèques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Palette de couleurs et variables CSS */
        :root {
            --bg-color: #fdf4ed;        /* Couleur de fond globale */
            --card-bg-color: #fff8f5;   /* Couleur de fond des sections ou cartes */
            --accent-color: #fa795e;    /* Couleur d'accent (titres, soulignements) */
            --text-color: #343a40;      /* Couleur principale du texte */
            --hover-color: #da5e43;     /* Couleur au survol */
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Section principale */
        .project-section {
            min-height: 60vh;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-bottom: 2rem;
            background-color: var(--card-bg-color);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .image-side img {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .desc-side {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Titres de section */
        .section-title {
            font-weight: 700;
            text-transform: uppercase;
            color: var(--accent-color);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            letter-spacing: 1px;
        }

        /* Liste de services / compétences */
        .services-list {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        .services-list span {
            position: relative;
            color: var(--accent-color);
            padding-bottom: 2px;
        }

        .services-list span::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70%;
            height: 2px;
            background-color: var(--accent-color);
        }

        /* Lien de retour vertical */
        .return-link {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            text-transform: uppercase;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.1rem;
            position: fixed;
            left: 0;
            top: 30%;
            color: var(--accent-color);
            text-decoration: none;
            padding: 0.5rem;
            background-color: var(--bg-color);
            border-radius: 0 4px 4px 0;
            transition: background-color 0.3s, color 0.3s;
            z-index: 999;
        }

        .return-link:hover {
            color: var(--hover-color);
            background-color: #fff;
        }

        /* Galerie d'images additionnelles */
        .img-fluid.rounded {
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Petits ajustements de texte */
        p {
            line-height: 1.6;
        }
    </style>
</head>

<body class="bg-light">
<!-- Lien pour revenir à l'accueil ou au portfolio -->
<a href="\untitled2\index.php" class="return-link">Voir le site / Retour</a>

<div class="container py-5">
    <!-- Section principale : image et description -->
    <div class="project-section mb-5">
        <!-- Image à gauche -->
        <div class="image-side col-lg-5 col-md-6 col-12 p-0">
            <!-- Remplace sortbook-image.jpg par l'illustration de ton choix -->
            <img src="\Images\Screenshot 2025-03-16 013136.png" alt="SortBook" class="img-fluid">
        </div>

        <!-- Contenu à droite -->
        <div class="desc-side col-lg-6 col-md-6 col-12 p-4">
            <h2 class="section-title">SortBook | Gestion de Bibliothèques</h2>
            <p>
                <strong>SortBook</strong> est une application conçue pour faciliter la gestion de bibliothèques,
                particulièrement utile pour un restaurateur de livres cherchant à classifier ses ouvrages
                selon le système <em>Dewey</em>. Que vous ayez quelques dizaines ou plusieurs milliers de livres,
                SortBook se concentre sur la simplicité et l’efficacité pour cataloguer, organiser et retrouver
                facilement vos documents.
            </p>
            <p>
                L’application prend en compte les spécificités du métier de restaurateur, comme la nécessité de
                suivre l’état de conservation ou la localisation de chaque ouvrage. Elle propose également des
                fonctionnalités de recherche par mots-clés, auteurs, ou catégories Dewey, pour retrouver en
                un clin d’œil n’importe quel livre.
            </p>
            <div class="services-list">
                <span>C#</span>
                <span>WPF</span>
                <span>Gestion de projet SCRUM</span>
                <span>Gestion de BDD </span>
            </div>
        </div>
    </div>

    <!-- Galerie additionnelle : deux images -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <!-- Remplace sortbook2.jpg par l'illustration de ton choix -->
            <img src="\Images\Screenshot 2025-03-16 012407.png" alt="SortBook Screenshot 2" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <!-- Remplace sortbook3.jpg par l'illustration de ton choix -->
            <img src="\Images\Screenshot 2025-03-16 013150.png" alt="SortBook Screenshot 3" class="img-fluid rounded">
        </div>
    </div>

    <!-- Détails sur le projet -->
    <div class="row">
        <div class="col-12">
            <h2 class="section-title">Détails & Évolution</h2>
            <p>
                SortBook est né de la volonté de rendre le classement Dewey plus accessible aux professionnels
                du livre. Des tests utilisateurs ont permis de simplifier l’interface e
                t d’inclure des fonctionnalités
                de <em>tri par catégorie</em>, ou par <em>mots-clés personnalisés</em>.
            </p>
            <p>
                Au fil des retours recueillis, SortBook a évolué pour gérer de manière plus fine
                les attributs propres à la <strong>restauration de livres</strong> :
                état initial, taille, matériaux,  type de reliure, etc.
                Cette attention aux besoins métiers fait de SortBook un outil plus complet que
                les simples systèmes de classement classiques.
            </p>
        </div>
    </div>
</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

