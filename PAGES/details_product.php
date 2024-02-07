<?php
// Connexion à la base de données
$db = new PDO('mysql:host=mysql-chinchilla.alwaysdata.net;dbname=chinchilla_bdd;charset=utf8', '345543', 'chinchilla@8520');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Vérifier si l'ID du produit est présent dans l'URL
if(isset($_GET['ref_produit'])) {
    // Récupérer l'ID du produit depuis l'URL
    $product_id = $_GET['ref_produit'];
    
    // Préparer et exécuter la requête pour récupérer les détails du produit
    $stmt_product = $db->prepare("SELECT * FROM Produit WHERE ref_produit = :product_id");
    $stmt_product->bindParam(':product_id', $product_id);
    $stmt_product->execute();
    
    // Vérifier si le produit existe
    if($stmt_product->rowCount() > 0) {
        $product = $stmt_product->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../ASSETS/Logo.png" type="image/png">
    <title>Snowstorm - <?php echo $product['nom_produit']; ?></title>
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
                            <li><a href="#"><img src="../ASSETS/Panier.png" alt="Mon panier"></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="bottom-section">
                    <nav class="main-nav">
                        <ul>
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="produits.php">Nos Produits</a></li>
                            <li><a href="personaliser.php">Personaliser</a></li>
                            <li><a href="galerie.php">Galerie</a></li>
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

    <!-- Contenu de la page -->
    <div class="container">
        <h1>Détails du produit - <?php echo $product['nom_produit']; ?></h1>
        <div class="product-details">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($product['image']); ?>" alt="<?php echo $product['nom_produit']; ?>">
            <p>Description: <?php echo $product['description']; ?></p>
            <p>Prix: <?php echo $product['prix']; ?> €</p>
            <!-- Autres détails du produit ici -->
            <p>Fiche Technique :</p>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($product['fiche_produit']); ?>" alt="<?php echo $product['nom_produit']; ?>">
        </div>

        <!-- Avis des clients -->
        <div class="customer-reviews">
            <h2>Avis des clients</h2>
            <?php
            // Requête SQL pour récupérer les avis associés au produit
            $stmt_reviews = $db->prepare("SELECT Avis.*, Utilisateur.nom, Utilisateur.prenom FROM Avis JOIN Utilisateur ON Avis.id_user = Utilisateur.id_user WHERE Avis.ref_produit = :product_id");
            $stmt_reviews->bindParam(':product_id', $product_id);
            $stmt_reviews->execute();
            
            // Vérifier si des avis existent
            if($stmt_reviews->rowCount() > 0) {
                // Afficher les avis
                while ($review = $stmt_reviews->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='review'>";
                    echo "<p><strong>" . $review['prenom'] . " " . $review['nom'] . "</strong></p>";
                    echo "<p>Note : " . $review['note'] . "/10</p>";
                    echo "<p>Avis : " . $review['avis'] . "</p>";
                    echo "<p>Date de publication : " . $review['date_de_publication'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Aucun avis disponible pour ce produit.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Bas de page -->
    <footer>
        <div class="colonne">
            <img src="../ASSETS/Logo.png" alt="Logo du site">
            <img src="../ASSETS/Snowstorm.gg.png" alt="Nom du site">
        </div>
    
        <div class="colonne">
            <h4>Catégories</h4>
            <ul>
                <li>Nouveautés</li>
                <li>Meilleures ventes</li>
                <li>Classiques</li>
                <li>Préfaits</li>
                <li>Personnaliser</li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Informations</h4>
            <ul>
                <li>Nous contacter</li>
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
                <img class="logo-reseau" src="../ASSETS/Youtube.png" alt="Logo YouTube">
                <img class="logo-reseau" src="../ASSETS/X.png" alt="Logo Twitter">
                <img class="logo-reseau" src="../ASSETS/Facebook.png" alt="Logo Facebook">
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
<?php
    } else {
        echo "Le produit demandé n'existe pas.";
    }
} else {
    echo "ID du produit non spécifié.";
}
?>
