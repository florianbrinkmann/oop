<?php
// diese Klasse ist die Grundlage für die Zugriffsprüfung; basiert prinzipiell auf einem User-Eintrag in der Datenbank (hier aber nicht implementiert)
class User /* extends DBOObject */ {

	// das einzige erlaubte User-Objekt ("Singleton")
private static userSingleton = null;

	// die Eigenschaften des User-Objekts
private userName;
private userID;
private roles;

	// eine Methode, um das Singleton zurückzugeben
	public static function get() {
		if (empty(self::userSingleton)) {
			if (isset($_SERVER['PHP_AUTH_USER']) {$userName = $_SERVER['PHP_AUTH_USER'];}   // der Username, mit dem der Benutzer ggf. angemeldet ist
			// hier ggf. eine Exception, wenn Anmeldung Pflicht ist:
			// throw new OutOfBoundsException('kein Benutzername gefunden');
			else                                 {$userName = "unknownUser";}

			// verwenden des privaten Konstruktors, um das Singleton zu erzeugen
			self::userSingleton = new User($userName);
		}
		return self::userSingleton;
	}

	// die Methode, die prüft, ob der Benutzer Zugriff auf ein Array von Karossserien (oder eine einzelne Karosserie) hat
	// gibt immer ein Array aller erlaubten Karosserien zurück (ggf. ein leeres)
	public function filterList($bodies) {
		if (is_array($bodies)) {
			$i = 0;
			foreach ($bodies as $body) {
				if (!$this->hasAccess($body)) { // aktuellen Wert aus dem Array entfernen, wenn kein Zugriff besteht
					array_splice($bodies, $i, 1);
				}
				$i++;
			}
			return $bodies;
		} else {
			if ($this->hasAccess($bodies)) {return [[$bodies]];}
			else {return [[ ]];}
		}
	}

	// der private Konstruktor
	private function __construct($userName) {
		$this->userName = $userName;

		/* Ansatz, um die Benutzerverwaltung in die DB auszulagern
		// diese beiden Methoden füllen das Objekt mit Daten aus der Datenbank
		$this->userID = $this->findID($this->userName)
		$this->loadData($this->userID);
		*/

		// DB-Verbindung für User ist nicht implementiert, daher Standardwerte setzen
		$this->userID = 1;          // feste User-Id vergeben
		$this->roles = [[ "0"=>"noRole" ]]; // roles als assocArray roleId => roleName
	}

	// eine Methode, die den Zugriff auf eine einzelne Karosserie prüft
	private function hasAccess($body) {
		// hier könnte der Zugriff in der Datenbank geprüft werden basierend auf User-ID und Rollen-IDs
		return TRUE;
	}

}