CREATE TABLE Alumnos (
    alumno_id SERIAL PRIMARY KEY NOT NULL,
    alumno_nombre1 VARCHAR(30) NOT NULL,
    alumno_nombre2 VARCHAR(30) NOT NULL,
    alumno_apellido1 VARCHAR(30) NOT NULL,
    alumno_apellido2 VARCHAR(30),
    alumno_grado VARCHAR(30) NOT NULL,
    alumno_arma_o_servicio VARCHAR(30) NOT NULL,
    alumno_nacionalidad VARCHAR(30) NOT NULL,
    alumno_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Materias (
    materia_id SERIAL PRIMARY KEY NOT NULL,
    materia_nombre VARCHAR(50) NOT NULL,
    materia_situacion SMALLINT DEFAULT 1

);

CREATE TABLE Notas (
    nota_id SERIAL PRIMARY KEY NOT NULL,
    nota_alumno_id INT,
    nota_materia_id INT,
    nota DECIMAL,
    nota_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (nota_alumno_id) REFERENCES Alumnos(alumno_id),
    FOREIGN KEY (nota_materia_id) REFERENCES Materias(materia_id)
);


CREATE TABLE grados(
    grado_id SERIAL PRIMARY KEY NOT NULL,
    grado_nombre VARCHAR(50)
);


CREATE TABLE armas(
    arma_id SERIAL PRIMARY KEY NOT NULL,
    arma_nombre VARCHAR(50)
);



INSERT INTO armas (arma_nombre) VALUES ('Infanteria');
