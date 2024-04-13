DROP DATABASE IF EXISTS afa;
CREATE DATABASE afa;
USE afa;

-- Coaches Table
CREATE TABLE Coaches (
    cID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    coachName VARCHAR(50),
    teamName VARCHAR(50),
    Dob DATE,
    Gender CHAR(1),
    Email VARCHAR(100),
    Password varchar(255) NOT NULL

);

INSERT INTO Coaches(cID, coachName, teamName, Dob, Gender, Email, Password)
VALUES
(20, 'Sharkboy', 'Red Army Ladies', '1970-09-15', 'F', 'godwin.sharkboy@ashesi.edu.gh','$2y$10$znklrcVuK8cxpif.j4BW3uzPJptS80UBQoQGBcRv/WuZ7a9p/0qDq'),
(21, 'Sharma', 'Kasanoma Ladies FC', '1985-04-20', 'F', 'sharma@ashesi.edu.gh','$2y$10$n2.QbX8pifX45vt.0n9FMejtuSYPnizauZU1SxhYl7K.kdWJNbhgK' ),
(22, 'Samuel Wilson', 'Red Army', '1980-11-25', 'M', 'samuel.wilson@ashesi.edu.gh', '$2y$10$35Iz/F66Zn6mYhPcqTfQMuH/1/wEeNlTXB4GntCmWbjVf26Y6T6YC'),
(23, 'Kwasi Ankamah', 'Kasanoma FC', '1975-08-10', 'M', 'kwasi.ankamah@ashesi.edu.gh', '$2y$10$X3Jw8e2EJYDK5nr/J/kX1OgGxBbJVv.Tn4hRKOCQ0b/7NveT1HRFu'),
(24, 'Eugene Takyi Michah', 'Highlanders FC', '1972-03-15', 'M', 'eugene.tm@ashesi.edu.gh', '$2y$10$4WS7XfSJkwHZV4mQ1qrWDuYqKVv5C3F4NXEr/2gsZB5o2R3Nbs9f2'),
(25, 'Maame Ama', 'HighLite Ladies', '1990-06-30', 'F', 'maame.ama@ashesi.edu.gh', '$2y$10$lGT9Y90eDjT4h6S4DY4unecbyq3dm7LdBFBf5se1G6rrHnqUXuOiq'),
(26, 'Gerhard Nkansah', 'Elite', '1988-09-10', 'M', 'gerhard.nkansah@ashesi.edu.gh', '$2y$10$smv/2Aj3gTDr2AdOZ0FWzOKxY4smtzCNlL1X22TilpR5kxGxvQw6S'),
(27, 'Elijah Dickson', 'Legends United', '1983-12-05', 'M', 'elijah.dickson@ashesi.edu.gh', '$2y$10$1Fp7X7HkZ.SR14kg2BJc5eVdbSYXZ9EhXXF3ou.XUK/9rfgi/VkkC'),
(28, 'Kwadjo Nkrumah', 'Northside Ladies', '1992-02-20', 'F', 'kwadjo.nkrumah@ashesi.edu.gh', '$2y$10$lA1.uDpjV6rKPpzXGbqfUeHk8Zh5lEsJbqBL80NxEy5hDJU/ouzDW'),
(29, 'Ice Delly', 'Northside', '1979-07-10', 'M', 'ice.delly@ashesi.edu.gh', '$2y$10$L6cB1.9ckM/E6bBp3c7jOeKTYQeM.AHMsaBwQ6FrqD6pBSSVRwLna');


-- Teams Table
CREATE TABLE Teams (
    tID INT PRIMARY KEY NOT NULL,
    teamName VARCHAR(50),
    numberOfPlayers INT,
    coachID INT, -- Coach ID
    gender CHAR(1), -- 'M' for male, 'F' for female
    FOREIGN KEY (coachID) REFERENCES Coaches(cID)
);

INSERT INTO Teams (tID, teamName, numberOfPlayers, coachID, gender)
VALUES
(50, 'Red Army Ladies', 8, 20, 'F'),
(51, 'Kasanoma Ladies FC', 11, 21, 'F'),
(52, 'Red Army', 9, 22, 'M'),
(53, 'Kasanoma FC', 7, 23, 'M'),
(54, 'Highlanders FC', 10, 24, 'M'),
(55, 'HighLite Ladies', 6, 25, 'F'),
(56, 'Elite FC', 7, 26, 'M'),
(57, 'Legends United', 5, 27, 'M'),
(58, 'Northside Ladies', 8, 28, 'F'),
(59, 'Northside FC', 2, 29, 'M');

