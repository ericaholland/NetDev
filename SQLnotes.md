# NetDev

SELECT retrieves info from a specified table and returns result of the query in another table (columns)
FROM designates which table to query from

E.g. SELECT first_name, last_name
FROM directors;
→ gives two columns of first and last names [of directors] in directors columns

SELECT DISTINCT prevents select from returning repetitions. Like if you used it on last_names, but a few people had the same last name, it would only return it once in the table shown.
WHERE specifying conditions
BETWEEN for checking values within a range (inclusive). Separate them with AND
IN searches for a value in a given set. Like in 1995 or 1999, but not between
		E.g SELECT *
			FROM movies
			WHERE year IN (1995, 1999);
	LIKE is used to filter strings. 
		E.g LIKE ‘text%’ | LIKE ‘%text’ | LIKE ‘%text’    depending if want it to start, end or contain that string
		‘_’ can be used in place of ‘%’ to match exactly one character
			So if you wanted to display only people with two letter first names you could do
			SELECT *
			FROM actors
			WHERE first_name LIKE ‘__’ ;

AND/OR to have multiple predicates. AND has higher precedence than OR, so use precedence to enforce order

ORDER BY [columns] ASC (or DESC) for ascending or descending order

LIMIT accepts an integer to only return N results
	E.g ORDER BY last_name, first_name DESC
	      LIMIT 3
		→ gives you first three items first name followed by last name column in descending order
Aggregating

SELECT AVG (predicate) to get average of that predicate
	E.g SELECT AVG(rank) FROM movies WHERE year >= 2000;

SELECT COUNT(predicate)
	E.g. SELECT COUNT(*) FROM movies WHERE rank >= 8.8;

GROUP BY if you use it to group by year, it will combine all movies released in the same year
	E.g. SELECT year, AVG(rank) FROM movies WHERE year >= 2000 GROUP BY year;
	→ gives a table of average rank of movies for each year
	E.g. SELECT year, AVG(rank) average FROM movies WHERE year >= 2000 
        GROUP BY year ORDER BY average;
→ would order them by the average instead of the year

HAVING clause is basically same as where except it accepts aggregate functions. So like if you avg stuff you can use that as a filter
	E.g SELECT year, AVGr(rank) average FROM movies
		WHERE year >= 2000
		GROUP BY year
		HAVING average >= 8.0;
	→ gives you the year and avg rating of movies with an avg larger than 8.0

INSERT INTO inserts data
	E.g INSERT INTO actors (id, first_name, last_name)
		VALUES (645370, ‘Jessica’, ‘Miller’)

UPDATE modifies existing data
	E.g. UPDATE actors
		SET first_name = ‘Marty’, last_name = ‘Stepp’, gender = ‘M’
		WHERE id = 968345
		→ the actor of 
DELETE deletes data
	E.g DELETE
		FROM actors
		WHERE id = 756745;



#### Multitable stuff
JOIN joins tables together. But don’t want it just mulitplied. Here’s how to use it correctly with on filter. It filters out all rows except where id of movie is the same as id_movie. 
	SELECT column(s)
	FROM table1
		JOIN table2 ON condition(s)
		…
		JOIN tableN ON condition(s)
Where condition(s)
	
	E.g SELECT *
	       FROM movies
			JOIN movies_genre ON id = movie_id
	       WHERE name = ‘Memento

To disambiguate column names between tables if they have the same name, refer to them as table.column (like actors.first_name)
	To make this more compact you can sort of rename the table (not actually permanently rename it) by listed the name you want to give it right after the actual name in the FROM or JOIN line
	E.g SELECT *
	       FROM actors a
			JOIN directors d ON a.first_name = d.first_name
	       WHERE a.gender = ‘F’ ;


EXAMPLES: [on the test querry on UW website]
Show all roles played in the movie named Pi: 
SELECT r.role FROM roles r
JOIN movies m ON m.id = r.movie_id
WHERE m.name = 'Pi';
→ outputs 28 rows

Show the first/last names of all actors who appeared in Pi, along with their roles. 
SELECT a.first_name, a.last_name, r.role
FROM roles r
JOIN movies m ON m.id = r.movie_id
JOIN actors a ON a.id = r.actor_id
WHERE m.name = 'Pi';
→ also outputs 28 rows but with roles, first and last names
(alternatively…)
SELECT a.first_name, a.last_name, r.role 
FROM   actors a
JOIN roles r ON r.actor_id = a.id
JOIN movies m ON m.id = r.movie_id
WHERE m.name = 'Pi';

Show the first/last names of all actors who appeared in both Kill Bill: Vol. 1 and Kill Bill: Vol. 2. 
SELECT a.first_name, a.last_name
FROM actors a
JOIN roles r1 ON r1.actor_id = a.id
JOIN roles r2 ON r2.actor_id = a.id
JOIN movies m1 ON m1.id = r1.movie_id
JOIN movies m2 ON m2.id = r2.movie_id
WHERE m1.name = 'Kill Bill: Vol. 1'
AND m2.name = 'Kill Bill: Vol. 2';
→ 10 rows
Join the actors and roles tables for each movie first (ie do it once for each movie) on the actor ID. Then join the movies and roles tables for each movie (ie do it once for each movie).  And do it where the name for each m1/m2 is the name of the movie

List all of the grades given in the course Computer Science 143. (for simpson database)
SELECT g.grade
FROM grades g
JOIN courses c ON c.id = g.course_id
WHERE c.name = 'Computer Science 143';

List name and ID of all students who got a B- or better in Computer Science 143. 
SELECT DISTINCT g.grade, s.name
FROM grades g
JOIN courses c ON c.id = g.course_id
JOIN students s ON s.id = g.student_id
WHERE c.name = 'Computer Science 143'
AND g.grade LIKE '%B%' OR g.grade LIKE 'A%';
→ two rows. If you don’t do distinct Lisa is there twice so it’s three, but she’s only one person

List all names of students who were given a B- or better in any class. List student name, course and grade in alphabetical order by student name
SELECT s.name, c.name, g.grade
FROM students s
JOIN grades g ON g.student_id = s.id
JOIN courses c ON c.id = g.course_id
WHERE g.grade <= 'B-'
ORDER BY s.name;
→ five rows
