$(document).on('click', '.btn-delete-employees', function(){

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
				
				Swal.fire({
					title: 'Exito!',
					text: 'El empleado ha sido eliminado correctamente.',
					icon: 'success',
					
				})
		
				table_employees.ajax.reload()
			}).always(function(){
		
			}).fail(function(response){})
		}
	})
})