$(document).on('click', '.btn-modal-delete-roles', function(){

	let id     = $(this).data('id')
	let route  = $(this).data('route')
	
	Swal.fire({
		title: '',
		text: 'Esta seguro que desea eliminar este registro.',
		icon: 'warning',
		confirmButtonText: 'Cerrar'
	}).then((result) => {
		if(result.isConfirmed){
			$.ajax({
				url: route,
				type: 'POST',
				data: data,
			}).done(function(response){
				
				Swal.fire({
					title: 'Exito!',
					text: 'El rol ha sido eliminado correctamente.',
					icon: 'success',
					confirmButtonText: 'Cerrar'
				})
		
				table_roles.ajax.reload()
			}).always(function(){
		
			}).fail(function(response){
		
				
			})
		}
	})
})