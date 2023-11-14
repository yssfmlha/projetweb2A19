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
function controlsaisie(){
    var number=document.getElementById("cardnumber").value;
    var date=document.getElementById("date").value;
    const numberpattern=/^\d{16}$/;
    if(!numberpattern.test(number)){
        document.getElementById("numbercontrol").innerHTML="Insert a valid Card number<br>(e.g. 5896 4750 4780 3937)";
        document.getElementById("numbercontrol").style.color="red";
        document.getElementById("numbercontrol").style.bottom="60px";
        console.log("false");
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
        document.getElementById("datecontrol").style.bottom="45px";  
        console.log("false");
        return false; 
    }
    else{
        document.getElementById("datecontrol").innerHTML="Valid";
        document.getElementById("datecontrol").style.color="green";
        document.getElementById("datecontrol").style.bottom="45px";   
    }
}