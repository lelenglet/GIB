<?php require ("header.php") 
    //$page=['une','deux'];
    //$compo=['une'=> ['compo1','compo2'],
    //            'deux' => ['compo3','compo4']];
?>
<div id='body'>
    <div id='body_l'>
		<br>
		<br>
		<br>
		<br>
        Bonjour, <?php echo $_SESSION['pseudo'] ?>	
		<br>
		<br>
		<br>
		<br>
		<br>
		Date de naissance : (<?php echo $_SESSION ['naissance'] ?>)
		<br>
		<br>
		<br>
		Adresse mail : (<?php echo $_SESSION ['mail'] ?>)
		<br>
		<br>
		<br>
		<br>
		<br>
		<button><a href="logout.php">Deconnexion</a></button>

    </div>
    <div id='body_a'>
		<br>
        Mes builds
		<br>
                
		<table>
		<tbody>
		<?php $bd = new SQLite3('genshin_impact_builder.db');
     		$u=$bd->prepare("SELECT id_user FROM User WHERE pseudo=:pseudo and mdp=:mdp "); 
	 		$u->bindValue(':pseudo',$_SESSION ['pseudo']);
	 		$u->bindValue(':mdp',$_SESSION ['mdp']);  
	 		$resultuser=$u->execute(); 
			 $user=$resultuser->fetchArray(); 
		
			 $b=$bd->prepare("SELECT id_build,creation,nom FROM Build WHERE id_user=:id_user ORDER BY creation DESC"); 
			 $b->bindValue(':id_user',$user['id_user']); 
			 $resultbuild=$b->execute() ;

		while ($build=$resultbuild->fetchArray())
				{
				echo '<tr><th width="500px"><a href="preview.php?b='.$build['id_build'].'">'.$build['nom'].'</th><th width="100px">Le  '.$build['creation'].'</tr>';  
				}
			?>
		</tbody>
		</table>
		
		<a href="newbuild.php" > <input type="button" value="Créer une nouvelle compo"> </a>
	</div>
 
 
</div>
<?php require ("footer.php") ?>