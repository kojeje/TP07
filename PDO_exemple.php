<?php

/* Pure text output formatting */
header('Content-type: text/plain; charset=utf-8;');

$dbName = 'bibliotheque';
$dbUser = 'root';
$dbPassword = 'masteruser';

$dsn = "mysql:host=localhost;dbname=$dbName";

try {
    $dbh = new PDO($dsn, $dbUser, $dbPassword);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT * ';
    $sql .= 'FROM auteur, ';
    $sql .= 'WHERE nom = :nom';
    
    $params = array(
        ':nom' => 'kundera'
    );
    
    try {
        $stt = $dbh->prepare($sql);
        $stt->execute($params);
    } catch (PDOException $e) {
        echo 'Query error : ' . $e->getMessage();
    }
} catch (PDOException $e) {
    echo 'Connection error : ' . $e->getMessage();
}
