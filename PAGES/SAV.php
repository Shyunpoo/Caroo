<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <link rel="stylesheet" href="test.css">
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

    <!-- Page SAV -->
    <div class="pagemain">
    <form onsubmit="sendEmail(); reset(); return false;">
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
          <div class="gauche">
            <div class="groupe">
              <label>Votre Prénom</label>
              <input type="text" id="name" autocomplete="off" required/>
              <i class="fas fa-user"></i>
            </div>
            <div class="groupe">
              <label>Votre adresse e-mail</label>
              <input type="email" id="email" autocomplete="off" required placeholder="mail@domain.com"/>
              <i class="fas fa-envelope"></i>
            </div>
            <div class="groupe">
              <label>Votre téléphone</label>
              <input type="text" id="phone" autocomplete="off" required placeholder="+33"/>
              <i class="fas fa-mobile"></i>
            </div>
            <div class="groupe">
                <label>Votre pays</label>
                <input type="text" id="country" autocomplete="off" required/>
                <i class="fa-solid fa-earth-americas"></i>
            </div>
          </div>
  
          <div class="droite">
            <div class="groupe">
              <label>Message</label>
              <textarea placeholder="Saisissez ici..." id="message" required></textarea>
            </div>
          </div>
        </div>
  
        <div class="pied-formulaire" align="center">
          <button type="submit">Envoyer le message</button>
        </div>
      </form>
      <script>
        emailjs.init("cVh0dNVTM-BBsLj6n");

    function sendEmail() {
        const templateParams = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            country: document.getElementById("country").value,
            message: document.getElementById("message").value,
        };

        emailjs.send("service_287m9vg", "template_15fsafi", templateParams)
            .then((response) => {
                console.log("E-mail envoyé avec succès : ", response);
                alert("Le message a été envoyé avec succès !");
            }, (error) => {
                console.error("Erreur lors de l'envoi de l'e-mail : ", error);
                alert("Veuilliez réessayer");
            });
    }
      </script>
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