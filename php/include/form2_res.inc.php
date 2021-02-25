<?php

/**
 * Stat based on nights result
 */

require_once __DIR__.'/../classes/Stat.php';
require_once __DIR__.'/../classes/class_date.php';

if (isset($_POST['withnights'])) {
    // Data Submitted

    $singleNights = '';
    $dualNigths = '';
    $host = '';
    $date = '';
    $foodPercent = '';
    $drinkPercent = '';
    $singleRoomPrice = '';
    $dualRoomPrice = '';
    $hotelRooms = '';

    $errors = [];
    $isAjax = '';

    // validation

    if (empty($_POST['single_nights'])) {
        array_push($errors, 'Single rooms is missing');
    } else {
        $singleNights = $_POST['single_nights'];
    }

    if (empty($_POST['dual_nights'])) {
        array_push($errors, 'Dual rooms is missing');
    } else {
        $dualNigths = $_POST['dual_nights'];
    }

    if (empty($_POST['host'])) {
        array_push($errors, 'Host percentage is missing');
    } else {
        $host = $_POST['host'];
    }

    if (empty($_POST['date'])) {
        array_push($errors, 'Date is missing');
    } else {
        $date = $_POST['date'];
    }

    if (empty($_POST['food_percent'])) {
        array_push($errors, 'Food percentage is missing');
    } else {
        $foodPercent = $_POST['food_percent'];
    }

    if (empty($_POST['drink_percent'])) {
        array_push($errors, 'Drink percentage is missing');
    } else {
        $drinkPercent = $_POST['drink_percent'];
    }

    if (empty($_COOKIE['single'])) {
        array_push($errors, 'Single room price is missing');
    } else {
        $singleRoomPrice = $_COOKIE['single'];
    }

    if (empty($_COOKIE['dual'])) {
        array_push($errors, 'Dual room price is missing');
    } else {
        $dualRoomPrice = $_COOKIE['dual'];
    }

    if (empty($_COOKIE['room_number'])) {
        array_push($errors, 'Hotel rooms number is missing');
    } else {
        $hotelRooms = $_COOKIE['room_number'];
    }

    if (!isset($_POST['ajax'])) {
        array_push($errors, 'The method is missing "Ajax" or not');
    } else {
        $isAjax = $_POST['ajax'];
    }

    // Generate the stats

    if (count($errors) > 0) {
        // empty data
        $errorHTMLEcho = '<div class="alert alert-danger" role="alert">';
        $errorHTMLEcho .= '<h4 class="alert-heading">Error Messages</h4>';
        foreach ($errors as $value) {
            $errorHTMLEcho .= '<p>'. $value .'</p>';
            $errorHTMLEcho .= '<hr>';
        }
        echo $errorHTMLEcho;
    } else {
        // data valid and ready

        $date = explode('-', $date);
        $month = $date[1];
        $day   = $date[2];
        $year  = $date[0];
        $customDate = new CustomDate($day, $month, $year);
        $monthDays = $customDate->getMonthDays();
        $stat = new Stat(0, $singleNights, $dualNigths, $host, $foodPercent, $drinkPercent);
        $stat->getIncomeFromNights($singleRoomPrice, $dualRoomPrice); // generate income from nights
        $stat->splitIncomeOverMonth($monthDays); // Divide the monthly income over month days

        /**
         * Days
         */

        $stat->setDateDays($month, $year);

        /**
         * set nights
         */

        $stat->FillNights($singleRoomPrice, $dualRoomPrice);
        $stat->NightRooms();
        //echo '<br>'.$stat->NightsSum();
        //echo '<br>'.$stat->SingleNightsSum();
        //echo '<br>'.$stat->DualNightsSum();
        //echo '<br>'.$stat->getHostedNights();

        /**
         * set drink and food
         */

        $stat->setDrinkAndFood();

        /**
         * Set Errors and warnings
         */

        $stat->setErrors($day, $hotelRooms);

        $finalResult = $stat->getResultArray();

        //echo '<pre>';
        //print_r($stat->getResultArray());

        // Render HTML Part or return JSON response
        if ($isAjax == 'true') {
            echo json_encode([ 'result' => $finalResult]);
            die();
        } else {
            $htmlTabRes = '';
            $htmlTabRes .= '<table class="table table-sm mt-4 mb-5 table-bordered" id="monthlyStatTable">';
            $htmlTabRes .= '<thead>';
            $htmlTabRes .= '<tr>';
            $htmlTabRes .= '<th scope="col"></th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['month']['income'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['month']['nights'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['month']['host'] . '</th>';
            $htmlTabRes .= '</tr>';
            $htmlTabRes .= '</thead>';
            $htmlTabRes .= '<tbody>';
            $htmlTabRes .= '<tr>';
            $htmlTabRes .= '<th scope="row">' . $data['stats']['tables']['month']['total'] . '</th>';
            $htmlTabRes .= '<td>' . $stat->IncomeSum() . ' TND</td>';
            $htmlTabRes .= '<td>' . $stat->NightsSum() . '</td>';
            $htmlTabRes .= '<td>' . $stat->getHostedNights() . '</td>';
            $htmlTabRes .= ' </tr>';
            $htmlTabRes .= '</tbody>';
            $htmlTabRes .= '</table>';

            $htmlTabRes .= '<table class="table table-bordered">';
            $htmlTabRes .= '<thead class="thead-dark" id="headingTable">';
            $htmlTabRes .= '<tr>';
            $htmlTabRes .= '<th colspan="10"> <center>  <a href="/"> <i class="fas fa-home"></i> ' . $data['stats']['tables']['home'] . '</a> </center> </th>';
            $htmlTabRes .= '</tr>';
            $htmlTabRes .= '</thead>';
            $htmlTabRes .= '<thead class="thead-dark" id="headingTable">';
            $htmlTabRes .= '<tr>';
            $htmlTabRes .= '<th scope="col" colspan="3"></th>';
            $htmlTabRes .= '<th scope="col" colspan="3"><center>' . $data['stats']['tables']['data_table']['nights'] . '</center></th>';
            $htmlTabRes .= '<th scope="col" colspan="3"><center>' . $data['stats']['tables']['data_table']['nutrition'] . '</center></th>';
            $htmlTabRes .= '<th scope="col"></th>';
            $htmlTabRes .= '</tr>';
            $htmlTabRes .= '<tr>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['day_n'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['day'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['income'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['nights'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['single'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['dual'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['nutrition'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['drink'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['food'] . '</th>';
            $htmlTabRes .= '<th scope="col">' . $data['stats']['tables']['data_table']['download'] . '</th>';
            $htmlTabRes .= '</tr>';
            $htmlTabRes .= '</thead>';
            $htmlTabRes .= '<tbody>';
            $index = 0;
            foreach ($finalResult as $value) {
                if (isset($value['errors']['selected']) and isset($value['errors']['night_sum'])) {
                    $htmlTabRes .= '<tr id="rowNum' . ($index + 1) . '" class="bg-danger"> ';
                } else if (isset($value['errors']['selected'])) {
                    $htmlTabRes .= '<tr id="rowNum' . ($index + 1) . '" class="selected-row">  ';
                } else if (isset($value['errors']['night_sum'])) {
                    $htmlTabRes .= '<tr id="rowNum' . ($index + 1) . '" class="bg-warning">  ';
                } else {
                    $htmlTabRes .= '<tr id="rowNum' . ($index + 1) . '">  ';
                }
                $htmlTabRes .= '<th scope="col">' . ($index + 1) . '</th>';
                $htmlTabRes .= '<th scope="col">' . $value['day'] . '</th>';
                $htmlTabRes .= '<th scope="col">' . $value['income'] . ' TND</th>';
                $htmlTabRes .= '<th scope="col">' . $value['night']['sum'] . '</th>';
                $htmlTabRes .= '<th scope="col">' . $value['night']['single'] . '</th>';
                $htmlTabRes .= '<th scope="col">' . $value['night']['dual'] . '</th>';
                $htmlTabRes .= '<th scope="col">' . $value['night']['nutrition'] . ' TND</th>';
                $htmlTabRes .= '<th scope="col">' . $value['night']['drink'] . ' TND</th>';
                $htmlTabRes .= '<th scope="col">' . $value['night']['food'] . ' TND</th>';
                $htmlTabRes .= '<th scope="col"> <button class="btn btn-success" onclick="CreatePDFV2('. ($index+1) .');"><i class="fas fa-download"></i> PDF</button> </th>';
                $htmlTabRes .= '</tr>';
                $index++;
            }
            $htmlTabRes .= '<tr>';
            $htmlTabRes .= '<th scope="col" colspan="2">' . $data['stats']['tables']['month']['total'] . ':</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->IncomeSum().'</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->NightsSum() .'</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->SingleNightsSum() .'</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->DualNightsSum() .'</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->NutritionSum() .' TND</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->DrinkSum() .' TND</th>';
            $htmlTabRes .= '<th scope="col">'. $stat->FoodSum() .' TND</th>';
            $htmlTabRes .= '<th scope="col"></th>';
            $htmlTabRes .= '</tr>';
            $htmlTabRes .= '</tbody>';
            $htmlTabRes .= '</table>';

            echo $htmlTabRes;
        }
    }
}