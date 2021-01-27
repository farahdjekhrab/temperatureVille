<?php
  if(isset($_POST['submit']))
  {
    $ville = $_POST['ville'];
    echo 'Ville:' . $ville;
  }

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$bdd->query("SET lc_time_names = 'fr_FR'");
$reponse = $bdd->prepare('SELECT ville,temperature,DATE_FORMAT(last_update, "Le %d %M %Y à %Hh%i") AS last_update FROM temperaturevilles WHERE ville = ? ');
$reponse->execute(array($ville));
$donnees = $reponse->fetch();
?>

<p><?php echo  htmlspecialchars($donnees['last_update']); ?> à <?php echo htmlspecialchars(ucfirst($ville)); ?> il faisait <?php echo $donnees['temperature']; ?> °C</p>
  
<?php

$reponse->closeCursor();
?>