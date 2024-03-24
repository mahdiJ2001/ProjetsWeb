function verifdate(input) {
    var selectedDate = new Date(input.value);
    var today = new Date();

    if (selectedDate > today) {
        alert("Date de naissance invalide !!");
        input.value = '';
    }
}

//Question 4

$(document).ready(function() {
    
    let tableauDeContacts = JSON.parse(localStorage.getItem('tableauDeContacts')) || [];

    function sauvegarderDansLocalStorage() {
        localStorage.setItem('tableauDeContacts', JSON.stringify(tableauDeContacts));
    }

    let audio1 = document.getElementById('SubmitSound');

    function ajouterContact(nom, prenom, telephone, email, dateNaissance, nbEnfants) {
        tableauDeContacts.push({
            nom: nom,
            prenom: prenom,
            telephone: telephone,
            email: email,
            dateNaissance: dateNaissance,
            nbEnfants: nbEnfants
            
        });
        sauvegarderDansLocalStorage();
        audio1.play();
        alert("Contact ajouté !!");
    }
  
    function construitTable(tableauDeContacts) {
        let html = '<table><thead><tr><th></th><th>Prénom</th><th>Nom</th><th>Téléphone</th><th>Email</th><th>Date de naissance</th><th>Nombre d\'enfants</th><th></th></tr></thead><tbody>';
        tableauDeContacts.forEach(function(contact, index) {
            html += `<tr>  
                <td><img src="document.png" class="document" data-index="${index}" alt="Document"></td>
                <td>${contact.prenom}</td>
                <td>${contact.nom}</td>
                <td>${contact.telephone}</td>
                <td>${contact.email}</td>
                <td>${contact.dateNaissance}</td>
                <td>${contact.nbEnfants}</td>
                <td><img src="delete.jpg" class="delete" data-index="${index}" alt="Supprimer"></td> //4.
            </tr>`;
        });
        html += '</tbody></table>';
        return html;
    }

    $('#contacts').html(construitTable(tableauDeContacts));

    $('#formContacts form').submit(function(e) {
        e.preventDefault();
        let nom = $(this).find('[name="nom"]').val();
        let prenom = $(this).find('[name="prenom"]').val();
        let telephone = $(this).find('[name="telephone"]').val();
        let email = $(this).find('[name="email"]').val();
        let dateNaissance = $(this).find('[name="dateNaissance"]').val();
        let nbEnfants = $(this).find('[name="nbEnfants"]').val();

        ajouterContact(nom, prenom, telephone, email, dateNaissance, nbEnfants);
        
        
       
        $('#contacts').html(construitTable(tableauDeContacts));

        
        $('#formContacts form')[0].reset(); 
    });

  

    function SupprimeContact(index) {
        
        tableauDeContacts.splice(index, 1);
    
    
        $('#contacts').html(construitTable(tableauDeContacts));
    
       
        sauvegarderDansLocalStorage();
        alert("Contact Supprimé !!");
    }

    $('#contacts').on('click', '.delete', function() {
        let index = $(this).data('index');
        SupprimeContact(index);
    });

    


    $('#contacts').on('dragstart', 'img.draggable', function(e) {
        let index = $(this).data('index');
        e.originalEvent.dataTransfer.setData('text/plain', index);
    });

    $('#poubelle').on('dragover', function(e) {
        e.preventDefault();
    });

    let audio = document.getElementById('PoubelleSound');
    
    $('#poubelle').on('drop', function(e) {
        e.preventDefault();
        let index = e.originalEvent.dataTransfer.getData('text/plain');
        SupprimeContact(index);
        audio.play();
    });

    


});