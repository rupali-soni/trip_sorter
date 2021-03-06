<?php
/**
 * Trip class
 * Defines basic trip operations
 * 
 * @package src
 * @version 1.0.0
 */
class Trip {
	
	const INVALID_DATA = "Invalid trip data.";
	
	/**
	 * @var mixed[] $_universal This will be an array containing reformatted structure of trips
	 */
	protected  $_universal = array();
	
	/**
	 * @var mixed[] $_sortedTripMsgs This will be an array containing messages for all the sorted trips
	 */
	protected  $_sortedTripMsgs = array();
	
	/**
	 * @method void setUniversal
	 *
	 * @param mixed[] $card
	 * @param string $type
	 *
	 */
	function setUniversal($card, $type) {
		if($type == 'trips')
			$this->_universal['trips'][$card['departure']] = $card;
		else if($type == 'departures')
			$this->_universal['departures'][] = $card['departure'];
		else if($type == 'arrivals')
			$this->_universal['arrivals'][] = $card['arrival'];
	}
	
	/**
	 * @method void getUniversal
	 *
	 * $return String
	 *
	 */
	function getUniversal() {
		return $this->_universal;
	}
	
	/**
	 * @method void setSortedTripMsgs
	 *
	 * @param mixed[] $msgArr
	 *
	 */
	function setSortedTripMsgs($msgArr) {
		$this->_sortedTripMsgs = $msgArr;
	}
	
	/**
	 * @method void setSortedTripMsgs
	 *
	 * $return String
	 *
	 */
	function getSortedTripMsgs() {
		return $this->_sortedTripMsgs;
	}
	
	/**
	 * @method void addTrip
	 * 
	 * @param mixed[] $card Array structure containing details of journey.
	 * 
	 * Creating various data structures here in global varibale to avoid loops while sorting in future.
	 */
	function addTrip($card = array()) {
		if(array_key_exists('departure', $card)) {
			$this->setUniversal($card, 'trips');
			$this->setUniversal($card, 'departures');
			$this->setUniversal($card, 'arrivals');
		} else {
			foreach ($card as $bordingCard) {
				$this->setUniversal($bordingCard, 'trips');
				$this->setUniversal($bordingCard, 'departures');
				$this->setUniversal($bordingCard, 'arrivals');
			}
		}
	}
	
	/**
	 * @method void sortTrips
	 * 
	 * This method will be resposible to sort all the available trips
	 */
	function sortTrips() {
		require_once '/src/classes/Sorttrip.php';
		$sortTrip = new Sorttrip();
		$sortedTrips = $sortTrip->sortAllTrips($this->getUniversal());
		if(count($sortedTrips))
			$this->setSortedTripMsgs($sortedTrips);
	}
	
	/**
	 * @method String printOutput
	 *
	 * This method will return sorted trip's messages
	 */
	function printOutput() {
		$msgs = $this->getSortedTripMsgs();
		if(count($msgs))
			return '-- '.implode(PHP_EOL.PHP_EOL.'-- ', $msgs);
		else
			return static::INVALID_DATA;
	}
}