<?php

$displaymodal = false;
    if(isset($_POST['name'])) {
    
    $con = mysqli_connect('localhost', 'root', '', 'nursery');
    
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $fname = $_POST['fname'];
    $fmob = $_POST['fmob'];
    $address = $_POST['address'];
    $receiptno = rand(10000,500000);

    if($con->connect_error) {
        die("connection to this database failed due to " . $con->connect_error);
    }
    else {

      $stmt = $con->prepare("INSERT INTO `nursery` (`Name`, `Date Of Birth`, `Father's Name`, `Father's Mobile No`, `Address`, `Receipt No`) VALUES ('$name', '$dob', '$fname', '$fmob', '$address', '$receiptno');");

      $displaymodal = "Registration Successful";

      $stmt->execute();
      $stmt->close();
      $con->close();
    }
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <title>Nursery-Form</title>
  </head>
  <body>

  <!-- modal -->
  <?php
        if($displaymodal) {

         echo '<div class="alert alert-success" role="alert">
         '.$displaymodal.'<br>  Your details are: <br> Name: '.$name.' <br> Date of Birth: '.$dob.' <br> Fathers name: '.$fname.' <br> fathers mobile number: '.$fmob.' <br> Address: '.$address.' <br> Receipt No.: '.$receiptno.'

       </div>';
        }
        ?>
    <h1 class="text-center">Nursery Admission Form</h1>

    <form action="index.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" name="dob" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="fname" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Father's Mobile Number</label>
            <input type="text" class="form-control" name="fmob" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>


        
        
          


      </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>