<?php
require_once '/src/classes/AbstractTransporttype.php';
/**
 * Class Train
 *
 * @package src\classes
 */
class Train extends AbstractTransporttype
{
	/**
	 * @var string
	 */
	protected $trainNum;
	
    const MESSAGE = 'Take train %s from %s to %s. ';
    const MESSAGE_SEAT = 'Sit in seat %s.';
    
    /**
     * Return a message for a trip defined in boarding card
     *
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf(
            static::MESSAGE ,
        	$this->trainNum,
            $this->departure,
            $this->arrival
        );
        if($this->seatNum)
        	$message .= sprintf(static::MESSAGE_SEAT, $this->seatNum);
        return $message;
    }
}