<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

  <div class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded mt-40">
    <h1 class="text-3xl font-bold mb-6">Add Image</h1>

    <form action="php/code.php" method="post" enctype="multipart/form-data">

      <!-- Other Input Fields -->

      <div class="mb-4">
        <input type="file" name="image[]" multiple>
        <p class="text-sm text-gray-500">Other images (Select multiple images)</p>
      </div>

      <!-- Add Image Button -->
      <button type="submit" name="updateGallery" class="block bg-green-500 text-white px-4 py-2 rounded-md">Add
        Image</button>
    </form>
  </div>
</body>

</html>