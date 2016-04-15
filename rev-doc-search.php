
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>IGR MANIPUR</title>

  <!-- Bootstrap core CSS -->
  <link href="./dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/blog.css" rel="stylesheet">
  <script>
    function showhide()
    {
      var div = document.getElementById("newpost");
      if (div.style.display !== "none") {
        div.style.display = "none";
      }
      else {
        div.style.display = "block";
      }
    }
  </script>
</head>

<body>
<?php
/*require 'vendor\autoload.php';
use Whoops\Run;
use  Whoops\Handler\PrettyPageHandler;*/
/*error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors','On');*/
//USING WHOOPS
/*$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();*/
$ShowDivFlag=false;
$errorMessage='';

global $SHOW_FRAME;
$searchSuccess=true;
$SHOW_FRAME=false;

$serverName = "localhost";
$connectionOptions = array("Database"=>"Registration","UID"=>"sa","PWD"=>"nic");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset($_POST['submit'])){
   // echo $_POST['transaction'];
try{
  $conn = sqlsrv_connect( $serverName, $connectionOptions);
  if( $conn === false )
    throw new Exception('Sorry Unable to connect to database...Plz try after agian');


  $query1="SELECT * from
             Deed where TSNo=? and TSYear=? and TransType=?";
  $params = array(&$_POST['DeedNo'],
                  &$_POST['Year'],
                  &$_POST['transaction']);
  $deedStmt=sqlsrv_query($conn,$query1,$params);
  if($deedStmt===false){


    throw new Exception('Error in fetching Data');
  }
if(!sqlsrv_has_rows($deedStmt))
{
  //$searchSuccess=false;
  throw new Exception('Records not Found. Check the data and try  again');
}
  if($row=sqlsrv_fetch_array($deedStmt,SQLSRV_FETCH_ASSOC)){
    $deed=$row['TSNo'];
    $Year=$row['TSYear'];
    $DateofPresentant=date_format($row['Date_Time_Present'], 'd/m/y');
    $TransType=$row['TransType'];
    $ShowDivFlag=true;

  }

  $query2 = "SELECT TOP 1 e.ExecSurname,e.ExecMiddleName, c.ClaimSurName, c.ClaimMiddleName
               from Executant  e join Claimant  c
              on e.TSYear=c.TSYear
              Where  e.TSNo=? and c.TSNo=? and e.TSYear=? and c.TSYear =? ";



  $params2 = array(&$_POST['DeedNo'],
                   &$_POST['DeedNo'],
                   &$_POST['Year'],
                   &$_POST['Year']);


  $partyStmt=sqlsrv_query($conn,$query2,$params2);
  if($partyStmt===false){
   throw new Exception('Sorry in error in fetching data');
    //die(print_r(sqlsrv_errors, true));

  }
  if($row=sqlsrv_fetch_array($partyStmt,SQLSRV_FETCH_NUMERIC)){
    $execSurname=$row[0];
    $execMiddleName=$row[1];
    $claimSurname=$row[2];
    $claimMiddlename=$row[3];
  }
  $query2 = "SELECT TOP 1 e.ExecSurname,e.ExecMiddleName, c.ClaimSurName, c.ClaimMiddleName
               from Executant  e join Claimant  c
              on e.TSYear=c.TSYear
              Where  e.TSNo=? and c.TSNo=? and e.TSYear=? and c.TSYear =? ";



  $params2 = array(&$_POST['DeedNo'],
      &$_POST['DeedNo'],
      &$_POST['Year'],
      &$_POST['Year']);

  $query3 = "SELECT  tran_name from MajorTrans_code
              WHERE  tran_maj_code=?";
  if (!empty($TransType))
         $params3=array($TransType);

  $transStmt=sqlsrv_query($conn,$query3,$params3);
  if($transStmt===false){
    throw new Exception('Sorry unable to fetch data..plz try again');
    //$searchSuccess=false;
   // die(print_r(sqlsrv_errors, true));
  }

  if($row=sqlsrv_fetch_array($transStmt,SQLSRV_FETCH_NUMERIC)){
    $tranname=$row[0];

  }

  $searchSuccess=true;
  sqlsrv_free_stmt($deedStmt);
  sqlsrv_free_stmt($transStmt);
  sqlsrv_free_stmt($partyStmt);
  sqlsrv_close($conn);
}
  catch(Exception $e){
    $searchSuccess=false;
    sqlsrv_free_stmt($partyStmt);
    sqlsrv_free_stmt($transStmt);
    sqlsrv_free_stmt($deedStmt);
    sqlsrv_close($conn);
    $errorMessage= $e->getMessage();
  }

  }
}
?>
<div class="blog-header" style="background-color:#a9c7e1;">
  <div class="container">
    <br>
    <div class="row">
      <div class="col-md-12" align="left">
        <img src="images/igrmanipur.png" class="img-fluid" alt="Revenue Department" height="100px">
      </div>
      <!--	<div class="col-md-8" align="center" style="margin-top:2%;">
      <h1 class="blog-title">IGR MANIPUR</h1>
       <h4>Revenue Department</h4>
      <p class="lead blog-description">Government Of Manipur</p>
      </div> -->
    </div>
  </div>
</div>

