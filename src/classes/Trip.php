<?php
namespace /src/classes;

/**
 * Trip class
 * Defines basic trip operations
 * 
 * @package src/classes
 * @version 1.0.0
 */
Class Trip {
	
	/**
	 * @var mixed[] $_universal This will be an array containing reformatted structure of trips
	 */
	global $_universal = array();
	
	/**
	 * @method void addTrip
	 * 
	 * @param mixed[] $card Array structure containing details of journey.
	 * 
	 * Creating various data structures here in global varibale to avoid loops while sorting in future.
	 */
	function addTrip($card = array()) {
		$this->_universal['Trips'][$card['depature']] = $card;
		$this->_universal['departures'][] = $card['depature'];
		print_r($this->_universal);
	}
}