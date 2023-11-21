function Est_Montant()
{
    const varia0=document.getElementById("Montant").value;
    let spam0=document.getElementById("1");
    const long0=varia0.length;
    const num= /^\d+$/;
    if(num.test(varia0)==true && varia0>0)
    {
        spam0.innerHTML="correct";
        spam0.style.color="green";
    }
    else
    {
        spam0.innerHTML="Le montant doit etre positif";
        spam0.style.color="red";
        
    }
}
function Est_cartebancaire()
{
    const varia1=document.getElementById("Montant").value;
    let spam1=document.getElementById("2");
    const long1=varia1.length;
    const num= /^\d+$/;
    if( long1==8 && num.test(varia1)==true)
    {
        spam1.innerHTML="correct";
        spam1.style.color="green";
    }
    else
    {
        spam1.innerHTML="Le numéro de carte bancaire est de 8 chiffres";
        spam1.style.color="red";
        
    }
}
function Est_date()
{
    const varia3=document.getElementById("date_expire").value;
    let spam3=document.getElementById("3");
    const datemin="2024-01-01";
    if(date>=debut)
    {
        spam3.innerHTML="correct";
        spam3.style.color="green";
    }
    else
    {
        spam3.innerHTML="la date doit etre superieure a 1 Janvier 2024";
        spam3.style.color="red";
    }
}
function Est_CVV()
{
    const varia2=document.getElementById("CVV").value;
    let spam2=document.getElementById("4");
    const long2=varia2.length;
    const num= /^\d+$/;
    if( long2==4 && num.test(varia2)==true)
    {
        spam2.innerHTML="correct";
        spam2.style.color="green";
    }
    else
    {
        spam2.innerHTML="Le numéro de carte bancaire est de 8 chiffres";
        spam2.style.color="red";
        
    }
}
document.getElementById("forma").addEventListener(click,function(event))
{
    Est_Montant();
    Est_cartebancaire();
    Est_CVV();
}  