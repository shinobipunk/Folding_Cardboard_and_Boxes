CREATE TABLE usuarios(
id INT( 4 ) NOT NULL AUTO_INCREMENT ,
nombre TEXT,
apaterno TEXT,
amaterno TEXT,
login VARCHAR( 40 ) NOT NULL ,
password VARCHAR( 80 ) NOT NULL ,
email TEXT,
nivel VARCHAR( 40 ) NOT NULL ,
UNIQUE KEY ( id )
);