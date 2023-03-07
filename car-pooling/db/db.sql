CREATE DATABASE IF NOT EXISTS CarPooling;

USE CarPooling;

CREATE TABLE IF NOT EXISTS utente
(
    id           INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome         VARCHAR(32)  NOT NULL,
    cognome      VARCHAR(32)  NOT NULL,
    email        VARCHAR(128) NOT NULL,
    num_telefono VARCHAR(16)  NOT NULL
    );

CREATE TABLE IF NOT EXISTS autista
(
    utente           INT  NOT NULL PRIMARY KEY REFERENCES utente (id),
    num_patente      INT  NOT NULL UNIQUE,
    scadenza_patente DATE NOT NULL,
    foto             VARCHAR(128)
    );

CREATE TABLE IF NOT EXISTS passeggero
(
    utente    INT NOT NULL PRIMARY KEY REFERENCES utente (id),
    documento VARCHAR(32)
    );

CREATE TABLE IF NOT EXISTS automobile
(
    utente    INT         NOT NULL PRIMARY KEY REFERENCES utente (id),
    marca     VARCHAR(32) NOT NULL,
    modello   VARCHAR(32) NOT NULL,
    targa     VARCHAR(16) NOT NULL UNIQUE,
    num_posti INT         NOT NULL CHECK (num_posti > 0)
    );

CREATE TABLE IF NOT EXISTS feedback
(
    id         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    voto       INT NOT NULL CHECK (voto > 0 AND voto < 6),
    giudizio   VARCHAR(256),
    autista    INT NOT NULL REFERENCES autista (utente),
    passeggero INT NOT NULL REFERENCES passeggero (utente)
    );

CREATE TABLE IF NOT EXISTS feedback_autista
(
    feedback INT NOT NULL REFERENCES feedback (id)
    );

CREATE TABLE IF NOT EXISTS feedback_passeggero
(
    feedback INT NOT NULL REFERENCES feedback (id)
    );

CREATE TABLE IF NOT EXISTS viaggio
(
    id             INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    autista        INT          NOT NULL REFERENCES autista (utente),
    citta_partenza VARCHAR(32)  NOT NULL,
    citta_arrivo   VARCHAR(32)  NOT NULL,
    data_partenza  DATETIME     NOT NULL,
    costo          DOUBLE CHECK (costo > 0),
    tempo          INT          NOT NULL CHECK (tempo > 0),
    prenotabile    BOOLEAN      NOT NULL,
    dettagli       VARCHAR(128) NOT NULL
    );

CREATE TABLE IF NOT EXISTS prenotazione
(
    viaggio    INT NOT NULL REFERENCES viaggio (id),
    passeggero INT NOT NULL REFERENCES passeggero (utente),

    PRIMARY KEY (viaggio, passeggero)
    );

CREATE TABLE IF NOT EXISTS sosta
(
    id      INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    viaggio INT         NOT NULL REFERENCES viaggio (id),
    luogo   VARCHAR(32) NOT NULL
    );
CREATE DATABASE IF NOT EXISTS CarPooling;

USE CarPooling;

CREATE TABLE IF NOT EXISTS utente
(
    id           INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome         VARCHAR(32)  NOT NULL,
    cognome      VARCHAR(32)  NOT NULL,
    email        VARCHAR(128) NOT NULL,
    num_telefono VARCHAR(16)  NOT NULL
    );

CREATE TABLE IF NOT EXISTS autista
(
    utente           INT  NOT NULL PRIMARY KEY REFERENCES utente (id),
    num_patente      INT  NOT NULL UNIQUE,
    scadenza_patente DATE NOT NULL,
    foto             VARCHAR(128)
    );

CREATE TABLE IF NOT EXISTS passeggero
(
    utente    INT NOT NULL PRIMARY KEY REFERENCES utente (id),
    documento VARCHAR(32)
    );

CREATE TABLE IF NOT EXISTS automobile
(
    utente    INT         NOT NULL PRIMARY KEY REFERENCES utente (id),
    marca     VARCHAR(32) NOT NULL,
    modello   VARCHAR(32) NOT NULL,
    targa     VARCHAR(16) NOT NULL UNIQUE,
    num_posti INT         NOT NULL CHECK (num_posti > 0)
    );

CREATE TABLE IF NOT EXISTS feedback
(
    id         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    voto       INT NOT NULL CHECK (voto > 0 AND voto < 6),
    giudizio   VARCHAR(256),
    autista    INT NOT NULL REFERENCES autista (utente),
    passeggero INT NOT NULL REFERENCES passeggero (utente)
    );

CREATE TABLE IF NOT EXISTS feedback_autista
(
    feedback INT NOT NULL REFERENCES feedback (id)
    );

CREATE TABLE IF NOT EXISTS feedback_passeggero
(
    feedback INT NOT NULL REFERENCES feedback (id)
    );

CREATE TABLE IF NOT EXISTS viaggio
(
    id             INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    autista        INT          NOT NULL REFERENCES autista (utente),
    citta_partenza VARCHAR(32)  NOT NULL,
    citta_arrivo   VARCHAR(32)  NOT NULL,
    data_partenza  DATETIME     NOT NULL,
    costo          DOUBLE CHECK (costo > 0),
    tempo          INT          NOT NULL CHECK (tempo > 0),
    prenotabile    BOOLEAN      NOT NULL,
    dettagli       VARCHAR(128) NOT NULL
    );

CREATE TABLE IF NOT EXISTS prenotazione
(
    viaggio    INT NOT NULL REFERENCES viaggio (id),
    passeggero INT NOT NULL REFERENCES passeggero (utente),

    PRIMARY KEY (viaggio, passeggero)
    );

CREATE TABLE IF NOT EXISTS sosta
(
    id      INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    viaggio INT         NOT NULL REFERENCES viaggio (id),
    luogo   VARCHAR(32) NOT NULL
    );
