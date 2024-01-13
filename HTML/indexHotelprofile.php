<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Hotel</title>
    <link rel="stylesheet" href="../CSS/styleHotelProfile.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .side-bar {
            background-color: #e3ebf4;

            width: 250px;
            left: -250px;
            height: 100vh;
            position: fixed;
            top: 0;
            overflow-y: auto;
            transition: 0.6s ease;
            transition-property: left;
        }

        header {
            background-color: #bdcee3;

        }

        .close-btn {
            position: absolute;
            color: #fff;
            font-size: 23px;
            right: 0px;
            margin: 15px;
            cursor: pointer;
        }

        header h1 {
            text-align: center;
            font-weight: 500;
            font-size: 35px;
            padding: 20px;
            font-family: sans-serif;
            letter-spacing: 2px;
            color: #010101;
        }

        .menu {
            width: 100%;
            margin-top: 30px;
        }

        .menu .item {
            position: relative;
            cursor: pointer;
        }

        .menu .item a {
            color: #008e45;
            font-size: 16px;
            text-decoration: none;
            display: block;
            padding: 5px 30px;
            line-height: 60px;
        }

        .item i {
            margin-right: 15px;
        }

        .menu-btn {
            position: absolute;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            margin: 30px 10px;
        }

        .side-bar.active {
            left: 0;
        }
    </style>

</head>

<body>

