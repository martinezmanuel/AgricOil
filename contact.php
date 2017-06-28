<?php
  // S'il y des données de postées
if ($_SERVER['REQUEST_METHOD']=='POST') {
  // Code PHP pour traiter l'envoi de l'email
 
  $nombreErreur = 0; // Variable qui compte le nombre d'erreur
  // Définit toutes les erreurs possibles
  
  if (!isset($_POST['email'])) { // Si la variable "email" du formulaire n'existe pas (il y a un probl&egraveme)
    $nombreErreur++; // On incrémente la variable qui compte les erreurs
    $erreur1 = '<p class="centrage">Il y a un probl&egraveme avec la variable "email".</p>';
  } else { // Sinon, cela signifie que la variable existe (c'est normal)
    if (empty($_POST['email'])) { // Si la variable est vide
      $nombreErreur++; // On incrémente la variable qui compte les erreurs
      $erreur2 = '<p class="centrage">Vous avez oublié de donner votre email.</p>';
    } else {
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $nombreErreur++; // On incrémente la variable qui compte les erreurs
        $erreur3 = '<p class="centrage">Cet email ne ressemble pas un email.</p>';
      }
    }
  }
 
  if (!isset($_POST['message'])) {
    $nombreErreur++;
    $erreur4 = '<p class="centrage">Il y a un probl&egraveme avec la variable "message".</p>';
  } else {
    if (empty($_POST['message'])) {
      $nombreErreur++;
      $erreur5 = '<p class="centrage">Vous avez oublié de donner un message.</p>';
    }
  }    // (3) Ici, il sera possible d'ajouter plus tard un code pour vérifier un captcha anti-spam.
 
  if ($nombreErreur==0) { 
     
      // Récupération des variables et sécurisation des données
      $nom     = htmlspecialchars($_POST['name']); // htmlspecialchars() convertit des caract&egraveres "spéciaux" en équivalent HTML
      $email   = htmlspecialchars($_POST['email']);
      $tel     = htmlspecialchars($_POST['number']);
      $choix   = htmlspecialchars($_POST['choix']);
      $message = htmlspecialchars($_POST['message']);
      $from    = "contact@agricoil.fr";
      
     
      // Variables concernant l'email
     
      $destinataire = 'm.favard@agram.fr'; // Adresse email du webmaster (à personnaliser)
      $sujet = 'Demande d AgricOil'; // Titre de l'email
      $contenu = '<html><head><title>Titre du message</title></head><body>';
      $contenu .= '<p>Bonjour, vous avez reçu un message à partir de AgricOil.fr.</p>';
      $contenu .= '<p><strong>Profil</strong>: '.$choix.'</p>';
      $contenu .= '<p><strong>Nom</strong>:'.$name.'</p>';
      $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';      
      $contenu .= '<p><strong>Tel</strong>:'.$number.'</p>';
      $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
      $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
     
      // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
      $headers =  'MIME-Version: 1.0'."\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
      $headers .= 'From : '.$from. "\r\n ";
      
     
      // Envoyer l'email
      mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
      echo '<h4>Votre message a été envoyé!</h4>'; // Afficher un message pour indiquer que le message a été envoyé
      // (2) Fin du code pour traiter l'envoi de l'email
      } 

    else { // S'il y a un moins une erreur
    echo '<div id ="erreur">';
    echo '<p class ="centrage">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
    if (isset($erreur1)) echo '<p class ="centrage">'.$erreur1.'</p>';
    if (isset($erreur2)) echo '<p class ="centrage">'.$erreur2.'</p>';
    if (isset($erreur3)) echo '<p class ="centrage">'.$erreur3.'</p>';
    if (isset($erreur4)) echo '<p class ="centrage">'.$erreur4.'</p>';
    if (isset($erreur5)) echo '<p class ="centrage">'.$erreur5.'</p>';
    // (4) Ici, il sera possible d'ajouter un code d'erreur supplémentaire si un captcha anti-spam est erroné.
    echo '</div>';
  }
}

  ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="descrition" content="page de contact pour toute demande d'information sur les produits de la gamme Agric'oil">
    <meta name="author" content="Martinez Manuel" />   
    

    <link rel="stylesheet" type="text/css" href="css/normalise.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen"/>
    <link type="text/css" rel="stylesheet" href="css/style.min.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 <title>Contact</title>

</head>

<body>

  <div class="container-fluid">

        <img src="images/fonds/paysage-moisonneuse-batteuse.jpg" alt="paysage-moissonneuse-batteuse" class="background3"/>
   
    <div class="centrale" id="contact" >

      <div class="marque" >

        <img class="ecusson" src="images/ecussons/ecusson-agricoil.jpg" alt="ecussons agricoil">

      </div>

      <div class="form">

         <FORM action="contact.php" method="post" > 

            <ol>

              <li>
                
                <label for="inputchoix">Vous êtes? </label>
                
                <p><select name="choix">

                  <option name="choix1" value="distributeur">Un distributeur</option>

                  <option name="choix2" value="particulier">Un client</option>

                </select>

              </li>

              <li>

                  <label for="inputname">Nom </label>

                  <input required type="text" name="name" pattern="([a-zA-Z\s]){1,30}" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">

              </li>

              <li>

                  <label for="inputemail">Votre Email</label>

                  <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">

              </li>

              <li>

                  <label for="inputtelephone">Téléphone</label>

                  <input required  type="tel" pattern="(0|\+33)[1-9]( *[0-9]{2}){4}" name="number" class="form-control" id="inputtel" value="<?php echo isset($_SESSION['inputs']['tel'])? $_SESSION['inputs']['telephone'] : ''; ?>"> 

              </li>

              <li>

                  <label for="inputmessage">Message</label>

                  <textarea rows="3" cols="10" required id="inputmessage" name="message"   class="form-control" value="<?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?>"></textarea>

                  <P> 
                      <input class="bouton" type="submit" value="Envoyer">

                   <!--   <input class="bouton" type="reset" value="Effacer"> -->

                  </p>

              </li>

            </ol>

          </form>
    <?php
        unset($_SESSION['inputs']); 
        unset($_SESSION['success']);
        unset($_SESSION['errors']);
    ?>
 

        </div>

         <div class="text">

        <h2>NOUS CONTACTER</h2>

        Vous &#234;tes distributeur et vous 
        souhaitez commercialiser la 
        marque AgricOil ? 
        Vous souhaitez acheter de l'huile en direct ? 
        Laissez nous vos coordonnées 
        nous vous recontacterons sous</br> 
        24-48H jours ouvrés 

        </div>

    <div class="lien" id="menu">

        <a href="index.php">Accueil</a>

        <a href="produits.php">Huiles</a>

    </div>

    </div>

  </div>

    <div class="footer"> 

      <footer>

        <?php include("footer.php"); ?>

      </footer> 

    </div> 

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/background3.js"></script> 

</body>

</html>