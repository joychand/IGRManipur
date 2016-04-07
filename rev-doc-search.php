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
	          <div class="col-sm-3 blog-sidebar">

          <div class="sidebar-module">
            <h4>Links</h4>
            <ol class="list-unstyled">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
            </ol>
          </div>
		          
        </div>

        <div class="col-sm-9 blog-main">

          <div class="blog-post">
		  <div class="container">
		  <div class="row">
		  <div class="col-md-12">
            <h2 class="blog-post-title">Search Documents</h2>
			<div class="row">
		<form class="form-inline" role="form">
  <div class="form-group">
    <label for="email">Doc No. :</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Year :</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</div>
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

          


        

        </div><!-- /.blog-main -->
      </div><!-- /.row -->

    </div><!-- /.container -->

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