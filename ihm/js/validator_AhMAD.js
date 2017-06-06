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
        return this.optional(element) ||  emails.indexOf(value) === -1;
				
    },' cette adresse électronique  est déjà existé, merci de choisir un autre.\'.');
    
    //AhMaD: expression régulière pour l'email
    $.validator.addMethod('expressionRequlière', function(value, element){
         var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
         return this.optional(element) || regex.test(value);
    }," Veuillez corriger votre email");
    
    //AhMaD: pour vérifier que le pseudo existe pas dans la BD
    $.validator.addMethod('pseudoExists', function (value, element) {
	var listePseudo = document.inscription.listePseudo.value;
	var pseudos = listePseudo.split("#");
        return this.optional(element) ||  pseudos.indexOf(value) === -1;
				
    },' ce pseudo  est déjà existé, merci de choisir un autre.\'.');

 //AhMaD: pour forcer l'usr de choisir seulement les lettres
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Caractères seulement sont acceptable ");
    
    $.validator.addMethod( "phoneFR", function( value, element ) {
        return this.optional( element ) || /^((\+|00(\s|\s?\-\s?)?)33(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9]){8}$/.test( value );
}, "Veuillez corriger votre nombre de telephone, il faudrait commencer par (+33) et avec dix chiffre." );
 
 //AhMaD: pour valider chaque champ on regarde si il est required, et si il y a autre contrainte 
    $("#CreationForm,  #monProfile").validate({
        rules: {
            email: {
                required: true,
                email: true,
                accountExists: true,
                expressionRequlière : true
            },
            telephone: {
                required: true,
                phoneFR: true
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
            ville: {
                required: true,
                 lettersonly: true
            },
            mdp2: {
                required: true,
                equalTo: "#mdp"
            },
            adresse: {
                required: true,
            },
            codePostal: {
                required: true,
                digits: true,
                
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
