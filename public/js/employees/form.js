$(document).on('click', '.btn-modal-form-employees', function(){

	let id     = $(this).data('id')
	let route  = $(this).data('route')
	let action = $(this).data('action')
    
	$('#form_employees').trigger('reset')
	$('#form_employees').attr('action', route)
    $('#errors').html('<div class="alert alert-info" role="alert">Los campos con asteriscos (*) son obligatorios</div>')

	if(action == 'update'){	

		$('#employee_action').html('Actualizar')

		$.ajax({
			url: `/admin/employees/edit/${id}`,
			type: 'GET',
			async: true,
		}).done(function(data){

			let employee = data.employee
			let roles    = data.roles

			$('#form_employees #name').val(employee.name)    
			$('#form_employees #email').val(employee.email)  

			if(employee.gender === 'F'){
				$('#form_employees #genderF').prop('checked', true)
			}else{
				$('#form_employees #genderM').prop('checked', true)
			}
			    
			$('#form_employees #area_id').val(employee.area_id).trigger('change') 
			$('#form_employees #description').val(employee.description)

			if(employee.notification === 1){
				$('#form_employees #notification').prop('checked', true)
			}else{
				$('#form_employees #notification').prop('checked', false)
			}

			if(employee.notification === 1){
				$('#form_employees #notification').prop('checked', true)
			}else{
				$('#form_employees #notification').prop('checked', false)
			}

			$.each(roles, function(index, role){
				$(`input[value='${role.id}'][name='role_id[]']`).prop('checked', true)
			})
		})
	}else{
		$('#employee_action').html('Crear')
	}
	
	$('#modal_form_employees').modal('show')
})


$(document).on('click', '.btn-form-save-employees', function(){

	let route = $('#form_employees').attr('action')
    let data  = $('#form_employees').serialize()

	$.ajax({
		url: route,
		type: 'POST',
		data: data,
	}).done(function(response){
        
        Swal.fire({
            title: 'Exito!',
            text: 'El empleado ha sido guardado correctamente.',
            icon: 'success',
            confirmButtonText: 'Cerrar'
        })

        table_employees.ajax.reload()
        $('#modal_form_employees').modal('hide')
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