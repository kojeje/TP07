<?php

/* Pure text output formatting */
header('Content-type: text/plain; charset=utf-8;');

$dbName = 'bibliotheque';
$dbUser = 'root';
$dbPassword = 'root';

$dsn = "mysql:host=localhost;dbname=$dbName";

try {
    $dbh = new PDO($dsn, $dbUser, $dbPassword);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * ';
    $sql .= 'FROM livre ';
    $sql .= 'WHERE annee > :annee';

    $params = array(
        ':annee' => '1990'
    );

    try {
        $stt = $dbh->prepare($sql);

        $stt->execute($params);

        $resultat = $stt->fetchAll();

        foreach ($resultat AS $livre) {
            printf("id %s \n titre %s \n resume %s \n annee %s \n", $livre['id'], $livre['titre'], $livre['resume'], $livre['annee']);

        }


    } catch (PDOException $e) {
        echo 'Query error : ' . $e->getMessage();

    }

} catch (PDOException $e) {
    echo 'Query error : ' . $e->getMessage();

}

