const form= document.querySelector(".signin form"),
continueBtn= form.querySelector(".button input"),
errorText= form.querySelector(".error-txt");

form.onsubmit= (e)=>{
     e.preventDefault(); //Preventing form from submitting
}

continueBtn.onclick= ()=>{
     // Starting Ajax
     let xhr= new XMLHttpRequest() //creating XML object
     xhr.open("POST", "php/signin.php", true);
     xhr.onload= ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
               if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data);
                    if(data == "Success"){
                         location.href= "users.php";
                    }else{
                         errorText.style.display= "block";
                         errorText.textContent= data;
                    }
               }
          }
     }

     // Sending the form data to php through ajax
     let formData= new FormData(form); //creating new formData Object
     xhr.send(formData); //sending the data to php
}