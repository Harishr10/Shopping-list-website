# Shoppinglistwithphp
CRUD-Applikation mit MySQL und PHP
Diese CRUD-Applikation ermöglicht es Benutzern, grundlegende Create, Read, Update und Delete (CRUD)-Operationen auf einer MySQL-Datenbank durchzuführen. Die Anwendung wurde mithilfe von PHP entwickelt und bietet eine einfache Benutzeroberfläche für die Verwaltung von Daten.

Installation
Datenbank einrichten: Erstellen Sie eine MySQL-Datenbank und importieren Sie das bereitgestellte SQL-Skript (database.sql), um die erforderlichen Tabellen zu erstellen.

Konfiguration: Öffnen Sie die Datei config.php und passen Sie die Verbindungsparameter (Datenbankname, Benutzername, Passwort) entsprechend Ihrer MySQL-Installation an.

php
Copy code
// config.php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'crud_app');
Webserver einrichten: Stellen Sie sicher, dass Ihr Webserver (z.B. Apache, Nginx) ordnungsgemäß konfiguriert ist und die Dateien der CRUD-Applikation zugänglich sind.
Verwendung
Anmeldung: Öffnen Sie die Anwendung im Webbrowser und melden Sie sich mit den bereitgestellten Anmeldeinformationen an.

Hauptseite: Nach der Anmeldung sehen Sie die Hauptseite mit den verfügbaren CRUD-Operationen.

Create: Fügen Sie neue Daten hinzu, indem Sie das entsprechende Formular ausfüllen und auf "Hinzufügen" klicken.

Read: Sehen Sie sich die vorhandenen Datensätze an und navigieren Sie durch die Seiten.

Update: Bearbeiten Sie vorhandene Datensätze, indem Sie auf "Bearbeiten" klicken, Änderungen vornehmen und auf "Aktualisieren" klicken.

Delete: Löschen Sie Datensätze, indem Sie auf "Löschen" klicken und die Bestätigung durchführen.

Beitrag und Unterstützung
Wenn Sie zur Weiterentwicklung dieses Projekts beitragen möchten, folgen Sie den Beitragsrichtlinien. Bei Problemen oder Fragen nutzen Sie bitte die Issues.
