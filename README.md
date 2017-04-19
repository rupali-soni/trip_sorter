# trip_sorter
Solution for trip sorter problem

## Installation

```
- Clone git repository: https://github.com/rupali-soni/trip_sorter.git
- Download the PHP composer and install it from [here](https://getcomposer.org/download/)
- Go to project root directory and run command **composer install**
```

## Execution

```
- Navigate to project directory in comand prompt or terminal and run **php index.php**
```

## Output

For current test case, below will be the output
```
-- Take train 78A from Madrid to Barcelona. Sit in seat 45B.

-- Take the bus from Barcelona to Gerona Airport. No seat assignment.

-- From Gerona Airport, take flight SK455 to Stockholm. Gate 45B Seat 3A. Baggage drop at ticket counter 344.

-- From Stockholm, take flight SK22 to New York JFK. Gate 22 Seat 7B. Baggage will we automatically transferred from your last leg.

-- You have arrived at your final destination.

```

## Change test cases

```
- Navigate to folder **/test**
- open testCards.php and enter your own trip details
```

## Usage

```
//Create object of Trip class
$trip = new Trip();

//Add boarding cards array
$trip->addTrip($bordingCards);

//Sort trip
$trip->sortTrips();

//Get the text output
$trip->printOutput();
```