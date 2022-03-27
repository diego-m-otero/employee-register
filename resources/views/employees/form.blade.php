<div class="modal" id="modal_form_employees" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="employee_action"></span> Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div id="errors"></div>

                <form id="form_employees">
                   
                    @csrf
                    
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nombre Completo *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre completo del empleado">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Correo Electrónico *</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label">Sexo</label>

                        <div class="col-sm-8">
                            <div class="form-check">
                                <label class="form-check-label" for="genderM">
                                    <input class="form-check-input" type="radio" name="gender" id="genderM" value="M">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="genderF">
                                    <input class="form-check-input" type="radio" name="gender" id="genderF" value="F">
                                    Femenino
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="area_id" class="col-sm-4 col-form-label">Area *</label>
                        <div class="col-sm-8">
                            <select name="area_id" id="area_id" class="form-control areas">
                                <option></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Descripción *</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group form-check row">
                        <div class="offset-sm-4 col-sm-8">
                            <input class="form-check-input" type="checkbox" name="notification" id="notification" value="1"> Deseo recibir boletín informativo
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_id" class="col-sm-4 col-form-label">Roles *</label>
                        <div class="col-sm-8">
                            <div id="roles"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-form-save-employees">Guardar</button>
            </div>
        </div>
    </div>
</div>