/**
 * Author:  stefano
 * Created: 31 mar 2023
 * db: rest-library
 */
CREATE TABLE `books` (
    `ISBN` varchar(35) NOT NULL, 
    `Author` varchar(50) NOT NULL,
    `Title` varchar(255) NOT NULL
);

INSERT INTO books VALUES ("A1111", "Herman Melville", "Moby Dick");
INSERT INTO books VALUES ("A2222", "Alexandre Dumas", "Il conte di Montecristo");
INSERT INTO books VALUES ("A3333", "Omero", "Odissea");

