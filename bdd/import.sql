/*Insert into Person values ('1', 'person001@gmail.com', 'Jean', 'Dupont', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33487256897', 'root');
Insert into Person values ('2', 'person002@gmail.com', 'Alice', 'Clerc', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33487256897', 'root');
Insert into Person values ('3', 'person003@gmail.com', 'Benoit', 'Dumas', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33487256897', 'root');
Insert into Person values ('4', 'person004@gmail.com', 'Marie', 'Lambert', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000004', 'root');
Insert into Person values ('5', 'person005@gmail.com', 'Alexandra', 'Duris', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000005', 'root');
Insert into Person values ('6', 'person006@gmail.com', 'Quentin', 'Moro', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000006', 'root');
Insert into Person values ('7', 'person007@gmail.com', 'Claude', 'Ruyf', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000007', 'root');
Insert into Person values ('8', 'person008@gmail.com', 'Virginie', 'Lemaire', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000008', 'root');
Insert into Person values ('9', 'person009@gmail.com', 'Chloe', 'Lewom', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000009', 'root');
Insert into Person values ('10', 'person010@gmail.com', 'Martin', 'Man', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000010', 'root');
Insert into Person values ('11', 'person011@gmail.com', 'Xavier', 'Norti', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000011', 'root');
Insert into Person values ('12', 'person012@gmail.com', 'Marie', 'Latour', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000012', 'root');*/

Insert into Student values ('1', 'person001@gmail.com', 'Jean', 'Dupont', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33487256897', 'root', 'UGA', false, false);
Insert into Student values ('2', 'person002@gmail.com', 'Alice', 'Clerc', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33487256897', 'root', 'UGA', false, false);
Insert into Student values ('3', 'person003@gmail.com', 'Benoit', 'Dumas', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33487256897', 'root','UGA', false, true);
Insert into Student values ('4', 'person004@gmail.com', 'Marie', 'Lambert', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000004', 'root','UPMF', true, false);
Insert into Student values ('6', 'person006@gmail.com', 'Quentin', 'Moro', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000006', 'root', 'ENSIMAG', true, false);
Insert into Student values ('7', 'person007@gmail.com', 'Claude', 'Ruyf', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000007', 'root','UJF', false, false);
Insert into Student values ('8', 'person008@gmail.com', 'Virginie', 'Lemaire', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000008', 'root', 'UPMF', true, false);
Insert into Student values ('9', 'person009@gmail.com', 'Chloe', 'Lewom', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000009', 'root', 'UGA', false, false);
Insert into Student values ('10', 'person010@gmail.com', 'Martin', 'Man', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000010', 'root', 'UGA', true, false);
Insert into Student values ('11', 'person011@gmail.com', 'Xavier', 'Norti', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000011', 'root', 'Jean-Moulin', true, true);
Insert into Student values ('12', 'person012@gmail.com', 'Marie', 'Latour', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000012', 'root', 'UPMF', true, false);

Insert into Contact values ('1', '1', 'cont001@gmail.com', 'Lucie', 'Prevert', '0620000001', 'affiliation1', 'descriptionContact001');
Insert into Contact values ('2', '1', 'cont001@gmail.com', 'Alain', 'Dante', '0620000002', 'affiliation2', 'descriptionContact002');
Insert into Contact values ('3', '1', 'cont001@gmail.com', 'Pierre', 'Drut', '0620000003', 'affiliation3', 'descriptionContact003');
Insert into Contact values ('4', '2', 'cont001@gmail.com', 'Melanie', 'Tullin', '0620000004', 'affiliation4', 'descriptionContact004');
Insert into Contact values ('5', '3', 'cont001@gmail.com', 'Claire', 'Vallier', '0620000005', 'affiliation5', 'descriptionContact005');
Insert into Contact values ('6', '4', 'cont001@gmail.com', 'Thomas', 'Huto', '0620000006', 'affiliation6', 'descriptionContact006');

Insert into Administrator values ('5', 'person005@gmail.com', 'Alexandra', 'Duris', '2003/01/22 01:00:00', '2003/01/22 01:00:00', '+33610000005', 'root');

Insert into DailyTopic values ('1', '1', '2003/01/22 01:00:00', 'descriptionDT001', 'I am well arrived !');
Insert into DailyTopic values ('2', '2', '2003/01/22 01:00:00', 'descriptionDT002', 'Happy to integrate the football team');
Insert into DailyTopic values ('3', '3', '2003/01/22 01:00:00', 'descriptionDT003', 'Canada is a nice country');
Insert into DailyTopic values ('4', '4', '2003/01/22 01:00:00', 'descriptionDT004', 'Looking for a new smartphone ?');

Insert into Course values ('1', '1','descriptionCourse001',  'English', 3, 'last commentary 1');
Insert into Course values ('2', '2','descriptionCourse002',  'Mathematics', 3, 'last commentary 2');
Insert into Course values ('3', '2','descriptionCourse003',  'Biology', 3, 'last commentary 3');
Insert into Course values ('4', '3','descriptionCourse004',  'Algorithms', 3, 'last commentary 4');

Insert into Mark values ('1', '1', '1','QCM', 8.5);
Insert into Mark values ('2', '1', '1','CC', 15);
Insert into Mark values ('3', '1', '1','CC', 10);
Insert into Mark values ('4', '2', '2','DM', 6.5);
Insert into Mark values ('5', '2', '2','Examen', 19);
Insert into Mark values ('6', '2', '2','Partiel', 11);
Insert into Mark values ('7', '3', '3','Partiel', 15);
Insert into Mark values ('8', '3', '3','CC', 3);
Insert into Mark values ('9', '3', '3','QCM', 12.5);

Insert into Poll values ('1', '1','Sent', 'Which color do you prefer ?', null, null);
Insert into Poll values ('2', '2','Answered', 'Are you intagrated ?', 'Pretty well', '2017/11/07 01:00:00');
Insert into Poll values ('3', '3','Sent', 'Do you need help for this chapter ?', null, null);
Insert into Poll values ('4', '3','Answered', 'Have you forgotten your headset ?', 'No', '2018/05/28 01:00:00');

Insert into PossibleAnswer values ('1', '1','Blue');
Insert into PossibleAnswer values ('2', '1','Red');
Insert into PossibleAnswer values ('3', '1','Yellow');
Insert into PossibleAnswer values ('4', '1','Green');
Insert into PossibleAnswer values ('5', '2','Very well');
Insert into PossibleAnswer values ('6', '2','Pretty well');
Insert into PossibleAnswer values ('7', '2','Not at all');
Insert into PossibleAnswer values ('8', '3','Yes');
Insert into PossibleAnswer values ('9', '3','No');
Insert into PossibleAnswer values ('10', '4','Yes');
Insert into PossibleAnswer values ('11', '4','No');
