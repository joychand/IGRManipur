<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
//$ShowDivFlag=false;
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST['submit'])){*/
try{
    $serverName = "localhost";
    $connectionOptions = array("Database"=>"eSiroi","UID"=>"sa","PWD"=>"nic");

    /* Connect using Windows Authentication. */
    $conn = sqlsrv_connect( $serverName, $connectionOptions);
    if( $conn === false )
        die( print_r( sqlsrv_errors(),true ) );

    $query="SELECT * from
             Deed where TSNo=7 and TSYear=2011";
    $params = array(&$_POST['DeedNo'],
        &$_POST['Year']);


    $data=sqlsrv_query($conn,$query);
     if($data===false)
         die(print_r(sqlsrv_errors(),true));
    while($row=sqlsrv_fetch_array($data,SQLSRV_FETCH_ASSOC))
    {
    print_r($row);
    echo  $row['TSNo'].'<br/>';

}
    sqlsrv_free_stmt( $data );
    sqlsrv_close( $conn );
}

catch (Exception $e){
    die (print_r($e->getMessage(),true));
}


?>
