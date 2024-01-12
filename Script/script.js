
function registerPage(){
    window.open("../HTML/indexRegester.php");
    
}

function loginPage(){
    window.open("../HTML/indexLogin.php");    
}

function lookingHotel(){
    window.open("../HTML/indexHotelprofile.php");
}

function addHotel(){
    window.open("../HTML/indexHotelRegistation.php");
}


function submitForgotPasswordForm() {
    // Implement the logic for handling the forgot password form submission
    // Update the UI accordingly
    document.getElementById('forgotPasswordForm').style.display = 'none';
    document.getElementById('forgotPasswordMessage').innerText = 'A password reset link has been sent to your email.';
}

function submitCreateNewPasswordForm() {
    // Implement the logic for handling the create new password form submission
    // Update the UI accordingly
    document.getElementById('createNewPasswordForm').style.display = 'none';
    document.getElementById('createNewPasswordMessage').innerText = 'Password successfully updated!';
}

function showCreateNewPassword() {
    document.getElementById('forgotPasswordCard').style.display = 'none';
    document.getElementById('createNewPasswordCard').style.display = 'block';
}

function showForgotPassword() {
    document.getElementById('createNewPasswordCard').style.display = 'none';
    document.getElementById('forgotPasswordCard').style.display = 'block';
}