-- Players Table
CREATE TABLE Players (
    pID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    tID INT,
    playerName VARCHAR(50),
    Dob DATE,
    Gender CHAR(1),
    Email VARCHAR(100),
    Height DECIMAL(5,2),
    Weight DECIMAL(5,2),
    Position VARCHAR(50),
    Password varchar(255) NOT NULL,
    FOREIGN KEY (tID) REFERENCES Teams(tID)
);

INSERT INTO Players (pID, tID, playerName, Dob, Gender, Email, Height, Weight, Position, Password)
VALUES
(1, 50, 'Pfungwa Chipuru','1995-03-15', 'M', 'pfungwa.chipuru@ashesi.edu.gh', 180, 75, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(2, 51, 'Ariana Welbeck', '1997-06-20', 'F', 'ariana.welbeck@ashesi.edu.gh', 165, 55, 'Midfielder', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(3, 52, 'Konama Darteh', '1998-09-12', 'F', 'konama.darteh@ashesi.edu.gh', 170, 60, 'Goalkeeper', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(4, 53, 'Ako Eyo Oku', '1996-11-08', 'M', 'ako.eyo@ashesi.edu.gh', 175, 70, 'Defender', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(5, 54, 'Janice Eunice', '1999-02-25', 'F', 'janice.eunice@ashesi.edu.gh', 168, 58, 'Forward', '$2y$10$Z0NAGvQ6mJvitWaS4AiGvelDFREtma2g8fYr8By9jEWvkm/cWZUna'),
(6, 50, 'Karen Daisy',  '1994-05-30', 'F', 'karen.daisy@ashesi.edu.gh', 172, 62, 'Midfielder', '$2y$10$RSNQrmFjCScvI0c990piyulYDhV/qmF4gWmNtiZryllBHye0FHUMG'),
(7, 51, 'Julia Mc-Addy', '2002-08-07', 'F', 'julia.mc-addy@ashesi.edu.gh', 177.8, 57.8, 'Forward', '$2y$10$15zWKFRC3pnf.bYdyFJDpuKxmR4O/fcqY7nCT3UTUAcfKe6d9FMRS'),
(8, 52, 'Edna Tetteh', '1993-10-18', 'F', 'edna.tetteh@ashesi.edu.gh', 178, 72, 'Goalkeeper', '$2y$10$VndNBgfKMYteIBZTwOLRIeEZWD65EAQ5xPxNaEuX9TMX92Hr8/2Bi'),
(9, 53, 'Forgive Makafui', '1990-12-28', 'M', 'forgive.makafui@ashesi.edu.gh', 175, 68, 'Defender', '$2y$10$gNvorO2eesf3Jym2cBnd5ervAHZMRgMesVD1COKaSLnGpfEnH3966'),
(10, 54, 'Daniel Nkansah', '1991-04-05', 'M', 'daniel.nkansah@ashesi.edu.gh', 182, 78, 'Midfielder', '$2y$10$wW7zvfsmdqui2DhWbaECxuI0dD9bIynF9JCF2gIAllfhvGUORNT.u'),
(11, 56, 'Bassam Aoun',  '1988-07-20', 'M', 'bassam.aoun@ashesi.edu.gh', 185, 80, 'Forward', '$2y$10$rGEAl5FOBzzL15q6pbb48eh90zc7qulsxl82hsxkUnPB/qu7QiNfG'),
(12, 57, 'Charles Asare', '1992-09-15', 'M', 'charles.asare@ashesi.edu.gh', 176, 65, 'Midfielder', '$2y$10$8kI5wJJhTZXVB7UOqQXBr.79MexCm95kauIiFP9HcB9hB7mZQidn.'),
(13, 52, 'Yaw Ntim', '1987-12-10', 'M', 'yaw.ntim@ashesi.edu.gh', 182, 77, 'Goalkeeper', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(14, 53, 'Jason Gogo', '1995-02-28', 'M', 'jason.gogo@ashesi.edu.gh', 179, 74, 'Defender', '$2y$10$kuYGZux2Eez.pfR3DCapieNhzKIvlhia2XRHCXirY4WRPtYJgLwhO'),
(15, 54, 'Samuel Wilson', '1996-05-15', 'M', 'samuel.wilson@ashesi.edu.gh', 183, 79, 'Forward', '$2y$10$b0DvcbEj.Tjgneqz/ME9nOe07yP8JYKvIbdmpaaX32OMow7YUb/Nu'),
(16, 52, 'Michael Johnson', '1998-03-10', 'M', 'michael.johnson@ashesi.edu.gh', 185, 80, 'Defender', '$2y$10$bGcUw8cC32GWqsLKj2tCEeQpW32C0ahiczW0xUllS.cNRSdSlhAce'),
(17, 53, 'Emma Brown', '1995-11-03', 'F', 'emma.brown@ashesi.edu.gh', 170, 60, 'Goalkeeper', '$2y$10$rGEAl5FOBzzL15q6pbb48eh90zc7qulsxl82hsxkUnPB/qu7QiNfG'),
(18, 54, 'David Wilson', '1993-07-25', 'M', 'david.wilson@ashesi.edu.gh', 175, 70, 'Forward', '$2y$10$8kI5wJJhTZXVB7UOqQXBr.79MexCm95kauIiFP9HcB9hB7mZQidn.'),
(19, 50, 'Sophia Martinez',  '1994-01-12', 'F', 'sophia.martinez@ashesi.edu.gh', 168, 58, 'Midfielder', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(20, 51, 'James Lee',  '1991-12-30', 'M', 'james.lee@ashesi.edu.gh', 182, 78, 'Defender', '$2y$10$kuYGZux2Eez.pfR3DCapieNhzKIvlhia2XRHCXirY4WRPtYJgLwhO'),
(21, 52, 'Olivia Taylor', '1996-04-05', 'F', 'olivia.taylor@ashesi.edu.gh', 172, 62, 'Goalkeeper', '$2y$10$bGcUw8cC32GWqsLKj2tCEeQpW32C0ahiczW0xUllS.cNRSdSlhAce'),
(22, 59, 'Daniel Clark', '1989-08-18', 'M', 'daniel.clark@ashesi.edu.gh', 178, 72, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(23, 58, 'Emily White',  '1997-02-28', 'F', 'emily.white@ashesi.edu.gh', 175, 65, 'Midfielder', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(24, 59, 'Robert Johnson',  '1990-05-20', 'M', 'robert.johnson@ashesi.edu.gh', 177, 68, 'Forward', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(25, 51, 'Jessica Smith', '1993-09-15', 'F', 'jessica.smith@ashesi.edu.gh', 163, 53, 'Midfielder', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(26, 56, 'Patrick Brown', '1988-12-10', 'M', 'patrick.brown@ashesi.edu.gh', 180, 75, 'Defender', '$2y$10$Z0NAGvQ6mJvitWaS4AiGvelDFREtma2g8fYr8By9jEWvkm/cWZUna'),
(27, 53, 'Michelle Davis',  '1992-07-05', 'F', 'michelle.davis@ashesi.edu.gh', 168, 58, 'Goalkeeper', '$2y$10$RSNQrmFjCScvI0c990piyulYDhV/qmF4gWmNtiZryllBHye0FHUMG'),
(28, 54, 'Eric Smith','1991-04-18', 'M', 'eric.smith@ashesi.edu.gh', 185, 80, 'Forward', '$2y$10$b0DvcbEj.Tjgneqz/ME9nOe07yP8JYKvIbdmpaaX32OMow7YUb/Nu'),
(29, 50, 'Jennifer White',  '1994-08-10', 'F', 'jennifer.white@ashesi.edu.gh', 170, 60, 'Midfielder', '$2y$10$kuYGZux2Eez.pfR3DCapieNhzKIvlhia2XRHCXirY4WRPtYJgLwhO'),
(30, 53, 'Thomas Johnson', '1997-01-05', 'M', 'thomas.johnson@ashesi.edu.gh', 178, 72, 'Defender', '$2y$10$8kI5wJJhTZXVB7UOqQXBr.79MexCm95kauIiFP9HcB9hB7mZQidn.'),
(31, 52, 'Nicol Brown', '1995-03-20', 'F', 'nicole.brown@ashesi.edu.gh', 172, 62, 'Goalkeeper', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(32, 57, 'Kevin Davis','1990-06-15', 'M', 'kevin.davis@ashesi.edu.gh', 183, 79, 'Forward', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(33, 55, 'Rachel Smith', '1993-09-30', 'F', 'rachel.smith@ashesi.edu.gh', 165, 55, 'Midfielder', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(34, 59, 'Brandon White', '1996-12-25', 'M', 'brandon.white@ashesi.edu.gh', 176, 65, 'Defender', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(35, 55, 'Megan Johnson', '1998-05-20', 'F', 'megan.johnson@ashesi.edu.gh', 168, 58, 'Goalkeeper', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(36, 57, 'Adam Brown', '1989-03-10', 'M', 'adam.brown@ashesi.edu.gh', 182, 77, 'Forward', '$2y$10$wW7zvfsmdqui2DhWbaECxuI0dD9bIynF9JCF2gIAllfhvGUORNT.u'),
(37, 58, 'Sarah Davis', '1992-10-05', 'F', 'sarah.davis@ashesi.edu.gh', 175, 70, 'Midfielder', '$2y$10$b0DvcbEj.Tjgneqz/ME9nOe07yP8JYKvIbdmpaaX32OMow7YUb/Nu'),
(38, 56, 'Christopher Smith', '1991-02-18', 'M', 'christopher.smith@ashesi.edu.gh', 178, 72, 'Defender', '$2y$10$kuYGZux2Eez.pfR3DCapieNhzKIvlhia2XRHCXirY4WRPtYJgLwhO'),
(39, 50, 'Lauren White', '1994-07-10', 'F', 'lauren.white@ashesi.edu.gh', 170, 60, 'Goalkeeper', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(40, 53, 'Joshua Johnson',  '1997-10-05', 'M', 'joshua.johnson@ashesi.edu.gh', 183, 79, 'Forward', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(41, 55, 'Taylor Brown','1995-01-20', 'F', 'taylor.brown@ashesi.edu.gh', 172, 62, 'Midfielder', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(42, 58, 'Amanda Davis',  '1990-04-15', 'F', 'amanda.davis@ashesi.edu.gh', 175, 68, 'Defender', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(43, 54, 'Michael Smith',  '1988-09-30', 'M', 'michael.smith@ashesi.edu.gh', 180, 75, 'Goalkeeper', '$2y$10$wW7zvfsmdqui2DhWbaECxuI0dD9bIynF9JCF2gIAllfhvGUORNT.u'),
(44, 56, 'Alex Johnson','1993-12-25', 'M', 'alex.johnson@ashesi.edu.gh', 185, 80, 'Forward', '$2y$10$15zWKFRC3pnf.bYdyFJDpuKxmR4O/fcqY7nCT3UTUAcfKe6d9FMRS'),
(45, 58, 'Victoria White',  '1996-05-20', 'F', 'victoria.white@ashesi.edu.gh', 165, 55, 'Midfielder', '$2y$10$VndNBgfKMYteIBZTwOLRIeEZWD65EAQ5xPxNaEuX9TMX92Hr8/2Bi'),
(46, 52, 'Matthew Brown', '1989-08-10', 'M', 'matthew.brown@ashesi.edu.gh', 182, 77, 'Defender', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(47, 51, 'Elizabeth Davis',  '1992-11-05', 'F', 'elizabeth.davis@ashesi.edu.gh', 168, 58, 'Goalkeeper', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(48, 54, 'Andrew Smith', '1991-03-18', 'M', 'andrew.smith@ashesi.edu.gh', 175, 70, 'Forward', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(49, 58, 'Stephanie Johnson', '1994-06-10', 'F', 'stephanie.johnson@ashesi.edu.gh', 172, 62, 'Midfielder', '$2y$10$15zWKFRC3pnf.bYdyFJDpuKxmR4O/fcqY7nCT3UTUAcfKe6d9FMRS'),
(50, 59, 'Ryan Brown', '1997-09-05', 'M', 'ryan.brown@ashesi.edu.gh', 178, 72, 'Defender', '$2y$10$VndNBgfKMYteIBZTwOLRIeEZWD65EAQ5xPxNaEuX9TMX92Hr8/2Bi'),
(51, 59, 'Sam Davis',   '1995-02-20', 'M', 'samantha.davis@ashesi.edu.gh', 170, 60, 'Goalkeeper', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(52, 59, 'John Smith', '1990-05-15', 'M', 'john.smith@ashesi.edu.gh', 183, 79, 'Forward', '$2y$10$RSNQrmFjCScvI0c990piyulYDhV/qmF4gWmNtiZryllBHye0FHUMG'),
(53, 55, 'Christina Brown',  '1993-08-30', 'F', 'christina.brown@ashesi.edu.gh', 165, 55, 'Midfielder', '$2y$10$rGEAl5FOBzzL15q6pbb48eh90zc7qulsxl82hsxkUnPB/qu7QiNfG'),
(54, 56, 'David Johnson',  '1996-11-25', 'M', 'david.johnson@ashesi.edu.gh', 176, 65, 'Defender', '$2y$10$8kI5wJJhTZXVB7UOqQXBr.79MexCm95kauIiFP9HcB9hB7mZQidn.'),
(55, 51, 'Amanda White',  '1998-04-20', 'F', 'amanda.white@ashesi.edu.gh', 182, 77, 'Goalkeeper', '$2y$10$Z0NAGvQ6mJvitWaS4AiGvelDFREtma2g8fYr8By9jEWvkm/cWZUna'),
(56, 52, 'Christopher Smith',  '1989-07-10', 'M', 'christopher.smith@ashesi.edu.gh', 178, 72, 'Forward', '$2y$10$kuYGZux2Eez.pfR3DCapieNhzKIvlhia2XRHCXirY4WRPtYJgLwhO'),
(57, 51, 'Lauren Davis', '1992-12-05', 'F', 'lauren.davis@ashesi.edu.gh', 185, 80, 'Midfielder', '$2y$10$b0DvcbEj.Tjgneqz/ME9nOe07yP8JYKvIbdmpaaX32OMow7YUb/Nu'),
(58, 54, 'Matthew Brown',  '1991-01-18', 'M', 'matthew.brown@ashesi.edu.gh', 170, 60, 'Defender', '$2y$10$15zWKFRC3pnf.bYdyFJDpuKxmR4O/fcqY7nCT3UTUAcfKe6d9FMRS'),
(59, 55, 'Olivia Johnson', '1994-05-10', 'F', 'olivia.johnson@ashesi.edu.gh', 168, 58, 'Goalkeeper', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(60, 51, 'Michaela Brown', '1997-08-05', 'M', 'michaela.brown@ashesi.edu.gh', 183, 79, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(61, 57, 'Emma Davis',  '1995-11-20', 'F', 'emma.davis@ashesi.edu.gh', 172, 62, 'Midfielder', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(62, 58, 'James Smith','1990-02-15', 'M', 'james.smith@ashesi.edu.gh', 185, 80, 'Defender', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(63, 58, 'Madison White',  '1988-06-30', 'F', 'madison.white@ashesi.edu.gh', 170, 60, 'Goalkeeper', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(64, 50, 'Noah Brown', '1993-09-25', 'M', 'noah.brown@ashesi.edu.gh', 176, 65, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(65, 51, 'Isabella Johnson', '1998-12-20', 'F', 'isabella.johnson@ashesi.edu.gh', 165, 55, 'Midfielder', '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2'),
(66, 52, 'Daniel Smith','1989-01-10', 'M', 'daniel.smith@ashesi.edu.gh', 182, 77, 'Defender', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(67, 55, 'Sophia Davis', '1992-04-05', 'F', 'sophia.davis@ashesi.edu.gh', 185, 80, 'Goalkeeper', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(68, 54, 'Ethan Brown', '1991-07-18', 'M', 'ethan.brown@ashesi.edu.gh', 170, 60, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(69, 50, 'Abigail White',  '1994-10-10', 'F', 'abigail.white@ashesi.edu.gh', 168, 58, 'Midfielder', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(70, 56, 'James Brown',  '1997-01-05', 'M', 'james.brown@ashesi.edu.gh', 183, 79, 'Defender', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(71, 51, 'Charlotte White', '1995-03-20', 'F', 'charlotte.white@ashesi.edu.gh', 175, 70, 'Goalkeeper', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(72, 57, 'William Davis',  '1990-06-15', 'M', 'william.davis@ashesi.edu.gh', 178, 72, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(73, 54, 'Grace Smith',  '1993-09-30', 'F', 'grace.smith@ashesi.edu.gh', 165, 55, 'Midfielder', '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm'),
(74, 50, 'Josephina White', '1996-12-25', 'F', 'josephina.white@ashesi.edu.gh', 176, 65, 'Defender', '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO'),
(75, 51, 'Sophia Johnson',  '1998-05-20', 'F', 'sophia.johnson@ashesi.edu.gh', 165, 55, 'Goalkeeper', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(76, 52, 'Benjamin Brown',  '1989-08-10', 'M', 'benjamin.brown@ashesi.edu.gh', 180, 75, 'Forward', '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32'),
(77, 58, 'Madison Davis', '1992-11-05', 'F', 'madison.davis@ashesi.edu.gh', 185, 80, 'Midfielder', '$2y$10$15zWKFRC3pnf.bYdyFJDpuKxmR4O/fcqY7nCT3UTUAcfKe6d9FMRS'),
(78, 56, 'Andrew Smith', '1991-03-18', 'M', 'andrew.smith@ashesi.edu.gh', 175, 70, 'Defender', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS'),
(79, 55, 'Olivia Johnson',  '1994-06-10', 'F', 'olivia.johnson@ashesi.edu.gh', 170, 60, 'Goalkeeper', '$2y$10$8kI5wJJhTZXVB7UOqQXBr.79MexCm95kauIiFP9HcB9hB7mZQidn.'),
(80, 51, 'Amanda White', '1997-09-05', 'F', 'amanda.white@ashesi.edu.gh', 183, 79, 'Forward', '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS');



-- Players Stats Table
CREATE TABLE PlayersStats (
    pID INT,
    playerName VARCHAR(50),
    position VARCHAR(50),
    appearances INT,
    goalsScored INT,
    assists INT,
    passAccuracy DECIMAL(5,2),
    shotAccuracy DECIMAL(5,2),
    tackles INT,
    yellowCard INT,
    redCard INT,
    FOREIGN KEY (pID) REFERENCES Players(pID)
);

INSERT INTO PlayersStats (pID, playerName, position, appearances, goalsScored, assists, passAccuracy, shotAccuracy, tackles, yellowCard, redCard)
VALUES
(1, 'Pfungwa Chipuru', 'Forward', 10, 5, 3, 80.5, 70.2, 12, 2, 0),
(2, 'Ariana Welbeck', 'Midfielder', 12, 2, 7, 85.2, 60.0, 20, 3, 0),
(3, 'Konama Darteh', 'Goalkeeper', 8, 0, 0, 0, 0, 0, 0, 0),
(4, 'Ako Eyo Oku', 'Defender', 15, 1, 2, 0, 0, 35, 5, 1),
(5, 'Janice Eunice', 'Forward', 14, 8, 4, 78.3, 65.5, 10, 1, 0),
(6, 'Karen Daisy', 'Midfielder', 11, 3, 5, 82.0, 62.1, 15, 2, 0),
(7, 'Julia Mc-Addy', 'Forward', 9, 6, 2, 79.8, 68.9, 8, 1, 0),
(8, 'Edna Tetteh', 'Goalkeeper', 10, 0, 0, 0, 0, 0, 0, 0),
(9, 'Forgive Makafui', 'Defender', 13, 0, 1, 0, 0, 30, 4, 1),
(10, 'Daniel Nkansah', 'Midfielder', 16, 4, 6, 83.5, 67.8, 18, 2, 0),
(11, 'Bassam Aoun', 'Forward', 18, 10, 3, 77.9, 71.3, 9, 1, 0),
(12, 'Charles Asare', 'Midfielder', 14, 3, 4, 81.1, 64.7, 14, 3, 0),
(13, 'Yaw Ntim', 'Goalkeeper', 7, 0, 0, 0, 0, 0, 0, 0),
(14, 'Jason Gogo', 'Defender', 20, 2, 0, 0, 0, 40, 4, 0),
(15, 'Samuel Wilson', 'Forward', 17, 12, 5, 80.0, 75.5, 7, 1, 0),
(16, 'Michael Johnson', 'Defender', 18, 0, 1, 0, 0, 32, 3, 0),
(17, 'Emma Brown', 'Goalkeeper', 9, 0, 0, 0, 0, 0, 0, 0),
(18, 'David Wilson', 'Forward', 15, 7, 2, 79.2, 70.0, 6, 1, 0),
(19, 'Sophia Martinez', 'Midfielder', 12, 2, 3, 84.7, 63.4, 16, 2, 0),
(20, 'James Lee', 'Defender', 19, 1, 0, 0, 0, 38, 4, 0),
(21, 'Olivia Taylor', 'Goalkeeper', 8, 0, 0, 0, 0, 0, 0, 0),
(22, 'Daniel Clark', 'Forward', 16, 9, 3, 78.6, 68.0, 5, 1, 0),
(23, 'Emily White', 'Midfielder', 14, 4, 5, 81.5, 61.8, 12, 2, 0),
(24, 'Robert Johnson', 'Forward', 13, 6, 3, 76.8, 72.1, 8, 1, 0),
(25, 'Jessica Smith', 'Midfielder', 10, 1, 2, 83.2, 59.5, 14, 3, 0),
(26, 'Patrick Brown', 'Defender', 17, 0, 0, 0, 0, 34, 4, 0),
(27, 'Michelle Davis', 'Goalkeeper', 9, 0, 0, 0, 0, 0, 0, 0),
(28, 'Eric Smith', 'Forward', 19, 11, 4, 79.0, 70.8, 6, 1, 0),
(29, 'Jennifer White', 'Midfielder', 13, 3, 4, 82.1, 62.3, 11, 2, 0),
(30, 'Thomas Johnson', 'Defender', 20, 2, 0, 0, 0, 36, 4, 0),
(31, 'Nicole Brown', 'Goalkeeper', 10, 0, 0, 0, 0, 0, 0, 0),
(32, 'Kevin Davis', 'Forward', 18, 7, 3, 78.4, 67.5, 10, 1, 0),
(33, 'Rachel Smith', 'Midfielder', 16, 5, 6, 82.3, 61.5, 13, 2, 0),
(34, 'Brandon White', 'Defender', 14, 0, 0, 0, 0, 28, 3, 0),
(35, 'Megan Johnson', 'Goalkeeper', 12, 0, 0, 0, 0, 0, 0, 0),
(36, 'Adam Brown', 'Forward', 19, 10, 3, 77.8, 69.1, 7, 1, 0),
(37, 'Sarah Davis', 'Midfielder', 18, 3, 5, 80.8, 63.7, 14, 2, 0),
(38, 'Christopher Smith', 'Defender', 15, 0, 0, 0, 0, 30, 3, 0),
(39, 'Lauren White', 'Goalkeeper', 10, 0, 0, 0, 0, 0, 0, 0),
(40, 'Joshua Johnson', 'Forward', 18, 8, 4, 78.6, 68.5, 9, 1, 0),
(41, 'Taylor Brown', 'Midfielder', 16, 4, 6, 82.5, 63.8, 12, 2, 0),
(42, 'Amanda Davis', 'Defender', 17, 0, 0, 0, 0, 32, 4, 0),
(43, 'Michael Smith', 'Goalkeeper', 7, 0, 0, 0, 0, 0, 0, 0),
(44, 'Alex Johnson', 'Forward', 14, 6, 2, 77.0, 70.2, 8, 1, 0),
(45, 'Victoria White', 'Midfielder', 16, 2, 3, 84.0, 62.9, 15, 2, 0),
(46, 'Matthew Brown', 'Defender', 18, 0, 1, 0, 0, 34, 3, 0),
(47, 'Elizabeth Davis', 'Goalkeeper', 9, 0, 0, 0, 0, 0, 0, 0),
(48, 'Andrew Smith', 'Forward', 17, 9, 4, 79.2, 70.5, 6, 1, 0),
(49, 'Stephanie Johnson', 'Midfielder', 15, 3, 4, 82.3, 62.4, 11, 2, 0),
(50, 'Ryan Brown', 'Defender', 16, 0, 0, 0, 0, 32, 4, 0),
(51, 'Samantha Davis', 'Goalkeeper', 8, 0, 0, 0, 0, 0, 0, 0),
(52, 'Nathan Smith', 'Forward', 17, 7, 3, 78.5, 68.2, 9, 1, 0),
(53, 'Chelsea White', 'Midfielder', 14, 4, 5, 81.8, 61.3, 13, 2, 0),
(54, 'Justin Johnson', 'Defender', 18, 0, 1, 0, 0, 36, 3, 0),
(55, 'Nicolas Brown', 'Goalkeeper', 9, 0, 0, 0, 0, 0, 0, 0),
(56, 'Maria Davis', 'Forward', 20, 10, 3, 78.7, 69.0, 7, 1, 0),
(57, 'Jacob Smith', 'Midfielder', 19, 2, 5, 80.2, 63.0, 14, 2, 0),
(58, 'Lauren White', 'Defender', 16, 0, 0, 0, 0, 32, 3, 0),
(59, 'Joshua Johnson', 'Goalkeeper', 8, 0, 0, 0, 0, 0, 0, 0),
(60, 'Emily Smith', 'Forward', 17, 11, 4, 79.5, 70.1, 6, 1, 0),
(61, 'Alexander Brown', 'Midfielder', 15, 3, 4, 81.3, 64.0, 12, 2, 0),
(62, 'Jessica Davis', 'Defender', 16, 0, 0, 0, 0, 30, 4, 0),
(63, 'Daniel Smith', 'Goalkeeper', 7, 0, 0, 0, 0, 0, 0, 0),
(64, 'Abigail Johnson', 'Forward', 18, 9, 3, 78.4, 69.3, 8, 1, 0),
(65, 'Jacob White', 'Midfielder', 14, 2, 4, 81.7, 62.7, 13, 2, 0),
(66, 'Emily Brown', 'Defender', 18, 0, 1, 0, 0, 34, 3, 0),
(67, 'Michael Davis', 'Goalkeeper', 10, 0, 0, 0, 0, 0, 0, 0),
(68, 'Jennifer Smith', 'Forward', 16, 8, 2, 77.5, 69.5, 8, 1, 0),
(69, 'Matthew Johnson', 'Midfielder', 13, 4, 5, 80.6, 63.5, 11, 2, 0),
(70, 'Hannah Brown', 'Defender', 19, 0, 0, 0, 0, 36, 4, 0),
(71, 'Andrew Davis', 'Goalkeeper', 8, 0, 0, 0, 0, 0, 0, 0),
(72, 'Olivia Smith', 'Forward', 17, 11, 4, 79.1, 69.8, 7, 1, 0),
(73, 'Ethan White', 'Midfielder', 16, 2, 3, 83.8, 62.4, 14, 2, 0),
(74, 'Sophia Johnson', 'Defender', 15, 0, 0, 0, 0, 30, 3, 0),
(75, 'Jacob Brown', 'Goalkeeper', 13, 0, 0, 0, 0, 0, 0, 0),
(76, 'Isabella Davis', 'Forward', 20, 10, 3, 78.9, 69.2, 7, 1, 0),
(77, 'Noah Smith', 'Midfielder', 19, 2, 5, 80.3, 62.9, 14, 2, 0),
(78, 'Madison White', 'Defender', 16, 0, 0, 0, 0, 32, 3, 0),
(79, 'Elijah Johnson', 'Goalkeeper', 10, 0, 0, 0, 0, 0, 0, 0),
(80, 'Grace Brown', 'Forward', 18, 8, 4, 78.8, 69.3, 8, 1, 0);


CREATE TABLE FootballField (
    fID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    portionName VARCHAR(50) NOT NULL,
    portionDescription VARCHAR(255)
);

INSERT INTO FootballField (fID, portionName, portionDescription) VALUES
(1, 'Goal Area 1', 'The top area in front of the goal posts.'),
(2, 'Goal Area 2', 'The bottom area in front of the goal posts.'),
(3, 'Midfield 1', 'The central area of the field, between the two penalty boxes.'),
(4, 'Midfield 2', 'The central area of the field, between the two penalty boxes.');

-- Booking Table
CREATE TABLE Bookings (
    bID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    tID INT NOT NULL,
    dateBooked DATE,
    startTime TIME NOT NULL,
    fieldID INT(11) NOT NULL,
    FOREIGN KEY (tID) REFERENCES Teams(tID),
    FOREIGN KEY (fieldID) REFERENCES FootballField(fID)
);

INSERT INTO Bookings (tID, dateBooked, startTime, fieldID) VALUES
(55, '2024-04-11', '16:00:00', 1),
(59, '2024-04-11', '15:30:00', 2),
(52, '2024-04-11', '15:00:00', 3),
(51, '2024-04-11', '16:00:00', 4);


CREATE TABLE Matches (
    matchID INT PRIMARY KEY AUTO_INCREMENT,
    matchDate DATE,
    matchTime TIME,
    team1ID INT,
    team2ID INT,
    venue VARCHAR(100),
    status ENUM('Scheduled', 'Completed') DEFAULT 'Scheduled',
    FOREIGN KEY (team1ID) REFERENCES Teams(tID),
    FOREIGN KEY (team2ID) REFERENCES Teams(tID)
);

INSERT INTO Matches (matchID, matchDate, matchTime, team1ID, team2ID, venue) VALUES
(1,'2024-04-15', '15:00:00', 52, 53, 'Ash Pitch'),
(2,'2024-04-17', '16:30:00', 54, 55, 'Ash Pitch');



CREATE TABLE Attendance (
    attendanceID INT PRIMARY KEY AUTO_INCREMENT,
    matchID INT,
    playerID INT,
    attendance ENUM('Confirmed', 'Denied') DEFAULT NULL,
    FOREIGN KEY (matchID) REFERENCES Matches(matchID),
    FOREIGN KEY (playerID) REFERENCES Players(pID)
);

INSERT INTO Attendance (attendanceID, matchID, playerID, attendance) VALUES
(1, 1, 1, 'Confirmed'),
(2, 2, 2, 'Denied');


CREATE TABLE Admin(
    adminID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(100),
    Password varchar(255) NOT NULL
    
)