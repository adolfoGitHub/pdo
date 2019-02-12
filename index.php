<?php
/**
 * Adolfo Gonzalez
 * February 11, 2019
 *
 * /328/pdp/index.php
 */

// database connection
require '/home/agonzale/config.php';

//instantiate object
try{
    $dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    echo 'Connected to database!';
}
catch(PDOException $e){
    echo $e->getMessage();
}
//create table to display pets
echo '<table>';
echo   '<tr>';
echo        '<th>id</th>';
echo        '<th>name</th>';
echo        '<th>type</th>';
echo        '<th>color</th>';
echo  '</tr>';

//define the query
$sql = 'SELECT * FROM pets';

//Prepare the statement
$statement = $dbh->prepare($sql);

//Execute the statement
$statement->execute();

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row){
    echo    '<tr>';
    echo         '<td>'.$row['id'].'</td>';
    echo         '<td>'.$row['name'].'</td>';
    echo         '<td>'.$row['type'].'</td>';
    echo         '<td>'.$row['color'].'</td>';
    echo   '</tr>';
}
echo '</table>';
