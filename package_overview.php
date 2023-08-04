<?php
require_once('php/db.php');

if (isset($_GET['id'])) {
  $packageId = $_GET['id'];

  $selectPackageQry = "SELECT * FROM `packagelist` WHERE `packageId` = '$packageId'";
  $selectPackage = mysqli_query($con, $selectPackageQry);
  while ($row = mysqli_fetch_assoc($selectPackage)) {

    $packageId = $row['packageId'];
    $packageTitle = $row['packageTitle'];
    $packageDescription = $row['packageDescription'];
    $accommodation = $row['accommodation'];
    $mealsAvailable = $row['mealsAvailable'];
    $bestTimeForVisit = $row['bestTimeForVisit'];
    $difficultyLevel = $row['difficultyLevel'];
    $difficultyLevelPercentage = $row['difficultyLevelPercentage'];
    $packageThumbnailImage = $row['packageThumbnailImage'];

    $selectImageQry = "SELECT * FROM `packageImages` WHERE `packageId` = '$packageId'";
    $selectImage = mysqli_query($con, $selectImageQry);
    $packageImage = array();
    while ($rows = mysqli_fetch_assoc($selectImage)) {
      $packageImage[] = $rows['packageImage'];
    }

    $selectmajorhighlightsQry = "SELECT * FROM `majorhighlights` WHERE `packageId` = '$packageId'";
    $selectmajorhighlights = mysqli_query($con, $selectmajorhighlightsQry);
    $m = 0;
    $majorhighlights = array();
    while ($roww = mysqli_fetch_assoc($selectmajorhighlights)) {
      $majorhighlights[] = $roww['packageMajorHighlights'];
      $m++;
    }


    $selectItineararyQry = "SELECT * FROM `packageitineararys` WHERE `packageId` = '$packageId'";
    $selectItinearary = mysqli_query($con, $selectItineararyQry);
    $n = 0;
    $packageItinearary = array();
    $itineararyDescription = array();
    while ($roow = mysqli_fetch_assoc($selectItinearary)) {
      $packageItinearary[] = $roow['packageItinearary'];
      $itineararyDescription[] = $roow['itineararyDescription'];
      $n++;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./packages-section/fontawesome/css/all.css" />
  <script src="./tailwindcss.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />


  <!-- package titles css -->
  <style>
    .carousel-item {
      transition: transform 0.3s ease-in-out;
      flex: 0 0 calc(20% - 1rem);
    }

    .carousel-item h1 {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .carousel-container {
      overflow: hidden;
    }

    body {
      letter-spacing: 1.5px;
      line-height: 100px;
    }

    .slider {
      position: relative;
      width: clamp(15rem, 40vw, 25rem);
      overflow: hidden;
      display: flex;
      justify-content: center;
      overflow: hidden;
      box-shadow: 0.1px 0.2px 3px 0.1px;
      border-radius: 20px;
    }

    .slide {
      position: absolute;
      width: 100%;
      height: 100%;
      transition: transform 1s ease;
    }

    .slider button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      padding: 10px;
    }

    #prevBtn {
      left: 10px;
    }

    #nextBtn {
      right: 10px;
    }

    .next-image-container {
      position: absolute;
      bottom: 3rem;
      width: clamp(5rem, 20vw, 10rem);
      height: clamp(5rem, 20vw, 8rem);
    }

    .next-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .active {
      width: 16rem;
      height: 16rem;
      z-index: 2;
      transition: all 100ms linear;
    }

    .inactive {
      position: absolute;
      z-index: -1;
      left: 12rem;
      top: 2rem;
      width: 12rem;
      height: 12rem;
    }

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
      /* Adjust opacity here */
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

<body class="text-[#2F2F2F]">
  <!-- Navigation Bar -->
  <nav id="nav" class="bg-white md:bg-transparent left-0 absolute top-0 max-w-screen flex justify-center items-center right-0 z-50 md:text-white">
    <div class="container relative md:flex justify-between py-4 px-6 lg:w-screen ">
      <div class="text-white text-xl font-bold w-14 md:w-auto">
        <img src="../assets/logo.png" width="100%" height="100%" />
      </div>
      <div class="absolute md:hidden top-10 right-10 flex flex-col gap-1" id="hamburger">
        <div class="h-[3px] w-4 bg-black transition-transform ease-out duration-300" id="ham-first"></div>
        <div class="h-[3px] w-6 bg-black"></div>
        <div class="h-[3px] w-4 bg-black translate-x-2 transition-transform ease-out duration-300" id="ham-third"></div>
      </div>
      <div id="nav-items" class="navigationMenu h-screen md:h-auto flex flex-col md:flex-row md:items-center py-8 md:py-0 hidden-min">
        <a href="/" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Home</a>
        <a href="../package_overview.html" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-semibold">Package</a>
        <a href="../aboutus/" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">About</a>
        <a href="../gallery/index.html" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Gallery</a>
        <a href="../travellers/travellers.html" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Travellers</a>
        <a href="#" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Contact
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


  <!-- packages contents here  -->
  <div class="container mx-auto px-2 sm:px-[4rem] text-justify">
    <div class="flex justify-center h-fit mt-10 mx-auto max-w-[50rem] w-[50vw] min-w-[10rem]">
      <div class="w-full">
        <div class="input-container mx-4 md:mx-0 relative">
          <input type="text" id="location-search" class="block py-2 px-6 pr-10 w-full text-md text-gray-900 bg-gray-80 rounded-full border border-[1.5px] border-black outline-none dark:bg-white text-black bg-white" placeholder="Search for city or address">
          <span class="absolute inset-y-0 right-0 flex items-center ml-5 pr-3">
            <img src="assets/search.png" alt="Search">
          </span>
        </div>
      </div>
    </div>

    <div class="flex justify-around mt-10">
      <div class="carousel-container relative rounded-3xl">
        <div class="flex justify-between items-center lg:h-14 bg-[#F7F7F7]">
          <img src="./assets/arrow.png" alt="arrow" class="p-5" onclick="carouselPrevious()">

          <div class="overflow-x-auto">
            <ul class="flex space-x-3 items-center cursor-pointer">
              <li class="carousel-item w-full">
                <div class="p-2 w-full">
                  <h1 class="text-center" style="font-size: 16px;">Amphu Labtsa Package</h1>
                </div>
              </li>
              <li class="carousel-item w-full">
                <div class="p-3">
                  <h1 class="text-center" style="font-size: 16px">Baruntse Expedition Package</h1>
                </div>
              </li>
              <li class="carousel-item w-full">
                <div class="p-3">
                  <h1 class="text-center" style="font-size: 16px">Chamlang Expedition Package</h1>
                </div>
              </li>
              <li class="carousel-item w-full">
                <div class="p-3">
                  <h1 class="text-center" style="font-size: 16px">Mera Peak Package</h1>
                </div>
              </li>
              <li class="carousel-item w-full">
                <div class="p-2 w-full">
                  <h1 class="text-center" style="font-size: 16px;">Amphu Labtsa Package</h1>
                </div>
              </li>
              <li class="carousel-item w-full">
                <div class="p-3">
                  <h1 class="text-center" style="font-size: 16px">Baruntse Expedition Package</h1>
                </div>
              </li>
            </ul>
          </div>

          <img src="./assets/arrow2.png" alt="not support" class="p-5" onclick="carouselNext()">
        </div>
      </div>
    </div>

    <div class="justify-center md:px-16">
      <h1 class="text-2xl md:text-3xl lg:text-3xl font-bold py-4 md:py-8 px-10"><?php echo $packageTitle; ?></h1>
      <div class="grid grid-cols-1 md:grid-cols-2 px-10 gap-10">
        <div>
          <img src="php/<?php echo $packageThumbnailImage; ?>" alt="" class="h-auto">
        </div>
        <div class="break-all">
          <p class="text-base text-sm md:text-md ">
            <?php echo $packageDescription; ?>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Your content goes here -->
  <div class="container mx-auto grid place-items-center px-3 sm:px-10">
    <div class="bar bg-[#F7F7F7] mx-auto flex justify-evenly w-full sm:w-[50vw] items-center my-10 rounded-xl py-2">
      <div class="navMenu flex text-[#2B2B2B] flex-col justify-center items-center relative font-bold" onclick="chang(this); toggleDisplay(0)">
        <span class="hiddenArrow flex absolute top-[1.6rem]">&#9660;</span>
        <h1 class="text-md cursor-pointer hover:font-semibold">Overview</h1>
      </div>
      <div class="navMenu flex text-[#2B2B2B] flex-col justify-center items-center relative" onclick="chang(this); toggleDisplay(1)">
        <span class="hiddenArrow hidden absolute top-[1.6rem]">&#9660;</span>
        <h1 class="text-md cursor-pointer hover:font-semibold">Itinearary</h1>
      </div>
      <div class="navMenu flex text-[#2B2B2B] flex-col justify-center items-center relative" onclick="chang(this); toggleDisplay(3)">
        <span class="hiddenArrow hidden absolute top-[1.6rem]">&#9660;</span>
        <h1 class="text-md cursor-pointer hover:font-semibold">FAQs</h1>
      </div>
    </div>

    <div class="hiddenContent flex mx-auto flex-wrap justify-center gap-3 sm:gap-20 px-5 sm:px-10">
      <div class="flex flex-col w-[30vw] max-w-[45rem] gap-20 min-w-[15rem] sm:min-w-[25rem] text-justify">
        <div class="flex flex-col">
          <h1 class="text-2xl text-[#2F2F2F] my-8 mt-5 font-semibold">
            Accomodation
          </h1>
          <p class="indent-12 text-sm text-[#2B2B2B]">
            <?php echo $accommodation; ?>
          </p>
        </div>

        <div class="flex flex-col">
          <h1 class="text-2xl text-[#2F2F2F] my-8 mt-5 font-semibold">
            Meals Available
          </h1>
          <p class="indent-12 text-sm text-[#2B2B2B]">
            <?php echo $mealsAvailable; ?>
          </p>
        </div>

        <div class="flex flex-col">
          <h1 class="text-2xl text-[#2F2F2F] my-8 mt-5 font-semibold">
            When is the best time for the Mera Peak summit?
          </h1>
          <p class="indent-12 text-sm text-[#2B2B2B]">
            <?php echo $bestTimeForVisit; ?>
          </p>
        </div>

        <div class="flex flex-col">
          <h1 class="text-2xl text-[#2F2F2F] my-8 mt-5 font-semibold">
            Major Highlights
          </h1>
          <p class="indent-12 text-sm text-[#2B2B2B]"></p>
          <ul class="list-disc ml-5">
            <?php
            for ($j = 0; $j < $m; $j++) {
              echo "<li>$majorhighlights[$j]</li>";
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="flex flex-col w-[30vw] max-w-[25rem] min-w-[15rem] sm:min-w-[20rem] text-justify">
        <?php 
        // for ($i = 0; $i < count($packageImage); $i++) { 
         
         ?>
      <div id="slideImages" class="my-8 mt-5 flex justify-center w-full h-[80vh] max-h-[50rem] min-h-[40rem] overflow-hidden relative drop-shadow-lg rounded-xl">
          <div class="slideImage2 flex ease-in-out duration-1000 h-[80vh] max-h-[calc(100%-7rem)] min-h-[33rem] rounded-xl">
            <div class="slider h-full rounded-xl">
              <?php
              // foreach ($packageImage as $images) {
              //   echo ' <img src="php/' . "$images" . '" class="slide rounded-xl object-cover" />';
              // }

              // for ($i = 0; $i < count($packageImage); $i++) {
              //   echo ' <img src="php/' . "$packageImage[$i]" . '" class="slide rounded-xl object-cover" />';
              // }
              ?>

              <button id="prevBtn" class="text-white text-[4rem] cursor-pointer hover:text-slate-200">
                &#x25C2;
              </button>
              <button id="nextBtn" class="text-white text-[4rem] cursor-pointer hover:text-slate-200">
                &#x25B8;
              </button>
            </div>
          </div>
          <div class="next-image-container">
            <img src="" class="next-image" />
          </div>
        </div>
<?php
        // }
?>
        <div class="flex gap-4 mb-10 my-3">
          <h1 class="text-2xl text-[#2F2F2F] my-8 mt-5 font-semibold">
            Difficulty Level
          </h1>
          <div class="flex gap-1 items-end mb-1.5">
            <input type="hidden" name="" id="difLevel" value="<?php echo $difficultyLevelPercentage ?>">
            <hr class="h-[calc(100%-.3rem)] w-3 border-[1px] border-black bg-black pb-0 mb-0" id="hr1" />
            <hr class="h-[calc(100%+.4rem)] w-3 border-[1px] border-black bg-black pb-0 mb-0" id="hr2" />
            <hr class="h-[calc(100%+1.1rem)] w-3 border-[1px] border-black bg-white pb-0 mb-0" id="hr3" />
            <hr class="h-[calc(100%+1.8rem)] w-3 border-[1px] border-black bg-white pb-0 mb-0" id="hr4" />
            <hr class="h-[calc(100%+2.5rem)] w-3 border-[1px] border-black bg-white pb-0 mb-0" id="hr5" />
          </div>
        </div>

        <p class="text-sm font-lighter">
          <?php echo $difficultyLevel; ?>
        </p>

      </div>
    </div>
    <div class="hiddenContent hidden mx-auto flex-wrap justify-center gap-3 sm:gap-20 px-5 sm:px-10">
      <div class="container mx-auto p-4 flex flex-col w-[40vw] max-w-[40rem] gap-3 min-w-[15rem] sm:min-w-[25rem] text-justify">


        <?php
        for ($k = 0; $k < $n; $k++) {
        ?>

          <div class="flex flex-col items-start mb-10">
            <div class="flex items-center mb-6">
              <div class="h-6 w-6 bg-black text-white rounded-full font-bold flex items-center justify-center mr-3 cursor-pointer" onclick="toggleParagraph(this)">
                <?php echo $k + 1; ?>
              </div>
              <h1 class="text-[1.25rem] font-semibold">
                Day <?php echo $k + 1 . " :" . $packageItinearary[$k]; ?>
              </h1>
            </div>
            <p class="p-4 ml-5 rounded-lg">
              <?php echo $itineararyDescription[$k]; ?>
            </p>
          </div>

        <?php
        }
        ?>
      </div>

      <div class="relative flex-col w-[30vw] max-w-[25rem] min-w-[15rem] sm:min-w-[20rem] text-justify">
        <span class="flex absolute top-[5rem] z-100"><button id="leftBtn" class="text-white text-[4rem] cursor-pointer hover:text-slate-200">
            ◂
          </button></span>
        <div class="active" id="active">
          <img src="php/<?php echo $packageThumbnailImage; ?>" id="active-image" width="100%" height="100%" />
          <!-- <img src="./assets/img1.png" id="active-image" width="100%" height="100%" /> -->
        </div>
        <div class="inactive" id="inactive">
          <img src="./assets/img2.png" id="inactive-image" />
        </div>
      </div>
    </div>
    
    <div class="hiddenContent hidden mx-auto flex-wrap justify-center gap-3 sm:gap-20 px-5 sm:px-10">
      Implementing FAQs over here
    </div>
    <div class="flex flex-col my-20 max-w-[77rem] relative">
      <div class="w-[92vw] max-w-[77rem] w-full -z-10 px-0 mx-0 h-[35rem] overflow-hidden absolute">
        <img src="./assets/mountain 1(1).png" alt="" class="object-cover w-full h-full" />
      </div>
      <div class="section flex justify-center">
        <div class="relative flex items-center justify-center my-5">
          <hr class="bg-black w-[50vw] min-w-[15rem] max-w-[27rem] -z-10 h-[.065rem] absolute" />
          <h1 class="text-2xl font-bold bg-white px-5 py-2 text-[#121D14] text-[2.1rem]">
            Contact Us
          </h1>
        </div>
      </div>
      <div class="form flex justify-center">
        <form action="" class="flex flex-col gap-3 w-[60vw]">
          <p class="text-lg font-semibold text-center mb-10">
            Mera High Camp Package
          </p>
          <div class="row flex flex-wrap gap-3 justify-between">
            <input type="text" name="firstname" placeholder="First Name" class="outline-none h-14 w-full [@media(min-width:821px)]:w-[48%] rounded-full border-[2px] px-5" />
            <input type="text" name="lastname" placeholder="Last Name" class="outline-none h-14 w-full [@media(min-width:821px)]:w-[48%] rounded-full border-[2px] px-5" />
          </div>
          <div class="row flex gap-3">
            <input type="email" name="email" placeholder="example@gmail.com" class="outline-none h-14 w-full rounded-full border-[2px] px-5" />
          </div>
          <div class="row flex gap-3">
            <input type="email" name="email" placeholder="Ask Anything" class="outline-none h-14 w-full rounded-full border-[2px] px-5" />
          </div>
          <div class="row flex gap-3">
            <input type="submit" name="submit" value="Send" class="outline-none h-14 w-44 m-auto text-black cursor-pointer bg-[#0000000D]/[.1] rounded-full border-[2px] px-5" />
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<!-- Overview nav section logic -->
<script src="./default.js"></script>

<!-- Logic for overview slider -->
<script>
  const slider = document.querySelector(".slider");
  // const slides = Array.from(document.querySelectorAll(".hero .slide"));

  const slides = [
<?php
  // for($i = 0; $i < $packageImage; $i++){
  //   echo $packageImage[$i];
  // }
  ?>

  ];

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

<!-- Logic for Itinearary slider -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const circleContainers = document.querySelectorAll(".circle-container");
    const connectingLine = document.querySelector(".connecting-line");

    circleContainers.forEach((container, index) => {
      const circle = container.querySelector(".circle");
      const content = container.querySelector(".content");

      circle.addEventListener("click", function() {
        if (content.style.display === "none") {
          content.style.display = "block";
          if (index < circleContainers.length - 1) {
            const nextContainer = circleContainers[index + 1];
            const nextCircle = nextContainer.querySelector(".circle");
            const nextContent = nextContainer.querySelector(".content");
            connectingLine.setAttribute(
              "y2",
              `${nextContainer.offsetTop - container.offsetTop + 5}px`
            );
            nextContent.style.display = "none";
          }
        } else {
          content.style.display = "none";
          connectingLine.setAttribute("y2", "150px");
        }
      });
    });
  });

  // right side slider of itinearary
