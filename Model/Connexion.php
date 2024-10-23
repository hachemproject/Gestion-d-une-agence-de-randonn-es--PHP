


<?php


try
{
$conn = new PDO('mysql:host=localhost;dbname=lesrandons', 'root', '');}
catch (PDOException $e)
{
die('Erreur : ' . $e->getMessage());
}


?>