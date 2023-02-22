<?php require ('header.php');
        if (isset($_GET['b']))
        {
        $db = new SQLite3('genshin_impact_builder.db');

        $b = $db->prepare ("SELECT nom,creation,id_user,id_perso,id_arme,id_artefact FROM Build WHERE id_build=:build");
        $b -> bindValue(':build',$_GET['b']);
        $resultbuild=$b->execute();$build=$resultbuild->fetchArray();

        $p= $db->prepare("SELECT P.nom,type FROM Perso as P JOIN Build as B ON P.id_perso=B.id_perso WHERE id_build=:build");
        $p -> bindValue(':build',$_GET['b']);
        $resultperso=$p->execute();$perso=$resultperso->fetchArray();

        $a= $db->prepare("SELECT A.nom FROM Arme as A JOIN Build as B ON A.id_arme=B.id_arme WHERE id_build=:build");
        $a -> bindValue(':build',$_GET['b']);
        $resultarme=$a->execute();$arme=$resultarme->fetchArray();       

        $f= $db->prepare("SELECT Set_A.nom from Set_A inner join Artéfacts on Set_A.id_set = Artéfacts.id_set1 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $f -> bindValue(':build',$_GET['b']);
        $resultfleur=$f->execute();$fleur=$resultfleur->fetchArray(); 

        $p= $db->prepare("SELECT Set_A.nom from Set_A inner join Artéfacts on Set_A.id_set = Artéfacts.id_set2 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $p -> bindValue(':build',$_GET['b']);
        $resultplume=$p->execute();$plume=$resultplume->fetchArray();         

        $ss= $db->prepare("SELECT Set_A.nom from Set_A inner join Artéfacts on Set_A.id_set = Artéfacts.id_set3 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $ss -> bindValue(':build',$_GET['b']);
        $resultsableset=$ss->execute();$sableset=$resultsableset->fetchArray(); 

        $se= $db->prepare("SELECT Effet.stat from Effet inner join Artéfacts on Effet.id_effet = Artéfacts.id_effet3 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $se -> bindValue(':build',$_GET['b']);
        $resultsableeffet=$se->execute();$sableeffet=$resultsableeffet->fetchArray(); 

        $gs= $db->prepare("SELECT Set_A.nom from Set_A inner join Artéfacts on Set_A.id_set = Artéfacts.id_set4 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $gs -> bindValue(':build',$_GET['b']);
        $resultgobeletset=$gs->execute();$gobeletset=$resultgobeletset->fetchArray(); 

        $ge= $db->prepare("SELECT Effet.stat from Effet inner join Artéfacts on Effet.id_effet = Artéfacts.id_effet4 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $ge -> bindValue(':build',$_GET['b']);
        $resultgobeleteffet=$ge->execute();$gobeleteffet=$resultgobeleteffet->fetchArray(); 

        $ds= $db->prepare("SELECT Set_A.nom from Set_A inner join Artéfacts on Set_A.id_set = Artéfacts.id_set5 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $ds -> bindValue(':build',$_GET['b']);
        $resultdiademeset=$ds->execute();$diademeset=$resultdiademeset->fetchArray(); 

        $de= $db->prepare("SELECT Effet.stat from Effet inner join Artéfacts on Effet.id_effet = Artéfacts.id_effet5 inner join Build ON Artéfacts.id_artefact=Build.id_artefact  WHERE id_build=:build");
        $de -> bindValue(':build',$_GET['b']);
        $resultdiademeeffet=$de->execute();$diademeeffet=$resultdiademeeffet->fetchArray(); 

        }?>
<div id='body'>
        <div id='body_nb'>
        <table>
        <tbody>
        <tr>
                <th></th>
                <th>
                <?php
                echo $perso['nom'].'  '.$perso['type'];
                 ?>
                </th>
                <th></th>
        </tr>
        <tr>
                <th> 
                <?php 
                echo 'Arme : '.$arme['nom']
                ?>
                </th>

                <th></th>

                <th>
                <?php 
                echo 'Sable : '.$sableset['nom'];
                ?>
                </th>
        </tr>
        <tr>
                <th></th>
                <th></th> 

                <th> 
                <?php 
                echo '    '.$sableeffet['stat'];
                ?>
                </th>
        </tr>
        <tr>
                <th><?php
                echo 'Fleur :'.$fleur['nom'].' <br> - PV';
                ?>
                </th>
        
                <th></th> 

                <th> <?php echo 'Gobelet :'.$gobeletset['nom']?>
                </th>
        </tr>
        <tr>
                <th></th>
        
                <th></th> 

                <th> <?php echo '    '.$gobeleteffet['stat']?>
                </th>
        </tr>
        <tr>
                <th>
                <?php echo 'Plume :'.$plume['nom'].'<br> - ATQ'?>
                </th>
                <th></th>
                <th>
                <?php echo 'Diadème :'.$diademeset['nom']; ?>
                </th>
        </tr>
        <tr>
                <th></th>
        
                <th></th> 

                <th> <?php echo '    '.$diademeeffet['stat']?>
                </th>
        </tr>

        </tbody>
        </table>
        </div>
    </div>    
</body>
<?php require ('footer.php') ?>