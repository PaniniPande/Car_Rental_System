<!doctype html>
<html lang="ar" dir="rtl">
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
  body {
    background-color: #f8f9fa;
  }
  form {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #fff;
  }
  label {
    font-weight: bold;
    margin-bottom: 5px;
  }
  input {
    margin-bottom: 10px;
  }
  #name-fields, #company-field {
    display: none;
  }
  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }
  .btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css">

    <title>Amount_Due</title>
    
    <body>
  <div class="d-flex justify-content-center">
    <form>
      <div class="form-group mt-3">
        <label for="vehicle-id" class="d-flex justify-content-center">Vehicle ID</label>
        <input type="tel" class="form-control" id="vehicle-id" placeholder="Enter Vehicle ID">
      </div>
      <div class="form-group mt-3">
        <label for="owner-id" class="d-flex justify-content-center">Customer ID</label>
        <input type="tel" class="form-control" id="owner-id" placeholder="Enter Customer ID">
      </div>
      <div class="form-check mt-3">
        <input class="form-check-input" type="radio" name="rental-type" id="daily" value="daily" checked>
        <label class="form-check-label" for="daily">
          Daily
        </label>
      </div>
      <div class="form-group mt-3" id="daily-field">
        <label for="daily-count" class="d-flex justify-content-center">Number of Days</label>
        <input type="number" class="form-control" id="daily-count" placeholder="Enter number of days">
      </div>
      <div class="form-check mt-3">
        <input class="form-check-input" type="radio" name="rental-type" id="weekly" value="weekly">
        <label class="form-check-label" for="weekly">
          Weekly
        </label>
      </div>
      <div class="form-group mt-3" id="weekly-field" style="display: none;">
        <label for="weekly-count" class="d-flex justify-content-center">Number of Weeks</label>
        <input type="number" class="form-control" id="weekly-count" placeholder="Enter number of weeks">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-3">Calculate</button>
      </div>
      <div class="form-group mt-3">
        <label for="total-amount-due" class="d-flex justify-content-center">Total Amount Due</label>
        <input type="number" class="form-control" id="total-amount-due" placeholder="200" readonly>
      </div>
    </form>
  </div>
  <script>
    // show/hide daily/weekly fields based on selection
    $(document).ready(function () {
      $('input[type="radio"]').click(function () {
        if ($(this).attr("value") == "daily") {
          $("#daily-field").show();
          $("#weekly-field").hide();
        }
        if ($(this).attr("value") == "weekly") {
          $("#daily-field").hide();
          $("#weekly-field").show();
        }
      });
    });
  </script>

<?php
    // Connect to the Omega database
   
    $pdo = new PDO('mysql:host=10.208.63.68;dbname=mxj3280', 'mxj3280', 'Mjuta2022!');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $CustID = $_POST['custid'];
        // $Phone = $_POST['phone'];
        $typeid = $_POST['typeid'];
        $rentid = $_POST['rentalid'];
        // $lName = $_POST['lName'];
    
        // Prepare the SQL statement
        // $stmt = $pdo->prepare('INSERT INTO customer (cust_id,phone) VALUES (?,?)');
        // $stmt->execute([$CustID,$Phone]);

        $selectedValue = $_POST['rentaltype'];

        // If the first dropdown value is selected
        if ($selectedValue == "daily") {
            // Insert data into individual table
            // $conn = new mysqli("localhost", "username", "password", "database");
            $ini = $_POST['noofdays'];
            // $lname = $_POST['customerlname'];
            
            $sql1 = "SELECT daily_rate FROM car_type WHERE type_id = ?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute([$typeid]);
            $car_type = $stmt1->fetch();

            $dai = $car_type['daily_rate'];
            $cal = $dai * $ini;
        }
        // If the second dropdown value is selected
        else {
            // Insert data into business table
            $busi = $_POST['noofweeks'];
            // $lname = $_POST['customerlname'];
            $sql2 =  "SELECT weekly_rate FROM car_type WHERE type_id = ?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$typeid]);

            $car_type1 = $stmt2->fetch();

            $wee = $car_type1['weekly_rate'];
            $cal1 = $dai * $busi;
        }

        echo 'Amount Due is';
        echo $cal;
        // Redirect to the page that displays the records
        // header('Location: display_records.php');
        exit;
    }
?>








    
  </body>
</html> 