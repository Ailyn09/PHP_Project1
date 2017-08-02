<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Bootstrap CSS File  -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  />
</head>
<script type="text/javascript">
  $(function () {
    function moveItems(origin, dest) {
      $(origin).find(':selected').appendTo(dest);
    }

    function moveAllItems(origin, dest) {
      $(origin).children().appendTo(dest);
    }

    $('#left').click(function () {
      moveItems('#sbTwo', '#sbOne');
    });

    $('#right').on('click', function () {
      moveItems('#sbOne', '#sbTwo');
      if ($("select #sbOne").children().size() == 1) {
        $('#right').attr('disabled', 'disabled');
        $('#rightall').attr('disabled', 'disabled');
      } else {

        $('#right').removeAttr('disabled', 'disabled');
        $('#rightall').removeAttr('disabled', 'disabled');
      }
    });

    $('#leftall').on('click', function () {
      moveAllItems('#sbTwo', '#sbOne');
    });

    $('#rightall').on('click', function () {
      moveAllItems('#sbOne', '#sbTwo');
      if ($("select #sbOne").children().size() == 1) {
        alert("Without options")
      } else {
        alert("With options")
      }
    });
  });

</script>
<body>
  <form id="form1" name="form1" method="POST" action="#"><!--display.php-->
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <select name="new" id="sbOne" multiple="multiple" class="form-control">
          <option value="Alpha">Alpha</option>
          <option value="Beta">Beta</option>
          <option value="Gamma">Gamma</option>
          <option value="Delta">Delta</option>
          <option value="Epsilon">Epsilon</option>
        </select>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <select name="test[]" id="sbTwo" multiple="multiple" class="form-control">
          <option value="Zeta">Zeta</option>
          <option value="Eta">Eta</option>
        </select>
      </div>
    </div>

    <br />

    <button type="button" class="btn btn-default" id="left"><span class="fa fa-angle-left"></span></button>
    <button type="button" class="btn btn-default" id="right"><span class="fa fa-angle-right"></span></button>
    <button type="button" class="btn btn-default" id="leftall"><span class="fa fa-angle-double-left"></span></button>
    <button type="button" class="btn btn-default" id="rightall"><span class="fa fa-angle-double-right"></span></button>
    <input type="submit" class="btn btn-default" name="Submit" value="Submit" tabindex="2" />
  </form>

  <!--<form id="form1" name="form1" method="POST" action="a.php">
    <div class="row">     
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <select name="test[]" id="sbTwo" multiple="multiple" class="form-control">
          <option value="Alpha">Alpha</option>
          <option value="Beta">Beta</option>
          <option value="Gamma">Gamma</option>
          <option value="Delta">Delta</option>
          <option value="Epsilon">Epsilon</option>
        </select>
      </div>
    </div>    
    <br />
    <input type="submit" class="btn btn-default" name="submit" value="Submit" tabindex="2" />
  </form>-->
</body>

</html>

<style type="text/css">
  /* Button Primary */

  .btn-primary {
    color: #0275d8;
    background-image: none;
    background-color: transparent;
    border-color: #0275d8;
  }

  .btn-primary:hover {
    background-color: #0275d8;
    color: white;
    border-color: #0275d8;
  }
</style>

<?php
    //can be in separete page in display.pgp
    // include Database connection file 
	include("ajax/db_connection.php");
    
    $i = 0;
    foreach ($_POST['test'] as $value){  
    echo $value."\n";

    $x=$i++;
    $query = "INSERT INTO users (first_name,last_name,email) VALUES( '$value',$x,'')";
		if (!$result = mysqli_query($db, $query)) {
	        exit(mysqli_error());
        }
    }
   var_dump($_POST);

?>
