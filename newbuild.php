<?php require ('header.php') ?>

<div id='body'>
        <div id='body_nb'>
        <table>
        <tbody>
        <tr>
                
                <th>
                <form action="choose.php" method='post'>
                Nom de la compo :
                  <input type="text"  name="nom" /><br><br>
                </th>
               
        <tr>
                
                <th>
                
                <label for="perso">Choisi un personnage :</label>
                <br>
                <br>
                <select name="perso" id="perso">		
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT nom FROM Perso ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>
                </select>   
                </th>
                
        </tr>
		<tr><th> <a href='choose.php'> <input type="submit" value="Suivant" /></a></th></tr>
                </form>
        </tbody>
        </table>
        </div>
    </div>    
</body>
<?php require ('footer.php') ?>