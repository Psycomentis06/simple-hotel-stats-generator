<?php
require_once __DIR__.'/classes/Stat.php';

$s = new Stat(20000,60,18, 50, 50);

$s->splitIncomeOverMonth(31);

echo $s->IncomeSum();

echo '<pre>';
$r = $s->getResultArray();
for ($i = 0; $i < count($r); $i++) {
    $r[$i]['day'] = date("l", strtotime('01/'.$i.'/2020'));
}

for ($i = 0; $i < count($r); $i++) {
    $r[$i]['night'] = $s->setRentedRooms($r[$i]['income'], 20, 35);
}
echo '<br>';

print_r($r);

