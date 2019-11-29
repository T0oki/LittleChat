$(document).ready(function(){
    $('.chatarea').scrollTop($('.chatarea')[0].scrollHeight)
    document.addEventListener('keyup', function (event) {
        if (event.defaultPrevented) {
            return;
        }

        var key = event.key || event.keyCode;

        if (key === 'Enter' || key === 13) {
            sendChat();
        }
    });
    $("#send").click(function(e){
        e.preventDefault();
        sendChat();
    });
    function sendChat() {
        if($('#message').val() === "") return;
        $.post(
            'php/functions/sendmessage.php',
            {
                author: name,
                message: $('#message').val()
            },

            function(data){

                if(data === 'Success'){
                    lastid ++;
                    var now = new Date();
                    now = now.format("dd/mm/yyyy - HH:MM");

                    $('.chatarea').html($('.chatarea').html() + `<p>[${now}] - <b>${name}</b> : ${escapeHtml($('#message').val())}</p>`);
                    $('.chatarea').scrollTop($('.chatarea')[0].scrollHeight)
                    cls();
                }
                else if(data === 'Clear') {
                    location.reload();
                }
                else if(data === 'CND') {
                    $('.chatarea').html($('.chatarea').html() + `<p class="green">[Info] La commande ${$('#message').val()} n'éxiste pas !</p>`);
                    cls();
                }
                else if(data === 'Help') {
                    $('.chatarea').html($('.chatarea').html() + `<p class="red">[Help] <br> /Help affiche la liste des commandes <br> /Clear vide le chat <br> Enjoy ^^</p>`);
                    cls();
                }
                else{
                    alert(data);
                }

            },
            'text'
        );
    }
});
function cls() {
    $('#message').val("");
}

function actualise(){
// traitement
    $.post(
        'php/functions/getmessage.php',
        {
            id: lastid
        },

        function(data){

            if(data.startsWith("{\"")){
                data = JSON.parse(data);
                $('.chatarea').html($('.chatarea').html() + data.message);
                $('.chatarea').scrollTop($('.chatarea')[0].scrollHeight);
                lastid = data.id;
                if(data.message.includes("/clear")){
                    location.reload();
                }
            }
            else if(data === ""){
            }
            else{
                alert(data);
            }

        },
        'text'
    );
    setTimeout(actualise,2000); /* rappel après 2 secondes = 2000 millisecondes */
}

actualise();

function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}