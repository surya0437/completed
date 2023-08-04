<?php
require_once "php/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel Mountain View</title>

  <link rel="stylesheet" href="font.css" />
  <link rel="stylesheet" href="./assets/stylesheet.css" />
  <link rel="stylesheet" href="./assets/poppins/stylesheet.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Poppins:wght@500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/55e3b1fe05.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="tick.css?v=2">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css" />
  <link rel="stylesheet" href="./output.css" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="tailwindcss.js"></script>

  <style>
    html {
      scroll-behavior: smooth;
      transition: scroll 3s ease-in-out;
    }
  </style>

  <!-- location styling -->
  <style>
    .moveto {
      position: absolute;
      top: 2%;
      right: 30%;
      height: 100px;
      width: 100px;
      transform: scale(1);
      transition: ease-in-out;
      animation: zoomSmooth 0.8s;
    }

    @keyframes zoomSmooth {
      0% {
        transform: scale(0.2);
      }

      100% {
        transform: scale(1);
      }
    }

    @media only screen and (max-width: 580px) {
      .moveto {
        position: absolute;
        top: 0px;
        right: 10%;
        height: 80px;
        width: 80px;
        transform: scale(1);
        transition: ease-in-out;
      }
    }

    @media only screen and (max-width: 1020px) and (min-width: 770px) {
      .moveto {
        position: absolute;
        top: 2%;
        right: 5%;
        height: 100px;
        width: 100px;
        transform: scale(1);
        transition: ease-in-out;
      }
    }

    .test {
      transition: all 2000ms cubic-bezier(0.075, 0.82, 0.165, 1);
    }

    .test:hover {
      scale: 3.5;
      transform: translateX(75px);
    }

    .test {
      position: absolute;
      width: 1200px;
      height: 800px;
      left: 0px;
      background-image: url("./0-02-03-f658d0f6bfc01f3f0ddaed39e1c53286cfd2ce8f829003c871fe72d48f779991_276c1e956af.jpg");
      background-size: 2000px;
      -webkit-animation: base linear 20s infinite;
      background-position-x: 0px;
      background-position-y: 100%;
    }

    .test:after {
      content: "";
      position: absolute;
      left: 200px;
      width: 200px;
      top: 5000px;
      height: 1000px;
      border-radius: 50%;
      background: inherit;
      -webkit-transform: scale(1.1);
      -webkit-animation: inherit;
      -webkit-animation-delay: -4s;
    }

    @keyframes base {
      0% {
        background-position-x: 0px;
      }

      100% {
        background-position-x: -1000px;
      }
    }
  </style>


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "poppinsregular";
    }

    body {
      background-color: #ffffff;
    }

    .package-title {
      text-align: center;
      padding: 0.5rem;
    }

    .package-title h2 {
      color: #121d14;
      position: relative;
      display: inline-block;
      font-weight: bold;
      letter-spacing: 0.079rem;
    }

    .package-title h2::before,
    .package-title h2::after {
      content: "";
      position: absolute;
      top: 50%;
      height: 0.118rem;
      background-color: #d7d5d5;
      width: calc(90% - 2.5rem);
    }

    .package-title h2::before {
      left: 0;
      transform: translateX(-120%);
    }

    .package-title h2::after {
      right: 0;
      transform: translateX(120%);
    }

    .packages-container {
      display: flex;
      overflow-x: scroll;
      scroll-behavior: smooth;
      scroll-snap-type: x mandatory;
      scroll-padding: 0 2.5rem;
      padding: 0 1rem;
      gap: 2rem;
    }

    .packages-container div {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
      padding: 0.625rem;
      flex: none;
      gap: 1.25rem;
      position: relative;
      overflow: hidden;
    }

    .packages-container .package {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .packages-container img {
      width: 100%;
      cursor: pointer;
    }

    @media screen and (max-width: 720px) {
      .packages-container {
        padding: 0;
      }

      .packages-container div {
        padding: 0;
      }

      /* .packages-container .package {
          gap: 2rem;
          padding: 0;
        } */
    }

    .packages-container p {
      color: #2f2f2f;
      text-align: center;
      font-size: 1.121rem;
      letter-spacing: 0.043rem;
    }

    .packages-btn {
      padding: 0.563rem 3.125rem;
      background-color: #d9d9d9;
      color: #2f2f2f;
      border: none;
      border-radius: 4.1875rem;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      align-self: center;
      box-shadow: 0px 0px 0.625rem 0px rgba(0, 0, 0, 0.05);
      font-weight: normal;
      line-height: 200%;
      letter-spacing: 0.05rem;
      text-decoration: none;
      display: inline-block;
    }

    @media screen and (max-width: 1000px) {
      .packages-btn {
        padding: 0.563rem 3.125rem;
      }
    }

    .packages-btn:hover {
      background-color: #4a437e;
      color: #ffffff;
    }

    .packages-container::-webkit-scrollbar {
      display: none;
    }

    .packages-main-div {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 0;
      background-color: 0px 0px 1.25rem 0.25rem rgba(0, 0, 0, 0.05);
      margin: 0 auto;
    }

    #back-scroll,
    #forward-scroll {
      width: 0.9375rem;
      cursor: pointer;
      margin: 1.25rem;
      transition: transform 0.3s ease;
    }

    #back-scroll {
      transform: rotate(180deg);
    }

    #back-scroll:hover {
      transform: rotate(540deg);
    }

    #forward-scroll:hover {
      transform: rotate(360deg);
    }

    .packages-container .package.items {
      border-radius: 2.5rem;
      box-shadow: 2px 2px 40px rgba(0, 0, 0, 0.02),
        -2px 2px 40px rgba(0, 0, 0, 0.02), 2px 2px 40px rgba(0, 0, 0, 0.02),
        -2px 2px 40px rgba(0, 0, 0, 0.02);
      color: #ffff;
    }

    ::-webkit-scrollbar {
      width: 10px;
      height: 0.1rem;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .packages-container .package.items>img {
      height: 20rem;
      object-fit: cover;
      border-radius: 1.25rem;
    }

    /* Small screen  size  query */
    /* @media (max-width: 42rem) {

      #back-scroll,
      #forward-scroll {
        display: none;
      }

      .packages-main-div {
        display: grid;
      }

      .packages-container {
        background: #000;
        display: grid;
        align-items: center;
      }

      .packages-container div {
        width: 100%;
        display: grid;
        grid-template-columns: auto;
        gap: 0.9375rem;
      }

      .packages-container p {
        font-size: 0.875rem;
      }

      .packages-btn {
        padding: 0.6875rem 6.125rem;
        font-size: 0.6875rem;
        line-height: 1;
        letter-spacing: 0;
        text-align: center;
      }

      .packages-container img {
        padding: 1.25rem 0;
        width: 100%;
        cursor: pointer;
      }

      .packages-container .package.items {
        width: 10rem;
      }
    } */

    /* Add custom styles here */
    .bg-image {
      min-height: 100vh;
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
      background-color: rgba(0, 0, 0, 0.409);
      /* Adjust opacity here */
    }

    .center-text {
      display: flex;
      justify-content: center;
      gap: clamp(1rem, 5vw, 5rem);
      position: absolute;
      top: 45%;

      margin: auto;
      width: 100%;
      text-align: center;
    }

    .center-text h1 {
      font-size: clamp(1rem, 8vw, 8rem);
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
      font-family: "Ubuntu", sans-serif;
    }

    .social-icons {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 5px;
      padding-bottom: 5rem;
      transform: translateY(-50px);
    }

    .social-icons a:first-child::before {
      content: "";
      display: flex;
      position: absolute;
      bottom: 140%;
      left: 50%;
      transform: translateX(-50%);
      width: 1px;
      height: 40px;
      background-color: white;
    }

    .social-icons a:last-child::after {
      content: "";
      display: flex;
      position: absolute;
      top: 140%;
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
      top: -2rem;
      left: 4rem;
    }

    @media screen and (max-width: 1030px) {
      .social-icons a {
        left: 0;
      }
    }

    .small-image {
      position: absolute;
      bottom: 0;
      left: 42.5%;

      transform: translateX(-50%);
    }

    /* .popular::before {
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
    } */

    @-webkit-keyframes fadeInUp {
      from {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    .fadeInUp {
      -webkit-animation-name: fadeInUp;
      animation-name: fadeInUp;
    }

    .transitionup {
      animation: 1s 0.3s fadeInUp both;
    }

    .transitionupslow {
      animation: 1s 0.3s fadeInUp both;
    }

    @media screen and (max-width: 768px) {
      .hidden-min {
        display: none !important;
      }
    }
  </style>
</head>

<body class="">
  <main class="bg-image" data-parallax="scroll" data-image-src="./assets/hotelViewBackground.png">
    <nav id="nav" class="bg-white md:bg-transparent left-0 absolute top-0 max-w-[1440px] flex justify-center items-center right-0 z-50 md:text-white">
      <div class="container relative mx-auto md:flex justify-between py-4 px-6">
        <div class="text-white text-xl font-bold w-14 md:w-auto">
          <img src="./assets/logo.png" width="100%" height="100%" />
        </div>
        <div class="absolute md:hidden top-10 right-10 flex flex-col gap-1" id="hamburger">
          <div class="h-[3px] w-4 bg-black transition-transform ease-out duration-300" id="ham-first"></div>
          <div class="h-[3px] w-6 bg-black"></div>
          <div class="h-[3px] w-4 bg-black translate-x-2 transition-transform ease-out duration-300" id="ham-third">
          </div>
        </div>
        <div id="nav-items" class="h-screen md:h-auto flex flex-col md:flex-row md:items-center py-8 md:py-0 hidden-min">
          <a href="#" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-semibold">Home</a>
          <a href="#packageList" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Package</a>
          <a href="./aboutus/" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">About</a>
          <a href="./gallery/index.php" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Gallery</a>
          <a href="./travellers/travellers.php" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Travellers</a>
          <a href="#contact" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Contact
            Us</a>
        </div>
      </div>
    </nav>
    <div class="bg-overlay"></div>
    <div class="center-text flex">
      <div>
        <h1 class="h-max leading-[4.8rem] tracing-wide transitionup">
          HOTEL MOUNTAIN VIEW
        </h1>
        <p class="text-[#979797] font-[poppins] text-[1.25rem] tracking-wider text-center md:text-[1.5rem] py-2 transitionupslow w-[105%]">
          Hotel in Mera Peak, Solukhumbu
        </p>
      </div>
      <div class="social-icons transitionup">
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-tiktok"></i></a>
      </div>
    </div>

    <div class="small-image scale-[1.5]">
      <img src="./assets/mountain.png" alt="Small Image" width="100%" height="100%" />
    </div>
  </main>

  <div class="py-12 flex flex-col px-8 gap-4 sm:px-12 md:px-14 max-w-[1440px] mx-auto xl:gap-12 md:gap-6 sm:gap-4 relative">
    <section class="h-[25rem] flex flex-col justify-center items-center">
      <div class="flex-col justify-center items-center min-w-[15rem] sm:w-[80vw] md:w-[60vw] xl:w-[40vw] text-justify flex my-0 mx-auto pb-8">

        <div class="relative bg-transparent w-screen flex items-center justify-center">
          <hr class="bg-black max-w-[27rem] w-[80vw] -z-10 h-[.07rem] absolute" />
          <h1 class="text-2xl md:text-4xl font-bold px-5 text-[#121D14] py-12 bg-white">
            Hotel Mountain View
          </h1>
          <i id="editBtn" class="fa-regular fa-pen-to-square sm:text-2xl absolute top-0 right-[3rem] cursor-pointer" onclick="openPopup1()"></i>
        </div>
        <!-- <h1 class="font-bold text-2xl md:text-4xl py-4 text-[#121D14]">
          Hotel Mountain View
        </h1> -->
        <div id="popup1" class="fixed inset-0 hidden flex items-center justify-center bg-[rgba(0,0,0,.3)] z-[50]">
          <div class="border border-box rounded-lg py-4 sm:px-8 md:px-8 lg:px-12 justify-center items-center w-full max-w-sm  bg-white drop-shadow-lg">
            <div class="flex justify-between items-center rounded-t-md py-3">
              <h5 class="text-xl -mb-2 font-medium leading-normal  text-[#2F2F2F]">
                Topic
              </h5>
              <div class="cursor-pointer flex justify-end items-center" id="close">
                <span class="text-gray-600 cursor-pointer text-3xl" onclick="closePopup1()">
                  &times;
                </span>
              </div>
            </div>
            <div class="py-5">
              <input type="text" id="title" class="w-full px-3 py-2 sm:py-3 border rounded-md focus:outline-none bg-[#F5F5F5] focus:border-blue-500" placeholder="Enter title...">
              <h5 class="text-lg font-medium leading-normal text-neutral-800 py-5 ">
                Add a description
              </h5>
              <textarea id="w3review" name="w3review" rows="4" sm:cols="30" md:cols="50" lg:cols="74" placeholder="Write something about this photo" class="bg-[#F5F5F5] w-full px-3 py-2 sm:px-5 sm:py-3 rounded-md"></textarea>
            </div>
            <div class="flex justify-center">
              <button id="postButton" class="bg-[#D9D9D9] hover:bg-blue-600 text-[#2F2F2F] font-bold py-3 px-8 sm:px-10 md:px-10 lg:px-16 rounded-lg m-5">
                Post
              </button>
            </div>
          </div>
        </div>
        <p class="text-[rgba(0,0,8,.8)] font-[poppinslight] py-4 font-thin tracking-wide [word-spacing:.15rem] text-[1.1rem]">
          It supply and chain basis that can benefit entrepreneurs, guides,
          and guests in various mountain regions, as we have now started in
          Mera Peak and the res various regions in the near future.as we have
          now started in Mera started in Mera Peak .various mountain regions,
          as we have now started in Mera Peak and the res various regions in
          the near future.as we have now started in Mera started in Mera Peak
          .
        </p>
        <button class="bg-[#D9D9D9] rounded-2xl w-[8rem] h-12 flex justify-center items-center shadow-[0px_0px_10px_0px_rgba(0, 0, 0, 0.05)]">
          Read More
        </button>
      </div>
      <div class="absolute top-0 right-0 bottom-[-7.5rem] h-[25rem] z-[-1]">
        <img src="/assets/mountain 1.png" width="100%" height="100%" class="h-full" />
      </div>
    </section>
    <section class="container flex flex-col justify-center items-center mx-auto">
      <div class="absolute left-4 bottom-1/4 z-[-1]">
        <img src="./assets/mountain 1(1).png" height="100%" width="100%" />
      </div>
      <!-- <div class="relative flex items-center justify-center">
        <hr class="bg-black max-w-[27rem] w-[80vw] -z-10 h-[.07rem] absolute" />

        <div class="relative bg-transparent w-screen flex items-center justify-center">
          <hr class="bg-black max-w-[27rem] w-[80vw] -z-10 h-[.07rem] absolute" />
          <h1 class="text-2xl md:text-4xl font-bold px-5 text-[#121D14] py-12 bg-white">
            Popular Location
          </h1>
          <i id="editBtn" class="fa-regular fa-pen-to-square sm:text-2xl absolute top-0 right-[3rem] cursor-pointer" onclick="openPopup()"></i>
        </div>
        <div id="popup" class="fixed flex inset-0 items-center justify-center bg-black bg-opacity-50 hidden z-50">
          <div class="bg-white p-6 rounded-lg w-96 z-100">
            <div class="flex justify-end">
              <span class="text-gray-600 cursor-pointer text-3xl" onclick="closePopup()">
                &times;
              </span>
            </div>
            <h1 class="text-black text-center font-poppins font-semibold text-2xl tracking-wider">
              Popular Location
            </h1>
            <div class="flex-shrink-0 bg-gray-100 rounded-lg mt-3" style="width: 350px; height: 130px">
              <div class="flex flex-col items-center justify-center h-full">
                <label class="relative flex items-center justify-center bg-gray-300 p-3 rounded-md cursor-pointer">
                  <span class="font-bold">Upload Photo</span>
                  <input type="file" id="photoInput" class="opacity-0 absolute inset-0 w-full h-full cursor-pointer" />
                </label>
                <p>Drag and Drop the file</p>
              </div>
            </div>

            <p class="font-[poppins] text-black font-poppins font-semibold mt-1">
              Topic
            </p>
            <input type="text" id="topicInput" class="w-full p-2 mb-4 bg-gray-100 rounded-lg" placeholder="Topic goes here" />

            <p class="font-[poppins] text-black font-poppins font-semibold tracking-wider">
              Description
            </p>
            <textarea id="descriptionInput" rows="4" class="w-full p-2 mb-4 bg-gray-100 rounded-lg" placeholder="Enter description"></textarea>

            <div class="flex justify-center">
              <button onclick="submitForm()" class="bg-gray-300 text-black px-4 py-2 font-poppins rounded-md text-center">
                Post
              </button>
            </div>
          </div>
        </div>
      </div> -->
      <h2 class="font-bold text-2xl md:text-4xl">
        Most Popular Location
      </h2>
      <div class="grid gap-8 md:gap-4 py-16">
        <?php
        $i = 0;
        $qry = "SELECT * FROM `popularlocations`";
        $ress = mysqli_query($con, $qry);
        while ($row = mysqli_fetch_assoc($ress)) {
          $topic = $row['topic'];
          $description = $row['description'];
          $image = $row['image'];
        ?>
          <div class="flex <?php
                            if ($i % 2 == 0) {
                              echo "flex-col";
                            } else {
                              echo "flex-col-reverse";
                            }
                            ?> md:flex-row gap-6 sm:gap-6 h-max md:h-[24rem] md:gap-8 xl:gap-24">
            <div class="flex-1 h-full w-full rounded-xl overflow-hidden invisible" id="firstItem-image">
              <img src="php/<?php echo $image; ?>" width="100%" height="100%" class="h-full" />
            </div>
            <div class="flex-1 flex flex-col justify-center items-start gap-8">
              <h3 class="text-2xl font-bold leading-[0.5] tracing-wide text-[#2F2F2F] pt-2" id="firstItem">
                <?php echo $topic; ?>
              </h3>
              <p class="text-justify font-light tracking-wider text-[rgba(0,0,8,.8)] font-[poppinslight]" id="firstItem-text">
                <?php echo $description; ?>
              </p>
              <button class="bg-[#D9D9D9] rounded-3xl w-[10rem] h-12 tracking-wider flex justify-center items-center text-md" id="firstItem-button">
                View Detail
              </button>
            </div>
          </div>
        <?php
          $i++;
        }
        ?>
      </div>

  </div>
  <div><i class="fa-regular fa-chevron-down cursor-pointer"></i></div>
  </section>
  <div class="container text-center scroll-smooth">
    <div class="inline-flex items-center justify-center w-full">
      <span class="absolute px-3 font-bold -translate-x-1/2 bg-white left-1/2 text-2xl md:text-4xl">Our
        Services</span>
      <hr class="w-96 h-px my-10 border-0 dark:bg-gray-700" />
    </div>
    <div class="flex justify-between md:px-4">
      <div class="flex pl-6 md:pl-0 md:gap-4 flex-[1.25] md:flex-[1] lg:justify-between">
        <ul class="fa-ul py-6 text-left flex flex-col gap-4 md:gap-8 justify-center">
          <li class="text-sm xl:text-xl font-light text-gray-500 flex items-center">
            <span class="fa-li pr-4 left-[-2rem] md:left-[-3rem]"><i class="fa-regular fa-circle-check text-[1rem] md:text-[1.5rem] xl:text-[2.5rem] text-[#00FF2E]"></i></span>
            Cafe and Bakery
          </li>
          <li class="text-sm xl:text-xl font-light text-gray-500 flex items-center">
            <span class="fa-li pr-4 left-[-2rem] md:left-[-3rem]"><i class="fa-regular fa-circle-check text-[1rem] md:text-[1.5rem] xl:text-[2.5rem] text-[#00FF2E]"></i></span>Yak
            Riding
          </li>
          <li class="text-sm xl:text-xl font-light text-gray-500 flex items-center">
            <span class="fa-li pr-4 left-[-2rem] md:left-[-3rem]"><i class="fa-regular fa-circle-check text-[1rem] md:text-[1.5rem] xl:text-[2.5rem] text-[#00FF2E]"></i></span>
            Mera Climbing Gears
          </li>
        </ul>

        <ul class="fa-ul py-6 text-left flex flex-col gap-4 md:gap-8 justify-center">
          <li class="text-sm xl:text-xl font-light text-gray-500 flex items-center">
            <span class="fa-li pr-4 left-[-2rem] md:left-[-3rem]"><i class="fa-regular fa-circle-check text-[1rem] md:text-[1.5rem] xl:text-[2.5rem] text-[#00FF2E]"></i></span>
            Mera Peak Climbing Package
          </li>
          <li class="text-sm xl:text-xl font-light text-gray-500 flex items-center">
            <span class="fa-li pr-4 left-[-2rem] md:left-[-3rem]"><i class="fa-regular fa-circle-check text-[1rem] md:text-[1.5rem] xl:text-[2.5rem] text-[#00FF2E]"></i></span>Safety
            and security
          </li>
          <li class="text-sm xl:text-xl font-light text-gray-500 flex items-center">
            <span class="fa-li pr-4 left-[-2rem] md:left-[-3rem]"><i class="fa-regular fa-circle-check text-[1rem] md:text-[1.5rem] xl:text-[2.5rem] text-[#00FF2E]"></i></span>
            Other Packages
          </li>
        </ul>
      </div>
      <div class="flex-1">
        <img src="/Assets/yak.png" alt="image not support" class="lg:h-[22rem] md:h-[15rem] sm:h-[12rem] z-[-1] sm:flex w-full" />
      </div>
    </div>
  </div>
  <div class="packages-section-div">
    <div class="package-title">
      <h2 class="font-bold text-2xl md:text-4xl">Package</h2>
    </div>
    <div class="packages-main-div max-w-[1440px] flex justify-center items-center relative">
      <img src="assets/arrow.svg" class="absolute -left-10 top-[40%]" alt="" id="back-scroll" />

      <div class="packages-container">
        <?php
        $qry = "SELECT * FROM `packagelist`";
        $ress = mysqli_query($con, $qry);
        while ($row = mysqli_fetch_assoc($ress)) {
          $packageId = $row['packageId'];
          $packageTitle = $row['packageTitle'];
          $packageThumbnailImage = $row['packageThumbnailImage'];
        ?>

          <div class="package items w-full md:w-[50%] xl:w-[30%] px-8">
            <img src="php/<?php echo $packageThumbnailImage; ?>" alt="" />
            <p><?php echo $packageTitle; ?></p>
            <a href="package_overview.php?id=<?php echo $packageId; ?>"><button class="packages-btn">View Details</button></a>
          </div>
        <?php
        }
        ?>
      </div>
      <img class="absolute -right-10 top-[40%]" src="assets/arrow.svg" alt="" id="forward-scroll" />
    </div>
  </div>
  <div class="w-full">
    <h1 class="text-2xl text-center mt-4 mb-0">Location</h1>
    <div class="flex sm:justify-center items-center h-screen p-0">
      <div class="overflow-hidden w-full h-full md:w-1/2 h-screen">
        <div class="relative h-96 overflow-hidden transition-all" id="imageContainer">
          <img src="./assets/locationedit.jpg" alt="Image" id="zoom-image" class="test w-full h-full origin-top-right transform transition-transform duration-1000 ease-in-out" />
          <div class="moveto top-12m right-128 opacity-0">
            <img src="./assets/locationbackground.jpg" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact Us Section -->
  <div class="container m-auto relative" id="contact">
    <div class="section flex justify-center">
      <div class="relative flex items-center justify-center">
        <hr class="bg-black max-w-[27rem] w-[80vw] -z-10 h-[.07rem] absolute" />
        <h1 class="text-2xl md:text-4xl font-bold px-5 text-[#121D14] py-12 bg-white">
          Contact Us
        </h1>
      </div>
    </div>
    <?php
    if (isset($_SESSION['status'])) {
    ?>
      <form action="" method="post">
        <div class="container-tick" id="container-tick">
          <?php
          if ($_SESSION['status'] == 'success') {
          ?>
            <div class="pop-up" id="popup">
              <img src="assets/success.png" alt="sucess">
              <h2>Thank you !</h2>
              <p>We will contact you as soon as possible</p>
              <button type="submit" name="closePopup">Ok</button>
            </div>
          <?php
          } else {
          ?>
            <div class="pop-up" id="popup">
              <img src="assets/warning.png" alt="sucess">
              <h2>Sorry !</h2>
              <p> <?php echo $_SESSION['error']; ?></p>
              <button type="submit" name="closePopup" style="background-color: red;">Ok</button>
            </div>
          <?php
          }
          ?>
        </div>
      </form>
    <?php
    }
    if (isset($_POST['closePopup'])) {
      unset($_SESSION['error']);
      unset($_SESSION['status']);
    }
    ?>
    <div class="flex flex-col md:flex-row justify-center items-center gap-10 relative">
      <div class="flex-col text-justify flex-[0.85]">
        <h1 class="text-center md:text-left tracking-wider text-[1.2rem] mb-2 font-semibold">
          Share your experience with us.
        </h1>
        <p class="py-4 md:py-2 font-['poppinslight'] text-[rgba(0,0,8,.8)] leading-xl tracking-wider text-justify">
          It supply and chain basis that can benefit entrepreneurs, guides,
          and guests in various mountain regions, as we have now started in
          Mera Peak and the res various regions in the near future as we
          have now started in Mera started in Mera Peak
        </p>
      </div>
      <section class="py-16 md:py-4 relative flex flex-col justify-center items-center flex-1">
        <div class="form flex justify-center w-full">
          <form action="php/code.php" method="post" class="flex flex-col gap-3 w-full">
            <div class="flex flex-wrap gap-3">
              <input type="text" name="name" placeholder="Full Name" class="outline-none h-14 w-full rounded-full px-5 flex-1" style="border: 1px solid black;" />
              <input type="text" name="subject" placeholder="Subject" class="outline-none h-14 w-full rounded-full px-5 flex-1" style="border: 1px solid black;" />
            </div>
            <div class="row flex gap-3">
              <input type="email" name="email" placeholder="example@gmail.com" class="outline-none h-14 w-full rounded-full border px-5" style="border: 1px solid black;" />
            </div>
            <div class="row flex gap-3">
              <input type="text" name="message" placeholder="Message" class="outline-none h-14 w-full rounded-full border px-5" style="border: 1px solid black;" />
            </div>
            <div class="row flex gap-3">
              <input type="submit" name="sendMessage" value="Send" class="outline-none h-14 w-44 m-auto text-black cursor-pointer bg-[#0000000D]/[.1] rounded-full border px-5" />
            </div>
          </form>
        </div>

      </section>
    </div>
  </div>
  <div class="absolute left-0 bottom-0 w-full opacity-[0.6] -z-10">
    <img src="./assets/Vector.png" class="w-full h-96 object-contain md:object-contain" width="100%" height="100%" />
  </div>
  </div>
  <footer class="flex flex-col px-8 gap-2 sm:px-12 md:px-14 bg-[#F2F2F2] max-w-[1440px] mx-auto xl:gap-12 md:gap-6 sm:gap-4 relative">
    <div class="xl:pt-12 sm:pt-8 pt-4">
      <div class="py-8 mx-auto">
        <div class="flex-wrap md:text-left items-start -mb-10 w-full flex justify-between gap-8 xl:gap-3">
          <div class="w-[100%] md:w-[50%] sm:w-[50%] flex flex-col items-start justify-center xl:w-[27.5%] px-4">
            <h2 class="title-font text-black font-bold tracking-widest text-[20px] mb-3">
              HOTEL MOUNTAIN VIEW
            </h2>
            <nav class="list-none mb-10">
              <li>
                <p class="text-justify font-['poppinslight'] text-[rgba(0,0,8,.8)] leading-xl tracking-wider">
                  It supply and chain basis that can benefit entrepreneurs,
                  guides, and guests in various mountain regions, as we have now
                </p>
              </li>
              <div class="container px-5 py-8 flex flex-wrap mx-auto items-center gap-3">
                <span><img src="./assets/icons/facebook.png" alt="" /></span>
                <span><img src="./assets/icons/twitter.png" alt="" /></span>
                <span><img src="./assets/icons/threads.png" alt="" /></span>
                <span><img src="./assets/icons/whatsapp.png" alt="" /></span>
                <span><img src="./assets/icons/instagram.png" alt="" /></span>
              </div>
            </nav>
          </div>
          <div class="w-[100%] md:w-[37.5%] sm:w-[37.5%] xl:w-[18.5%] flex flex-col items-start justify-center px-2">
            <h2 class="title-font text-black font-bold tracking-widest text-[20px] mb-3">
              FIND US ON
            </h2>
            <nav class="list-none mb-10">
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Facebook
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Instagram
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Twitter
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Whatapp
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Threads
                </p>
              </li>
            </nav>
          </div>
          <div class="w-[100%] md:w-[45%] sm:w-[45%] flex flex-col items-start justify-center xl:w-[22.5%] px-4">
            <h2 class="title-font text-black font-bold tracking-widest text-[20px] mb-3">
              CUSTOMER CARE
            </h2>
            <nav class="list-none mb-10">
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>How to book ?
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>How to hire a trekking
                  guide ?
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Where are we ?
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>How do we trek ?
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>How many place we have ?
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Booking process ?
                </p>
              </li>
            </nav>
          </div>
          <div class="w-[100%] md:w-[45%] sm:w-[45%] flex flex-col items-start justify-center xl:w-[22.5%] px-4" id="packageList">
            <h2 class="title-font text-black font-bold tracking-widest text-[20px] mb-3">
              PACKAGE
            </h2>
            <nav class="list-none mb-10">
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Mera High Camp Package
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Mera basecamp Package
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Amphu Labtsa Package
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Baruntse Expedition
                  Pacakge
                </p>
              </li>
              <li>
                <p class="text-justify text-[#1E1E1E] font-[poppinslight] hover:text-gray-800 flex items-center">
                  <span class="text-2xl pr-[.5rem] md:pr-2 text-[rgba(0,0,0,.5)]">&#9656;</span>Chamlang Expedition
                  Package
                </p>
              </li>
            </nav>
          </div>
        </div>
      </div>
      <div class="border-gray-200 flex justify-end items-center gap-3 mb-10 mx-5">
        <div class="flex items-center gap-5">
          <h1 class="text-2xl">HOTEL MOUNTAIN VIEW</h1>
          <img src="./assets/logo.png" alt="logo" class="w-[3rem] h-[3rem]" />
        </div>
      </div>
    </div>
  </footer>
  <div class="bg-[#121D14] text-white">
    <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row text-white">
      <p class="text-sm text-center sm:text-left text-white m-auto flex items-center gap-2 h-fit">
        <span class="text-2xl -mt-[.1rem]">&copy;</span> 2023 | PARSLL | YOU SAY
        WE MAKE
      </p>
    </div>
  </div>











  <script src="./index.js"></script>
  <script src="./default.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="./parallax.min.js"></script>
  <script>
    function openPopup() {
      document.getElementById("popup").classList.remove("hidden");
    }

    // Function to close the popup
    function closePopup() {
      document.getElementById("popup").classList.add("hidden");
    }

    // Function to submit the form and handle the data
    function submitForm() {
      const photoFile = document.getElementById("photoInput").files[0];
      const description = document.getElementById("descriptionInput").value;
      const topic = document.getElementById("topicInput").value;

      // Here you can perform any further actions with the data, like saving to a server or displaying it elsewhere
      console.log("Photo:", photoFile);
      console.log("Description:", description);
      console.log("Topic:", topic);

      // Close the popup after submission (you can customize this behavior)
      closePopup();
    }
  </script>

  <!-- hotel moutain view popup -->
  <script>
    const mainSection = document.getElementById('mainSection');
    const popup1 = document.getElementById('popup1');

    function openPopup1() {
      popup1.classList.remove('hidden');
      mainSection.classList.add('hidden');
    }

    function closePopup1() {
      popup1.classList.add('hidden');
      mainSection.classList.remove('hidden');
    }

    function openPopup() {
      document.getElementById("popup").classList.remove("hidden");
    }

    // Function to close the popup
    function closePopup() {
      document.getElementById("popup").classList.add("hidden");
    }

    // Function to submit the form and handle the data
    function submitForm() {
      const photoFile = document.getElementById("photoInput").files[0];
      const description = document.getElementById("descriptionInput").value;
      const topic = document.getElementById("topicInput").value;

      // Here you can perform any further actions with the data, like saving to a server or displaying it elsewhere
      console.log("Photo:", photoFile);
      console.log("Description:", description);
      console.log("Topic:", topic);

      // Close the popup after submission (you can customize this behavior)
      closePopup();
    }
  </script>


  <!-- location edit -->
  <script>
    let zoom_image = document.getElementById("zoom-image");
    const imageContainer = document.getElementById("imageContainer");
    let addedImage;

    zoom_image.addEventListener("mouseover", () => {
      const imageElement = document.createElement("img");
      imageElement.src =
        "./assets/locationbackground.jpg";
      imageElement.classList.add("moveto");
      imageContainer.appendChild(imageElement);
      addedImage = imageElement;
    });

    zoom_image.addEventListener("mouseout", () => {
      if (addedImage) {
        imageContainer.removeChild(addedImage);
        addedImage = null;
      }
    });
  </script>


</body>

</html>