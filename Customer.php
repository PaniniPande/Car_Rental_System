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

    <title>CUSTOMER</title>
    
  <body>



  <div class="d-flex justify-content-center">
  <form>
    <div class="form-group mt-3">
      <label for="phone" class="d-flex justify-content-center">Customer ID</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your ID" class="d-flex justify-content-center">
    </div>
    <div class="form-group mt-3">
      <label for="phone" class="d-flex justify-content-center">Phone Number</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your number" class="d-flex justify-content-center">
    </div>
    <div class="form-group mt-3">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="customer-type" id="individual" value="individual">
        <label class="form-check-label" for="individual">Individual</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="customer-type" id="company" value="company">
        <label class="form-check-label" for="company">Company</label>
      </div>
    </div>
    <div class="form-group mt-3" id="name-fields" style="display:none;">
      <label for="first-name" class="d-flex justify-content-center">First Name</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your First Name" class="d-flex justify-content-center">
      <label for="last-name" class="d-flex justify-content-center mt-3">Last Name</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your Last Name" class="d-flex justify-content-center">
    </div>
    <div class="form-group mt-3" id="company-field" style="display:none;">
      <label for="company-name" class="d-flex justify-content-center">Company Name</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your Company Name" class="d-flex justify-content-center">
    </div>
    <div class="form-group mt-3 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
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
        $CustID = $_POST['custid'];
        $Phone = $_POST['phone'];
        // $lName = $_POST['lName'];
    
        // Prepare the SQL statement
        $stmt = $pdo->prepare('INSERT INTO customer (cust_id,phone) VALUES (?,?)');
        $stmt->execute([$CustID,$Phone]);

        $selectedValue = $_POST['customertype'];

        // If the first dropdown value is selected
        if ($selectedValue == "individual") {
            // Insert data into individual table
            // $conn = new mysqli("localhost", "username", "password", "database");
            $ini = $_POST['customername'];
            $lname = $_POST['customerlname'];
            $sql1 = "INSERT INTO ind_cust (cust_id,initials,lastname) VALUES (?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute([$CustID,$ini,$lname]);
        }
        // If the second dropdown value is selected
        else {
            // Insert data into company table
            $busi = $_POST['company'];
            // $lname = $_POST['customerlname'];
            $sql2 = "INSERT INTO business (cust_id,company) VALUES (?,?)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$CustID,$busi]);
        }


    
        // Redirect to the page that displays the records
        // header('Location: display_records.php');
        exit;
    }
?>



    
  </body>
</html> 