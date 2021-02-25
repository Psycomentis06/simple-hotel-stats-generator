<?php 
/**
 * This Class contain all the methods we need to manipulate the Date as we want
 */

 class CustomDate {
     private $day, $month, $year, $date;
     function __construct($day, $month, $year)
     {
         $this->day = $day;
         $this->month = $month;
         $this->year = $year;
         $this->date = $this->Create($this->day, $this->month, $this->year);
     }

     public static function Create($day, $month, $year) {
         // create date object based on the month and year from the form of use
            return mktime(0,0,0, $month, $day, $year);
     }

     public function getDayName() {
         // get the name of the date
         return date("l", $this->date);
     }

     public function isSaturday() {
         // Return true if the day is saturday
            if ( date('l', $this->date) == 'Saturday') {
                return true;
            }
    return false;
     }

     public function getMonthDays() {
         // get the number of days in a month
         switch ($this->month) {
             case '5':
             case '3':
             case '7':
             case '8':
             case '10':
             case '12':
             case '1':
                 return 31;
                 break;
             case '2':
                 if (($this->year%4) or ($this->year%100 == 0) and ($this->year%400)) {
                     return 28;
                 } else {
                     return 29;
                 }
                 break;
             case '6':
             case '9':
             case '11':
             case '4':
                return 30;
                break;
         }
     }

     public function SeasonName() {
         // return the season name 
         switch ($this->month) {
             case '12':
             case '01':
             case '02':
                 return 'Winter';
                 break;
             case '03':
             case '04':
             case '05' :
                 return 'Spring';
                 break;
             case '06':
             case '07':
             case '08' :
                 return 'Summer';
                 break;
             case '09':
             case '10':
             case '11' :
                 return 'Autumn';
                 break;
         }
     }

     function __destruct()
     {
         
     }
 }