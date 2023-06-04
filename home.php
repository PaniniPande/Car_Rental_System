<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}

		.container {
			margin: 0 auto;
			max-width: 800px;
			padding: 20px;
			text-align: center;
		}

		.button {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 10px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Welcome to Car Rental System</h1>
		<p>Please select an option from below:</p>
		<a href="http://localhost/db/db2/Customer.php?customer-type=company"  class="button">Customer Table</a>
		<a href="http://localhost/db/db2/Car.php" class="button">Car</a>
		<a href="http://localhost/db/db2/Rental.php" class="button">Rental</a>
		<a href="http://localhost/db/db2/Amount_Due.php" class="button">Amount Due</a>
		<a href="http://localhost/db/db2/Rental_rate.php" class="button">Rental Rate</a>
	</div>
</body>
</html>
