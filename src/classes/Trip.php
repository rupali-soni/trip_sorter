<?php
/**
 * Trip class
 * Defines basic trip operations
 * 
 * @package src
 * @version 1.0.0
 */
class Trip {
	
	/**
	 * @var mixed[] $_universal This will be an array containing reformatted structure of trips
	 */
	protected  $_universal = array();
	
	/**
	 * @method void addTrip
	 * 
	 * @param mixed[] $card Array structure containing details of journey.
	 * 
	 * Creating various data structures here in global varibale to avoid loops while sorting in future.
	 */
	function addTrip($card = array()) {
		$this->_universal['trips'][$card['departure']] = $card;
		$this->_universal['departures'][] = $card['departure'];
		$this->_universal['arrivals'][] = $card['arrival'];
		print_r($this->_universal);
	}
	
	/**
	 * @method void sortTrips
	 * 
	 * This method will be resposible to sort all the available trips
	 */
	function sortTrips() {
		require_once '/src/classes/Sorttrip.php';
		$sortTrip = new Sorttrip();
		$sortTrip->sortAllTrips($this->_universal);
	}
}