<div class="container">

  <div class="row">
    <div class="col-sm-2 blog-sidebar">

      <div class="sidebar-module">
        <h4>Links</h4>
        <ol class="list-unstyled">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Archive</a></li>
          <li><a href="#">Know Your SRO</a></li>
          <li><a href="#">AboutUs</a></li>
        </ol>
      </div>

    </div>

    <div class="col-sm-10 blog-main">


      <div class="blog-post">
        <div class="container">
          <h2 class="blog-post-title">Search Registered Documents</h2>
          <div class="row">
            <div class="col-md-12">


                <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="DeedNo">Deed No. :</label>
                        <input type="text" class="form-control" id="DeedNo" name="DeedNo">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Year">Year :</label>
                        <input type="text" class="form-control" id="Year" name="Year">
                      </div>
                    </div>

              </div>
                  <div class="row">
                    <div class="col-md-5">
                    <div class="form-group">
                      <label for="transtype" >TransactionType:</label>
                      <select name="transaction" class="form-control" id="transaction">
                        <?php
                        try{
                          $conn2 = sqlsrv_connect( $serverName, $connectionOptions);
                          if( $conn2 === false )
                            throw new Exception('Sorry Unable to connect to Database..plz try again');
                            //die( print_r( sqlsrv_errors(),true ) );
                          $query4 = "SELECT  tran_name,tran_maj_code from MajorTrans_code";
                          //$params3=array($TransType);

                          $ddlTrans=sqlsrv_query($conn2,$query4);
                          if($ddlTrans===false)
                            throw new Exception('Sorry unable to fetch data .. Plz try again');
                            //die(print_r(sqlsrv_errors, true));


                        while($row=sqlsrv_fetch_array($ddlTrans,SQLSRV_FETCH_NUMERIC)){ ?>


                          <option value="<?php echo $row[1];?>"><?php echo $row[0];?></option>

                          <?php

                        }
                        sqlsrv_free_stmt($ddlTrans);
                        sqlsrv_close($conn);
                        } catch(\Exception $e){
                          if(!empty($ddlTrans))
                          sqlsrv_free_stmt($ddlTrans);
                          sqlsrv_close($conn);
                          $errorMessage=$e->getMessage();
                          //die(print_r($e->getMessage()));
                        }
                        ?>
                      </select>

                    </div>

                      <button type="submit"  name='submit'class="btn btn-primary btn-lg">Search</button>
                      </div>

                  </div>
                </form>

            </div>
          </div>
        </div><!-- /.blog-post -->
        <br>
        <button id="advbutton" type="button" class="btn-small btn-info" onclick="showhide();">Advance Search</button>
      </div>

      <div class="blog-post" id="newpost" style="display:none;">
        <div class="container">
          <div class="row">
            <form  role="form">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Parameter1 :</label>
                  <input type="email" class="form-control" id="email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pwd">Parameter2:</label>
                  <input type="password" class="form-control" id="pwd">
                </div>
              </div>


          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Parameter3 :</label>
                <input type="email" class="form-control" id="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Parameter4:</label>
                <input type="password" class="form-control" id="pwd">
              </div>
            </div>
            <div class="row" align="right">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>

          </div>

          </form>
        </div><!-- /.blog-post -->
      </div>


  <?php
    if ($searchSuccess===false || !empty($errorMessage)){?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> <?php echo $errorMessage;?>
      </div>

   <?php }
  else{  ?>
  <div class="table-responsive"  <?php if($ShowDivFlag===false) {echo 'style="display:none !important;"';}?> >
    <table class="table table-striped text-lg-center" style="text-align:center!important">
      <thead> <tr>
        <th style="text-align:center">#</th>
        <th style="text-align:center">Deed No</th>
        <th style="text-align:center">Year</th>
        <th style="text-align:center">TransType</th>
        <th style="text-align:center">Executant</th>
        <th style="text-align:center">Claimant</th>
        <th style="text-align:center">ExecutionDate</th>
      </tr> </thead>
      <tbody>
      <tr style="font-size:14px; align-content: center;">
        <th scope="row">1</th>
        <td><?php echo $deed ?></td>
        <td><?php echo $Year ?></td>
        <td><?php echo $tranname ?></td>
        <td><?php echo $execSurname.' '.$execMiddleName ?></td>
        <td><?php echo $claimSurname.' '.$claimMiddlename ?></td>
        <td><?php echo $DateofPresentant ?></td>
        <td><div  type ="button"class="btn btn-sm btn-info"><a href="src/Igr/GetScanDeed.php?DeedNo=<?php echo $deed;?>&Year=<?php echo $Year;?>" target="deedview">ViewDeed</a></div></td>
      </tr>
      </tbody>
    </table>
  </div>
      <?php }?>
</div>




    </div><!-- /.blog-main -->

  </div><!-- /.row -->

</div><!-- /.container -->
<?php
if ($searchSuccess===true){?>
<div class="container" <?php if($ShowDivFlag===false) {echo 'style="display:none !important;"';}?>>
  <div class="col-sm-10 col-sm-offset-2">
    <iframe name="deedview" id="deedview" frameborder="5" width="900"height="900"  scrolling="no" ></iframe>
  </div>
  </div>
<?php }?>
<footer class="blog-footer">
  <p>Develop & Design </a> by <a href="">NIC MANIPUR STATE CENTRE</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./jquery/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="./dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
