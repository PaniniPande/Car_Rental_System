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

    <title>Rental</title>
    
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
    
  <div class="form-group mt-3 ">
      <label for="car-type" class="d-flex justify-content-center">Car-Type</label>
      <select class="form-control" id="car-type">
        <option value="" selected>Select the car</option>
        <option value="van">Van</option>
        <option value="compact">Compact</option>
        <option value="medium">Medium</option>
        <option value="suv">SUV</option>
        <option value="truck">Truck</option>
        <option value="large">Large</option>
      </select>
    </div>
    <div class="form-check mt-3">
      <input class="form-check-input" type="radio" name="rental-type" id="daily" value="daily" checked>
      <label class="form-check-label" for="daily">
        Daily
      </label>
    </div>
    <div class="form-check mt-3">
      <input class="form-check-input" type="radio" name="rental-type" id="weekly" value="weekly">
      <label class="form-check-label" for="weekly">
        Weekly
      </label>
    </div>
    <div class="form-group mt-3 text-center">
      <label for="start-date" class="d-flex justify-content-center">Start Date</label>
      <input type="date" class="form-control" id="start-date" placeholder="(YYYY/MM/DD)" pattern="\d{4}/\d{2}/\d{2}">
    </div>
    <div class="form-group mt-3 text-center">
      <label for="end-date" class="d-flex justify-content-center">End Date</label>
      <input type="date" class="form-control" id="end-date" placeholder="(YYYY/MM/DD)" pattern="\d{4}/\d{2}/\d{2}">
    </div>
    
    
    <div class="form-group mt-3 ">
      <label for="car-type" class="d-flex justify-content-center">Car-Category</label>
      <select class="form-control" id="car-type">
        <option value="van">Toyota</option>
        <option value="compact">Honda</option>
        <option value="medium">Nissan</option>
        <option value="suv">Ford</option>
        <option value="truck">Chevrolet</option>
        <option value="large">MercedesBenz</option>
        <option value="large">Volkswagen</option>
        <option value="large">Hyundai</option>
        <option value="large">Kia</option>
        <option value="large">MercedesBenz</option>
      </select>

    <button type="submit" class="btn btn-primary mt-3">Add Data</button>
  </form>
</div>


<script>
  // show/hide name/company fields based on selection
  $(document).ready(function(){
    $('input[type="radio"]').click(function(){
      if($(this).attr("value")=="individual"){
        $("#name-fields").show();
        $("#company-field").hide();
      }
      if($(this).attr("value")=="company"){
        $("#name-fields").hide();
        $("#company-field").show();
      }
    });
  });
</script>

<?php
    // Connect to the Omega database
   

    $pdo = new PDO('mysql:host=10.208.63.68;dbname=mxj3280', 'mxj3280', 'Mjuta2022!');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $rentalID = $_POST['custid'];
        // $ = $_POST['phone'];
        // $lName = $_POST['lName'];
    
        // Prepare the SQL statement
        $stmt = $pdo->prepare('INSERT INTO rents (cust_id) VALUES (?)');
        $stmt->execute([$custID]);

        $selectedValue = $_POST['custtype'];

        // If the first dropdown value is selected
        if ($selectedValue == "daily") {
            // Insert data into individual table
            // $conn = new mysqli("localhost", "username", "password", "database");
            $ini = $POST['startdate'];
            $lname = $_POST['noofdays'];
            $edate = date('Y-m-d', strtotime($ini. ' + '.$lname.'days'));
            $sql1 = "INSERT INTO daily_rental (cust_id,startdate,no_of_days,return_date) VALUES (?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute([$custID,$ini,$lname,$edate]);

            // Retrieve the available cars based on the rental dates
            // $stmt = $pdo->prepare('SELECT * FROM cars WHERE car_id NOT IN (SELECT car_id FROM rental WHERE rental_id IN (SELECT cust_id FROM daily_rental WHERE startdate >= ? AND return_date <= ?))');
            $stmt = $pdo->prepare('SELECT car_id,model,year_ FROM cars WHERE  avail_startdate <= ? AND avail_enddate >= ?');
            $stmt->execute([$ini,$edate]);
            $available_cars = $stmt->fetchAll();

            // Populate the dropdown list with the available cars
            echo '<select name="car_id">';
            foreach ($available_cars as $car) {
                echo '<option value="' . $car['car_id'] . '">' . $car['model'] . ' (' . $car['year_'] . ')</option>';
            }
            echo '</select>';

        }
        // If the second dropdown value is selected
        else {
            // Insert data into business table
            $busi = $_POST['startdate'];
            $lnamew = $_POST['noofweeks'];
            $edate1 = date('Y-m-d', strtotime($busi. ' + '.$lnamew.'weeks'));
            // echo $edate1;
            $sql2 = "INSERT INTO weekly_rental (cust_id,startdate,no_of_weeks,return_date) VALUES (?,?,?,?)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$rentalID,$busi,$lnamew,$edate1]);

            
        }


        // Redirect to the page that displays the records
        // header('Location: display_records.php');
        exit;
    }
?>




    
  </body>
</html> 