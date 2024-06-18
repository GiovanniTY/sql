/* //afficher toutes les donnes  */
SELECT * FROM school, students;

/* //affiche uniquement les prénoms */
SELECT prenom 
from students;

/* //affiche les prénoms, les dates de naissance et l'école de chacun */

Select students.prenom, students.datenaissance, school.school
FROM students
INNER JOIN school 
on  school.idschool = students.school

/* afficher uniquement les eleve qui sont de sexe feminin */
SELECT * FROM students
where genre = "F"


/* Affiche uniquement les prénoms des étudiants, 
par ordre inverse à l’alphabet (DESC). Ensuite, la même chose mais en limitant les résultats à 2. */
SELECT prenom from students 
Order by prenom asc
LIMIT 2

/* Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles, toujours en SQL. */
INSERT INTO students (nom, prenom, datenaissance,genre, school)
VALUES ('Ginette', 'Dalor', '1930-01-01', 'F', 1);

/* Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”. */
UPDATE students 
SET nom = 'Omer', genre = 'M' 
where nom = "Ginette"

/* Supprimer la personne dont l’ID est 3. */
DELETE FROM students
where idStudent = 3;

/* Modifier le contenu de la colonne School 
de sorte que "1" soit remplacé par 
"Liege" et "2" soit remplacé par "Gent". (attention au type de la colonne !) */
ALTER TABLE students
MODIFY school VARCHAR(255);

UPDATE students
SET school = 'Liege'
WHERE school = '1';

UPDATE students
SET school = 'Gent'
WHERE school = '2';

