<form method="post" action="affichage_temperature.php">
	
	<label for="ville">Choix de votre ville ?</label><br />
	<select name="ville" id="ville">

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT temperature,ville FROM temperaturevilles ');

while ($donnees = $reponse->fetch())
{
?>
    <option name="ville"><?php echo $donnees['ville']; ?></option>
<?php 
}
 
$reponse->closeCursor();

?>
</select>
<input type="submit" value="Afficher" name="submit">
</form>

