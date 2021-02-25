<?php
/* 
    All the php functions needed are here to make the main php page more readable.
*/
function createDate( $year, $month ) {
    // create date object based on the month and year from the form of user
    $date = mktime('0, 0, 0, $month, 1, $year');
    return date('m/Y', $date);
}
function isSaturday( $date )
{
    // Return true if the day is saturday
    if ( date('l', $date) == 'Saturday') {
        return true;
    }
    return false;
}

function checkLanguage($value) {
    // return true if the value is valid
    $VALID_VALUES = ['ar', 'en', 'fr'];

    if (empty($value)) {
        return false;
    } else {
        foreach ($VALID_VALUES as $element) {
            if ($element == $value) {
                return true;
            }
        }
    }
    return false;
}

function getLangCSSClass ($lang) {
    // return css class based on current language
    switch ($lang) {
        case 'en':
            return 'en';
        break;
        case 'fr':
            return 'fr';
        break;
        case 'ar':
            return 'ar';
        break;
        default:
        return 'en';
    break;
    }
}