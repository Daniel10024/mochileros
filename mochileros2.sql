/*   SCRIPT SQL  - Tablas con Restricciones -   */


CREATE DATABASE IF NOT EXISTS mochileros4 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE mochileros4;



CREATE TABLE usuario
       (
       ID_Usuario varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       Nombre CHAR(16) NOT NULL,                              
       Apellido CHAR(16) NOT NULL,                              
       Edad DATE NOT NULL,                              
       Pais CHAR(16) NOT NULL,                              
       Descripcion_U VARCHAR(255) NOT NULL,                              
       Contacto VARCHAR(30) NOT NULL,                              
       PRIMARY KEY
               (
               ID_Usuario
               )
       );



CREATE TABLE IDIOMAS
       (
       ID_IDIOMA BIGINT NOT NULL,                              
       IDIOMA varchar(32) NOT NULL,                              
       PRIMARY KEY
               (
               ID_IDIOMA
               )
       );

ALTER TABLE `IDIOMAS`
  MODIFY `ID_IDIOMA` BIGINT NOT NULL AUTO_INCREMENT;

CREATE TABLE ESCALA
       (
       ID_ESCALA BIGINT NOT NULL,                              
       ESCALA VARCHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_ESCALA
               )
       );

ALTER TABLE `ESCALA`
  MODIFY `ID_ESCALA` BIGINT NOT NULL AUTO_INCREMENT;

CREATE TABLE INTERES
       (
       ID_Interes BIGINT NOT NULL,                              
       Nombre VARCHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_Interes
               )
       );

ALTER TABLE `INTERES`
  MODIFY `ID_Interes` BIGINT NOT NULL AUTO_INCREMENT;

CREATE TABLE VIAJE
       (
       ID_VIAJE BIGINT NOT NULL,                              
       ID_Usuario varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       ID_ESCALA BIGINT NULL,                              
       NOMBRE CHAR(60) NOT NULL,                              
       PRIMARY KEY
               (
               ID_VIAJE,
               ID_Usuario
               ),
       FOREIGN KEY
               (
               ID_Usuario
               )
          REFERENCES usuario
               (
               ID_Usuario
               ),
       FOREIGN KEY
               (
               ID_ESCALA
               )
          REFERENCES ESCALA
               (
               ID_ESCALA
               )
       );

ALTER TABLE `VIAJE`
  MODIFY `ID_VIAJE` BIGINT NOT NULL AUTO_INCREMENT;

CREATE TABLE PUNTO
       (
       ID_PUNTO BIGINT NOT NULL,                              
       ID_VIAJE BIGINT NOT NULL,                              
       ID_Usuario varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       EJE_X BIGINT NOT NULL,                              
       EJE_Y BIGINT NOT NULL,                              
       FECHA_INICIO DATETIME NOT NULL,                              
       FECHA_FIN BIGINT NOT NULL,                              
       RADIO_EXTRA BIGINT NOT NULL,                              
       PRIMARY KEY
               (
               ID_PUNTO,
               ID_VIAJE,
               ID_Usuario
               ),
       FOREIGN KEY
               (
               ID_VIAJE,
               ID_Usuario
               )
          REFERENCES VIAJE
               (
               ID_VIAJE,
               ID_Usuario
               )
       );

ALTER TABLE `PUNTO`
  MODIFY `ID_PUNTO` BIGINT NOT NULL AUTO_INCREMENT;


CREATE TABLE solisitud
       (
       ID_solisitud BIGINT NOT NULL,                              
       User varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       Amigo varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       Estado TINYINT NOT NULL,                              
       PRIMARY KEY
               (
               ID_solisitud,
               User,
               Amigo
               ),
       FOREIGN KEY
               (
               User
               )
          REFERENCES usuario
               (
               ID_Usuario
               ),
       FOREIGN KEY
               (
               Amigo
               )
          REFERENCES usuario
               (
               ID_Usuario
               )
       );



CREATE TABLE HABLA
       (
       ID_IDIOMA BIGINT NOT NULL,                              
       ID_Usuario varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       PRIMARY KEY
               (
               ID_IDIOMA,
               ID_Usuario
               ),
       FOREIGN KEY
               (
               ID_IDIOMA
               )
          REFERENCES IDIOMAS
               (
               ID_IDIOMA
               ),
       FOREIGN KEY
               (
               ID_Usuario
               )
          REFERENCES usuario
               (
               ID_Usuario
               )
       );



CREATE TABLE LE_INTERESA
       (
       ID_PUNTO BIGINT NOT NULL,                              
       ID_VIAJE BIGINT NOT NULL,                              
       ID_Usuario varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
       ID_Interes BIGINT NOT NULL,                              
       PRIMARY KEY
               (
               ID_PUNTO,
               ID_VIAJE,
               ID_Usuario,
               ID_Interes
               ),
       FOREIGN KEY
               (
               ID_PUNTO,
               ID_VIAJE,
               ID_Usuario
               )
          REFERENCES PUNTO
               (
               ID_PUNTO,
               ID_VIAJE,
               ID_Usuario
               ),
       FOREIGN KEY
               (
               ID_Interes
               )
          REFERENCES INTERES
               (
               ID_Interes
               )
       );


CREATE TABLE `publicacion` (
  `ID_Publicacion` int(11) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comentario` varchar(640) NOT NULL,
  `Publico` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`ID_Publicacion`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Usuario_2` (`ID_Usuario`),
  ADD KEY `ID_Usuario_3` (`ID_Usuario`);


ALTER TABLE `publicacion`
  MODIFY `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;









