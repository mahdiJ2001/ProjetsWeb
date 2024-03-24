function verifdate(input) {
    var selectedDate = new Date(input.value);
    var today = new Date();

    if (selectedDate > today) {
        alert("Date de naissance invalide !!");
        input.value = '';
    }
}



$(document).ready(function() {
    
    $('#formContacts form').submit(function(e) {
        e.preventDefault();
        let nom = $(this).find('[name="nom"]').val();
        let prenom = $(this).find('[name="prenom"]').val();
        let telephone = $(this).find('[name="telephone"]').val();
        let email = $(this).find('[name="email"]').val();
        let dateNaissance = $(this).find('[name="dateNaissance"]').val();
        let nbEnfants = $(this).find('[name="nbEnfants"]').val();

        
        $.ajax({
            url: 'http://localhost:3000/api/contacts', 
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                nom: nom,
                prenom: prenom,
                telephone: telephone,
                email: email,
                dateNaissance: dateNaissance,
                nbEnfants: nbEnfants
            }),
            success: function(response) {
                console.log('Contact added successfully:', response);
                $('#formContacts form')[0].reset();
            },
            error: function(error) {
                console.error('Error adding contact:', error);
            }
        });

        
        
    });
 


});