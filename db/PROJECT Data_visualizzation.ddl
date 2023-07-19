-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jul 19 15:26:12 2023 
-- * LUN file: C:\xampp\htdocs\Tesi-Visualizzazioni\db\PROJECT Data_visualizzation.lun 
-- * Schema: Data_visualizzation/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Data_visualizzation;
use Data_visualizzation;


-- Tables Section
-- _____________ 

create table Registrazione (
     Momento date not null,
     Coordinata_X float(1) not null,
     Coordinata_Y float(1) not null,
     ID_Utente -- Index attribute not implemented -- not null,
     ID_Visualizzation -- Index attribute not implemented -- not null,
     constraint IDRegistrazione primary key (Momento));

create table Test (
     Nome char(1) not null,
     ID -- Index attribute not implemented -- not null,
     constraint IDTest_ID primary key (ID));

create table Utente (
     Nome char(1) not null,
     Cognome char(1) not null,
     ID -- Index attribute not implemented -- not null,
     constraint IDUtente_ID primary key (ID));

create table Visualizzation (
     link varchar(1),
     Photo varchar(1),
     ID -- Index attribute not implemented -- not null,
     ID_Test_Padre -- Index attribute not implemented -- not null,
     constraint IDVisualizzation primary key (ID));


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

-- Not implemented
-- alter table Utente add constraint IDUtente_CHK
--     check(exists(select * from Registrazione
--                  where Registrazione.ID_Utente = ID)); 

alter table Visualizzation add constraint FKCompostoDa
     foreign key (ID_Test_Padre)
     references Test (ID);


-- Index Section
-- _____________ 

