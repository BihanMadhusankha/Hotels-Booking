<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK NOW</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/styleBooking.css">
    <style>
        nav i {
            font-size: 40px;
            color: #fff;
            margin-right: 10px;
        }

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

        .nic {
            width: 240px;
            height: 20px;
            border: none;
            border-radius: 5px;
        }

        .balanceandpay{
            height: 566px;
        }

        .fullformandpay{
            margin-left: 450px;
            
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
            <div class="item"><a href="../Includes/loginout.php"><i class="fas fa-sign-out">Log Out</i></a></div>
        </div>

    </div>

    <nav>


        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
        <a href="../HTML/indexAddToCart.php"><i class="fa-solid fa-cart-shopping"></i></a>

    </nav>

    <div class="fullformandpay">


        <div class="fillbookform">

            <div class="detailsform">

                <form onsubmit="return calculateTotal()">

                    <label for="rooms"><b>Number of rooms:</b></label>
                    <select class="rooms" id="rooms" name="rooms" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>


                    </select> <br> <br>

                    <label for="adults"><b>Number of adults:</b></label>
                    <select class="adults" id="adults" name="adults" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>


                    </select> <br><br>

                    <label for="children"><b>Number of children: </b></label>
                    <select class="children" id="children" name="children" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>


                    </select> <br><br>

                    <label><b>Pool Access:</b></label>
                    <input type="radio" id="yes" name="poolaccess" value="Yes" required placeholder="none">
                    <label>Yes:</label>

                    <input type="radio" id="no" name="poolaccess" value="No" required placeholder="none">
                    <label>NO:</label>
                    <i class="fa-solid fa-person-swimming"></i>
                    <br><br>


                    <label><b>Spa:</b></label>
                    <input type="radio" id="yes" name="spa" value="Yes" required placeholder="none">
                    <label>Yes:</label>

                    <input type="radio" id="no" name="spa" value="No" required placeholder="none">
                    <label>NO:</label>
                    <i class="fas fa-parking"></i> <br><br>


                    <label><b>Gym:</b></label>
                    <input type="radio" id="yes" name="gym" value="Yes" required placeholder="none">
                    <label>Yes:</label>

                    <input type="radio" id="no" name="gym" value="No" required placeholder="none">
                    <label>NO:</label>
                    <i class="fa-solid fa-dumbbell"></i> <br><br>



                    <label><b>Bar:</b></label>
                    <input type="radio" id="yes" name="bar" value="Yes" required placeholder="none">
                    <label>Yes:</label>

                    <input type="radio" id="no" name="bar" value="No" required placeholder="none">
                    <label>NO:</label>
                    <i class="fa-solid fa-beer-mug-empty"></i> <br><br>


                    <label><b>Check-in Date</b></label>
                    <input class="date" type="date" id="checkin-date" name="checkin" required placeholder="none">
                    <br>
                    <br>


                    <label><b>Check-out Date</b></label>
                    <input class="date" type="date" id="checkout-date" name="checkout" required placeholder="none">
                    <br><br> <br>

                    <input class="Continu" type="submit" name="submits" id="submit" value="Continue">
                    <div class="recipt">
                        <h2 class="receirtfor">Receipt Form</h2>
                        <div id="receiptForm" style="display: none;" class="recipt">
                            <label for="roomCharges">Room Charges </label>
                            <label class="doubledot1" for="">: </label>
                            <label id="roomChargesValue">print</label> <br>

                            <label for="servicesCharges">Services Charges </label>
                            <label class="doubledot2" for="">: </label>
                            <label id="servicesChargesValue">print</label> <br>

                            <label for="vat">Vat </label>
                            <label class="doubledot3" for="">: </label>
                            <label id="vatValue">print</label> <br>

                            <h2>Total <label class="doubledot4" for="">: </label> <span id="totalAmount">print</span>
                                <br>
                            </h2>

                            <button type="button" class="cancelButton" onclick="cancelBooking();">Cancel</button>
                        </div>

                    </div>



                </form>
            </div>

        </div>

        <!-- ------------------------------------------------------------------------------------ -->

        <form id="bookingForm" action="../Includes/booking.php" method="post">


            <div class="balanceandpay">



                <h2 class="paymentinfor">Payment Information</h2>
                <hr class="lineeka"> <br><br>


                <label for="">EMAIL ADDRESS</label> <br>
                <input type="email" class="email" name="email" id="email" required placeholder="none"> <br><br>

                <label for="">NIC NUMBER</label> <br>
                <input type="text" class="nic" name="nic" id="nic" required placeholder="none"> <br><br>


                <label for="">NAME ON CREDIT CARD</label> <br>
                <input type="text" class="cardname" name="cardname" id="cardname" required placeholder="none"> <br><br>


                <label for="">CREDIT CARD NUMBER</label> <br>
                <input type="text" class="cardnumber" name="cardnumber" id="cardnumber" required placeholder="none">
                <br><br>

                <label for="">EXPIRES ON</label> <label for="" style="margin-left: 8px;">YEAR</label> <br>
                <select class="expireon" name="expireon" id="expireon" required placeholder="none">month

                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>


                </select>


                <input type="text" class="month" name="year" id="month" placeholder="Year"> <br><br>

                <label for="">CVC</label> <br>
                <input type="text" class="CVC" name="CVC" id="CVC" required placeholder="none"> <br><br>


                <input type="submit" class="book" name="submit" id="book" value="BOOK NOW">
                <br>

            </div>
        </form>


    </div> <br><br>

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

            $('.close-btn').click(function() {
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility", "visible");
            });
        })
    </script>

    <script>
        function calculateTotal() {

            var rooms = parseInt(document.getElementById("rooms").value);
            var poolAccess = document.querySelector('input[name="poolaccess"]:checked').value === "Yes" ? 1 : 0;
            var spa = document.querySelector('input[name="spa"]:checked').value === "Yes" ? 1 : 0;
            var gym = document.querySelector('input[name="gym"]:checked').value === "Yes" ? 1 : 0;
            var bar = document.querySelector('input[name="bar"]:checked').value === "Yes" ? 1 : 0;


            var roomCharges = (rooms * 100)+2399 ;
            var servicesCharges = (poolAccess + spa + gym + bar) * 50;
            var vat = (roomCharges + servicesCharges) * 0.2;


            var total = roomCharges + servicesCharges + vat;


            document.getElementById("roomChargesValue").innerText = "$" + roomCharges;
            document.getElementById("servicesChargesValue").innerText = "$" + servicesCharges;
            document.getElementById("vatValue").innerText = "$" + vat;


            document.getElementById("totalAmount").innerText = "$" + total;


            document.getElementById("receiptForm").style.display = "block";

            return false;
        }
    </script>


    <script>
        function handleBookingAndPayment() {

            var email = document.getElementById("email").value;
            var nic = document.getElementById("nic").value;
            var cardName = document.getElementById("cardname").value;
            var cardNumber = document.getElementById("cardnumber").value;
            var expireMonth = document.getElementById("expireon").value;
            var expireYear = document.getElementById("month").value;
            var cvc = document.getElementById("CVC").value;

            // Validate payment details
            if (!isValidEmail(email)) {
                alert("Invalid email address.");
                return false;
            }

            if (!isValidCardName(cardName)) {
                alert("Invalid name on credit card.");
                return false;
            }

            if (!isValidCardNumber(cardNumber)) {
                alert("Invalid credit card number.");
                return false;
            }

            if (!isValidCVC(cvc)) {
                alert("Invalid CVC.");
                return false;
            }

            var form = document.getElementById('bookingForm');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    alert(response); 
                }
            };

            xhr.send(formData);

            return false;
        }

        
        function isValidEmail(email) {
            
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidCardName(cardName) {
            
            return /^[a-zA-Z ]+$/.test(cardName);
        }

        function isValidCardNumber(cardNumber) {
            
            return /^\d{16}$/.test(cardNumber);
        }


        function isValidCVC(cvc) {
            
            return /^\d{3,4}$/.test(cvc);
        }

        function cancelBooking() {
            
            alert("Booking canceled.");
            window.location.href = "../HTML/indexRoomFrofile.php";
        }
    </script>


</body>

</html>