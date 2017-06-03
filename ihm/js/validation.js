
function ValidateForm()
{
var nom = document.CreationForm.nom;
        var email = document.CreationForm.email;
        var phone = document.CreationForm.telephone;
        var prenom = document.CreationForm.prenom;
        var dateNaiss = document.CreationForm.dateNaiss;
        var pseudo = document.CreationForm.pseudo;
        var mdp = document.CreationForm.mdp;
        var mdp2 = document.CreationForm.mdp2;
        var codePostal = document.CreationForm.codePostal;
        if (nom.value == "")
{
window.alert("veuillez saisir votre nom.");
nom.style.backgroundColor = "#fba"
        nom.focus();
        return false;
}
if (prenom.value == "")
{
window.alert("veuillez saisir votre prenom.");
      prenom.style.backgroundColor = "#fba"
        prenom.focus();
        return false;
}
if (pseudo.value == "")
{
window.alert("veuillez saisir votre pseudo.");
pseudo.style.backgroundColor = "#fba"
        pseudo.focus();
        return false;
}
if (email.value == "")
{
window.alert("veuillez valide votre email adresse.");
        email.style.backgroundColor = "#fba"
        email.focus();
        return false;
}
if (email.value.indexOf("@", 0) < 0)
{
window.alert("veuillez valide votre email adresse.");
        emial.style.backgroundColor = "#fba"
        email.focus();
        return false;
}
if (email.value.indexOf(".", 0) < 0)
{
window.alert("veuillez valide votre email adresse.");
        email.style.backgroundColor = "#fba"
        email.focus();
        return false;
}

if (phone.value == "")
{
window.alert("veuillez saisir votre numero de télephone.");
        phone.style.backgroundColor = "#fba"
        phone.focus();
        return false;
}
if (dateNaiss.value == "")

{
window.alert("veuillez saisir votre date de naissance.");
        dateNaiss.style.backgroundColor = "#fba"
        dateNaiss.focus();
        return false;
}
re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
        if (dateNaiss.value.match(re))

{
window.alert("veuillez valide votre date de naissance.");
        dateNaiss.style.backgroundColor = "#fba"
        dateNaiss.focus();
        return false;
}
if (mdp.value == "" ) {
alert("Error: veuillez corriger votre mot de pass!");
mdp.style.backgroundColor = "#fba"
        form.mdp.focus();
        return false;
}
 
 if (mdp.value != mdp2.value ) {
alert("Error: veuillez corriger votre mot de pass!");
      mdp.style.backgroundColor = "#fba"
        form.mdp.focus();
        return false;
}
return true;
}

function EnableDisable(mdp)
{
if (mdp == "")
{
document.CreationForm.mdp2.disabled = true;
mdp.style.backgroundColor = "#fba"
}
else
{
document.CreationForm.mdp2.disabled = false;
}
}

/*
 * 
 *AhMaD:pour valide l'email
 */
        

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      email.style.backgroundColor = "#fba"
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
