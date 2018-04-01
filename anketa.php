<!DOCTYPE html>
<head>
  <title>Sign up</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <style type="text/css">
    div {
    background-color: #C0C0C0;

  }
  </style>

</head>
<body>

  <div class="col-sm-4 col-sm-offset-4">
    <h2 class="form-signin-heading">Please sign up</h2>
      <form method="POST">
        <label for="exampleInputName"><br>Your Name</br></label>
        <input type="text" class="form-control" name="name" maxlength="10" pattern="^[a-zA-Z]+$" placeholder="Name" required autofocus>
        <label for="exampleInputSurname"><br>Your Last Name</br></label>
        <input type="text" name="lastname" maxlength="10" pattern="^[a-zA-Z]+$" class="form-control" placeholder="Last Name" required>
        <label for="exampleInputAge"><br>Your Age</br></label>
        <br><input type="text" name="age" min="1" max="100" maxlength="3" class="form-control" placeholder="Age" required></br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>
        <br>
</div>
      </form>
  <?php

  if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];

    $db_host = "localhost";
    $db_user = "stud";
    $db_password = "123";
    $db_table = "users";

    $db = mysql_connect($db_host, $db_user, $db_password) OR DIE("No connect ");
    mysql_select_db("free",$db);

    $result = mysql_query ("INSERT INTO ".$db_table." (name, lastname, age) VALUES ('$name','$lastname','$age')");
    // if ($result = 'true'){
    //   echo "Informaciya zanesena";
    // }
    // else{
    //   echo "Informaciya NE zanesena";
    // }
  ?> 

  <div class="col-sm-4 col-sm-offset-4">
    <table class="table-condensed">
        <tr>
          <th>Name:</th>
          <td> <?php echo $name; ?></td>
        </tr>
      </table>
      <table class="table-condensed">
        <tr>
          <th>Lastname:</th>
          <td> <?php echo $lastname; ?></td>
        </tr>
      </table>
      <table class="table-condensed">
        <tr>
          <th>Age:</th>
          <td> <?php echo $age; ?></td>
  </table>
  </div>
<?php
    $write = fopen("tet.txt", "w");
    $zap = "Name: $name"."Last_Name: $lastname"."Age: $age";
    $test = fwrite($write, $zap);
    // if ($test) echo "Zipisanno";
    // else echo "EROR";
    fclose($write);
}
?>
</body>
</html>
