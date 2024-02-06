<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../ASSETS/Logo.png" type="image/png">
    <title>Snowstorm</title>
</head>

<body>
    <!-- Menu de navigation -->
    <header>
        <div class="header-inner">
            <div class="header-content">
                <div class="top-section">
                    <div class="logo">
                        <img src="../ASSETS/Logo.png" alt="Logo du site">
                        <img src="../ASSETS/Snowstorm.gg.png" alt="snowstorm.gg">
                    </div>
                    <nav class="icon-nav">
                        <ul>
                            <li><a href="#"><img src="../ASSETS/Langues.png" alt="Changer de langue"></a></li>
                            <li><a href="connexion.php"><img src="../ASSETS/Compte.png" alt="Mon compte"></a></li>
                            <li><a href="basket.php"><img src="../ASSETS/Panier.png" alt="Mon panier"></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="bottom-section">
                    <nav class="main-nav">
                        <ul>
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="product_list.php">Nos Produits</a></li>
                            <li><a href="personalize.php">Personaliser</a></li>
                            <li><a href="gallery.php">Galerie</a></li>
                            <li><a href="SAV.php">Support/SAV</a></li>
                            <li><a href="FAQ.php">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="search">
                        <input type="text" placeholder="Recherche...">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Comparateur -->
    <h1>Comparateur de produits</h1>
    <div class="product-container">
        <?php
        // Connexion à la base de données
        $db = new PDO('mysql:host=mysql-chinchilla.alwaysdata.net;dbname=chinchilla_bdd;charset=utf8', '345543', 'chinchilla@8520');

        // Vérifier si des produits sont sélectionnés pour la comparaison
        if(isset($_GET['compare'])) {
            // Récupérer les IDs des produits sélectionnés
            $product_ids = $_GET['compare'];

            // Préparer et exécuter la requête pour récupérer les détails des produits sélectionnés
            $stmt = $db->prepare("SELECT * FROM Produit WHERE ref_produit IN (" . implode(',', $product_ids) . ")");
            $stmt->execute();

            // Afficher les produits
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="product">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['nom_produit'] . '">';
                echo '<h2>' . $row['nom_produit'] . '</h2>';
                echo '<p>Description: ' . $row['description'] . '</p>';
                echo '<p>Prix: ' . $row['prix'] . ' €</p>';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['fiche_produit']) . '" alt="' . $row['nom_produit'] . '">';
                // Ajouter d'autres détails du produit si nécessaire
                echo '</div>';
            }
        } else {
            echo "Veuillez sélectionner deux produits à comparer.";
        }
        ?>

    
    <!-- Bas de page -->
    <footer>
        <div class="colonne">
            <img src="ASSETS/Logo.png" alt="Logo du site">
            <img src="ASSETS/Snowstorm.gg.png" alt="Nom du site">
        </div>
    
        <div class="colonne">
            <h4>Catégories</h4>
            <ul>
                <li><a href="new_things.php">Nouveautés</a></li>
                <li><a href="bestsellers.php">Meilleures ventes</a></li>
                <li><a href="our_classics.php">Classiques</a></li>
                <li><a href="premade_kits.php">Kits préfaits</a></li>
                <li><a href="personalize.php">Personnaliser</a></li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Informations</h4>
            <ul>
                <li><a href="contact.php">Nous contacter</a></li>
                <li>Livraison</li>
                <li>Mentions légales</li>
                <li>Confidentialité</li>
                <li>Conditions d'utilisation</li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Mon compte</h4>
            <ul>
                <li>Mes commandes</li>
                <li>Mes customs</li>
                <li>Mes informations</li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Nos réseaux</h4>
            <div class="reseaux-sociaux">
                <img class="logo-reseau" src="ASSETS/Youtube.png" alt="Logo YouTube">
                <img class="logo-reseau" src="ASSETS/X.png" alt="Logo Twitter">
                <img class="logo-reseau" src="ASSETS/Facebook.png" alt="Logo Facebook">
            </div>
        </div>
    </footer>


    <script src="script.js"></script>
</body>
</html>
