$(document).on('click', '.btn-delete-roles', function(){

	let id     = $(this).data('id')
	let route  = $(this).data('route')
	
	Swal.fire({
		title: '',
		text: 'Esta seguro que desea eliminar este registro.',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, eliminar!',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if(result.isConfirmed){
			$.ajax({
				url: route,
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			}).done(function(response){

				if(response?.response === true){
					Swal.fire({
						title: 'Exito!',
						text: 'El rol ha sido eliminada correctamente.',
						icon: 'success',
					})

					table_roles.ajax.reload()
				}else{
					Swal.fire({
						title: '',
						text: 'El rol no se puede eliminar porque tiene datos asociados.',
						icon: 'error',
					})
				}
		
				table_roles.ajax.reload()
			}).always(function(){
		
			}).fail(function(response){})
		}
	})
})