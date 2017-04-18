<?php
/**
 * Sorttrip class
 * sort trip operations
 * 
 * @package src
 * @version 1.0.0
 */
class Sorttrip {
	/**
	 * Constants
	 */
	const MSG_CARD_NOT_FOUND = "Boarding cards not found!";
	const MSG_MULTIPLE_DEPARTURE = "Invalid boarding cards! Multiple starting departures found.";
	const MSG_MULTIPLE_ARRIVAL = "Invalid boarding cards! Multiple end point arrivals found.";
	
	
	/**
	 * @method void addTrip
	 * 
	 * @param mixed[] $card Array structure containing details of journey.
	 * 
	 * Creating various data structures here in global varibale to avoid loops while sorting in future.
	 */
	function sortAllTrips($cards = array()) {
		if(empty($cards))
			return static::MSG_CARD_NOT_FOUND;
		$start = $this->getFirstDeptStation($cards);
		$end = $this->getLastArrivalStation($cards);
		if($start === -1)
			return static::MSG_MULTIPLE_DEPARTURE;
		if($end === -1)
			return static::MSG_MULTIPLE_ARRIVAL;
		
		//Actual sort algorithm
		$this->sortCards($cards, $start, $end);
	}
	
	/**
	 * @method String getFirstDeptStation
	 * 
	 * @param mixed[] $card array
	 * @return string
	 */
	private function getFirstDeptStation($cards) {
		$deptArr = array_diff($cards['departures'], $cards['arrivals']);
		if(count($deptArr) > 1)
			return -1;
		return array_shift($deptArr);
	}
	
	/**
	 * @method String getLastArrivalStation
	 *
	 * @param mixed[] $card array
	 * @return string
	 */
	private function getLastArrivalStation($cards) {
		$endArr = array_diff($cards['arrivals'], $cards['departures']);
		if(count($endArr) > 1)
			return -1;
		return array_shift($endArr);
	}
	
	/**
	 * @method mixed[] sortCards
	 *
	 * method will sort the array based on starting point of the trip
	 * It will iterate through just one for loop.
	 *  
	 * @param mixed[] $card array of all the boarding cards
	 * @param String $startPoint first departure station
	 * @param String $endPoint last arrival station
	 * @return mixed[]
	 */
	private function sortCards($cards, $startPoint, $endPoint) {
		$sorted = array();
		foreach($cards['trips'] as $station => $details) {
			$sorted[] = $cards['trips'][$startPoint];
			$startPoint = $cards['trips'][$startPoint]['arrival'];
			if($startPoint == $endPoint)
				break;
		}
		print_r($sorted);
	}
}