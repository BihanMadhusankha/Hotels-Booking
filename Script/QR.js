const form = document.getElementById("gennerate-code");
const qr = document.getElementById("qrcode");

const onGenarateSubmit = (e) => {
    e.preventDefault();
    cleanUi();

    const url = document.getElementById("url").value;
    const size = document.getElementById("size").value;
  
   
    if(url===""){
        alert("Please enter the valid User Name!")
    }
    else{
        showSpinner();
        

        setTimeout(()=>{
            hideSpinner();
            genarateQrcode(url,size);
            setTimeout(() =>{
                const saveUrl = qr.querySelector("img").src;
                creatSaveButton(saveUrl);
            },50);
        },1000);
    }

};

const genarateQrcode = (url,size) =>{

    const qrCode = new QRCode("qrcode",{
        text:url,
        width:size,
        height:size,
        
    });
};

const cleanUi = function(){
    qr.innerHTML ="";
    const saveBtn = document.getElementById("savelink");
  if (saveBtn) {
    saveBtn.remove();
  }
};

const showSpinner = function(){
    document.getElementById("spinner").style.display= "block";
};
const hideSpinner = function(){
    document.getElementById("spinner").style.display= "none";
};

const creatSaveButton = function(saveUrl){
    const link = document.createElement("a");
  link.id = "savelink";
  link.classList = "download-btn";
  link.href = saveUrl;
  link.download = "qrcode";
  link.innerHTML = "Save Image";
  document.getElementById("generated").appendChild(link);
};

hideSpinner();
form.addEventListener("submit" , onGenarateSubmit)
