<?php require ('header.php')?>
<div id='body_b'>
	
<?php
if (isset($_POST['pseudo']))
    {
    $bd = new SQLite3('genshin_impact_builder.db');
        $statement = $bd->prepare("INSERT INTO 'User' (pseudo,mdp,mail,naissance) VALUES(:pseudo,:mdp,:mail,:naissance);");
        $statement->bindValue(':pseudo',$_POST['pseudo']);
        $statement->bindValue(':mdp',$_POST['mdp']);
		    $statement->bindValue(':naissance',$_POST['naissance']);
		    $statement->bindValue(':mail',$_POST['email']);
        $result=$statement->execute();

        $_SESSION ['pseudo']=$_POST['pseudo'];
				$_SESSION ['mdp']=$_POST['mdp'];
				$_SESSION ['naissance']=$_POST['naissance'];
        $_SESSION ['mail']=$_POST['email'];
        header('location:account.php');
		
    }
?>
 <form action="inscription.php" method="post">
                 <br><br>
                   
                Pseudo :
                  <input type="text"  name="pseudo" /><br><br>
                Mot de passe : 
                  <input type="text"  name="mdp" /><br><br>
				<label for="email_input">E-mail :</label>
					<input type='email' name='email' id='emai_input' /><br><br>
				Date de naissance : 
					<input type="date" name='naissance' /><br><br>
                 
              <input type="submit" value="Envoyer" />


</form>
</div>
<?php require ('footer.php')?>