<!-- menu-btn -->
<div class="menu-btn">
        <i class="fas fa-bars"></i>
    </div>

    <div class="side-bar">
        <!-- header section -->
        <header>
            <!-- close button -->
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>
            <h1>MENU</h1>
        </header>
        <!-- menu item -->
       
        <div class="menu">
        
            <div class="item"><a href="../HTML/index.php"><i class="fas fa-home"></i>Home</a></div>
            <div class="item"><a href="#"><i class="fas fa-th"></i>Analytics</a></div>
            <div class="item"><a href="../HTML/indexUserProfile.php"><i class="fas fa-user"></i>Profile</a></div>
            <div class="item"><a href="../HTML/indexHelp.php"><i class="fas fa-hands-helping"></i>Help</a></div>
            <div class="item"><a href="../HTML/indexAboutUs.html"><i class="fas fa-info-circle"></i>About</a></div>
            <div class="item"><a href="../Includes/loginout.php"><i class="fas fa-sign-out">Log Out</i></a></div>
           
        </div>
      
    </div>
   

        <nav>
            <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
            
        </nav>

    <div class="udamaphotoeka">

    </div>

    <!-- udama phota eka  -->



    <!-- udama photo eke uda kotuwa -->

    <div class="rectangle7">



    </div>

    <!-- udama photo eke uda kotuwa -->


    <!-- hotel eke nama udin thiyana wachene -->
    <div class="hdipcriptioneka">
        <p>AWAY FROM MONOTONOUS LIFE</p>
    </div>
    <!-- hotel eke nama udin thiyana wachene -->


    <!-- hotel eke nama thiyana wachene -->
    <div class="hoteleka">
        <p>Royal Hotel Group</p>
    </div>
    <!-- hotel eke nama thiyana wachene -->



    <!-- hotel eke namata yatin thiyana wachene -->
    <div class="hotelyatadipcriptioneka">
        <p>If you are looking at blank cassettes on the web, you may be very confused at the</p>
        <p>difference in price. You may see some for as low as $.17 each.</p>
    </div>
    <!-- hotel eke namata yatin thiyana wachene -->


    <!-- kalu kotuwa athule thiyana tika -->
    <div class="bookyourroomeka">
        <p>BOOK</p>
        <p>YOUR ROOM</p>
    </div>
    <!-- ---------------------------- -->

    <div class="arivaldatee">
        <input type="date" placeholder="Arrival Date">
    </div>
    <!-- ---------------------------- -->

    <div class="DepartureDate">
        <input type="date" placeholder="Departure Date" name="departure_date" id="departure_date">
    </div>
    <!-- ---------------------------- -->

    <div class="Adulteka">
        <label for="adult">Adult</label>
        <select name="adult" id="adult">
            <option value="old">Old</option>
            <option value="younger">Younger</option>
        </select>
    </div>
    <!-- ---------------------------- -->

    <div class="NumberofRoomseka">
        <label for="nofroom">Number of Rooms</label>
        <select name="nofroom" id="nofroom">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
        </select>
    </div>
    <!-- ---------------------------- -->

    <div class="booknoweka">
        <a href="../HTML/indexRoomBooking.html"><input class="odersubmit" type="submit" value="BOOK NOW"></a>
    </div>
    <!-- ---------------------------- -->


    <!-- kalu kotuwa athule thiyana tika -->





    <!-- Accomodation eken passe tika -->


    <div class="Accomodation">

        <h4>Hotel Accomodation</h4>


    </div>

    <div class="longtext">

        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,</p>

    </div>

    <div class="allcatagory">

        <a href="../HTML/indexRoomProfile.html"><img class="catagory1" src="../assets/room1.jpeg" alt="ROOM"></a>
        <a href="../HTML/indexRoomProfile.html"> <img class="catagory1" src="../assets/room2.jpeg" alt="room"></a>
        <a href="../HTML/indexRoomProfile.html"><img class="catagory1" src="../assets/room3.jpeg" alt="ROOM"></a>
        <a href="../HTML/indexRoomProfile.html"><img class="catagory1" src="../assets/room4.jpeg" alt="ROOM"></a>
       
    </div>

    <div class="catagorytext">

        <h4>Double Deluxe Room</h4>
        <h4>Double Deluxe Room</h4>
        <h4>Double Deluxe Room</h4>
        <h4>Double Deluxe Room</h4>

    </div>

    <div class="catagoryprice">

        <h2>$250</h2>
        <h2>$200</h2>
        <h2>$750</h2>
        <h2>$200</h2>
    </div>

    <!-- Facilities walin passe tika     -->


    <div class="Facilitiestab">


        <div class="Facilities">

            <h2>Royal Facilities</h2>

        </div>

        <div class="Facilitiestext">

            <h4>Who are in extremely love with eco friendly system.</h4>

        </div>

        <div class="rectangle">

            <div class="rectangle1">
                <p class="res">Restaurant</p>
                <p class="res2">Welcome to [Our Restaurant], where culinary excellence meets a warm and inviting
                    atmosphere.</p>
            </div>

            <div class="rectangle1">
                <p class="res">Sports CLub</p>
                <p class="res2">Indulge in a holistic wellness experience at [RoyalHotel]'s exclusive Sports Club, where
                    luxury meets fitness in perfect harmony.</p>

            </div>

            <div class="rectangle1">
                <p class="res">Swimming Pool</p>
                <p class="res2">Dive into a world of tranquility and luxury at [RoyalHotel]'s exquisite swimming pool.
                </p>

            </div>

        </div>


        <div class="rectanglenext">

            <div class="rectangle1">
                <p class="res">Rent a Car</p>
                <p class="res2">Embark on a journey of convenience and exploration with [RoyalHotel]'s premier Rent a
                    Car service.</p>
            </div>

            <div class="rectangle1">
                <p class="res">Gymnesium</p>
                <p class="res2">Revitalize your well-being at [RoyalHotel]'s modern gymnasium, where the perfect blend
                    of fitness and luxury awaits.</p>

            </div>

            <div class="rectangle1">
                <p class="res">Bar</p>
                <p class="res2">Discover a sophisticated retreat within [RoyalHotel] - our stylish bar that beckons
                    those seeking a delightful escape.</p>

            </div>

        </div>


    </div>


    <!-- vition eke kotasa -->

    <div class="allvition">

        <div class="Vision">

            <p>About Us <br>
                Our History <br>
                Mission & Vision</p>


        </div>

        <div>

            <img class="vitionsidephoto" src="../assets/room5.jpeg" alt="Royal Hotel">


        </div>

    </div>


    <!-- vition eke kotasa -->


    <!-- vition eke description eke tika -->

    <div class="vitiondescription">

        <p>inappropriate behavior is often laughed off as “boys will be boys,” <br>
            women face higher conduct standards especially in the workplace. <br>
            That’s why it’s crucial that, as women, our behavior on the job is <br>
            beyond reproach. inappropriate behavior is often laughed.</p>



    </div>

    <!-- vition eke description eke tika -->

    <!---- <form  action="/search" method="get">
        
        <input class="textbar" type="text" id="search" name="q" placeholder="hotels" />
        
        <button type="submit"> <img class="search" src="search_FILL0_wght400_GRAD0_opsz24.png" alt="search"></button>
       
    </form>

-->

<!-- fotter -->
<footer>

<div class="footer_option">
    <div class="option_one">
        <a href="#">Countries</a>
        <a href="#">Distric</a>
        <a href="#">Home</a>
    </div>
    <div class="option_two">

        <a href="#">Hotels</a>
        <a href="#">Villas</a>
        <a href="#">Resorts</a>
    </div>

    <div class="option_three">
        <a href="#">Reviews</a>
        <a href="#">Safty Resourse Center</a>
        <a href="#">About RoyalGroup.com</a>
    </div>

</div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('.menu-btn').click(function() {
        $('.side-bar').addClass('active');
        $('.menu-btn').css("visibility", "hidden");
    });

    //close button

    $('.close-btn').click(function() {
        $('.side-bar').removeClass('active');
        $('.menu-btn').css("visibility", "visible");
    });
})
</script>






</body>




</html>