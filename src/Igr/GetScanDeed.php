<?php
namespace Igr;
/*require '..\..\vendor\autoload.php';*/
/*use Whoops\Run;
use  Whoops\Handler\PrettyPageHandler;*/

//   USING MONOLOG
/*use \Monolog\Logger;
use \Monolog\Handler\BrowserConsoleHandler;*/
/*error_reporting( E_ALL );
ini_set('display_errors', 'On');*/
/*$logger = new \Monolog\Logger('general');

$browserHanlder = new \Monolog\Handler\BrowserConsoleHandler(\Monolog\Logger::INFO);
$logger->pushHandler($browserHanlder);
$logger->addInfo('Error Message');*/

//USING WHOOPS
/*$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();*/

 /*USING PHP_SQLSVR*/
$serverName = "localhost";
$connectionOptions = array("Database"=>"Registration", "UID"=>"sa","PWD"=>"nic");

/* Connect using Windows Authentication. */
try
{
    $SHOW_FRAME=false;
    $conn = sqlsrv_connect( $serverName, $connectionOptions);

    $query="SELECT * from
             DupScandoc where RegNo=1420 and RegYear=2007";
    /*$param=array(filter_input(INPUT_POST,'regno',FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        filter_input(INPUT_POST,'regyear',FILTER_SANITIZE_FULL_SPECIAL_CHARS ));*/
    /*$stmt=sqlsrv_prepare($conn,$query,$param);*/
    $stmt=sqlsrv_prepare($conn,$query);

    sqlsrv_execute($stmt);
    if(sqlsrv_fetch($stmt))
    $data=sqlsrv_get_field($stmt,2);

    header('content-type:application/pdf');
    header("Content-Disposition:inline;filename='downloaded.pdf'");
    $SHOW_FRAME=true;
    fpassthru($data);
    sqlsrv_free_stmt( $stmt );
    sqlsrv_close( $conn );
}
catch(\Exception $e)
{
 die(print_r(sqlsrv_errors().true));
    sqlsrv_free_stmt( $stmt );
    sqlsrv_close( $conn );
}
/*USING PHP_PDO_SQLSVR */

/*$serverName = "localhost";*/
/*$connectionOptions = array("Database"=>"eSiroi");*/
/*try
{
    $conn = new PDO( "sqlsrv:server=$serverName ; Database=eSiroi", "sa", "nic");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}*/
/*catch (\Exception $e)
    {
        die(print_r($e->getMessage()));
    }

try
{*/
    /*$paramRegno=filter_input(INPUT_POST,'regno',FILTER_SANITIZE_FULL_SPECIAL_CHARS);*/
/*$query="SELECT Doc from DupScanDoc where RegNo=:regno and RegYear:regyear";*/
    /*$query="SELECT Doc from DupScanDoc where RegNo=1420 and RegYear=2007";
    $stmt=$conn->prepare($query);*/
   /*$stmt->bindParam(':regno',$paramRegno,PDO::PARAM_STR);
    $stmt->bindParam(':regyear',filter_input(INPUT_POST,'regyear',FILTER_SANITIZE_FULL_SPECIAL_CHARS),PDO::PARAM_STR);*/
    /*$stmt->execute();*/

   /* $data=$stmt->fetchAll();
    header('content-type:application/pdf');
    header("Content-Disposition:inline;filename='downloaded.pdf'");
    fpassthru($data);
}
catch(\Exception $e) {
    die(print_r($e->getMessage()));
}*/