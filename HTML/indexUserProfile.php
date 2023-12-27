<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styleUserProfile.css">
</head>
<body>

<nav>

        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
        
        <ul class="nav_list">

            <div class="nav_list_tem">
                <li id="list_property"><a href="#">List your property</a></li>
            <li id="analys"><a href="#">Analys</a></li>
            </div>
            <div class="login_regester">
                <li><button class="regester" href="registerPage()" onclick="registerPage( )">Regester</button></li>
            <li><button class="Login" onclick="loginPage()">Log in</button></li>
            
            <?php
                if(isset($_SESSION["username"])){
                echo '<li><a href="#">'. $_SESSION["username"] . '! </a></li>';
                echo '<li><a href="../publicFile/logoutHandle.php"> LogOut ! </a></li>';
            }
                else{
                 echo '<li><a href="indexLogin.php">login</a>,</li>';
                } ?>
            
            </div>
            
            
        </ul>
   </nav>
    <form action="user-profile">
        <fieldset style="width:50rem; height: 40rem;">
            <div class="first-flex-use">
                <h2>User Profile</h2><br>
                <div class="circle" align-item="center"></div>
                                <br>

                            <div class="container"><BR>   
                                <label for="textbox">NAME:</label>
                                <textarea id="myTextBox" name="myTextBox" cols="37" rows="1"></textarea><br>
                            </div><br>

                            <div class="container1">  
                                <label for="textbox">AGE :</label>
                                <textarea id="myTextBox" name="myTextBox" cols="3" rows="1"></textarea>
                            <br>
                                <label for="textbox"></label>GENDER : 
                                <textarea id="myTextBox" name="myTextBox" cols="9" rows="1"></textarea>
                            </div><br>

                            <div class="container3">   
                                <label for="textbox">E-MAIL:</label>
                                <textarea id="myTextBox" name="myTextBox" cols="35" rows="1"></textarea>
                            </div><br>

                            <div class="container4">   
                                <label for="textbox">CONTACT NUMBER:</label>
                                <textarea id="myTextBox" name="myTextBox" cols="23" rows="1"></textarea>
                            </div><br>

                            
                            <label style="margin-left: 33rem;">INTERESTS: </label>
                            <label style="margin-left: 5.2rem;">LOCATION : </label>
                            <textarea id="myTextBox" name="myTextBox" cols="31" rows="1"></textarea><br>

                            <input type="text" id="textbox" style="margin-left: 33rem; height: 3.5rem;  ">
                            
                            <label style="margin-left: 1.2%;">JOB TITLE : </label>
                            <textarea id="myTextBox" name="myTextBox" cols="32" rows="1"></textarea>
                        <br>
                            
                            <label style="margin-left: 33rem;">HOBBIES :</label>
                                <label style="margin-left: 6rem;">LANGUAGES SPOKEN : </label></label>
                                <textarea id="myTextBox" name="myTextBox" cols="20" rows="1"></textarea><br>
                                
                                <textarea style="margin-left: 33rem;" id="myTextBox" name="myTextBox" margin-left="33rem" cols="20" rows="5"></textarea>
                                
                                <input type="button" id="button-login" name="button" value="Edit" style="height: 4%; width: 5%">
                 
                        
        </fieldset>
    
    </form>
  
</body>

</html>