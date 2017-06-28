<?php            
include 'recherche.php';
?>
<!DOCTYPE html>
  <html lang="fr">

<head>
        <meta charset="UTF-8" />
        <meta name="descrition" content="tableau de correspondance entre les huiles de la gamme agricoil et les huiles de marques concurante">
        <meta name="author" content="Martinez Manuel" />    
        <link type="text/css" rel="stylesheet" href="css/normalise.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen"/>
        <link type="text/css" rel="stylesheet" href="css/style.min.css"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Comparatif d'huile</title>

</head>
<body>
    <div class="container-fluid">
        <h1>Comparateur d'huiles</h1>
          <form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">  
            <select class="form-control" name="gamme">
                <option>Choix gamme</option>
                <option value="auto">Auto</option>
                <option value="transmission">Transmission</option>
                <option value="vehicule_industriel">Véhicules industiels</option>
                <option value="agricole_tp">Agricole-TP</option>
                <option value="motoculture">Motoculture</option>
                <option value="industrie">Industrie</option>
                <option value="marine">Marine</option>
            </select>
                
            <select class="form-control" name="marque">
                <option>Choix marque</option>
                <option value="armorine">Armorine</option>
                <option value="bp">BP</option>
                <option value="castrol">Castrol</option>
                <option value="elf">Elf</option>
                <option value="fuchs">Fuchs</option>
                <option value="igol">Igol</option>
                <option value="mobil">Mobil</option>
                <option value="q8">Q8</option>
                <option value="shell">Shell</option>
                <option value="total">Total</option>
                <option value="unilopal">Unil Opal</option>
                <option value="yacco">Yacco</option>
                <option value="motul">Motul</option>
            </select>
            <button class="btn btn-primary"  type="submit" name="liste" >
                <i class="material-icons right"></i>Type d'huile habituel
            </button>
        <?php 
            $bdd = mysqli_connect($serveur,$admin,$mdp,$base);
            $gamme = $_POST['gamme'];
            $marque = $_POST['marque'];
            $req = "SELECT produit
                    FROM produits 
                    INNER JOIN gammes ON gammes.id = produits.idgamme
                    INNER JOIN marques ON marques.id = produits.idmarque
                    WHERE gamme = '$gamme'
                    AND marque = '$marque'
                    ";
            $result = mysqli_query($bdd, $req);
         
            echo '<select class="form-control" name="produit">Type d huile';
                while($row = mysqli_fetch_assoc($result)) 
                {
                    echo '<option value="'.$row['produit'].'">'.$row['produit'].'</option>'; 
                }
            echo '</select>';
        ?>
        <div class="button">
            <button class="btn waves-effect waves-light light-blue" id="result"  type="submit" name="resultat" >
                <i class="material-icons right"></i>Votre equivalent Agricoil : </br>
        <?php    
            $produit=$_POST['produit'];
            $req1 ="SELECT *
                    FROM produits
                    INNER JOIN huiles ON huiles.id = produits.idhuile
                    WHERE produit = '$produit'
               ";
            $res = mysqli_query($bdd,$req1);
            $aff = mysqli_fetch_assoc($res);       
        ?>      
                <input type="text" value="<?php echo ($aff['nom']); ?>" /> 
            </button> 
        </div>               
          </form>
          <a id="lien" href="<?php echo ($aff['lien']);?>" class="btn btn-primary" role="button" aria-pressed="true" target="blank">Trouver votre produit</a>
          <a id="lien" href="index.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Retour</a>
           
    </div>
    <div class="marque2" >
        <img class="ecusson2" src="images/ecussons/ecusson-agricoil.jpg" alt="ecussons agricoil">
    </div>

</body>
