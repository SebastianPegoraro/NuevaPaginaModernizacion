$.ajax({
       url: "api.php?action=getJurisdiccion",
       processData: false,
       async:false,
       contentType: "application/json"
   })
   .done(function(data, textStatus, jqXHR){
     var obj = JSON.parse( data ); //convertimos el resultado json en algo que el jquery pueda procesar (en un array)
     for(var i=0;i<obj.length;i++)
     {
       $("#jurisdiccion").append('<option value="'+obj[i].idjur+'">'+obj[i].nombre+'</option>');
     }
 });
