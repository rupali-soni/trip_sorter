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
include_once 'test/testCards.php';
$trip->addTrip($bordingCards);

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
echo $trip->printOutput();