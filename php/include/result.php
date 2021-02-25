<?php
$stat = new Stat(20000, 15, 50, 50, 50, 50);

$stat->splitIncomeOverMonth(28);

$table = $stat->getResultArray();
?>
<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th></th>
        <th scope="col">Income</th>
        <th scope="col">Nights</th>
        <th scope="col">Host</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Total:</th>
        <?php
        echo '<td>'.$stat->getIncome().'</td>';
        echo '<td>'.rand(20,100).'</td>';
        ?>
    </tr>
    </tbody>
</table>
<br><br>
    <table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Day N°</th>
        <th scope="col">Income</th>
        <th scope="col">Nights</th>
        <th scope="col">Single Rooms</th>
        <th scope="col">Dual Rooms</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($table); $i++) {
    $nightsByDay = $stat->setRentedRooms($table[$i], $_COOKIE['single'], $_COOKIE['dual']);
    $tabRes = '';
    $tabRes .=    '<tr>';
    $tabRes .=    '<th scope="row">'.($i+1).'</th>';
    $tabRes .=    ' <td>'.$table[$i].'</td>';
    $tabRes .=    '<td>'.($nightsByDay['single'] + $nightsByDay['dual']).'</td>';
    $tabRes .=    '<td>'.$nightsByDay['single'].'</td>';
    $tabRes .=    '<td>'.$nightsByDay['dual'].'</td>';
    //$tabRes .=    '<td>'.($i*rand(1,20)*20).'</td>';
    $tabRes .=    '</tr>';
    echo $tabRes;
    }
    ?>

    </tbody>
    </table>
