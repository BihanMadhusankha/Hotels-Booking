function addData() {
    

    let photo = document.getElementById("photoInput").value;
    let name = document.getElementById("nameInput").value;
    let email = document.getElementById("emailInput").value;
    let mobile = document.getElementById("numberInput").value;
    let address = document.getElementById("addressInput").value;

    console.log("Values:", photo, name, email, mobile, address);


    // Get the table and insert a new row at the end
    let table = document.getElementById("outputTable");
    let newRow = table.insertRow(table.rows.length);

    // Insert data into cells of the new row
    newRow.insertCell(0).innerHTML = photo;
    newRow.insertCell(1).innerHTML = name;
    newRow.insertCell(2).innerHTML = email;
    newRow.insertCell(3).innerHTML = mobile;
    newRow.insertCell(4).innerHTML = address;
    newRow.insertCell(5).innerHTML =
        '<button onclick="editData(this)">Edit</button>' +
        '<button onclick="deleteData(this)">Delete</button>';

    // Clear input fields
    clearInputs();
}

function editData(button) {

    alert("addData function called");
    let row = button.parentNode.parentNode; 

            

            // Get the cells within the row 

            let nameCell = row.cells[0]; 

            let emailCell = row.cells[1]; 

            let mobileCell = row.cells[2]; 

            let addressCell = row.cells[3]; 

            

            // Prompt the user to enter updated values 

            let nameInput = 

                prompt("Enter the updated name:", 

                    nameCell.innerHTML); 

            let emailInput = 

                prompt("Enter the updated email:", 

                    emailCell.innerHTML); 

            let numberInput = 

                prompt("Enter the updated mobile details:", 

                    mobileCell.innerHTML 

                ); 

            let addressInput = 

                prompt("Enter the updated address:", 

                    addressCell.innerHTML 

                ); 

            

            // Update the cell contents with the new values 

            nameCell.innerHTML = nameInput; 

            emailCell.innerHTML = emailInput; 

            mobileCell.innerHTML = numberInput; 

            addressCell.innerHTML = addressInput; 


}

function deleteData(button) {
     // Get the parent row of the clicked button 

     let row = button.parentNode.parentNode; 

  

     // Remove the row from the table 

     row.parentNode.removeChild(row); 

 } 

 
function clearInputs() {
    // Clear input fields
    document.getElementById("photoInput").value = "";
    document.getElementById("nameInput").value = "";
    document.getElementById("emailInput").value = "";
    document.getElementById("numberInput").value = "";
    document.getElementById("addressInput").value = "";
}
