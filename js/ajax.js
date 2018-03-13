$.ajax({
       url: "api.php?action=getJurisdiccion",
       processData: false,
       async:false,
       contentType: "application/json"
   })
   .done(function(data, textStatus, jqXHR){
     var obj = JSON.parse( data ); //convertimos el resultado json en algo que el jquery pueda procesar (en un array)
     for(var i=0;i<obj.length;i++){
       $("#jurisdiccion").append('<option value="'+obj[i].idjur+'">'+obj[i].nombre+'</option>');
     }
 });

 
 $(document).ready(function() {
	 //para cualquier control que tenga la clase "nombre", al presionar una tecla
$(".nombre").keydown(function(event){
    if(event.keyCode == 13) { //la tecla es 13? (13=enter)
		 event.preventDefault(); //evitar el comportamiento default (en este caso, submit)
		  $(this).removeClass("is-invalid"); //si tiene la clase "is-invalid", quitarla
		 if($(this).val()==""){$(this).addClass("is-invalid");return;} //si el control no tiene texto, ponerle la clase is-invalid (borde rojo) y salir
		 var fila=$(this).attr("data-orden"); //obtener su valor data-orden (su indice)
  $("#apellido"+fila).focus(); //pasar el foco al control Apellido de la misma fila (indice)
	}
});

$(".apellido").keydown(function(event){
    if(event.keyCode == 13) {
		 event.preventDefault();
		  $(this).removeClass("is-invalid")
		 if($(this).val()==""){$(this).addClass("is-invalid");return;}
		 var fila=$(this).attr("data-orden");
  $("#nacimiento"+fila).focus();
	}
});

$(".nacimiento").keydown(function(event){
    if(event.keyCode == 13) {
		 event.preventDefault();
		  $(this).removeClass("is-invalid")
		 if($(this).val()==""){$(this).addClass("is-invalid");return;}
		 var fila=$(this).attr("data-orden");
		 fila++;
  $("#dni"+fila).focus();
	}
});

  
    $(".dni").keydown(function(event){
    if(event.keyCode == 13) {
		 event.preventDefault();
		 $(this).removeClass("is-invalid")
		 if($(this).val()==""){$(this).addClass("is-invalid");return;}
		var fila=$(this).attr("data-orden");
		   $.ajax({
    //pasamos los parametros adecuados: el action y el id del estado seleccionado
    //$("#estados").val()=el parametro "value" del objeto cuyo id es "estados",
    //esto es lo mismo que decir "dame el value de la opcion seleccionada en la lista cuyo id es "estados"
      url: "api.php?action=getPersona&dni="+$("#dni"+fila).val(),
      processData: false,
      async:false,
      contentType: "application/json"
    })
    .done(function(data, textStatus, jqXHR){
     	var obj = JSON.parse( data );//convertimos el resultado json en algo que el jquery pueda procesar (en un array)
     	//si obj tiene mas de 0 elementos, completar los campos y pasar el foco. sino, simplemente pasar el foco.
     if(obj.length>0){
     	$("#nombre"+fila).val(obj[0].nombre);
		//$("#nombre"+fila).attr("value",obj[0].nombre);
     	$("#apellido"+fila).val(obj[0].apellido);
		//$("#apellido"+fila).attr("value",obj[0].apellido);
		
		$("#nacimiento"+fila).focus();
	 }
	 else
	 {
		 $("#nombre"+fila).focus();
	 }
	 
 	  });
      event.preventDefault();
      return false;
    }
  });
  
});
