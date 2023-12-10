function loadPage(page) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;

            // Update the elementContainer with the loaded elements
            document.getElementById('elementContainer').innerHTML = response;

            // Load and update pagination links
            loadPaginationLinks();
        }
    };
    xhr.open('GET', 'get_elements.php?page=' + page, true);
    xhr.send();
}

function loadPaginationLinks() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;

            // Update the paginationContainer with the loaded pagination links
            document.getElementById('paginationContainer').innerHTML = response;
        }
    };
    xhr.open('GET', 'get_pagination_links.php', true);
    xhr.send();
}

// Initial load
loadPage(1);
function idcontrol(){
    var id=document.getElementById("id").value;
    if(id.length!=8){
        document.getElementById("idcontrol").innerHTML="Insert a valid ID(8 characters extacly)";
        document.getElementById("idcontrol").style.color="red";
        document.getElementById("idcontrol").style.bottom="45px";
    }
    else{
        document.getElementById("idcontrol").innerHTML="Valid";
        document.getElementById("idcontrol").style.color="green";
        document.getElementById("idcontrol").style.bottom="45px";
    }  
}
function namecontrol(){
    var name=document.getElementById("name").value;
    if(name.indexOf(" ")==-1||name.length > 30){
        document.getElementById("namecontrol").innerHTML="Insert a valid Full name(e.g. 'name lastname'<br>less than 30 characters)";
        document.getElementById("namecontrol").style.color="red";
        document.getElementById("namecontrol").style.bottom="63px";
    }
    else{
        document.getElementById("namecontrol").innerHTML="Valid";
        document.getElementById("namecontrol").style.color="green";
        document.getElementById("namecontrol").style.bottom="45px";
    }   
}
function emailcontrol(){
    var email=document.getElementById("email").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/;
    if(!emailPattern.test(email)){
        document.getElementById("emailcontrol").innerHTML="Insert a valid Email(e.g. 'example@esprit.tn'<br>less than 50 characters)";
        document.getElementById("emailcontrol").style.color="red";
        document.getElementById("emailcontrol").style.bottom="63px"; 
    }
    else{
        document.getElementById("emailcontrol").innerHTML="Valid";
        document.getElementById("emailcontrol").style.color="green";
        document.getElementById("emailcontrol").style.bottom="45px";
    }
}
function amountcontrol(){
    var amount=document.getElementById("amount").value;
    const amountpattern=/^\d+$/;
    if(!amountpattern.test(amount)){
        document.getElementById("amountcontrol").innerHTML="Insert a valid Amount(numbers only)";
        document.getElementById("amountcontrol").style.color="red";
        document.getElementById("amountcontrol").style.bottom="45px";   
    }
    else{
        document.getElementById("amountcontrol").innerHTML="Valid";
        document.getElementById("amountcontrol").style.color="green";
        document.getElementById("amountcontrol").style.bottom="45px";   
    }
}
function messagecontrol(){
    var message=document.getElementById("message").value;
    if(message.length==0){
        document.getElementById("messagecontrol").innerHTML="Please leave us a message with your<br>donation";
        document.getElementById("messagecontrol").style.color="red";
        document.getElementById("messagecontrol").style.bottom="120px";   
    }
    else{
        document.getElementById("messagecontrol").innerHTML="Valid";
        document.getElementById("messagecontrol").style.color="green";
        document.getElementById("messagecontrol").style.bottom="100px";   
    }
}
function saisie(){
    var id=document.getElementById("id").value;
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var amount=document.getElementById("amount").value;
    var select=document.getElementById("select");
    var message=document.getElementById("message").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const amountpattern=/^\d+$/;
    /*if(id.length!=8){
        document.getElementById("idcontrol").innerHTML="Insert a valid ID(8 characters extacly)";
        document.getElementById("idcontrol").style.color="red";
        document.getElementById("idcontrol").style.bottom="45px";
        return false;
    }
    else{
        document.getElementById("idcontrol").innerHTML="Valid";
        document.getElementById("idcontrol").style.color="green";
        document.getElementById("idcontrol").style.bottom="45px";
    }  */
    if(name.indexOf(" ")==-1||name.length > 30){
        document.getElementById("namecontrol").innerHTML="Insert a valid Full name(e.g. 'name lastname'<br>less than 30 characters)";
        document.getElementById("namecontrol").style.color="red";
        document.getElementById("namecontrol").style.bottom="63px";
        return false;
    }
    else{
        document.getElementById("namecontrol").innerHTML="Valid";
        document.getElementById("namecontrol").style.color="green";
        document.getElementById("namecontrol").style.bottom="45px";
    }
    if(!emailPattern.test(email)){
        document.getElementById("emailcontrol").innerHTML="Insert a valid Email(e.g. 'example@esprit.tn'<br>less than 50 characters)";
        document.getElementById("emailcontrol").style.color="red";
        document.getElementById("emailcontrol").style.bottom="63px";
        return false;
    }
    else{
        document.getElementById("emailcontrol").innerHTML="Valid";
        document.getElementById("emailcontrol").style.color="green";
        document.getElementById("emailcontrol").style.bottom="45px";
    }
    if(!amountpattern.test(amount)){
        document.getElementById("amountcontrol").innerHTML="Insert a valid Amount(numbers only)";
        document.getElementById("amountcontrol").style.color="red";
        document.getElementById("amountcontrol").style.bottom="45px";   
        return false;
    }
    else{
        document.getElementById("amountcontrol").innerHTML="Valid";
        document.getElementById("amountcontrol").style.color="green";
        document.getElementById("amountcontrol").style.bottom="45px";   
    }
    if(select.selectedIndex==0){
        document.getElementById("selectcontrol").innerHTML="Please choose an option";
        document.getElementById("selectcontrol").style.color="red";
        document.getElementById("selectcontrol").style.bottom="45px";   
        return false;    
    }
    else{
        document.getElementById("selectcontrol").innerHTML="Valid";
        document.getElementById("selectcontrol").style.color="green";
        document.getElementById("selectcontrol").style.bottom="45px";  
    }
    if(message.length==0){
        document.getElementById("messagecontrol").innerHTML="Please leave us a message with your<br>donation";
        document.getElementById("messagecontrol").style.color="red";
        document.getElementById("messagecontrol").style.bottom="120px";
        return false; 
    }
    else{
        document.getElementById("messagecontrol").innerHTML="Valid";
        document.getElementById("messagecontrol").style.color="green";
        document.getElementById("messagecontrol").style.bottom="100px";   
    }
}