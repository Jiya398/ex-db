<?php

class CarRentalCalculator {
     private $carSizes;

    public function __construct($carSizes) {
        $this->carSizes = $carSizes;
    }

    public function calculateCost($seats) {
        $minCost = PHP_INT_MAX;
        $selectOption = '';

        foreach ($this->carSizes as $size => $car)
        {
            $numCars = ceil($seats / $car['capacity']);
            $totalCost = $numCars * $car['cost'];

            if ($totalCost < $minCost) {
                $minCost = $totalCost;
                $selectOption = "$size x $numCars";
            }
        }

        return ["solution" => $selectOption, "totalCost" => $minCost];
    }
}


$carSizes = [
    'S' => ['capacity' => 5, 'cost' => 5000],
    'M' => ['capacity' => 10, 'cost' => 8000],
    'L' => ['capacity' => 15, 'cost' => 12000]
];

echo "Please input number of seats: ";
$seats = intval(trim(fgets(STDIN)));


$calculator = new CarRentalCalculator($carSizes);
$result = $calculator->calculateCost($seats);

echo $result["solution"] . "\n";
echo "Total Cost: PHP " . $result["totalCost"] . "\n";

