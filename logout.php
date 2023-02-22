<?php require ('header.php');?>
<div id='body_b'>
<?php			
	$_SESSION ['pseudo']=NULL;
	$_SESSION ['mdp']=NULL;
	$_SESSION ['naissance']=NULL;
	$_SESSION ['mail']=NULL;
	header('location:connection.php');

?>
</div>
<?php
require ('footer.php')
?> 