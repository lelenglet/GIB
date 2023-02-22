<?php session_start();
$bd = new SQLite3('genshin_impact_builder.db');
    $p=$bd->prepare("SELECT id_perso,typearme FROM Perso WHERE nom=:perso ");  
        $p->bindValue(':perso',$_POST['perso']);   
        $resultperso=$p->execute(); 
        $perso=$resultperso->fetchArray(); 

$_SESSION['typearme']=$perso['typearme'];

    $u=$bd->prepare("SELECT id_user FROM User WHERE pseudo=:pseudo and mdp=:mdp "); 
        $u->bindValue(':pseudo',$_SESSION ['pseudo']);
		$u->bindValue(':mdp',$_SESSION ['mdp']);  
        $resultuser=$u->execute(); 
        $user=$resultuser->fetchArray(); 
    
    $build = $bd->prepare("INSERT INTO Build (nom,creation,id_user,id_perso,id_arme) VALUES(:nom,:creation,:id_user,:id_perso,:categorie);");
        $build->bindValue(':nom',$_POST['nom']); 
        $build->bindValue(':creation',date("Y/m/d H:00"));   
        $build->bindValue(':id_user',$user['id_user']);
        $build->bindValue(':id_perso',$perso['id_perso']);
        $result=$build->execute();

        $b=$bd->prepare("SELECT id_build FROM Build WHERE id_user=:id_user ORDER BY creation DESC LIMIT 1"); 
        $b->bindValue(':id_user',$user['id_user']); 
        $resultbuild=$b->execute(); 
        $build=$resultbuild->fetchArray();

$_SESSION['id_build']=$build['id_build'];
    header("location:modify.php");
    ?>