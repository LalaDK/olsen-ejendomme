<?php
class DG {
	static $firstnames = array(
		'Mads',
		'Thomas',
		'Katrine',
		'Rie',
		'Carsten',
		'Ricki',
		'Lars',
		'Jørgen',
		'Anne',
		'Inge',
		'Frederik',
		'Lotte',
		'Hans',
		'Jens',
		'Daniel',
		'Lise',
		'Trine',
		'Sandra',
		'Camilla',
		'Peter',
		'Jens Peter',
		'Louise',
		'Brian',
		'Dennis');

	static $middlenames = array(
		'Dam',
		'Eckardt',
		'Leonhard',
		'Frank',
		'Sunddahl',
		'Eskeline',
		'Warberg',
		'Støjberg',
		'Graakjær',
		'Dambjerg',
		'Aaby',
		'Løkke');

	static $lastnames = array(
		'Jensen',
		'Hansen',
		'Jørgensen',
		'Sørensen',
		'Troelsen',
		'Iversen',
		'Frederiksen',
		'Olesen',
		'Christensen',
		'Larsen',
		'Madsen');

	static $streets = array(
		'Vesterbrogade', 
		'Sundbyvestervej', 
		'Øresundsvej', 
		'HC Andersens Boulevard', 
		'Nabovej', 
		'Lergravsvej', 
		'Kunstvej',
		'Østerbrovej',
		'Sandvej',
		'Lokumsstræde',
		'Fugle Allé',
		'Duevej',
		'Dronning Olga Vej',
		'Kakaogade', 
		'Jensens Allé',
		'Sandgade',
		'Villavej');

	static $cities = array(
		'København',
		'Århus',
		'Odense',
		'Toftlund',
		'Hellerup',
		'Tønder',
		'Haderslev',
		'Vojens',
		'Nordborg',
		'Sønderborg',
		'Kolding',
		'Holsterbro',
		'Varde',
		'Vejen');

	public static function streetname() {
		return DG::$streets[rand(0, sizeof(DG::$streets)-1)];
	}

	public static function number2() {
		return rand(10,99);
	}

	public static function city() {
		return DG::$cities[rand(0, sizeof(DG::$cities)-1)];
	}

	public static function zipcode() {
		return rand(100,999) . "0";
	}	

	public static function firstname() {
		return DG::$firstnames[rand(0, sizeof(DG::$firstnames)-1)];
	}

	public static function lastname() {
		$middlename = DG::$middlenames[rand(0, sizeof(DG::$middlenames)-1)];
		$lastname = DG::$lastnames[rand(0, sizeof(DG::$lastnames)-1)];
		return $middlename . " " . $lastname;
	}

	public static function ranChooser($arr) {
		$selected = rand(0, sizeof($arr)-1);
		return $arr[$selected];
	}

	public static function phone() {
		return "+45 " . rand(11111111, 99999999);
	}

	public static function email() {
		$extention = DG::ranChooser(array('@hotmail.com', '@gmail.com', '@facebook.com', '@telenor.dk', '@live.com'));
		return DG::firstname() . DG::number2() . $extention;
	}
}

?>