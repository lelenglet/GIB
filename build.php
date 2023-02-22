<?php require ("header.php");

        

    ?>
		<div id='body'>
		
		
			<div id='body_b'>
			Regarde les compos déjà existante !!!
			<table>
			<tbody>
			<?php $bd = new SQLite3('genshin_impact_builder.db');
     		$u=$bd->prepare("SELECT id_user FROM User WHERE pseudo=:pseudo and mdp=:mdp "); 
	 		$u->bindValue(':pseudo',$_SESSION ['pseudo']);
	 		$u->bindValue(':mdp',$_SESSION ['mdp']);  
	 		$resultuser=$u->execute(); 
			 $user=$resultuser->fetchArray(); 
		
			 $b=$bd->prepare("SELECT id_build,creation,nom,pseudo FROM Build JOIN User ON Build.id_user=User.id_user ORDER BY creation DESC"); 
			 $b->bindValue(':id_user',$user['id_user']); 
			 $resultbuild=$b->execute() ;

		while ($build=$resultbuild->fetchArray())
				{
				echo '<tr><th width="500px"><a href="preview.php?b='.$build['id_build'].'">'.$build['nom'].'</th><th width="100px">Le  '.$build['creation'].'<br> Par  '.$build['pseudo'].'</tr>';  
				}
			?>
			</tbody>
			</table>
            </div>
		
		
        </div>    
    </body>
<?php require ("footer.php") ?>



