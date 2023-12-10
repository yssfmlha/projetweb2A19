<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .payment-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #007bff;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="payment-container">
<h2><a href="../index.html" style="color:#FF5722;">Home</a></h2>
    <h2 style="color: #FF5722;">Payment Page</h2>

    <!-- Display the total amount to be paid -->
    <p>Total Amount: $<?php echo isset($_GET['total']) ? $_GET['total'] : '0.00'; ?></p>

    <!-- Simple credit card payment form (this is just an example) -->
    <form action="home.php" method="post">
        <label for="cardNumber">Credit Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>
        <br>
        <label for="expiryDate">Expiry Date:</label>
        <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
        <br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>
        <br>
        <button type="submit" style="background-color:black;">Submit Payment</button>
    </form>
</div>

</body>
</html>
