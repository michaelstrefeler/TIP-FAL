#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS db_Books;
CREATE DATABASE IF NOT EXISTS db_Books;
use db_Books;

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        username       Varchar (30) NOT NULL ,
        password       Varchar (60) NOT NULL ,
        firstName      Varchar (60) NOT NULL ,
        lastName       Varchar (60) NOT NULL ,
        meansOfContact Varchar (30) NOT NULL ,
        contactInfo    Varchar (255) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (username)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: book
#------------------------------------------------------------

CREATE TABLE book(
        idBook      Int  Auto_increment  NOT NULL ,
        title       Text NOT NULL ,
        editor      Varchar (255) NOT NULL ,
        language    Varchar (10) NOT NULL ,
        releaseYear Int NOT NULL ,
        releaseDate Varchar (60) NOT NULL,
		genre		Varchar (80) NOT NULL
	,CONSTRAINT book_PK PRIMARY KEY (idBook)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sells
#------------------------------------------------------------

CREATE TABLE sells(
        username Varchar (30) NOT NULL ,
        idBook   Int NOT NULL
	,CONSTRAINT sells_PK PRIMARY KEY (username,idBook)

	,CONSTRAINT sells_user_FK FOREIGN KEY (username) REFERENCES user(username)
	,CONSTRAINT sells_book0_FK FOREIGN KEY (idBook) REFERENCES book(idBook)
)ENGINE=InnoDB;

