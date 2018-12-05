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
  idPerson varchar(255) NOT NULL,
  emailAddress varchar(255),
  firstName varchar(255),
  lastName varchar(255),
  birthDate date,
  lastConnection timestamp,
  phoneNumber varchar(255),
  login varchar(255),
  passWord varchar(255),
  university varchar(255),
  isArchived boolean,
  isEntrant boolean,
  PRIMARY KEY (idPerson)
);

CREATE TABLE Contact(
  idContact varchar(255) NOT NULL,
  idPerson varchar(255),
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
  idPerson varchar(255) NOT NULL,
  emailAddress varchar(255),
  firstName varchar(255),
  lastName varchar(255),
  birthDate date,
  lastConnection timestamp,
  phoneNumber varchar(255),
  login varchar(255),
  passWord varchar(255),
  PRIMARY KEY (idPerson)
);

CREATE TABLE DailyTopic(
  idDailyTopic varchar(255) NOT NULL,
  idPerson varchar(255),
  dateDailyTopic date,
  description varchar(255),
  name varchar(255),
  PRIMARY KEY (idDailyTopic),
  FOREIGN KEY (idPerson) REFERENCES Student(idPerson)
);

CREATE TABLE Course(
  idCourse varchar(255) NOT NULL,
  idPerson varchar(255),
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
  idMark varchar(255) NOT NULL,
  idCourse varchar(255) NOT NULL,
  idPerson varchar(255) NOT NULL,
  typeMark varchar(255),
  valueMark float,
  PRIMARY KEY (idMark),
  FOREIGN KEY (idCourse) REFERENCES Course(idCourse),
  FOREIGN KEY (idPerson) REFERENCES Student(idPerson)
);

CREATE TABLE Poll(
  idPoll varchar(255) NOT NULL,
  idCourse varchar(255) NOT NULL,
  idPerson varchar(255) NOT NULL,
  status varchar(255),
  question varchar(255),
  answer varchar(255),
  dateAnswer timestamp,
  PRIMARY KEY (idPoll),
  FOREIGN KEY (idCourse) REFERENCES Course(idCourse)
);

CREATE TABLE PossibleAnswer(
  idPossibleAnswer varchar(255) NOT NULL,
  idPoll varchar(255) NOT NULL,
  valuePossibleAnswer varchar(255),
  PRIMARY KEY (idPossibleAnswer),
  FOREIGN KEY (idPoll) REFERENCES Poll(idPoll)
);

## Commandes utilies
## SHOW TABLE FROM localDataBase;
## DESCRIBE localDataBase.Administrator;




