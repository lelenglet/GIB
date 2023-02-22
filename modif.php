<?php session_start();
$db = new SQLite3('genshin_impact_builder.db');

    $a=$db->prepare("SELECT id_arme from Arme WHERE nom=:arme ");  
        $a->bindValue(':arme',$_POST['arme']);
        $resultarme=$a->execute();$arme=$resultarme->fetchArray();     

    $f= $db->prepare("SELECT id_set from Set_A WHERE nom=:fleurs");
        $f->bindValue(':fleurs',$_POST['fleurs']);
        $resultfleur=$f->execute();$fleurs=$resultfleur->fetchArray(); 

    $p= $db->prepare("SELECT id_set from Set_A WHERE nom=:plumes");
        $p->bindValue(':plumes',$_POST['plumes']);
        $resultplumes=$p->execute();$plumes=$resultplumes->fetchArray(); 

    $ss= $db->prepare("SELECT id_set from Set_A WHERE nom=:sables");
        $ss->bindValue(':sables',$_POST['sables']);
        $resultss=$ss->execute();$sables=$resultss->fetchArray();  

    $se= $db->prepare("SELECT id_effet from Effet WHERE stat=:sablee");
        $se->bindValue(':sablee',$_POST['sablee']);
        $resultse=$se->execute();$sablee=$resultse->fetchArray(); 

    $gs= $db->prepare("SELECT id_set from Set_A WHERE nom=:gobelets");
        $gs->bindValue(':gobelets',$_POST['gobelets']);
        $resultgs=$gs->execute();$gobelets=$resultgs->fetchArray();         

    $ge= $db->prepare("SELECT id_effet from Effet WHERE stat=:gobelete");
        $ge->bindValue(':gobelete',$_POST['gobelete']);
        $resultge=$ge->execute();$gobelete=$resultge->fetchArray();  
        
    $ds= $db->prepare("SELECT id_set from Set_A WHERE nom=:diademes");
        $ds->bindValue(':diademes',$_POST['diademes']);
        $resultds=$ds->execute();$diademes=$resultds->fetchArray(); 

    $de= $db->prepare("SELECT id_effet from Effet WHERE stat=:diademee");
        $de->bindValue(':diademee',$_POST['diademee']);
        $resultde=$de->execute();$diademee=$resultde->fetchArray(); 

     $artefact = $db->prepare("INSERT INTO Artéfacts (id_set1,id_set2,id_set3,id_effet3,id_set4,id_effet4,id_set5,id_effet5) VALUES(:f,:p,:ss,:se,:gs,:ge,:ds,:de)");
        $artefact->bindValue(':f',$fleurs['id_set']); 
        $artefact->bindValue(':p',$plumes['id_set']);
        $artefact->bindValue(':ss',$sables['id_set']);
        $artefact->bindValue(':se',$sablee['id_effet']);
        $artefact->bindValue(':gs',$gobelets['id_set']);
        $artefact->bindValue(':ge',$gobelete['id_effet']);
        $artefact->bindValue(':ds',$diademes['id_set']);
        $artefact->bindValue(':de',$diademee['id_effet']);
        $result=$artefact->execute();


        $artefact = $db->prepare("SELECT id_artefact FROM Artéfacts WHERE id_set1=:f and id_set2=:p and id_set3=:ss and id_effet3=:se and id_set4=:gs and id_effet4=:ge and id_set5=:ds and id_effet5=:de");
        $artefact->bindValue(':f',$fleurs['id_set']); 
        $artefact->bindValue(':p',$plumes['id_set']);
        $artefact->bindValue(':ss',$sables['id_set']);
        $artefact->bindValue(':se',$sablee['id_effet']);
        $artefact->bindValue(':gs',$gobelets['id_set']);
        $artefact->bindValue(':ge',$gobelete['id_effet']);
        $artefact->bindValue(':ds',$diademes['id_set']);
        $artefact->bindValue(':de',$diademee['id_effet']);
        $result=$artefact->execute();$idartefact=$result->fetchArray(); 

    
    $build = $db->prepare("UPDATE Build SET id_arme=:arme,id_artefact=:artefact WHERE id_build=:id ");
    $build->bindValue(':id',$_SESSION['id_build']);
    $build->bindValue(':arme',$arme['id_arme']);
    $build->bindValue(':artefact',$idartefact['id_artefact']);
    $result=$build->execute();
    header('location:account.php');
    ?>