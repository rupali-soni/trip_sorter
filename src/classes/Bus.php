<?php
require_once '/src/classes/AbstractTransporttype.php';
/**
 * Class Bus
 *
 * @package src\classes
 */
class Bus extends AbstractTransporttype
{
	/**
	 * @var string
	 */
	protected $busNum;
	
    const MESSAGE = 'Take the bus from %s to %s. ';
    const MESSAGE_SEAT = 'Sit in seat %s.';
    const MESSAGE_NO_SEAT = 'No seat assignment.';
    
    /**
     * Return a message for a trip defined in boarding card
     *
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf(
            static::MESSAGE ,
            $this->departure,
            $this->arrival
        );
        if($this->seatNum)
        	$message .= sprintf(static::MESSAGE_SEAT, $this->seatNum);
        else
        	$message .= static::MESSAGE_NO_SEAT;
        return $message;
    }
}