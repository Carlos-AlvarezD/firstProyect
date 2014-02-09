
$(document).ready(function(){
$("#logIn").click(function(){
    $(".seccion1").html('<div class="log">' +
                        '<h2><span id="ing">INGRESO</span></h2>'+
                        ' <strong> Nick  :  </strong> <input type="text" name="user" id="user"/></br>' +
                        ' <strong> Clave :  </strong> <input type="text" name="pass" id="pass"/>' + 
                        '<p> <input type="button" name="botonLog" id="botonLog" value="Enviar"/>' +
                        '<div class="singOut" type="hidden">Sing out</div>'+
                        '</div>');
		
    $("#botonLog").click(function(){
        user = $("#user").val();
        pass = $("#pass").val();
        datos = 'user=' + user + '&pass=' + pass + '&tipo=1';

        /*realiza la consulta a php y envia el usuario y la contraseña*/
        /*verificar si hay otra mejor manera de recibir los datos*/
        $.ajax({
            type :    'POST',
            url:      'php/caso.php',
            data:     datos,
            dataType: 'json',
			
            success: function(data){
                hasUser(data);
            }
        });//End ajax
        
        /* Maneja el array enviado por php para verificar 
         * si un error a ocurrido y mostrar el respectivo mensaje
         */
        function hasUser(data){
            $.each(data, function(index){
                error  = data[index].error;
                if (error){
                    errorMsg  = data[index].msg;	
                    alert(errorMsg);
                } else{
                    firstname  = data[index].firstname;
                    sessionInit(firstname);	
                }
            });
        }
        
        /* Establece el nombre del usuario y 
         * da la bienvenida utilizando los css
         */
        function sessionInit(firstname){
            //$("#user").slideUp(899);  
            $(".log").slideUp('fast');
            $("#header").append('<div class="nombreUsuario">Bienvenido <strong>' + 
             firstname +' </strong>!!</div>'); 

            $(".nombreUsuario").hover(function(){
                $(".nombreUsuario").toggleClass('efect');   
            });
        }
    });//end button botonLog
});//End button login

$("#home").click(function(){
    $('.seccion1').html("<h1><center>HOME</center></h1>"); 
});
});


  

    
    