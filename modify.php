<?php require ('header.php') ?>

<div id='body'>
        <div id='body_nb'>
        <table>
        <tbody>
        <tr>
                <th> 
                <form action="modif.php" method='post'>
                <label for="arme">Choisi une arme :</label>
                <select name="arme" id="arme">
                <br>
                <br>
                <?php $bd = new SQLite3('genshin_impact_builder.db');
                $req = $bd->prepare("SELECT nom FROM Arme WHERE type_arme=:cate");     
                $req->bindValue(':cate',$_SESSION['typearme']);
		$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>        
                </select>   
                </th>

                <th></th>

                <th>

                <label for="sable_s">Choisi un set d'artéfact pour ton sable :</label>
                <select name="sables" id="sable">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
		        $req = $bd->prepare("SELECT nom FROM Set_A ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>                
                </select>  
                </th>
        </tr>
        <tr>
                <th></th>
                <th></th> 
                <th>
                <label for="sable_e">Choisi un effet d'artéfact pour ton sable :</label>
                <select name="sablee" id="sable">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT stat FROM Effet ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['stat'].'">'.$d['stat'].'</option>';  
			}
		?>  
                </select>
                </th>
        </tr>
        <tr>
                <th>
                <label for="fleur_s">Choisi un set d'artéfact pour ta fleur : Effet PV </label>
                <br>
                <br>
                <select name="fleurs" id="fleur">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT nom FROM Set_A ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>  
                </select></th>
                <th></th> 
                <th> 
                <label for="gobelet_s">Choisi un set d'artéfact pour ton gobelet :</label>
                <select name="gobelets" id="gobelet">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT nom FROM Set_A ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>  
                </select>
                </th>
        </tr>
        <tr>
                <th></th>
                <th></th>
                <th> 
                <label for="gobelet_e">Choisi un effet d'artéfact pour ton gobelet :</label>
                <select name="gobelete" id="gobelet">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT stat FROM Effet ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['stat'].'">'.$d['stat'].'</option>';  
			}
		?>  
                </select>
                </th>
        </tr>
        <tr>
                <th>
                
                <label for="plume_s">Choisi un set d'artéfact pour ta plume : Effet ATQ</label>
                <br>
                <br>
                <select name="plumes" id="plume">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT nom FROM Set_A ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>  
                </select>
                </th>
                <th></th>
                <th>
               
                <label for="diademe_s">Choisi un set d'artéfact pour ton diadème :</label>
                <select name="diademes" id="diademe">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT nom FROM Set_A ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['nom'].'">'.$d['nom'].'</option>';  
			}
		?>  
                </select>
                </th>
        </tr>
        <tr>
                <th></th>
                <th></th>
                <th> 
                <label for="diademe_e">Choisi un effet d'artéfact pour ton diadème :</label>
                <select name="diademee" id="diademe">
		<?php $bd = new SQLite3('genshin_impact_builder.db');
 
		        $req = $bd->prepare("SELECT stat FROM Effet ");
			$result=$req->execute();
			while ($d =$result->fetchArray())
			{
				echo '<option value="'.$d['stat'].'">'.$d['stat'].'</option>';  
			}
		?>  
                </select>
                </th>
        </tr>
		<tr><th colspan="3"><a href="modif.php"> <input type="submit" value="Envoyer" /></a></th></tr>
        </form>
        </tbody>
        </table>
        </div>
    </div>    
</body>
<?php require ('footer.php') ?>