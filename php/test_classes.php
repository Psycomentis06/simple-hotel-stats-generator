<?php
/**
 * This page is for testing the classes
 */
require_once './classes/class_date.php';

$a = new CustomDate('18', '07', '2020');

$table = array();

array_push($table, $a->getMonthDays());

array_push($table, $a->isSaturday());

array_push($table, $a->getDayName());

array_push($table, $a->SeasonName());

echo "<pre>";

var_dump($table);