<?php require ("header.php");

	$db = new SQLite3('genshin_impact_builder.db');
	$req = $db -> prepare("SELECT * FROM User");
		$result = $req->execute();
		while ($d = $result -> fetchArray())
		{
            if($_SESSION['pseudo']!=NULL and $_SESSION['mdp']!=NULL)
            {
               if ($d ['pseudo']== $_SESSION['pseudo'] and $d['mdp']==$_SESSION["mdp"])
			    {
				header('location:account.php');
                } 
            }
			
        }
?>

<div id='body'>
        <div id='body_l'>
            <br>
                Connectez vous
                <form action="identification.php" method="post">
                 <br><br>
                   
                Pseudo :
                  <input type="text"  name="pseudo" /><br><br>
                Mot de passe :
                  <input type="password"  name="mdp" /><br><br>
                  <input type="submit" value="Se connecter" />
             
                  </form><br>
				  C'est votre première visite ? <br>
				  Inscrit toi <a href='inscription.php'> ici </a>

        </div>
        <div id='body_r'>
		<br>
        Pourquoi se connecter ?
		<br>
        <br>
        Pour pouvoir :
		<ul>
		<li>Créer ses propres compositions</li>
		<li>Avoir des avantages sur le site</li>
		<li>Rejoindre la communauté et ses (nombres inscrits) adhérents</li>
		</ul>
        <br>
        <br>
		Dernière inscription sur le site : Bob Marlé le 16/11/2020
        <br>
		<br>
        </div>
 
 
    </div>
<?php require ("footer.php") ?>