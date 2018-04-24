<?php
$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];
require "common.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8" />
		<link href="https://webster.cs.washington.edu/images/kevinbacon/favicon.png" type="image/png" rel="shortcut icon" />

		<!-- Link to your CSS file that you should edit -->
		<link href="bacon.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="frame">
			<div id="banner">
				<a href="mymdb.php"><img src="https://webster.cs.washington.edu/images/kevinbacon/mymdb.png" alt="banner logo" /></a>
				My Movie Database
			</div>
			<div id="main">
                <h1>The One Degree of Kevin Bacon</h1>
            	<p>Films with <?=$firstname?> <?=$lastname?> and Kevin Bacon</p>
            	<table>
            	    <tr>
            	        <th>#</th>
            	        <th>Movie</th>
            	        <th>Year</th>
            	    </tr>
            	    <?
                        if ($rows=getMovieWithKevin($db, "$firstname", "$lastname")){
                            $n = 0;
                            for($i=0; $i < count($rows); $i++){
                                $n++;
                                ?>
            	                <tr><td><?=$n?></td> <td><?print_r($rows[$i]["name"]);?></td> <td><?print_r($rows[$i]["year"]);?></td></tr>
            	                <? }
            	        }
            	        else {
                            echo "no results";
                        } ?>
            	</table>

            </div> <!-- end of #main div -->
            <div id="w3c">
            <a href="https://webster.cs.washington.edu/validate-html.php"><img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML5" /></a>
            <a href="https://webster.cs.washington.edu/validate-css.php"><img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
            </div>
        </div> <!-- end of #frame div -->
    </body>
</html>

<?
/*
SELECT name
FROM movies
JOIN roles r1 ON r1.movie_id = m.id
JOIN actors a1 ON a1.id = r1.actor_id
JOIN roles r2 ON r2.movie_id = m.id
JOIN actors a2 ON a2.id = r2.actor_id
WHERE a1.first_name = "Kevin"
AND a1.last_name = "Bacon"
AND a2.first_name = "Julia"
AND a2.last_name = "Roberts";


 SELECT name FROM movies JOIN roles r1 ON r1.movie_id = movies.id JOIN actors a1 ON a1.id = r1.actor_id JOIN roles r2 ON r2.movie_id = movies.id JOIN actors a2 ON a2.id = r2.actor_id WHERE a1.first_name = "'Kevin'" AND a1.last_name = "'Bacon'" AND a2.first_name =:firstname AND a2.last_name=:lastname"

  */

  ?>