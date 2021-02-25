<?php

/**
 *  Return a JSON array with table titles
 */

require_once __DIR__ . '/../php/functions.php';

$lang = $_COOKIE['language'];

$resData = [];
if (!empty($lang)) {
    if (checkLanguage($lang) == true) {
        require_once __DIR__ . '/../locale/' . $lang . '.php';

        $resData['result'] = $data['stats']['tables'];
        echo json_encode($resData);
        die();
    } else {
        $resData['error'] = 'Language value not valid';

        echo json_encode($resData);
        die();
    }
} else {
    $resData['error'] = 'Language value is empty';

    echo json_encode($resData);
    die();
}
