
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
        nom.focus();
        return false;
}
if (prenom.value == "")
{
window.alert("veuillez saisir votre prenom.");
        prenom.focus();
        return false;
}
if (pseudo.value == "")
{
window.alert("veuillez saisir votre pseudo.");
        pseudo.focus();
        return false;
}
if (email.value == "")
{
window.alert("veuillez valider votre email adresse.");
        email.focus();
        return false;
}
if (email.value.indexOf("@", 0) < 0)
{
window.alert("veuillez valider votre email adresse.");
        email.focus();
        return false;
}
if (email.value.indexOf(".", 0) < 0)
{
window.alert("veuillez valider votre email adresse.");
        email.focus();
        return false;
}

if (phone.value == "")
{
window.alert("veuillez saisir votre numero de télephone.");
        phone.focus();
        return false;
}
if (dateNaiss.value == "")

{
window.alert("veuillez saisir votre date de naissance.");
        dateNaiss.focus();
        return false;
}
re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
        if (dateNaiss.value.match(re))

{
window.alert("veuillez valider votre date de naissance.");
        dateNaiss.focus();
        return false;
}
if (mdp.value == "" && mdp2.value != mdp.value) {
if (mdp.value.length < 6) {
alert("Error: veuillez corriger votre mot de pass!");
        form.mdp.focus();
        return false;
}

return true;
}
}

function EnableDisable(mdp)
{
if (mdp == "")
{
document.CreationForm.mdp2.disabled = true;
}
else
{
document.CreationForm.mdp2.disabled = false;
}
}
