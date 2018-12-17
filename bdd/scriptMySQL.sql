## BD projet imag soft
CREATE DATABASE localDataBase;
USE localDataBase;

DROP TABLE IF EXISTS PossibleAnswer;
DROP TABLE IF EXISTS Poll;
DROP TABLE IF EXISTS Teacher;
DROP TABLE IF EXISTS Mark;
DROP TABLE IF EXISTS Course;
DROP TABLE IF EXISTS DailyTopic;
DROP TABLE IF EXISTS Administrator;
DROP TABLE IF EXISTS Contact;
DROP TABLE IF EXISTS Student;
DROP TABLE IF EXISTS Person;



/*CREATE TABLE Person(
  idPerson varchar(255) NOT NULL,
  emailAddress varchar(255),
  firstName varchar(255),
  lastName varchar(255),
  birthDate date,
  lastConnection timestamp,
  phoneNumber varchar(255),
  passWord varchar(255),
  PRIMARY KEY (idPerson)
);*/

CREATE TABLE Student(
  idPerson int NOT NULL AUTO_INCREMENT,
  emailAddress varchar(255),
  firstName varchar(255),
  lastName varchar(255),
  birthDate DATE,
  lastConnection DATETIME,
  phoneNumber varchar(255),
  login varchar(255),
  passWord varchar(255),
  university varchar(255),
  isArchived boolean,
  isEntrant boolean,
  isLearningAgreementValid boolean,
  dateLearningAgreementValid DATETIME,
  PRIMARY KEY (idPerson)
);

CREATE TABLE Contact(
  idContact int NOT NULL AUTO_INCREMENT,
  idPerson int,
  emailAddress varchar(255),
  firstName varchar(255),
  lastName varchar(255),
  phoneNumber varchar(255),
  affiliation varchar(255),
  description varchar(255),
  PRIMARY KEY (idContact),
  FOREIGN KEY (idPerson) REFERENCES Student(idPerson)
);

CREATE TABLE Administrator(
  idPerson int NOT NULL AUTO_INCREMENT,
  emailAddress varchar(255),
  firstName varchar(255),
  lastName varchar(255),
  birthDate date,
  lastConnection DATETIME,
  phoneNumber varchar(255),
  login varchar(255),
  passWord varchar(255),
  PRIMARY KEY (idPerson)
);

CREATE TABLE DailyTopic(
  idDailyTopic int NOT NULL AUTO_INCREMENT,
  idPerson int,
  dateDailyTopic date,
  description varchar(255),
  name varchar(255),
  PRIMARY KEY (idDailyTopic),
  FOREIGN KEY (idPerson) REFERENCES Student(idPerson)
);

CREATE TABLE Course(
  idCourse int NOT NULL AUTO_INCREMENT,
  idPerson int,
  description varchar(255),
  name varchar(255),
  ects int,
  lastCommentary varchar(255),
  teacherFullName varchar(255),
  teacherEmail varchar(255),
  PRIMARY KEY (idCourse),
  FOREIGN KEY (idPerson) REFERENCES Student(idPerson)
);

CREATE TABLE Mark(
  idMark int NOT NULL AUTO_INCREMENT,
  idCourse int NOT NULL,
  idPerson int NOT NULL,
  typeMark varchar(255),
  valueMark float,
  PRIMARY KEY (idMark),
  FOREIGN KEY (idCourse) REFERENCES Course(idCourse),
  FOREIGN KEY (idPerson) REFERENCES Student(idPerson)
);

CREATE TABLE Poll(
  idPoll int NOT NULL AUTO_INCREMENT,
  idCourse int NOT NULL,
  idPerson int NOT NULL,
  status varchar(255),
  question varchar(255),
  answer varchar(255),
  dateAnswer DATETIME,
  PRIMARY KEY (idPoll),
  FOREIGN KEY (idCourse) REFERENCES Course(idCourse)
);

CREATE TABLE PossibleAnswer(
  idPossibleAnswer int NOT NULL AUTO_INCREMENT,
  idPoll int NOT NULL,
  valuePossibleAnswer varchar(255),
  PRIMARY KEY (idPossibleAnswer),
  FOREIGN KEY (idPoll) REFERENCES Poll(idPoll) ON DELETE CASCADE
);

## Commandes utilies
## SHOW TABLE FROM localDataBase;
## DESCRIBE localDataBase.Administrator;




