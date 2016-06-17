/**
 * Created by Hebert Ramirez on 9/6/2016.
 */


$(document).ready(michat)

    function michat (){

           escuchar();
    $('textarea').keypress(
        function(e){
            if (e.keyCode == 13) {
                var msg = $(this).val();
                $(this).val('');
                if(msg!='')
                    $.ajax({
                        async: true,
                        type:"POST",
                        dataType: "html",
                        contenType:"application/x-www-form-urlencoded",
                        url: "/escribir",
                        data:"chat="+ msg,
                        success: llegada,
                        timeout: 10000,
                        error: problemas
                    });
                return false ;
                function llegada(dato)
                {
                    $(this).val('');
                }
                function problemas()
                {
                    $('<div class="msg_b">Tenemos un problema muuuuy grave</div>').insertBefore('.msg_push');
                }

           }
        });

    function escuchar()
    {
        setInterval(function()
        {
            $.ajax({
                async: true,
                type:"GET",
                dataType: "html",
                contenType:"application/x-www-form-urlencoded",
                url: "/llamado",
                success: llegada,
                timeout: 10000


            });
            return false;
            function llegada(dato)
            {
                $("#chat").html(dato);
                var objDiv = document.getElementById("chat");
                objDiv.scrollTop =objDiv.scrollHeight;

            }

      }, 1000 )
    }
}
