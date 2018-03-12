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

 $( "#dni" ).change(function() {
    $.ajax({
    //pasamos los parametros adecuados: el action y el id del estado seleccionado
    //$("#estados").val()=el parametro "value" del objeto cuyo id es "estados",
    //esto es lo mismo que decir "dame el value de la opcion seleccionada en la lista cuyo id es "estados"
      url: "api.php?action=getPersona&dni="+$("#dni").val(),
      processData: false,
      async:false,
      contentType: "application/json"
    })
    .done(function(data, textStatus, jqXHR){
     	var obj = JSON.parse( data );//convertimos el resultado json en algo que el jquery pueda procesar (en un array)
     	//vaciamos la lista de ciudades y agregamos una opcion "por defecto"
     	$("#nombre").empty();
     	$("#nombre").append('value="'+obj.nombre+'"');
      $("#apellido").empty();
     	$("#apellido").append('value="'+obj.apellido+'"');
 	  });
  });
