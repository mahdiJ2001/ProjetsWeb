$(document).ready(function() {
    function exercice1(e) {
        e.preventDefault();
        var element = $('#Exe1');
        if (element.is(':visible')) {
            alert("Élément visible");
            element.hide();
        } else {
            alert("Élément caché");
            element.show();
        }
    }

    //
    function exercice2() {
        var textarea=$("#mytextarea").val();
        alert(textarea);
        //Option 2 : 
        //$("Exe2 button").click((function(){alert($("#mytextarea").val())}); mettre au dessous
    
    
    }

    function exercice3(e) {
        e.preventDefault();
        $('#imageId').attr('src',"orange.webp");
    }

    function exercice4(e) {
        e.preventDefault();
        var textElement = $('#Exe4');
        textElement.css('transform', 'rotate(90deg)');
        textElement.css('text-shadow', '2px 2px 2px rgba(0,0,0,0.5)');
        
    }

    //Voir boutons dessous   

    function exercice6(e) {
         {
            e.preventDefault();
            var radioElement1 = $('<input type="radio" name="niveau" value="1er" id="rd_ex6">');
            var radioElement2 = $('<input type="radio" name="niveau" value="2ieme" id="rd_ex6">');
            var radioElement3 = $('<input type="radio" name="niveau" value="3ieme" id="rd_ex6">');
            
            $('#Exe6').append(radioElement1, "1er", "<br>");
            $('#Exe6').append(radioElement2, "2ieme", "<br>");
            $('#Exe6').append(radioElement3, "3ieme");
        }
    }

    function exercice7(e) {
        e.preventDefault();
        var selectedValue = $('input[id="rd_ex6"]:checked').val();
        alert(selectedValue);
    }

    function exercice8(e) {
        e.preventDefault();
          var checkboxElement = $('<input type="checkbox" id="chk_ex">');
            $('#Exe8').append(checkboxElement);
        
    }

    function exercice9(e) {
        e.preventDefault();
        var checkboxElement = $('#chk_ex');
        if (checkboxElement.is(':checked')) {
           
        } else {
            
            var audio = new Audio('bip.mp3');
            audio.play();
        }
    }

    function exercice10(e) {
        e.preventDefault();
        $('[id^="Exe"]').hide();
    }
    
    
    $('#btn_Exe1').click(exercice1);
    $('#affichage').click(exercice2);
    $('#btn_Exe3').click(exercice3);
    $('#btn_Exe4').click(exercice4);
    $('#imageHover').hover(
        function() {
            $(this).css('opacity', 0.5);
        },
        function() {
            $(this).css('opacity', 1);
        }
    );
    $('#btn_Exe6').click(exercice6);
    $('#btn_Exe7').click(exercice7);
    $('#btn_Exe8').click(exercice8);
    $('#btn_Exe9').click(exercice9);
    $('#btn_Exe10').click(exercice10);
});