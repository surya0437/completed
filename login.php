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

  <div class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded mt-40">
    <h1 class="text-3xl font-bold mb-6">Login</h1>
    <form action="php/code.php" method="post" enctype="multipart/form-data">
      <div>
        <input type="email" name="email" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Enter Email">
        <input type="text" name="password" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Enter Password">
      </div>
      <button type="submit" name="login" class="block bg-green-500 text-white px-4 py-2 rounded-md">Login</button>
      <a href="changePassword.php">
        <p class="text-center" style="color: blue; font-size: 20px;"><u>Change your password</u></p>
      </a>
      <a href="fPassword.php">
        <p class="text-center" style="color: blue; font-size: 20px;"><u>Forgot Password</u></p>
      </a>
      <?php
      if (isset($_SESSION['loginError'])) {
      ?>
        <div>
          <p class="text-center" style="color: red; font-size: 22px;"><?php echo $_SESSION['loginError']; ?></p>
        </div>
      <?php
      }
      ?>
    </form>
  </div>
</body>

</html>