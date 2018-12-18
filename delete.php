<?php

include("config.php");
 

$id = $_GET['id'];
 

$db->users->remove(array('_id' => new MongoId($id)));
 

header("Location:index.php");
?>