</script>

<!-- logic for changing state of menu -->
<script>
  // changing to bold font
  function chang(clickedItem) {
    var items = document.getElementsByClassName("navMenu");
    for (var i = 0; i < items.length; i++) {
      items[i].style.fontWeight = "normal";
    }
    clickedItem.style.fontWeight = "bold";
  }

  // Displaying hidden content + displaying downarrows
  function toggleDisplay(index) {
    var spans = document.getElementsByClassName("hiddenArrow");
    for (var i = 0; i < spans.length; i++) {
      spans[i].style.display = i === index ? "inline" : "none";
    }

    var contents = document.getElementsByClassName("hiddenContent");
    for (var j = 0; j < contents.length; j++) {
      contents[j].style.display = j === index ? "flex" : "none";
    }
  }
</script>

<!-- packages javascripts -->
<script>
  const carouselItems = Array.from(document.querySelectorAll('.carousel-item'));
  const visibleItems = 4;
  let currentItem = 0;

  function updateCarousel() {
    carouselItems.forEach((item, index) => {
      if (index >= currentItem && index < currentItem + visibleItems) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
  }

  function carouselNext() {
    currentItem++;
    if (currentItem >= carouselItems.length - visibleItems + 1) {
      currentItem = carouselItems.length - visibleItems;
    }
    updateCarousel();
  }

  function carouselPrevious() {
    currentItem--;
    if (currentItem < 0) {
      currentItem = 0;
    }
    updateCarousel();
  }

  updateCarousel();
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



<script>
  function measureDifficultyLevel() {
    var inp = document.getElementById('difLevel').value;

    var hr1 = document.getElementById('hr1');
    var hr2 = document.getElementById('hr2');
    var hr3 = document.getElementById('hr3');
    var hr4 = document.getElementById('hr4');
    var hr5 = document.getElementById('hr5');

    console.log(inp);

    if (inp >= 0 && inp < 20) {
      hr1.style.background = 'black';
      hr2.style.background = 'black';
      hr3.style.background = 'black';
      hr4.style.background = 'black';
      hr5.style.background = 'black';
    }

    if (inp >= 20 && inp < 40) {
      hr1.style.background = 'black';
      hr2.style.background = 'black';
      hr3.style.background = 'black';
      hr4.style.background = 'black';
      hr5.style.background = 'black';
    }

    if (inp >= 40 && inp < 60) {
      hr1.style.background = 'black';
      hr2.style.background = 'black';
      hr3.style.background = 'black';
      hr4.style.background = 'black';
      hr5.style.background = 'black';
    }

    if (inp >= 60 && inp < 80) {
      hr1.style.background = 'black';
      hr2.style.background = 'black';
      hr3.style.background = 'black';
      hr4.style.background = 'black';
      hr5.style.background = 'black';
    }

    if (inp >= 80 && inp <= 100) {
      hr1.style.background = 'red';
      hr2.style.background = 'red';
      hr3.style.background = 'red';
      hr4.style.background = 'red';
      hr5.style.background = 'red';
    }

  }
</script>

</html>