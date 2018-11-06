<?php

/* Pure text output formatting */
header('Content-type: text/plain; charset=utf-8;');

$dbName = 'bibliotheque';
$dbUser = 'root';
$dbPassword = 'root';

$dsn = "mysql:host=localhost;dbname=$dbName";

try {
    $dbh = new PDO($dsn, $dbUser, $dbPassword);

//Pour réagir en cas d'erreur (à copier coller tel quel)
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//attribuer requete à vaiable $sql
    $sql = 'SELECT * ';

//NB '.=' concaténé aux valeurs precedentes
    $sql .= 'FROM livre ';
//    $sql .= 'WHERE annee > :year';
//    ou
    $sql .= 'WHERE annee > :year_down AND annee < :year_up';

    $params = array(


        ':year_down' => '1990',
        ':year_up' => '2005'
    );

    try {

//        Envoyer la requete à la base de données
        $stt = $dbh->prepare($sql);

        $stt->execute($params);

        $resultat = $stt->fetchAll();

        foreach ($resultat AS $livre) {
            
            printf ("id %s \n titre %s \n resume %s \n  annee %s \n", $livre['id'], $livre['titre'], $livre['resume'], $livre['annee']);

        }

//        En cas d'erreur'
//            renvoi d'exeption
    } catch (PDOException $e) {
        echo 'Query error : ' . $e->getMessage();

    }

} catch (PDOException $e) {
    echo 'Query error : ' . $e->getMessage();

}

