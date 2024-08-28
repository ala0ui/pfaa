create database gestion_de_stage;
use gestion_de_stage;
drop database gestion_de_stage;
create table Stagiaire (
cin varchar(30) primary key,
nom varchar(30),
prenom varchar(30),
genre varchar(15),
etablissement varchar(60),
diplome varchar(30),
gmail varchar(60),
tele varchar(10)
);
create table admin (
cin varchar(30),foreign key (cin) references Stagiaire (cin),
cinA varchar(30),
nomA varchar(30),
prenomA varchar(30),
primary key (cin,cinA)
);
insert into Stagiaire values ("FA123","Alaoui","Abdelhamid","homme","Université Sidi Mohammed Ben Abdellah - Fès","developpement informatique","Abdelhamid@gmail.com","0606020112");
insert into admin values ("FA123","AD321","Doua","Diyae");