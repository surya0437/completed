<?php
require_once('../php/db.php');

$selectImageQry = "SELECT * FROM `gallery`";
$selectImage = mysqli_query($con, $selectImageQry);
$allimages = array();
$selectedImage1 = array();
$selectedImage2 = array();
$selectedImage3 = array();

$i = 1;
while ($row = mysqli_fetch_assoc($selectImage)) {
  $image_id = $row['image_id'];
  $allimages[] = $row['image'];
  if ($i == 1) {
    $selectedImage1[] = $row['image'];
    $i++;
  } else if ($i == 2) {
    $selectedImage2[] = $row['image'];
    $i++;
  } else {
    $selectedImage3[] = $row['image'];
    $i = 1;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gallery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./packages-section/fontawesome/css/all.css" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" /> -->
  <script src="../tailwindcss.js"></script>

  <style>
    body {
      letter-spacing: 1.5px;
      line-height: 100px;
    }

    /* Add custom styles here */
    .bg-image {
      position: relative;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .bg-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .center-text {
      position: absolute;
      top: 50%;
      left: 30%;
      transform: translate(-15%, -20%);
      text-align: center;
    }

    .center-text h1 {
      font-size: 6rem;
      font-weight: bold;
      color: #f2f2f2;
      font-family: "Post No Bills Colombo ExtraBold", sans-serif;
      text-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.32);
      letter-spacing: 2.3px;
    }

    .center-text p {
      color: #f2f2f2;
      text-align: center;
      text-shadow: 0px 0px 5.656991958618164px 0px rgba(0, 0, 0, 0.32);
      font-size: 17px;
      font-family: "Poppins", sans-serif;
      letter-spacing: 1.25px;
    }

    .social-icons {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 5px;
      margin-bottom: 1rem;
    }

    .social-icons a:first-child::before {
      content: "";
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      width: 1px;
      height: 40px;
      background-color: white;
    }

    .social-icons a:last-child::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      width: 1px;
      height: 35px;
      background-color: white;
    }

    .social-icons a {
      color: #f2f2f2;
      font-size: 20px;
      position: relative;
      left: 6rem;
      top: 1.5rem;
    }

    .small-image {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
    }

    .popular::before {
      content: "";
      position: absolute;
      left: -8rem;
      top: 50%;
      height: 1px;
      width: 7rem;
      background-color: gray;
    }

    .popular::after {
      content: "";
      position: absolute;
      right: -8rem;
      top: 50%;
      height: 1px;
      width: 7rem;
      background-color: gray;
    }

    .slide {
      transition: transform 2s ease-out;
    }

    @media screen and (max-width: 768px) {
      .hidden-min {
        display: none !important;
      }
    }
  </style>
</head>

<body>

  <!-- Navigation Bar -->
  <nav id="nav" class="bg-white md:bg-transparent left-0 absolute top-0 max-w-screen flex justify-center items-center right-0 z-50 md:text-white">
    <div class="container relative md:flex justify-between py-4 px-6 lg:w-screen">
      <div class="text-white text-xl font-bold w-14 md:w-auto">
        <img src="../assets/logo.png" width="100%" height="100%" />
      </div>
      <div class="absolute md:hidden top-10 right-10 flex flex-col gap-1" id="hamburger">
        <div class="h-[3px] w-4 bg-black transition-transform ease-out duration-300" id="ham-first"></div>
        <div class="h-[3px] w-6 bg-black"></div>
        <div class="h-[3px] w-4 bg-black translate-x-2 transition-transform ease-out duration-300" id="ham-third"></div>
      </div>
      <div id="nav-items" class="navigationMenu h-screen md:h-auto flex flex-col md:flex-row md:items-center py-8 md:py-0 hidden-min">
        <a href="/" class="h-[5rem] md:h-max md:text-white text-center text-2xl md:text-left px-4 py-2 hover:text-gray-300 font-light">Home</a>
        <a href="../package_overview.html" class="h-[5rem] md:h-max md:text-white text-center text-2xl md:text-left px-4 py-2 hover:text-gray-300 font-light">Package</a>
        <a href="../aboutus/" class="h-[5rem] md:h-max md:text-white text-center text-2xl md:text-left px-4 py-2 hover:text-gray-300 font-light">About</a>
        <a href="../gallery/index.html" class="h-[5rem] md:h-max md:text-white text-center text-2xl md:text-left px-4 py-2 hover:text-gray-300 font-semibold">Gallery</a>
        <a href="../travellers/travellers.html" class="h-[5rem] md:h-max md:text-white text-center text-2xl md:text-left px-4 py-2 hover:text-gray-300 font-light">Travellers</a>
        <a href="#" class="h-[5rem] md:h-max md:text-white text-center text-2xl md:text-left px-4 py-2 hover:text-gray-300 font-light">Contact
          Us</a>
      </div>
    </div>
  </nav>
  <div class="bg-image relative h-[80vh] w-full max-w-screen overflow-hidden" id="splide">
    <div class="">
      <div class="relative">
        <div class="hero h-[80vh]">
          <div class="w-full h-full">
            <img class="absolute inset-0 h-full w-full object-cover slide" src="../assets/2022-10-22 trekkingdag 11-74 1.png" />
          </div>
          <div class="w-full h-full">
            <img class="absolute inset-0 h-full w-full object-cover slide" src="../assets/2022-10-22 trekkingdag 11-118 1.png" />
          </div>
          <div class="bg-overlay"></div>
        </div>

        <div class="absolute top-[25vh] md:top-[45vh] left-4 cursor-pointer" id="prevBtn">
          <i class="bi bi-chevron-left text-[3rem] font-semibold text-gray-600"></i>
        </div>

        <div class="bi absolute top-[25vh] md:top-[45vh] right-4 cursor-pointer" id="nextBtn">
          <i class="bi-chevron-right text-[3rem] font-semibold text-gray-600"></i>
        </div>
      </div>
    </div>
  </div>

  <div id="form" class="bg-black fixed top-0 left-0 w-screen h-screen bg-opacity-[.7] hidden place-items-center z-[500]">
    <form action="" class="w-fit h-fit relative bg-white px-[8rem] py-[4rem] grid gap-10 rounded-lg">
      <i id="crossEdit" class="fa-solid fa-x absolute top-[2rem] font-bold text-2xl right-[2rem] cursor-pointer"></i>
      <!-- <h1 class="text-4xl font-semibold text-center bg-red-500 z-[55555]">Popular Location</h1> -->
      <div class="flex gap-40">
        <div class="flex gap-3">
          <input type="radio" name="select" id="gallery" class="cursor-pointer accent-green-500">
          <label for="gallery" class="text-xl cursor-pointer">Gallery</label>
        </div>
        <div class="flex gap-3">
          <input type="radio" name="select" id="collection" class="cursor-pointer accent-green-500">
          <label for="collection" class="text-xl cursor-pointer">Collection</label>
        </div>
      </div>
      <div class="flex flex-col bg-[#F5F5F5] px-[8rem] py-[5rem] rounded-lg gap-10">
        <label for="inputFile" class="cursor-pointer bg-[#D9D9D9] text-center w-fit mx-auto px-[2rem] py-[1rem] text-2xl font-semibold rounded-lg">
          Upload Photo
          <input id="inputFile" type="file" class="hidden" accept="image/png, image/jpg, image/gif, image/jpeg">
        </label>
        <p class="text-3xl">Drag and Drop the file</p>
      </div>
      <input type="submit" value="Post" class="text-2xl font-semibold cursor-pointer bg-[#D9D9D9] px-[5rem] rounded-lg py-[1rem] w-fit mx-auto">
    </form>
  </div>

  <section id="tranding">
    <div class="package-title relative my-4">
      <h2>Gallery</h2>
      <i id="editBtn" class="fa-regular fa-pen-to-square text-4xl absolute top-0 right-[3rem] cursor-pointer"></i>
    </div>
    <div class="swiper tranding-slider">
      <div class="swiper-wrapper">
        <!-- Slide-start -->
        <?php
        for ($j = 0; $j < count($allimages); $j++) {
        ?>
          <div class="swiper-slide tranding-slide">
            <div class="tranding-slide-img">
              <img src="../php/<?php echo $allimages[$j]; ?>" alt="mountain-gallery-img">
            </div>
          </div>

        <?php
        }
        ?>
        <!-- <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <img src="images/main.png" alt="Tranding">
          </div>
        </div> -->


        <!-- Slide-end -->

      </div>

      <div class="tranding-slider-control">
        <div class="swiper-button-prev slider-arrow" id="left-arrow">
          <img src="images/galleryslidericon.svg" alt="">
        </div>
        <div class="swiper-button-next slider-arrow">
          <img src="images/galleryslidericon.svg" alt="">
        </div>
      </div>

    </div>
    <!-- <div class="package-title">
      <h2>Package</h2>
    </div> -->

    <div class="image-gallery-container">

      <div class="package-title">
        <h2>Collection</h2>
      </div>
      <div class="gallery-column">
        <div class="gallery-imges">
          <?php
          for ($j = 0; $j < count($selectedImage1); $j++) {
          ?>
            <img src="../php/<?php echo $selectedImage1[$j]; ?>" alt="mountain-gallery-img">
          <?php
          }
          ?>


          <!-- <img src="images/col1-1.png" alt="mountain-gallery-img">
          <img src="images/1-1.png" alt="mountain-gallery-img">
          <img src="images/1-2.png" alt="mountain-gallery-img">
          <img src="images/1-3.png" alt="mountain-gallery-img"> -->


        </div>
        <div class="gallery-imges">


          <?php
          for ($j = 0; $j < count($selectedImage2); $j++) {
          ?>
            <img src="../php/<?php echo $selectedImage2[$j]; ?>" alt="mountain-gallery-img">
          <?php
          }
          ?>
          <!-- <img src="images/2.png" alt="mountain-gallery-img">
          <img src="images/2-1.png" alt="mountain-gallery-img">
          <img src="images/2-2.png" alt="mountain-gallery-img">
          <img src="images/2-3.png" alt="mountain-gallery-img">
          <img src="images/2-3.png" alt="mountain-gallery-img"> -->


        </div>
        <div class="gallery-imges">

          <?php
          for ($j = 0; $j < count($selectedImage3); $j++) {
          ?>
            <img src="../php/<?php echo $selectedImage3[$j]; ?>" alt="mountain-gallery-img">
          <?php
          }
          ?>
          <!-- <img src="images/3.png" alt="mountain-gallery-img">
          <img src="images/3-1.png" alt="mountain-gallery-img">
          <img src="images/3-2.png" alt="mountain-gallery-img">
          <img src="images/3-1.png" alt="mountain-gallery-img">
          <img src="images/3-4.png" alt="mountain-gallery-img"> -->


        </div>
      </div>

      <div class="gallery-img-loader">
        <a href="#">Load more</a>
      </div>
    </div>




  </section>

  <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
  <script src="tabscript.js"></script>
  <!-- Overview nav section logic -->
  <script src="../default.js"></script>

  <!-- cross arrow hide show option -->
  <script>
    let formContainer = document.querySelector('.formContainer');
    let form = document.querySelector("#form");
    let editBtn = document.querySelector('#editBtn');

    document.querySelector('#editBtn').addEventListener('click', () => {
      if (form.style.display == 'none') {
        form.style.display = 'grid'
      } else {
        form.style.display = 'none'
      }
      // form.classList.add("active");
    })

    document.querySelector("#crossEdit").addEventListener('click', () => {
      if (form.style.display == 'none') {
        form.style.display = 'grid'
      } else {
        form.style.display = 'none'
      }
      // form.classList.toggle("active");
    })
  </script>

  <script>
    let images = [
      "./assets/img1.png",
      "./assets/img2.png",
      "./assets/img3.png",
    ];
    let cr = 0;
    let cb = 1;
    document.getElementById("leftBtn").addEventListener("click", (e) => {
      try {
        cr = cr === 0 ? images.length - 1 : cr - 1;
        cb = cb === 0 ? images.length - 1 : cb - 1;
        document.getElementById("active-image").src = images[cr];
        document.getElementById("inactive-image").src = images[cb];
      } catch (error) {
        console.log(error);
      }
    });
  </script>

  <!-- Logic for overview slider -->
  <script>
    const slider = document.querySelector(".slider");
    const slides = Array.from(document.querySelectorAll(".hero .slide"));
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const nextImage = document.querySelector(".next-image");

    let currentIndex = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.transform = `translateX(${100 * (i - index)}%)`;
      });
      nextImage.src = slides[(index + 1) % slides.length].src;
    }

    function slideToNext() {
      slides.forEach((el) => el.classList.remove("hidden"));
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }

    function slideToPrev() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(currentIndex);
    }

    prevBtn.addEventListener("click", slideToPrev);
    nextBtn.addEventListener("click", slideToNext);

    showSlide(currentIndex);
  </script>
</body>

</html>