function idcontrol(){
    var id=document.getElementById("id").value;
    if(id.length!=8){
        document.getElementById("idcontrol").innerHTML="Insert a valid ID(8 characters extacly)";
        document.getElementById("idcontrol").style.color="red";
        document.getElementById("idcontrol").style.bottom="45px";
        return false;
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
        document.getElementById("namecontrol").innerHTML="Insert a valid Full name(e.g. 'name lastname' less than 30 characters)";
        document.getElementById("namecontrol").style.color="red";
        document.getElementById("namecontrol").style.bottom="63px";
        return false;
    }
    else{
        document.getElementById("namecontrol").innerHTML="Valid";
        document.getElementById("namecontrol").style.color="green";
        document.getElementById("namecontrol").style.bottom="45px";
    }   
}
function messagecontrol(){
    var message=document.getElementById("message").value;
    if(message.length==0){
        document.getElementById("messagecontrol").innerHTML="Please leave us a message";
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