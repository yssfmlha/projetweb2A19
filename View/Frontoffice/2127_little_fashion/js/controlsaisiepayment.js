function numbercontrol(){
    var number=document.getElementById("cardnumber").value;
    const numberpattern=/^\d{16}$/;
    if(!numberpattern.test(number)){
        document.getElementById("numbercontrol").innerHTML="Insert a valid Card number<br>(e.g. 5896 4750 4780 3937)";
        document.getElementById("numbercontrol").style.color="red";
        document.getElementById("numbercontrol").style.bottom="60px";   
    }
    else{
        document.getElementById("numbercontrol").innerHTML="Valid";
        document.getElementById("numbercontrol").style.color="green";
        document.getElementById("numbercontrol").style.bottom="45px";   
    }
}
function cvvcontrol(){
    var cvv=document.getElementById("cvv").value;
    const cvvpattern=/^\d{3}$/;
    if(!cvvpattern.test(cvv)){
        document.getElementById("cvvcontrol").innerHTML="Insert a valid CVV (e.g 685)";
        document.getElementById("cvvcontrol").style.color="red";
        document.getElementById("cvvcontrol").style.bottom="60px";  
        console.log("false"); 
    }
    else{
        document.getElementById("cvvcontrol").innerHTML="Valid";
        document.getElementById("cvvcontrol").style.color="green";
        document.getElementById("cvvcontrol").style.bottom="45px";   
    }
}
function controlsaisie(){
    var number=document.getElementById("cardnumber").value;
    var date=document.getElementById("date").value;
    var cvv=document.getElementById("cvv").value;
    const numberpattern=/^\d{16}$/;
    const cvvpattern=/^\d{3}$/;
    if(!numberpattern.test(number)){
        document.getElementById("numbercontrol").innerHTML="Insert a valid Card number<br>(e.g. 5896 4750 4780 3937)";
        document.getElementById("numbercontrol").style.color="red";
        document.getElementById("numbercontrol").style.bottom="60px";
        return false;
    }
    else{
        document.getElementById("numbercontrol").innerHTML="Valid";
        document.getElementById("numbercontrol").style.color="green";
        document.getElementById("numbercontrol").style.bottom="45px";   
    }
    if(date==''||date==null){
        document.getElementById("datecontrol").innerHTML="Insert an expiration date";
        document.getElementById("datecontrol").style.color="red";
        document.getElementById("datecontrol").style.bottom="45px"; ;
        return false; 
    }
    else{
        document.getElementById("datecontrol").innerHTML="Valid";
        document.getElementById("datecontrol").style.color="green";
        document.getElementById("datecontrol").style.bottom="45px";   
    }
    if(!cvvpattern.test(cvv)){
        document.getElementById("cvvcontrol").innerHTML="Insert a valid CVV (e.g 685)";
        document.getElementById("cvvcontrol").style.color="red";
        document.getElementById("cvvcontrol").style.bottom="60px";
        return false;   
    }
    else{
        document.getElementById("cvvcontrol").innerHTML="Valid";
        document.getElementById("cvvcontrol").style.color="green";
        document.getElementById("cvvcontrol").style.bottom="45px";   
    }
}