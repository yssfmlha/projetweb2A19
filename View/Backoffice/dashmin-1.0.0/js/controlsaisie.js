function charitynamecontrol(){
    var name=document.getElementById("name").value;
    if(name==""||name.length > 30){
        document.getElementById("namecontrol").innerHTML="Insert a valid Charity name<br>(<30 characters)";
        document.getElementById("namecontrol").style.color="red";
        document.getElementById("namecontrol").style.bottom="63px";
    }
    else{
        document.getElementById("namecontrol").innerHTML="Valid";
        document.getElementById("namecontrol").style.color="green";
        document.getElementById("namecontrol").style.bottom="45px";
    }   
}
function foundercontrol(){
    var founder=document.getElementById("founder").value;
    if(founder.indexOf(" ")==-1||founder.length > 30){
        document.getElementById("foundercontrol").innerHTML="Insert a valid Charity name<br>(e.g. 'Name LastName'<br><30 characters)";
        document.getElementById("foundercontrol").style.color="red";
        document.getElementById("foundercontrol").style.bottom="63px";
    }
    else{
        document.getElementById("foundercontrol").innerHTML="Valid";
        document.getElementById("foundercontrol").style.color="green";
        document.getElementById("foundercontrol").style.bottom="45px";
    }   
}
function emailcontrol(){
    var email=document.getElementById("email").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/;
    if(!emailPattern.test(email)){
        document.getElementById("emailcontrol").innerHTML="Insert a valid Email<br>(e.g. 'example@esprit.tn' <50 characters)";
        document.getElementById("emailcontrol").style.color="red";
        document.getElementById("emailcontrol").style.bottom="63px"; 
    }
    else{
        document.getElementById("emailcontrol").innerHTML="Valid";
        document.getElementById("emailcontrol").style.color="green";
        document.getElementById("emailcontrol").style.bottom="45px";
    }
}
function numbercontrol(){
    var amount=document.getElementById("number").value;
    const amountpattern=/^\d{8}$/;
    if(!amountpattern.test(amount)){
        document.getElementById("numbercontrol").innerHTML="Insert a valid Phone number<br>(8 numbers exactly)";
        document.getElementById("numbercontrol").style.color="red";
        document.getElementById("numbercontrol").style.bottom="45px";   
    }
    else{
        document.getElementById("numbercontrol").innerHTML="Valid";
        document.getElementById("numbercontrol").style.color="green";
        document.getElementById("numbercontrol").style.bottom="45px";   
    }
}
function desccontrol(){
    var message=document.getElementById("desc").value;
    if(message.length==0){
        document.getElementById("desccontrol").innerHTML="Please leave a description";
        document.getElementById("desccontrol").style.color="red";
        document.getElementById("desccontrol").style.bottom="120px";   
    }
    else{
        document.getElementById("desccontrol").innerHTML="Valid";
        document.getElementById("desccontrol").style.color="green";
        document.getElementById("desccontrol").style.bottom="100px";   
    }
}
function control(){
    var name=document.getElementById("name").value;
    var founder=document.getElementById("founder").value;
    var email=document.getElementById("email").value;
    var amount=document.getElementById("number").value;
    var message=document.getElementById("desc").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/;
    const amountpattern=/^\d{8}$/;
    if(name==""||name.length > 30){
        document.getElementById("namecontrol").innerHTML="Insert a valid Charity name<br>(<30 characters)";
        document.getElementById("namecontrol").style.color="red";
        document.getElementById("namecontrol").style.bottom="63px";
        return false;
    }
    else{
        document.getElementById("namecontrol").innerHTML="Valid";
        document.getElementById("namecontrol").style.color="green";
        document.getElementById("namecontrol").style.bottom="45px";
    }   
    if(founder.indexOf(" ")==-1||founder.length > 30){
        document.getElementById("foundercontrol").innerHTML="Insert a valid Charity name<br>(e.g. 'Name LastName'<br><30 characters)";
        document.getElementById("foundercontrol").style.color="red";
        document.getElementById("foundercontrol").style.bottom="63px";
        return false;
    }
    else{
        document.getElementById("foundercontrol").innerHTML="Valid";
        document.getElementById("foundercontrol").style.color="green";
        document.getElementById("foundercontrol").style.bottom="45px";
    }  
    if(!emailPattern.test(email)){
        document.getElementById("emailcontrol").innerHTML="Insert a valid Email<br>(e.g. 'example@esprit.tn' <50 characters)";
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
        document.getElementById("numbercontrol").innerHTML="Insert a valid Phone number<br>(8 numbers exactly)";
        document.getElementById("numbercontrol").style.color="red";
        document.getElementById("numbercontrol").style.bottom="45px";  
        return false; 
    }
    else{
        document.getElementById("numbercontrol").innerHTML="Valid";
        document.getElementById("numbercontrol").style.color="green";
        document.getElementById("numbercontrol").style.bottom="45px";   
    }
    if(message.length==0){
        document.getElementById("desccontrol").innerHTML="Please leave a description";
        document.getElementById("desccontrol").style.color="red";
        document.getElementById("desccontrol").style.bottom="120px"; 
        return false;  
    }
    else{
        document.getElementById("desccontrol").innerHTML="Valid";
        document.getElementById("desccontrol").style.color="green";
        document.getElementById("desccontrol").style.bottom="100px";   
    }
}