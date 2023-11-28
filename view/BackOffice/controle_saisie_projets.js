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
function Est_Nom_Projet()
{
    const varia=document.getElementById("Nom_projet").value;
    let spam1=document.getElementById("1");
    const long=varia.length;
    if(caractere(varia)==true && long>=2)  
    {
        spam1.innerHTML="correct";
        spam1.style.color="green";
    }
    else
    {
        spam1.innerHTML="Veuillez entrer un nom valide(lettres uniquement)";
        spam1.style.color="red";
    }
}
function Est_Description_Projet()
{
    const varia2=document.getElementById("Description_projet").value;
    let spam2=document.getElementById("2");
    const long=varia2.length;
    if(caractere(varia2)==true && long>=5)  
    {
        spam2.innerHTML="correct";
        spam2.style.color="green";
    }
    else
    {
        spam2.innerHTML="Veuillez entrer une description valide(lettres uniquement)";
        spam2.style.color="red";
    }
}
function Est_Date_Debut()
{
    const varia3=document.getElementById("Date_Debut").value;
    let spam3=document.getElementById("3");
    const debut="2024-01-01";
    if(varia3>=debut)  
    {
        spam3.innerHTML="correct";
        spam3.style.color="green";
    }
    else
    {
        spam3.innerHTML="Veuillez entrer un date supérieure ou égale au 1 Janvier 2024";
        spam3.style.color="red";
    }
}
function Est_Date_fin()
{
    const varia4=document.getElementById("Date_fin").value;
    const vari=document.getElementById("Date_Debut").value;
    let spam4=document.getElementById("4");
    if(varia4>vari)  
    {
        spam4.innerHTML="correct";
        spam4.style.color="green";
    }
    else
    {
        spam4.innerHTML="Veuillez entrer une date supérieure a date de début du projet";
        spam4.style.color="red";
    }
}
function Est_Statut_Projet()
{
    const varia5=document.getElementById("Statut_Projet").value;
    let spam5=document.getElementById("5");
    const long2=varia5.length;
    if(caractere(varia5)==true && long2>=2)  
    {
        spam5.innerHTML="correct";
        spam5.style.color="green";
    }
    else
    {
        spam5.innerHTML="Veuillez entrer un etat du projet valide";
        spam5.style.color="red";
    }
}

function  GAB()
{
    Est_Nom_Projet();
    Est_Description_Projet();
    Est_Date_Debut();
    Est_Date_fin();
    Est_Statut_Projet();
    return (
        
        document.getElementById("1").innerHTML === "correct" &&
        document.getElementById("2").innerHTML === "correct" &&
        document.getElementById("3").innerHTML === "correct" &&
        document.getElementById("4").innerHTML === "correct" &&
        document.getElementById("5").innerHTML === "correct" 
    );
    
} 