<?php
$env = parse_ini_file('.env');
$dbInfos = "mysql:host=db;dbname=" . $env["DB_NAME"] . ";charset=utf8";
$dbUser = $env["DB_USER"];
$dbPassword = $env["DB_PASSWORD"];

try {
    $db = new PDO($dbInfos, $dbUser, $dbPassword);
    $query = "SELECT * FROM etudiant";
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