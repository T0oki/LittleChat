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
            'sendmessage.php',
            {
                author: name,
                message: $('#message').val()
            },

            function(data){

                if(data === 'Success'){
                    var now = new Date();
                    now = now.format("dd/mm/yyyy - HH:MM");

                    $('.chatarea').html($('.chatarea').html() + `<p>[${now}] - <b>${name}</b> : ${$('#message').val()}</p>`);
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