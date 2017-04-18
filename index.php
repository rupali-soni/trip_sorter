<?php
// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Create object of trip class
 */
$trip = new Trip();

/**
 * Register available boarding cards.
 */
$bordingCard1 = array(
		"type"			=> "Flight",
		"departure"		=> "Gerona Airport",
		"arrival"		=> "Stockholm",
		"flightNum"		=> "SK455",
		"gateNum"		=> "45B",
		"seatNum"		=> "3A",
		"baggage"		=> "344"
);
$trip->addTrip($bordingCard1);

$bordingCard2 = array(
		"type"		=> "Train",
		"departure"	=> "Madrid",
		"arrival"	=> "Barcelona",
		"trainNum"	=> "78A",
		"seatNum"	=> "45B"
);
$trip->addTrip($bordingCard2);

$bordingCard3 = array(
		"type"		=> "Bus",
		"departure"	=> "Barcelona",
		"arrival"	=> "Gerona Airport",
		"busNum"	=> "",
		"seatNum"	=> ""
);
$trip->addTrip($bordingCard3);

$bordingCard4 = array(
		"type"		=> "Flight",
		"departure"	=> "Stockholm",
		"arrival"	=> "New York JFK",
		"flightNum"	=> "SK22",
		"gateNum"	=> "22",
		"seatNum"	=> "7B",
		"baggage"	=> ""
);
$trip->addTrip($bordingCard4);

/**
 * 
 * Sort all the boarding cards
 * 
 */
$trip->sortTrips();

/**
 * 
 * Finally print sorted boarding cards in the output
 * 
 */
//$trip->printOutput();