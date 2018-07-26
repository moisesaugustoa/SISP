// funcao para retornar o enderecço conforme o combo das unidades

$(function(){

	
	$("select[name=unidade]").change(function(){

		unidades = $(this).val();
		
		if ( unidades === '')
			return false;
		
		resetaCombo('endereco');
		var path_url = path.trim()+"index.php/sisp_controller/getEndereco/"+unidades;
		$.getJSON( path_url, function (data){
	
			//	console.log(data);
			var option = new Array();
		
			$.each(data, function(i, obj){

		    	option[i] = document.createElement('option');
		    	$( option[i] ).attr( {value : i} );
		 		$( option[i] ).append( obj.local );

		    	$("select[name='endereco']").append( option[i] );
		
			});
	
		});
	
	});

});

function resetaCombo( el ) {
   $("select[name='"+el+"']").empty();
}