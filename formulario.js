$("#formulario").submit(function(event){
    event.preventDefault();
    enviar();
});//ALMACENA LOS DATO SIN RESFRESCAR EN EL SITIO WEB

function enviar(){
    var datos = $("#formulario").serialize();//TOMA LOS DATOS DE "NAME" Y LOS LLEVA A UN ARREGLO
    $.ajax({
        type: "post",
        url: "formulario.php",
        data:datos,
        success: function(texto){
            if(texto== "exito"){
                correcto();
            }else{
                phperror(texto);
            }
        }
    })
}

function correcto (){
    $("#mensajeExito").removeClass("d-none");
    $("#mensajeErrorPHP").addClas("d-none");
}

function phperror(texto){
 $("#mensajeError").removeClass("d-none");
 $("#mensajeError").html(texto);
}