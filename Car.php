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

    <title>Car</title>
    
  <body>


  <div class="d-flex justify-content-center">
  <form method="POST" action="">

    <div class="form-group mt-3">
      <label for="vehicleid" class="d-flex justify-content-center">Vehicle ID</label>
      <input type="text" class="form-control" id="vehicleid" placeholder="Enter Vehicle ID">
    </div>

    <div class="form-group mt-3">
      <label for="ownerid" class="d-flex justify-content-center">Owner ID</label>
      <input type="text" class="form-control" id="ownerid" placeholder="Enter Owner ID">
    </div>

    <div class="form-group mt-3">
      <label for="startdate" class="d-flex justify-content-center">Start Date</label>
      <input type="date" class="form-control" id="startdate" placeholder="Enter Start Date">
    </div>

    <div class="form-group mt-3">
      <label for="enddate" class="d-flex justify-content-center">End Date</label>
      <input type="date" class="form-control" id="enddate" placeholder="Enter End Date">
    </div>

    <div class="form-group mt-3">
      <label for="modeltype" class="d-flex justify-content-center">Model Type</label>
      <input type="text" class="form-control" id="modeltype" placeholder="Enter Model Type">
    </div>

    <div class="form-group mt-3">
      <label for="year" class="d-flex justify-content-center">Year</label>
      <input type="tel" class="form-control" id="year" placeholder="Enter Year">
    </div>

    <div class="form-group mt-3">
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

    <div class="form-group mt-3">
      <label for="car-category" class="d-flex justify-content-center">Car-Category</label>
      <select class="form-control" id="car-category">
        <option value="" selected>Select the car</option>
        <option value="regular">Regular</option>
        <option value="luxury">Luxury</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Add Data</button>
  </form>

  <?php
// Connect to the Omega SQL database
$pdo = new PDO('mysql:host=10.208.63.68;dbname=mxj3280', 'mxj3280', 'Mjuta2022!');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    //$iOwnerID = $_POST['iOwnerID'];
    $vehicleid = $_POST['vehicleid'];
    $ownerid = $_POST['ownerid'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $modeltype = $_POST['modeltype'];
    $year = $_POST['year'];
    $cartype = $_POST['car-type'];
    $carcategory = $_POST['car-category'];



    // $fName = $_POST['fName'];
    // $lName = $_POST['lName'];

    // Prepare the SQL statement
    $stmt = $pdo->prepare('INSERT INTO CAR (Vehicle_ID, Owner_ID, Avail_StartDate, Avail_EndDate, Model, Year) VALUES (?,?,?,?,?,?)');
    $stmt->execute([$vehicleid,$ownerid,$startdate,$enddate,$modeltype,$year]);

    // Redirect to the page that displays the records
    header('Location: home.php');
    exit;
}
?>

</div>










    
  </body>
</html> 