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
    <h1 class="text-3xl font-bold mb-6" id="headerText">Enter OTP</h1>
    <form action="php/code.php" method="post" enctype="multipart/form-data">
      <div>
        <input type="Email" name="email" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Enter Email">
        <input type="number" name="otp" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Enter OTP">
      </div>
      <button type="submit" name="verifyOTP" class="block bg-green-500 text-white px-4 py-2 rounded-md">Verify</button>
      <?php
      if (isset($_SESSION['loginError'])) {
      ?>
        <div>
          <p class="text-center" style="color: green; font-size: 22px;"><?php echo $_SESSION['loginError']; ?></p>
        </div>
      <?php
      }
      ?>
    </form>
  </div>

</body>

</html>