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

    <title>Rental_rate</title>
    
  <body>

  <div class="d-flex justify-content-center">
  <form>
    <div class="form-group mt-3">
      <label for="vehicle-id" class="d-flex justify-content-center">Vehicle ID</label>
      <input type="tel" class="form-control" id="vehicle-id" placeholder="Enter Vehicle ID">
    </div>
    <div class="form-check mt-3">
      <input class="form-check-input" type="radio" name="rental-type" id="daily" value="daily">
      <label class="form-check-label" for="daily">
        Daily
      </label>
      <div class="form-group mt-3" id="daily-field" style="display: none;">
        <label for="daily-rate" class="d-flex justify-content-center">New Daily Rate</label>
        <input type="number" class="form-control" id="daily-rate" placeholder="Enter new daily rate">
      </div>
    </div>
    <div class="form-check mt-3">
      <input class="form-check-input" type="radio" name="rental-type" id="weekly" value="weekly">
      <label class="form-check-label" for="weekly">
        Weekly
      </label>
      <div class="form-group mt-3" id="weekly-field" style="display: none;">
        <label for="weekly-rate" class="d-flex justify-content-center">New Weekly Rate</label>
        <input type="number" class="form-control" id="weekly-rate" placeholder="Enter new weekly rate">
      </div>
    </div>
    <div class="form-group mt-3">
      <button type="submit" class="btn btn-primary">UPDATE</button>
    </div>
  </form>
</div>
<script>
  const dailyField = document.getElementById('daily-field');
  const weeklyField = document.getElementById('weekly-field');
  const dailyRadio = document.getElementById('daily');
  const weeklyRadio = document.getElementById('weekly');

  dailyRadio.addEventListener('click', () => {
    dailyField.style.display = 'block';
    weeklyField.style.display = 'none';
  });

  weeklyRadio.addEventListener('click', () => {
    dailyField.style.display = 'none';
    weeklyField.style.display = 'block';
  });
</script>

<?php
    // Connect to the Omega database
   
    $pdo = new PDO('mysql:host=10.208.63.68;dbname=mxj3280', 'mxj3280', 'Mjuta2022!');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $CarID = $_POST['carid'];
        
        // $lName = $_POST['lName'];
    
        // Prepare the SQL statement

        $selectedValue = $_POST['cartype'];

        // If the first dropdown value is selected
        if ($selectedValue == "daily") {
            // Insert data into individual table
            // $conn = new mysqli("localhost", "username", "password", "database");
            $ini = $_POST['d_rate'];
            // $lname = $_POST['customerlname'];
            $sql1 = "UPDATE  Car_type SET daily_rate = ? WHERE type_id =?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute([$ini,$CarID]);
        }
        // If the second dropdown value is selected
        else {
            // Insert data into business table
            $busi = $_POST['w_rate'];
            // $lname = $_POST['customerlname'];
            $sql2 = "UPDATE Car_type SET weekly_rate = ? WHERE type_id =?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$busi,$CarID]);
        }


    
        // Redirect to the page that displays the records
        // header('Location: display_records.php');
        exit;
    }
?>




    
  </body>
</html> 