
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/normalise.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 <title>Contact</title>

</head>

<body>

  <div class="container-fluid">

        <img src="images/fonds/paysage-moisonneuse-batteuse.jpg" alt="paysage-moissonneuse-batteuse" class="background3"/>
   
    <div class="centrale-2" >

      <div class="marque" >

        <img class="ecusson" src="images/ecussons/ecusson-agricoil.jpg" alt="ecussons agricoil">

      </div>

      <div class="form">

          <form action="send_form.php" method="post" >

            <ol>

              <li>
                
                <label for="inputchoix">Vous êtes? </label>
                
                <p><select name="choix">

                  <option value="choix1">Un distributeur</option>

                  <option value="choix2">Un client</option>

                </select>

              </li>

              <li>

                  <label for="inputname">Nom </label>

                  <input required type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">

              </li>

              <li>

                  <label for="inputemail">Votre Email</label>

                  <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">

              </li>

              <li>

                  <label for="inputtelephone">Téléphone</label>

                  <input required  type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="number" class="form-control" id="inputtel" value="<?php echo isset($_SESSION['inputs']['tel'])? $_SESSION['inputs']['telephone'] : ''; ?>"> 

              </li>

              <li>

                  <label for="inputmessage">Message</label>

                  <textarea rows="4" cols="16" required id="inputmessage" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>

                  <P> 
                      <input class="bouton" type="submit" value="Envoyer">

                      <input class="bouton" type="reset" value="Effacer">

                  </p>

              </li>

            </ol>

          </form>
 

        </div>

         <div class="text">

        <h2>NOUS CONTACTER</h2>

        Vous êtes distributeur et vous 
        souhaitez commercialiser la 
        marque AgricOil? 
        Vous souhaitez acheter de l'huile en direct? 
        Laissez nous vos coordonnées 
        nous vous recontacterons sous 
        24-48H jours ouvrés 

        </div>

    <div class="lien" id="menu">

        <a href="produits.php">Huiles</a>

        <a href="index.php">Accueil</a>

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