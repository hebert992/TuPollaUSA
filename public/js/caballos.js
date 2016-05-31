/**
 * Created by Hebert Ramirez on 30/5/2016.
 */

$("#id1").change(function(event){

    $.get("caballo/"+event.target.value+"",function(response, caballo){
        $("#body1").empty();
        $("#body1").append("<b>  Nombre: </b>" + response.name+
            " <b>  JINETE: </b>  " +response.jinete +
            " <b>  PROPIETARIO: </b>" + response.propietario+
            "<b>  MI: </b>" + response.mi+
            "<b>  PESO: </b>" + response.peso+
            ""


        );

    });
});
$("#id2").change(function(event){

    $.get("caballo/"+event.target.value+"",function(response, caballo){
        $("#body2").empty();
        $("#body2").append("<b>  Nombre: </b>" + response.name+
            " <b>  JINETE: </b>  " +response.jinete +
            " <b>  PROPIETARIO: </b>" + response.propietario+
            "<b>  MI: </b>" + response.mi+
            "<b>  PESO: </b>" + response.peso+
            ""


        );

    });
});
$("#id3").change(function(event){

    $.get("caballo/"+event.target.value+"",function(response, caballo){
        $("#body3").empty();
        $("#body3").append("<b>  Nombre: </b>" + response.name+
            " <b>  JINETE: </b>  " +response.jinete +
            " <b>  PROPIETARIO: </b>" + response.propietario+
            "<b>  MI: </b>" + response.mi+
            "<b>  PESO: </b>" + response.peso+
            ""


        );

    });
});
$("#id4").change(function(event){

    $.get("caballo/"+event.target.value+"",function(response, caballo){
        $("#body4").empty();
        $("#body4").append("<b>  Nombre: </b>" + response.name+
            " <b>  JINETE: </b>  " +response.jinete +
            " <b>  PROPIETARIO: </b>" + response.propietario+
            "<b>  MI: </b>" + response.mi+
            "<b>  PESO: </b>" + response.peso+
            ""


        );

    });
});
$("#id5").change(function(event){

    $.get("caballo/"+event.target.value+"",function(response, caballo){
        $("#body5").empty();
        $("#body5").append("<b>  Nombre: </b>" + response.name+
            " <b>  JINETE: </b>  " +response.jinete +
            " <b>  PROPIETARIO: </b>" + response.propietario+
            "<b>  MI: </b>" + response.mi+
            "<b>  PESO: </b>" + response.peso+
            ""


        );

    });
});
$("#id6").change(function(event){

    $.get("caballo/"+event.target.value+"",function(response, caballo){
        $("#body6").empty();
        $("#body6").append("<b>  Nombre: </b>" + response.name+
            " <b>  JINETE: </b>  " +response.jinete +
            " <b>  PROPIETARIO: </b>" + response.propietario+
            "<b>  MI: </b>" + response.mi+
            "<b>  PESO: </b>" + response.peso+
            ""


        );

    });
});