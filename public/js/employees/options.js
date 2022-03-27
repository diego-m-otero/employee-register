$(function(){
    $.ajax({
        url: `/admin/employees/form-options`,
        type: 'GET',
    }).done(function(data){
        let areas = data.areas
        let roles = data.roles

        $.each(areas, function(index, area){
            $('#form_employees .areas').append(`<option value="${area.id}">${area.name}</option>`)
        })

        let strroles = '<ul class="list-unstyled">'
        $.each(roles, function(index, role){
            strroles += `<li> 
                            <input class="form-check-input" type="checkbox" name="role_id[]" value="${role.id}"> ${role.name}
                        </li>`
        })

        strroles += '</ul>'

        $('#form_employees #roles').html(strroles)
    })
})