/*Tutti i corsi ai quali partecipa il dipendente con ID = 1:*/

SELECT corso.Nome, corso.Data_Inizio, corso.Data_Fine
FROM Dipendente as d INNER JOIN partecipazioni_corsi as part 
ON d.ID_Dipendente = part.ID_Dipendente INNER JOIN corso ON 
part.ID_Corso = corso.ID_Corso
WHERE d.ID_Dipendente = 1;

/*Nome e Cognome dei dipendenti che partecipano al corso di Python:*/
SELECT d.Nome, d.Cognome from Dipendente as d INNER JOIN partecipazioni_corsi as part ON d.ID_Dipendente = part.ID_Dipendente INNER JOIN Corso as c ON part.ID_Corso = c.ID_Corso WHERE c.Nome = "Python";
