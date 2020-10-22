$(obtener_registros());

function obtener_registros(factura)
{
	$.ajax({
		url : 'ver_pedidos.php',
		type : 'POST',
		//dataType : 'php',
		data : { factura: factura 
		},
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
