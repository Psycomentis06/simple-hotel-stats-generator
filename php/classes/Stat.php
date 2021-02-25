<?php

/**
 * We will have on the Class Stat all methods we need to calculate our columns
 */

class Stat
{
    /*private $INCOME_PERCENT = [
        // table we will use to split the income
        '31' => [
            0.0050 , 0.01 , 0.0525 , 0.0075 , 0.0075 , 0.225 , 0.015 , 0.0013 , 0.0087 , 0.01 , 0.0020 , 0.008 , 0.3 , 0.01 , 0.0020 , 0.01184 , 0.0150 , 0.0050 , 0.0225 , 0.1124 , 0.01126 , 0.008 , 0.002 , 0.011 , 0.019 , 0.02 , 0.075 , 0.0050 , 0.0080 , 0.0090 , 0.0005
        ],
        '30' => [
            0.02 , 0.015 , 0.015 , 0.025 , 0.01 , 0.102 , 0.065 , 0.02 , 0.03 , 0.015 , 0.05 , 0.035 , 0.080 , 0.03 , 0.0275 , 0.0325 , 0.037 , 0.033 , 0.018 , 0.04 , 0.035 , 0.025 , 0.01 , 0.015 , 0.035 , 0.05 , 0.062 , 0.028 , 0.019 , 0.021
        ],
        '28' => [
            0.035 , 0.015 , 0.021 , 0.0359 , 0.0359 , 0.07 , 0.03 , 0.02 , 0.013 , 0.017 , 0.028 , 0.022 , 0.1 , 0.05 , 0.013 , 0.026 , 0.0565 , 0.0565 , 0.038 , 0.1 , 0.012 , 0.045 , 0.035 , 0.02 , 0.03 , 0.024 , 0.05 , 0.0012
        ],
        '29' => [
            0.035 , 0.03 , 0.035 , 0.037 , 0.013 , 0.075 , 0.025 , 0.018 , 0.032 , 0.044 , 0.025 , 0.031 , 0.084 , 0.016 , 0.025 , 0.037 , 0.038 , 0.039 , 0.048 , 0.05 , 0.013 , 0.011 , 0.025 , 0.021 , 0.042 , 0.023 , 0.1 , 0.020 , 0.008
        ]
    ];*/
    private $INCOME_PERCENT = [
        // table we will use to split the income
        '31' => [
            0.025, 0.026, 0.0525, 0.044, 0.047, 0.07, 0.03, 0.041, 0.058, 0.01, 0.020, 0.035, 0.058, 0.01, 0.020, 0.02, 0.045, 0.045, 0.0225, 0.055, 0.0131, 0.0125, 0.031, 0.011, 0.019, 0.02, 0.0698, 0.027, 0.025, 0.0116, 0.026
        ],
        '30' => [
            0.037, 0.028, 0.022, 0.025, 0.018, 0.05, 0.042, 0.022, 0.03, 0.034, 0.05, 0.035, 0.054, 0.03, 0.0275, 0.0325, 0.037, 0.033, 0.033, 0.04, 0.035, 0.025, 0.021, 0.026, 0.035, 0.05, 0.055, 0.028, 0.026, 0.019
        ],
        '28' => [
            0.035,  0.035, 0.021, 0.0359, 0.0359, 0.05, 0.035, 0.025, 0.023, 0.023, 0.028, 0.022, 0.065, 0.05, 0.033, 0.03, 0.0565, 0.0565, 0.038, 0.07, 0.015, 0.045, 0.035, 0.025, 0.037, 0.0136, 0.04, 0.0217
        ],
        '29' => [
            0.035, 0.03, 0.035, 0.037, 0.029, 0.045, 0.025, 0.032, 0.032, 0.044, 0.033, 0.031, 0.05, 0.025, 0.025, 0.037, 0.038, 0.039, 0.048, 0.05, 0.026, 0.028, 0.025, 0.026, 0.042, 0.027, 0.055, 0.023, 0.028
        ]
    ];
    private $income;
    private $singleNights;
    private $dualNights;
    private $accommodation;
    private $resultArray;
    private $foodPercent;
    private $drinkPercent;

    public function __construct($income, $singleNights, $dualNights, $accommodation, $foodPercent, $drinkPercent)
    {
        $this->income = $income;
        $this->singleNights = $singleNights;
        $this->dualNights = $dualNights;
        $this->accommodation = $accommodation;
        $this->resultArray = [];
        $this->foodPercent = $foodPercent;
        $this->drinkPercent = $drinkPercent;
    }

