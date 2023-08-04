<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../style.css" /> -->
    <link rel="stylesheet" href="./packages-section/fontawesome/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
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
            height: 80vh;
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

<body>

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
                <a href="../package_overview.html" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Package</a>
                <a href="../aboutus/" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">About</a>
                <a href="../gallery/index.html" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-light">Gallery</a>
                <a href="../travellers/travellers.html" class="h-[5rem] md:h-max md:text-white text-center md:text-left px-4 py-2 hover:text-gray-300 font-semibold">Travellers</a>
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

    <div class="flex flex-col justify-center container sm:justify-normal w-full h-auto lg:px-10 mx-auto py-10">
        <section class="grid lg:grid-cols-2 grid-gap-10 p-3 ">
            <div class="img"><img src="location.jpg" class="h-96" /></div>
            <div class="text-left p-3 text-wrap editable-paragraph" contenteditable="true">

                <h1 class="h1 mb-1 font-bold text-2xl">Travelers Information Mera Peak</h1>

                <p class="mt-3 text-justify" name="travelersInfo">Mera Peak is a mountain in the Mahalangur section, Barun sub-section of the
                    Himalaya and administratively in Nepal's Sagarmatha Zone, Sankhuwasabha. At 6,476 metres (21,247 ft)
                    it is classified as a trekking peak. It contains three main summits: Mera North, 6,476 metres
                    (21,247 ft); Mera Central, 6,461 metres (21,198 ft); and Mera South, 6,065 metres (19,898 ft), as
                    well as a smaller “trekking summit”, visible as a distinct summit from the south but not marked on
                    most maps of the region.

                    The height of Mera is often given as 6,654 metres (21,831 ft), and claimed to be the highest
                    trekking peak. This figure actually points to nearby Peak 41, which was mistakenly named Mera in a
                    list of Himalayan peaks, and the figures were copied to the official trekking peak list as they
                    were, including the wrong location coordinates.</p>
            </div>
            <div id="emptyid" class="hidden"></div>
        </section>
        <button id="saveUpperContent" class="hidden rounded-full bg-green-500 w-1/5 text-white px-3 py-3" name="saveAllInfo">save</button>

        <Section class="p-3 mt-4">
            <h1 class="h1 mb-1 font-bold text-2xl">History</h1>
            <p class="mt-3 editable-paragraph text-justify" name="historyInfo">The region was first explored extensively by British
                expeditions in the early 50s before and after the ascent of Everest. Members of those teams included
                Edmund Hillary, Tenzing Norgay, Eric Shipton and George Lowe.

                The first ascent of Mera Central was on May 20, 1953 by Col. Jimmy Roberts and Sen Tenzing (who was
                known by the nickname The Foreign Sportsman). Roberts was heavily involved in establishing the trekking
                industry in Nepal in the early 1960s. He was posthumously awarded the “Sagarmatha (Everest) National
                Award” by the government in May 2005.

                Mera North is believed to have first been climbed by the French climbers Marcel Jolly, G. Baus and L.
                Honills in 1975, though some sources state that it was climbed on 29 October 1973 and the climbers
                included L. Limarques, Ang Lhakpa and two other Sherpas.

                In 1986 Mal Duff and Ian Tattersall made the first ascent of the south west pillar. The route is
                approximately 1,800 metres (5,900 ft) in length and graded at ED inf. The approach to the base of the
                pillar is extremely exposed to serac fall.

                In September 2017, Hari Budha Magar summited Mera Peak, in doing so he became the first ever double
                above-knee amputee to climb a mountain over 6,000m in altitude.</p>

            <button id="saveMiddleContent" class="hidden rounded-full bg-green-500 w-1/5 text-white px-3 py-3" name="saveAllInfo">save</button>
        </Section>
        <Section class="p-3 mt-4">
            <h1 class="h1 mb-1 font-bold text-2xl">Climbing Routes</h1>
            <p class="mt-3 editable-paragraph text-justify" name="routesInfo">The standard route from the north involves high-altitude
                glacier walking. The west and south faces of the peak offer more difficult technical routes. Mera Peak
                provides the 360-degree panoramic views of 5 world highest mountains over 8000m: Mount Everest(8848m),
                Kangchenjunga(8586m), Lhotse(8516m), Makalu(8485m) and Cho Oyu(8201m) as well as many other peaks of
                Khumbu Region.

                For experienced climbers it is a technically straightforward ascent, the main hurdle being proper
                acclimatization to the high altitude. These reasons make Mera Peak a very popular destination, with many
                adventure tour companies offering guided trips to the mountain for clients with little or no
                mountaineering experience. All climbers are recommended to partake in preparative fitness and altitude
                training before attempting an ascent.</p>
        </Section>
        <button id="saveLowerContent" class="hidden rounded-full bg-green-500 w-1/5 text-white px-3 py-3" name="saveAllInfo">save</button>

    </div>

    <script src="script.js"></script>
    <script src="tabscript.js"></script>
    <!-- Overview nav section logic -->
    <script src="../default.js"></script>

    <script>
        <?php
        // session_start();
        // $_SESSION['admin'] == true;
        // if($_SESSION['admin']){
        // echo 'const isAdmin = true;';
        // }
        ?>

        const isAdmin = true;

        function toggleEditability() {
            const emptyId = document.getElementById('emptyid');
            const saveUpperContent = document.getElementById('saveUpperContent');
            const saveMiddleContent = document.getElementById('saveMiddleContent');

            const saveLowerContent = document.getElementById('saveLowerContent');

            const paragraphElements = document.getElementsByClassName('editable-paragraph');

            for (const paragraphElement of paragraphElements) {
                paragraphElement.contentEditable = isAdmin;
                if (isAdmin) {
                    emptyId.classList.remove('hidden');
                    saveUpperContent.classList.remove('hidden');
                    saveMiddleContent.classList.remove('hidden');

                    saveLowerContent.classList.remove('hidden');

                    paragraphElement.classList.add('bg-white');
                } else {
                    emptyId.classList.add('hidden');
                    saveUpperContent.classList.add('hidden');
                    paragraphElement.classList.remove('bg-white');
                }
            }
        }


        toggleEditability();
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