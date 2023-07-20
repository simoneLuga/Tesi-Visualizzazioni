-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jul 19 15:31:23 2023 
-- * LUN file: C:\xampp\htdocs\Tesi-Visualizzazioni\db\PROJECT Data_visualizzation.lun 
-- * Schema: Data_visualizzation/1 
-- ********************************************* 


-- Database Section
-- ________________ 
drop database if exists Data_visualizzation;
CREATE DATABASE Data_visualizzation;
use Data_visualizzation;


-- Tables Section
-- _____________ 

create table Registrazione (
     Momento date not null,
     Coordinata_X float(1) not null,
     Coordinata_Y float(1) not null,
     ID_Utente int not null,
     ID_Visualizzation int not null,
     PRIMARY KEY (Momento));

create table Test (
     Nome varchar(50)  not null,
     ID int not null AUTO_INCREMENT,
     UtenteCreatore_ID int not null,
     primary key (ID));

create table Utente (
     Nome varchar(30)  not null,
     Cognome varchar(30) not null,
     ID int not null AUTO_INCREMENT,
     Pass varchar(30),
     primary key (ID));

create table Visualizzation (
     link varchar(1),
     Photo varchar(1),
     ID int not null AUTO_INCREMENT,
     ID_Test_Padre int not null,
     primary key (ID));


-- Constraints Section
-- ___________________ 

alter table Registrazione add constraint FKRegistra
     foreign key (ID_Utente)
     references Utente (ID);

alter table Registrazione add constraint FKCosa
     foreign key (ID_Visualizzation)
     references Visualizzation (ID);

-- Not implemented
-- alter table Test add constraint IDTest_CHK
--     check(exists(select * from Visualizzation
--                  where Visualizzation.ID_Test_Padre = ID)); 

alter table Test add constraint FKCrea
     foreign key (UtenteCreatore_ID)
     references Utente (ID);
     
-- Not implemented
-- alter table Utente add constraint IDUtente_CHK
--     check(exists(select * from Registrazione
--                  where Registrazione.ID_Utente = ID)); 

alter table Visualizzation add constraint FKCompostoDa
     foreign key (ID_Test_Padre)
     references Test (ID);


-- Index Section
-- _____________ 