    public function splitIncomeOverMonth($monthDays)
    {
        // this method will split the income over month days (28|29, 30, 31)

        for ($i = 0; $i < $monthDays; $i++) {
            $this->resultArray[$i] = ['income' => $this->income * $this->INCOME_PERCENT[$monthDays][$i]];
        }
    }

    public function IncomeSum()
    {
        // return the sum of income in the result array
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['income'];
        }
        return $total;
    }

    public function NightsSum()
    {
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['night']['sum'];
        }
        return $total;
    }

    public function SingleNightsSum()
    {
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['night']['single'];
        }
        return $total;
    }

    public function DualNightsSum()
    {
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['night']['dual'];
        }
        return $total;
    }

    public function NutritionSum()
    {
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['night']['nutrition'];
        }
        return $total;
    }

    public function DrinkSum()
    {
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['night']['drink'];
        }
        return $total;
    }

    public function FoodSum()
    {
        $total = 0;
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $total += $this->resultArray[$i]['night']['food'];
        }
        return $total;
    }

    public function NightRooms()
    {
        // set single and dual rented rooms

        for ($i = 0; $i < count($this->resultArray); $i++) {
            $this->resultArray[$i]['night']['sum'] = $this->resultArray[$i]['night']['single'] + $this->resultArray[$i]['night']['dual'];
        }
    }

    public function FillNights($singleRoomPrice, $dualRoomPrice)
    {
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $this->resultArray[$i]['night'] = $this->setRentedRooms($this->resultArray[$i]['income'], $singleRoomPrice, $dualRoomPrice);
        }
    }

    public function setDateDays($month, $year)
    {
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $this->resultArray[$i]['day'] = date("l", strtotime($month . '/' . ($i + 1) . '/' . $year)) . ', ' . ($i + 1) . '/' . $month . '/' . $year;
        }
    }

    public function getHostedNights()
    {
        return round($this->NightsSum() * ($this->accommodation / 100));
    }

    public function setDrinkAndFood()
    {
        for ($i = 0; $i < count($this->resultArray); $i++) {
            $this->resultArray[$i]['night']['drink'] = $this->resultArray[$i]['night']['nutrition'] * ($this->drinkPercent / 100);
            $this->resultArray[$i]['night']['food'] = $this->resultArray[$i]['night']['nutrition'] * ($this->foodPercent / 100);
        }
    }

    public function setRentedRooms($income, $singleRoomPrice, $dualRoomPrice)
    {
        // this method will divide the income of a day between single rooms, dual rooms and nutrition
        $result = [];
        $singlePercent = 0.3; // 30% of income
        $doublePercent = 0.6; // 60%
        $nutritionPercent = 0.1; // 10%

        $single = intdiv(($income * $singlePercent), $singleRoomPrice);
        $dual = intdiv(($income * $doublePercent), $dualRoomPrice);

        if ($single <= 0 && $dual <= 0) {
            $result['single'] = 0;
            $result['dual'] = 0;
            $result['nutrition'] = $income;
        } else {
            $result['single'] = $single;
            $result['dual'] = $dual;
            $result['nutrition'] = ($income * $nutritionPercent) + (($income * $singlePercent) % $singleRoomPrice) + (($income * $doublePercent) % $dualRoomPrice);
        }

        return $result;
    }

    public function getIncomeFromNights($singlePrice, $dualPrice)
    {
        // create income value from rooms rented

        $this->income = $this->singleNights * $singlePrice + $this->dualNights * $dualPrice;

        $this->income += $this->income * 0.2; // 20% of income for nutrition
    }

    public function getResultArray()
    {
        return $this->resultArray;
    }

    public function getIncome()
    {
        return $this->income;
    }

    public function setErrors($day, $hotelRooms)
    {
        // this method will mark warning, danger and selected rows
        for ($i = 0; $i < count($this->resultArray); $i++) {
            if ($this->resultArray[$i]['night']['sum'] == 0 or $this->resultArray[$i]['night']['sum'] > $hotelRooms) {
                // there is a day with 0 rented rooms!
                $this->resultArray[$i]['errors']['night_sum'] = 1;
            }
            if (($i + 1) == $day) {
                // there is a day with 0 rented rooms!
                $this->resultArray[$i]['errors']['selected'] = 1;
            }
        }
    }
}
