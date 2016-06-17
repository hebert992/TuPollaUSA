/**
 * Created by Hebert Ramirez on 12/6/2016.
 */
$(document).ready(Noticias)

function Noticias()
{
    $.get("/getnoticias",function(response, noticias) {

        for(a=0;a<response.length;a++)
        {
            link = "noticias/"+response[a].id
            $("#noticias").append("<li><a href='"+link+"' >"+response[a].titulo +"</a></li> ");
            console.log(response[a]);
        }

    });


}