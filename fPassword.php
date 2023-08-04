<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-500">

  <div class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded mt-10" id="pass">
    <h1 class="text-3xl font-bold mb-6" id="headerText">Forgot Password</h1>
    <form action="php/code.php" method="post" enctype="multipart/form-data">
      <div>
        <input type="email" name="email" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Enter Email">
        <input type="number" name="otp" class="w-full px-3 py-2 border rounded-md mb-2 " placeholder="Enter OTP">
      </div>
      <button type="submit" name="sendOTP" class="block bg-green-500 text-white px-4 py-2 rounded-md">Change</button>
      <a href="login.php">
        <p class="text-center" style="color: blue; font-size: 20px;"><u>Login</u></p>
      </a>
    </form>
  </div>

</body>

</html>