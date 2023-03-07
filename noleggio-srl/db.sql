CREATE DATABASE IF NOT EXISTS NoleggioSRL;

USE NoleggioSRL;

CREATE TABLE IF NOT EXISTS Film (
    codiceFilm INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(50) NOT NULL,
    regista VARCHAR(50) NOT NULL,
    anno INTEGER NOT NULL,
    costoNoleggio DECIMAL(5,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS Artisti (
    codiceAttore INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cognome VARCHAR(50) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    dataNascita DATE NOT NULL,
    nazionalità VARCHAR(50) NOT NULL,
    sesso VARCHAR(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS Interpretazioni (
    codiceFilm INTEGER NOT NULL,
    codiceAttore INTEGER NOT NULL,
    personaggio VARCHAR(50) NOT NULL,

    PRIMARY KEY (codiceFilm, codiceAttore),
    FOREIGN KEY (codiceFilm) REFERENCES Film(codiceFilm),
    FOREIGN KEY (codiceAttore) REFERENCES Artisti(codiceAttore)
);

-- 1. film col costo di noleggio maggiore
SELECT Film.titolo, MAX(Film.costoNoleggio) AS costoNoleggioMassimo
FROM Film
GROUP BY Film.costoNoleggio;

-- 2. film col costo di noleggio minore
SELECT Film.titolo, MIN(Film.costoNoleggio) AS costoNoleggioMinimo
FROM Film
GROUP BY Film.costoNoleggio;

-- 3. num film per artista
SELECT Interpretazioni.codiceAttore, COUNT(Interpretazioni.codiceFilm) as numFilm
FROM Interpretazioni
GROUP BY Interpretazioni.codiceAttore;

-- 4. titolo del film e relativi personaggi
SELECT Film.titolo, Interpretazioni.personaggio
FROM Film LEFT JOIN Interpretazioni
ON Film.codiceFilm = Interpretazioni.codiceFilm;

-- 5. tutti gli artisti di sesso femminile
SELECT *
FROM Artisti
WHERE Artisti.sesso = 'F';

-- 6. tutti gli artisti minorenni alla data di oggi (NOW)
SELECT *
FROM Artisti
WHERE Artisti.dataNascita > DATE_SUB(NOW(), INTERVAL 18 YEAR);

-- 7. per ogni nazionalità il numero di artisti
SELECT Artisti.nazionalità, COUNT(Artisti.codiceAttore) as numArtisti
FROM Artisti
GROUP BY Artisti.nazionalità;

-- 8. titolo del film e nome cognome degli artisti che l'hanno interpretato
SELECT Film.titolo, Artisti.nome, Artisti.cognome
FROM Film LEFT JOIN Interpretazioni
ON Film.codiceFilm = Interpretazioni.codiceFilm
JOIN Artisti
ON Interpretazioni.codiceAttore = Artista.codiceArtista;