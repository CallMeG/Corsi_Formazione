USE Corsi_Formazione;



INSERT INTO Sede (Provincia, Comune, Via, N_Civico, CAP) VALUES
('VR', 'Fumane', 'San Martino', '1', '37022'),
('VE', 'Venezia', 'Antonio Cecchi', '132', '30131');

INSERT INTO Dipendente (ID_Sede, Nome, Cognome, CF, Data_Di_Nascita, Telefono, Email, Password) VALUES
(1, 'Marco', 'Porta', 'CKSZLG78B44Z337W', '1998-06-17', '3956678961', 'marcoporta@gmail.com', 'abc384d383bcf379219298806ffc9e7e'),  /*password: marcoporta1*/
(2, 'Davide', 'Marra', 'TBQNHF30B21A135D', '1994-02-19', '3967786344', 'davidemarra@gmail.com', '93510fdc930412993b8947c7e1cc136f'); /*password: davidemarra1*/


INSERT INTO Corso (ID_Sede, Nome, Data_Inizio, Data_Fine,Limite_Iscritti) VALUES
(1, 'Gestione di Database', '2020-06-13', '2020-07-16', 30),
(2, 'Corso di Sicurezza', '2020-08-13', '2020-10-16', 40),
(1, 'Python', '2020-08-13', '2020-09-13', 30),
(1, 'PHP', '2020-08-13', '2020-09-13',30),
(1, 'Photoshop', '2020-06-13', '2020-07-16',30),
(2, 'Intelligenza Artificiale', '2020-08-13', '2020-10-16',40),
(1, 'Pascal', '2020-06-13', '2020-07-16', 30),
(2, 'Javascript', '2020-06-13', '2020-07-16', 30),
(2, 'Microsoft Access', '2020-08-13', '2020-10-16', 40);

INSERT INTO Partecipazioni_Corsi  /* Non inserire valori in questa table durante il popolamento del db,si tratta solo di un esempio*/
VALUES (1, 1), (2, 2);


