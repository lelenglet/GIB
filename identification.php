<?php require ('header.php');?>
<div id='body_b'>



<?php
if (isset($_POST['pseudo']))
{
	$db = new SQLite3('genshin_impact_builder.db');
	$req = $db -> prepare("SELECT * FROM User");
		$result = $req->execute();
		while ($d = $result -> fetchArray())
		{
			if ($d ['pseudo']== $_POST['pseudo'] and $d['mdp']==$_POST["mdp"])
			{
				echo 'Connexion validée<br>';
				$_SESSION ['pseudo']=$d['pseudo'];
				$_SESSION ['mdp']=$d['mdp'];
				$_SESSION ['naissance']=$d['naissance'];
				$_SESSION ['mail']=$d['mail'];
				echo 'Accéder à mon compte';
				header('location:account.php');
			}}
		if ($d['pseudo']!=$_POST['pseudo'] and $d['mdp']!=$_POST['mdp'])
		{
			echo 'Connexion refusée<br>Redirection vers la page de connexion';
			header('location:connection.php');
		}
		
}

?>
</div>
<?php
require ('footer.php')
?> 