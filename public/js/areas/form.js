$(document).on('click', '.btn-modal-form-areas', function(){

	let id     = $(this).data('id')
	let route  = $(this).data('route')
	let action = $(this).data('action')
    
	$('#form_areas').trigger('reset')
	$('#form_areas').attr('action', route)
    $('#errors').html('')

	if(action == 'update'){	
		$.ajax({
			url: `/admin/areas/edit/${id}`,
			type: 'GET',
		}).done(function(data){
			let area = data.area
			$('#form_areas #name').val(area.name)    
		}).always(function(){
		})
	}
	
	$('#modal_form_areas').modal('show')
})


$(document).on('click', '.btn-form-save-areas', function(){

	let route = $('#form_areas').attr('action')
    let data  = $('#form_areas').serialize()

	$.ajax({
		url: route,
		type: 'POST',
		data: data,
	}).done(function(response){
        
        Swal.fire({
            title: 'Exito!',
            text: 'El área ha sido guardada correctamente.',
            icon: 'success',
            confirmButtonText: 'Cerrar'
        })

        table_areas.ajax.reload()
        $('#modal_form_areas').modal('hide')
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