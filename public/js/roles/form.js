$(document).on('click', '.btn-modal-form-roles', function(){

	let id     = $(this).data('id')
	let route  = $(this).data('route')
	let action = $(this).data('action')
	
	$('#form_roles').trigger('reset')
	$('#form_roles').attr('action', route)

	if(action == 'update'){	
		$.ajax({
			url: `/admin/roles/edit/${id}`,
			type: 'GET',
		}).done(function(data){
			let role = data.role
			$('#form_roles #name').val(role.name)    
		}).always(function(){
		})
	}
	
	$('#modal_form_roles').modal('show')
})


$(document).on('click', '.btn-form-save-roles', function(){

	let route = $('#form_roles').attr('action')
    let data  = $('#form_roles').serialize()

	$.ajax({
		url: route,
		type: 'POST',
		data: data,
	}).done(function(response){
        
        Swal.fire({
            title: 'Exito!',
            text: 'Rol guardado correctamente.',
            icon: 'success',
            confirmButtonText: 'Cerrar'
        })

        table_roles.ajax.reload()
        $('#modal_form_roles').modal('hide')
	}).always(function(){

    }).fail(function(response){

        let errors    = response?.responseJSON?.errors
        let strerrors = '<div class="alert alert-danger" role="alert"><ul class="list-inline">'

        $.each(errors, function(index, error){
            strerrors += `<li>* ${error}</li>`
        })

        strerrors += '</ul></div>'

        $('#errors').html(strerrors)
    })
})