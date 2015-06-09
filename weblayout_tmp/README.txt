===============================
Informationen zum Projektserver
===============================

Regeln im Umgang mit dem Projektserver:
 
  Der Projektserver wird ausschließlich für schulische Zwecke bereitgestellt.
  Er ist nicht als Ablage von z.B. privaten MP3-Sammlungen gedacht!
  
  Die Dateien Ihres Projektes werden nicht automatisch gesichert. Sie sind selbst für 
  regelmäßige Backups verantwortlich!
   
  Auf dem Projektserver befinden sich außer diesem Projekt noch weitere. 
  Unternehmen Sie nichts, was andere Projekte oder den Projektserver selbst
  in ihrer Funktion (zer-)stören kann.
  
  Die Ressourcen des Servers werden auf Fair-Use-Basis zwischen allen Projekten geteilt
  Benutzen Sie nur soviel, wie von ihrem Projekt unbedingt gebraucht wird. 
  
  Achten Sie darauf, welche Daten Sie auf Ihrer Projektwebseite verbreiten. Illegale 
  Inhalte werden ohne Vorwarnung gelöscht und das Projekt gesperrt. 
  Weitere Konsequenzen können folgen.
  
  Zu Beginn jedes Schuljahres werden alle Projekte des vergangenen Schuljahres automatisch
  gelöscht. Sie sind selbst für ein Backup verantwortlich!  
  

Ihnen stehen folgende Dienste zur Verfügung:

1. SFTP Dateizugriff & Upload
=============================

Um Dateien in den Projektbereich hochzuladen, wurde ein SFTP-Account konfiguriert
Benutzername: proj_ebiblio4b1, Passwort wie bei der Projekterstellung mitgeteilt

Im Dateiablagebereich /home/projekte/ebiblio4b1 befinden sich zwei beschreibbare Ordner
- htdocs: hier kommen alle Dateien hinein, die vom Webserver ausgeliefert werden sollen.
          Diese sind für JEDEN aus dem Internet unter Kenntnis des Dateinamens lesbar
	  bzw. bei Skriptdateien ausführbar!
- data: hier kommen alle Dateien hinein, die projektrelevant sind, aber nicht aus dem Internet 
        erreichbar sein sollen.

2. Webserver Apache + PHP
=========================

Der Webauftritt dieses Projektes ist aus dem TGM und im Internet unter der URL
  
  http://projekte.tgm.ac.at/ebiblio4b1 erreichbar.

Die Dateien des Webauftritts liegen im Heimatverzeichnis unter "htdocs"

3. MySQL-Datenbank
==================

Zu diesem Projekt wurde auch eine MySQL-Datenbank mit dem Namen proj_ebiblio4b1 konfiguriert
Unter http://projekte.tgm.ac.at/phpmyadmin kann diese verwaltet werden.
Benutzer: proj_ebiblio4b1, Passwort wie bei der Projekterstellung mitgeteilt. Mit den selben 
Zugangsdaten können Sie Webapplikationen (CMS etc.) Zugriff auf diese Datenbank erlauben.

Unter projekte.tgm.ac.at:3306 ist der MySQL-Server NUR aus dem TGM auch direkt zu erreichen.

Fragen, Wünsche & Anregungen bitte per Mail an 
  elist@tgm.ac.at
