
$(document).ready(function(){
    
    carroCompras = $("#carroCompras");
    carroCompras.click(initCart);
    
    function initCart(){
        $(".oculto").hide();
        $(".obtenerArticulo").html("");
        $(".art").html("");
        $("#drop").html("");
    
        $.ajax({
            type : 'POST',
            url: 'php/caso.php',
            data: 'tipo=2',
            dataType: 'json'
        })
        .done(function(data){
            $.each(data, function(index){
                productoUUID = data[index].ProductoUUID;
                productoCode = data[index].ProductoCode;
                productoDesc = data[index].ProductoName;
                productoVal = data[index].ProductoVal;
                productoImgPath = data[index].ProductoImgPath;
                
                
                /* "div" para desplegar la imagen que se podra arrastar hacia el div
                 * que la recibe.
                 * Recibe de la data el valor del producto, el nombre que es la 
                 * descripcion y la ruta de la imagen 
                 */
                $(".art").append('<div class="carro" valor = "'+ productoVal +'">'+ productoDesc +' '+
                    '<span class = "msg">Arrastrar!!</span></br><img class = "arti" src='+
                    '"' + productoImgPath + '"' +'/></div>'
                ); 
            });

            /* Despliega el div el cual recibira el articulo en el evento drop*/
            $(".obtenerArticulo").append( 
                '<img class="imgCarro" src="imagenes/carrito.jpg"/>'+
                '<div id="drop"><span class = "arrastrame">Arrastrar aqui!!</span></div></br>' +
                '<p><input type = "button" id = "venta" value = "Comprar">'+
                ' <input type = "button" id = "cancel" value = "Cancelar"></p>'
            );

            $("#venta").click(function(){
                /*siguiente paso*/
                alert(acu);
            });						  
            
            $(".carro").draggable({
                helper: 'clone',
                appendTo: 'body',
                connectToSortable:'#drop',
                cursor: 'move',
                cursorAT: { top:15, left:45},
                revert: 'invalid'				  

            });

            $("#drop").droppable({
                drop: function(event, ui){

                    $('.arrastrame').remove();
                    
                    nomArt = ui.draggable.text().split("Arrastrar");
                    $(this).addClass("classdrop").append(nomArt[0] + '</br>');
                    
                    productVal = ui.draggable.attr('valor');
                    acumulador(productVal);
                }
            });

            /*Para anadir el valor del articulo y el mensage arrastrame.*/
            $('.carro').mousemove(function(e){
                valorArticulo = $(this).attr('valor');
                $("span", this).addClass("mensage");
                $("#sobreimagen").show().text(valorArticulo);
                $("#sobreimagen").css('top', e.clientY +document.body.scrollTop+5).css('left' , e.clientX +document.body.scrollLeft+ 5);

            }).mouseout(function(){
                $(".msg").removeClass("mensage");	
                $("#sobreimagen").css('display','none');

                });
        });//End Ajax
    
    }
    
    
    
});//End Document

acu = 0;
function acumulador(b){ 
    b = parseInt(b);
    acu = acu + b;
    return acu;
}