

<!DOCTYPE html>
<html>

<head>
    <!-- Your existing head content -->

    <title>Hotel List</title>
    <link rel="stylesheet" href="../CSS/styleHotelList.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../Script/script.js"></script>
</head>

<body>

<nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">

            <div class="login_regester" id="login_regester">

                   <li><button id="addHotel" class="addHotel" href="addHotel()" onclick="addHotel( )">Add Hotels</button></li>
                                  
               
            </div>

        </ul>
    </nav>


    <h1>1 Star Hotel</h1>
    <h2>Add Hotel Details</h2>

    <table id="outputTable">
    <tr>
        <th>Hotel Image</th>
        <th>Hotel Name</th>
        <th>Email</th>
        <th>TELL</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <tr>
        <td><img src="path/to/uploaded/image.jpg" alt="Hotel Image"></td>
        <td>Hotel Name 1</td>
        <td>email@example.com</td>
        <td>123-456-7890</td>
        <td>Address 1</td>
        <td><button>Edit</button> <button>Delete</button></td>
    </tr>
    </table>

    <!-- Your existing script imports and other content -->

</body>

</html>
