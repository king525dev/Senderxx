const form= document.querySelector(".typing-area"), 
inputField= form.querySelector(".input-field"),
sendBtn= form.querySelector("button"),
chatBox= document.querySelector(".chat-box");

form.onsubmit= (e)=>{
     e.preventDefault(); //Preventing form from submitting
}

sendBtn.onclick= ()=>{
     // Starting Ajax
     let xhr= new XMLHttpRequest() //creating XML object
     xhr.open("POST", "php/insert-chat.php", true);
     xhr.onload= ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
               if(xhr.status === 200){
                    inputField.value= ""; //once message inserted into database then leave input field blank
                    if(!chatBox.classList.contains("active")){//if class list not active, will scroll to bottom automatically
                         scrollToBottom();
                    }
               }
          }
     }

     // Sending the form data to php through ajax
     let formData= new FormData(form); //creating new formData Object
     xhr.send(formData); //sending the data to php
}

chatBox.onmouseenter= ()=>{
     chatBox.classList.add("active");
}

chatBox.onmouseleave= ()=>{
     chatBox.classList.remove("active");
}

setInterval(()=>{
     // Starting Ajax
     let xhr= new XMLHttpRequest(); //creating XML object
     xhr.open("POST", "php/get-chat.php", true);
     xhr.onload= ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
               if(xhr.status === 200){
                    let data = xhr.response;
                    chatBox.innerHTML= data;
                    scrollToBottom();
               }
          }
     }
     let formData= new FormData(form); //creating new formData Object
     xhr.send(formData);
}, 500);//this func will run frequently after 500ms

function scrollToBottom(){
     window.scrollTo(0, chatBox.scrollHeight);//window.scrollTo(0, document.querySelector(".scrollingContainer").scrollHeight);
}