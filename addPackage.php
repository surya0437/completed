<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

  <div class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded">
    <h1 class="text-3xl font-bold mb-6">Add Package</h1>

    <form action="" method="post">
      <!-- Number of Fields Input -->
      <div class="mb-4">
        <label for="numberOfField" class="block mb-2 font-semibold">Please enter the number of highlights and itinearary you want to
          add:</label>
          <input type="text" name="numberOfField" id="numberOfField" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Enter number of heighlights">
          <input type="text" name="numberOfItinearary" id="numberOfItinearary" class="w-full px-3 py-2 border rounded-md" placeholder="Enter number of itinearary">
        </div>

      <!-- Add Input Field Button -->
      <button type="submit" name="numberOfHighlight" class="block bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Add
        Input Field</button>
    </form>
    <form action="php/code.php" method="post" enctype="multipart/form-data">

      <!-- Other Input Fields -->
      <div>
        <input type="text" name="packageTitle" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Package Title">
        <input type="text" name="packageDescription" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Package Description">
        <input type="text" name="accommodation" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Accommodation">
        <input type="text" name="mealsAvailable" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Meals Available">
        <input type="text" name="bestTimeForVisit" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Best Time For Visit">
        <input type="text" name="difficultyLevel" class="w-full px-3 py-2 border rounded-md mb-2" placeholder="Difficulty Level">

        <select name="difficultyLevelPercentage" class="w-full px-3 py-2 border rounded-md mb-2">
          <option value="">Select Difficulty Level Percentage</option>
          <?php
          for ($i = 1; $i <= 100; $i++) {
            echo '<option value="' . "$i" . '">' . "$i" . '</option>';
          }
          ?>
        </select>
      </div>

      <!-- Thumbnail Image and Other Images Input -->
      <div class="mb-4">
        <input type="file" name="thumbnailImage" class="mb-2">
        <p class="text-sm text-gray-500">Thumbnail Image</p>
      </div>
      <div class="mb-4">
        <input type="file" name="image[]" multiple>
        <p class="text-sm text-gray-500">Other images (Select multiple images)</p>
      </div>

      <!-- Input Container for Highlights -->
      <div id="inputContainer" class="mb-4">

        <?php
        if (isset($_POST['numberOfHighlight'])) {

          echo '<label for="numberOfField" class="block mb-2 font-semibold"><br>Please enter major highlight</label>';
          $num1 = $_POST['numberOfField'];
          $num2 = $_POST['numberOfItinearary'];
          
          for ($i = 1; $i <= $num1; $i++) {
            echo '<input type="text" class="w-full px-3 py-2 border rounded-md mb-2" name="highlights[]" id="" placeholder="Enter Major Highlight - ' . "$i" . '">';
          }

          echo '<input type="hidden" name="num1" id="" value = "' . "$num1" . '">';

          echo '<label for="numberOfItinearary" class="block mb-2 font-semibold"><br>Please enter itinearary and itinearary description</label>';

          for ($i = 1; $i <= $num2; $i++) {
            echo '<input type="text" class="w-full px-3 py-2 border rounded-md mb-2" name="itinearary[]" id="" placeholder="Enter Itinearary - ' . "$i" . '">';
            echo '<input type="text" class="w-full px-3 py-2 border rounded-md mb-2" name="itineararyDescription[]" id="" placeholder="Enter Itinearary Description - ' . "$i" . '">';
          }

          echo '<input type="hidden" name="num2" id="" value = "' . "$num2" . '">';
        }
        ?>
      </div>

      <!-- Add Package Button -->
      <button type="submit" name="addPackage" class="block bg-green-500 text-white px-4 py-2 rounded-md">Add
        Package</button>
    </form>
  </div>
</body>

</html>