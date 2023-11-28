function caractere(input) {
    const car=/^[a-zA-Z]+$/;
    for(let j=0;j<input.length;j++)
    {
        if (!car.test(input[j]) && input[j]!=" ") 
        {
            return false;
        }
    }
    return true;
}
function Est_Startup()
{
    const varia=document.getElementById("Nom").value;
    let spam0=document.getElementById("1");
    const long=varia.length;
    if(caractere(varia)==true && long>=2)  
    {
        spam0.innerHTML="correct";
        spam0.style.color="green";
    }
    else
    {
        spam0.innerHTML="Veuillez entrer un nom valide(lettres uniquement)";
        spam0.style.color="red";
    }
}
function Est_Domaine()
{
    const varia=document.getElementById("domaine").value;
    let spam5=document.getElementById("2");
    const long=varia.length;
    if(caractere(varia)==true && long>=2)  
    {
        spam5.innerHTML="correct";
        spam5.style.color="green";
    }
    else
    {
        spam5.innerHTML="Veuillez entrer un nom valide(lettres uniquement)";
        spam5.style.color="red";
    }
}
function Est_Nom()
{
    const varia2=document.getElementById("nom_f").value;
    let spam2=document.getElementById("3");
    const long2=varia2.length;
    if(caractere(varia2)==true && long2>=2)  
    {
        spam2.innerHTML="correct";
        spam2.style.color="green";
    }
    else
    {
        spam2.innerHTML="Veuillez entrer un nom valide(lettres uniquement)";
        spam2.style.color="red";
    }
}
function Est_Prenom()
{
    const varia2=document.getElementById("prenom_f").value;
    let spam1=document.getElementById("4");
    const long2=varia2.length;
    if(caractere(varia2)==true && long2>=2)  
    {
        spam1.innerHTML="correct";
        spam1.style.color="green";
    }
    else
    {
        spam1.innerHTML="Veuillez entrer un prénom valide(lettres uniquement)";
        spam1.style.color="red";
    }
}
function Est_Description()
{
    const varia2=document.getElementById("description").value;
    let spam7=document.getElementById("5");
    const long2=varia2.length;
    if(caractere(varia2)==true && long2>=2)  
    {
        spam7.innerHTML="correct";
        spam7.style.color="green";
    }
    else
    {
        spam7.innerHTML="Veuillez entrer une description valide(lettres uniquement)";
        spam7.style.color="red";
    }
}
function Est_Telephone()
{
    const varia3=document.getElementById("tel").value;
    let spam6=document.getElementById("7");
    const long3=varia3.length;
    const num= /^\d+$/;
    if(long3==8 && num.test(varia3)==true)
    {
        spam6.innerHTML="correct";
        spam6.style.color="green";
    }
    else
    {
        spam6.innerHTML="Veuillez entrer un  numéro de téléphone valide (8 chiffres)";
        spam6.style.color="red";
        
    }
}
function Est_mail()
{
    const varia4=document.getElementById("email").value;
    let spam9=document.getElementById("6");
    if(varia4.includes("@esprit.tn")==true || varia4.includes("@gmail.com")==true )
    {
        spam9.innerHTML="correct";
        spam9.style.color="green";
    }
    else
    {
        spam9.innerHTML="Adresse doit etre valide";
        spam9.style.color="red";
    }
}        
function  ISR()
{
    Est_Startup();
    Est_Domaine();
    Est_Nom();
    Est_Prenom();
    Est_Description();
    Est_mail();
    Est_Telephone();
    return (
        document.getElementById("1").innerHTML === "correct" &&
        document.getElementById("2").innerHTML === "correct" &&
        document.getElementById("3").innerHTML === "correct" &&
        document.getElementById("4").innerHTML === "correct" &&
        document.getElementById("5").innerHTML === "correct" &&
        document.getElementById("6").innerHTML === "correct" &&
        document.getElementById("7").innerHTML === "correct"
    );
    
} 





























        