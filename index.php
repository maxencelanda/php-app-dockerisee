<?php
$dbInfos = "mysql:host=localhost;dbname=epsi;charset=utf8";
$env = parse_ini_file('.env');
$dbUser = $env["DB_USER"];
$dbPassword = $env["DB_PASSWORD"];

try {
    $db = new PDO($dbInfos, $dbUser, $dbPassword);
    $query = "SELECT * FROM Etudiant";
    $etudiantStatement = $db->prepare($query);
    $etudiantStatement->execute();
    $etudiants = $etudiantStatement->fetchAll();
    foreach($etudiants as $etudiant){
        echo $etudiant["nom"] . "<br/>";
    }
} catch(PDOException $e){
    echo $e;
} 

?>