<?php
/*** connection credentials *******/
$servername = "www.watzekdi.net";
$username = "watzekdi_cs393";
$password = "KevinBac0n";
$database = "watzekdi_imdb";
$dbport = 3306;

/****** connect to database **************/
try {
$db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8;port=$dbport", $username, $password);
}
catch(PDOException $e) {
echo $e->getMessage();
}


function getMovieByActorName($db, $firstName, $lastName){
    try {
        $stmt = $db->prepare("SELECT name, year FROM movies JOIN roles r ON r.movie_id = movies.id JOIN actors a ON a.id = r.actor_id WHERE first_name =:firstname AND last_name=:lastname");
        $data=array(":firstname"=>$firstName, ":lastname"=>$lastName);
        $stmt->execute($data);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    catch (Exception $e) {
        return false;
    }
}

function getMovieWithKevin($db, $firstName, $lastName){
    try {
        $stmt = $db->prepare("SELECT name FROM movies JOIN roles r1 ON r1.movie_id = movies.id JOIN actors a1 ON a1.id = r1.actor_id JOIN roles r2 ON r2.movie_id = movies.id JOIN actors a2 ON a2.id = r2.actor_id WHERE a1.first_name = 'Kevin' AND a1.last_name = 'Bacon' AND a2.first_name =:firstname AND a2.last_name=:lastname"
);
        $data=array(":firstname"=>$firstName, ":lastname"=>$lastName);
        $stmt->execute($data);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    catch (Exception $e) {
        return false;
    }
}

?>
