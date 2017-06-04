$(function () {
    //AhMaD: ici pour afficher le rouge si il ya des err
    $.validator.setDefaults({
      errorClass: 'help-block',
        highlight: function (element) {
            $(element)
                    .closest('#form-champ')
                    .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                    .closest('#form-champ')
                    .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    //AhMaD: function pour la sécurité de la  mot de passe
    $.validator.addMethod('strongPassword', function (value, element) {
        return this.optional(element)
                || value.length <= 20
                && /\d/.test(value)
                && /[a-z]/i.test(value);
    },'Votre mot de passe faudra consiste des nombres et des caractères\.');
    
    //AhMaD: pour vérifier que l'email existe pas dans la BD
     $.validator.addMethod('accountExists', function (value, element) {
	var listeMail = document.inscription.listeMail.value;
	var emails = listeMail.split("#");
	emails.splice(emails.length - 1);
        return this.optional(element) ||  emails.indexOf(value) === -1;
				
    },' cette adresse électronique  est déjà existé, merci de choisir un autre.\'.');
    
    //AhMaD: pour vérifier que le pseudo existe pas dans la BD
    $.validator.addMethod('pseudoExists', function (value, element) {
	var listePseudo = document.inscription.listePseudo.value;
	var pseudos = listePseudo.split("#");
	pseudos.splice(pseudos.length - 1);
        return this.optional(element) ||  pseudos.indexOf(value) === -1;
				
    },' ce pseudo  est déjà existé, merci de choisir un autre.\'.');

 //AhMaD: pour forcer l'usr de choisir seulement les lettres
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Caractères seulement sont acceptable ");
    
 //AhMaD: pour valider chaque champe on regarde si il est required, et si il y a autre contrainte
    $("#CreationForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
                accountExists: true
            },
            phone: {
                required: true
            },
            prenom: {
                required: true,
                lettersonly: true
            },
            nom: {
                required: true,
                lettersonly: true
            },
            dateNaiss: {
                required: true,
                date: true

            },
            pseudo: {
                required: true,
                pseudoExists : true
            },
            mdp: {
                required: true,
                strongPassword: true
            },
            mdp2: {
                required: true,
                equalTo: "#mdp"
            },
            codePostal: {
                required: true,
                digits: true
            }
        },
        messages: {
            email: {
                required: "Ce champ est obligatoire.",
                email: "Veuillez fournir une adresse électronique valide.",
                remote: $.validator.format("{0}  cette adresse électronique  est déjà existé, merci de choisir un autre.")
            }
        }



    });

});
