$(function () {
    $(
        "#contactForm input,#contactForm textarea,#contactForm button"
    ).jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // pret pour les messages d'erreur ou evenements
        },
        submitSuccess: function ($form, event) {
            event.preventDefault(); // evenement par defaut
            // entrer des valeurs
            var name = $("input#name").val();
            var email = $("input#email").val();
            var message = $("textarea#message").val();
            var firstName = name; // Pour la reussite/echec du message
            // Vérifier dans la barre blanche du nom pour la reussite/echec du message
            if (firstName.indexOf(" ") >= 0) {
                firstName = name.split(" ").slice(0, -1).join(" ");
            }
            $this = $("#sendMessageButton");
            $this.prop("disabled", true); // Annuler le bouton submit jusqu'à ce que l'appel d'AJAX soit complet pour envoyer le message
            $.ajax({
                url: "contact.php",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message,
                },
                cache: false,
                success: function () {
                    // Message de reussite
                    $("#success").html("<div class='alert alert-success'>");
                    $("#success > .alert-success")
                        .html(
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                        )
                        .append("</button>");
                    $("#success > .alert-success").append(
                        "<strong>Votre message a été envoyé. </strong>"
                    );
                    $("#success > .alert-success").append("</div>");
                    //Effacer tous les champs
                    $("#contactForm").trigger("reset");
                },
                error: function () {
                    // Message d'echec
                    $("#success").html("<div class='alert alert-danger'>");
                    $("#success > .alert-danger")
                        .html(
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                        )
                        .append("</button>");
                    $("#success > .alert-danger").append(
                        $("<strong>").text(
                            "Désolé " +
                                firstName +
                                ", il y a un petit problème. Réessaie encore!"
                        )
                    );
                    $("#success > .alert-danger").append("</div>");
                    //clear all fields
                    $("#contactForm").trigger("reset");
                },
                complete: function () {
                    setTimeout(function () {
                        $this.prop("disabled", false); // Retente quand la partie Ajax est complet
                    }, 1000);
                },
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

/*Quand tu clickes et que tu attends si ça accepte ou pas */
$("#name").focus(function () {
    $("#success").html("");
});