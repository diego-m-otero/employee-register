<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Area;
use App\Models\Role;
use App\Models\EmployeeRole;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function datatable()
    {
        $data = Employee::all();

		return Datatables::of($data)->addColumn('area', function($model){
            return $model->area->name;
        })->addColumn('roles', function($model){
            
            $roles = '<ul class="list-unstyled">';

            foreach($model->role as $role){
                $roles .= '<li style="font-size:12px;"><i class="fas fa-user"></i> '.$role->name.'</li>';
            }

            $roles .= '</ul>';

            return $roles;
        })->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-action='update' data-route='".route('employees.update', $model->id)."' class='btn btn-secondary btn-sm btn-modal-form-employees'><i class='fas fa-edit fa-1x'></i></a>";
                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('employees.destroy', $model->id)."' class='btn btn-danger btn-sm btn-delete-employees' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
            $buttons .= '</div>';

			return $buttons;
        })->rawColumns(['roles', 'actions'])->make(true);
    }

    public function index()
    {
        return view('employees.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'        => 'required|regex:/^[\pL\s\-]+$/u',
            'email'       => 'required|email',
            'gender'      => 'required',
            'area_id'     => 'required',
            'description' => 'required',
            'role_id'     => 'required',
        ],
        [
            'name.required'        => 'El nombre es requerido!',
            'email.required'       => 'El correo electrónico es requerido!',
            'gender.required'      => 'El sexo es requerido!',
            'area_id.required'     => 'El área es requerida!',
            'description.required' => 'La descripción es requerida!',
            'role_id.required'     => 'El rol es requerido!',

            'email.email'          => 'El correo electrónico debe ser una dirección válida!',

            'name.regex'           => 'El campo nombre completo sólo permite letras y espacio',
        ]);

        $employee = new Employee;
        $employee->name         = $request->name;
        $employee->email        = $request->email;
        $employee->gender       = $request->gender;
        $employee->area_id      = $request->area_id;
        $employee->description  = $request->description;
        $employee->notification = !empty($request->notification) ? $request->notification : 0;

        $response = $employee->save();

        $employee = Employee::get()->last();

        foreach($request->role_id as $role){
            $employee_role = new EmployeeRole;
            $employee_role->employee_id = $employee->id;
            $employee_role->role_id     = $role;

            $employee_role->save();
        }

        return compact('response');
    }

    public function edit(Employee $employee)
    {
        $roles = $employee->role;
        return compact('employee', 'roles');
    }

    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'name'        => 'required|regex:/^[\pL\s\-]+$/u',
            'email'       => 'required|email',
            'gender'      => 'required',
            'area_id'     => 'required',
            'description' => 'required',
            'role_id'     => 'required',
        ],
        [
            'name.required'        => 'El nombre es requerido!',
            'email.required'       => 'El correo electrónico es requerido!',
            'gender.required'      => 'El sexo es requerido!',
            'area_id.required'     => 'El área es requerida!',
            'description.required' => 'La descripción es requerida!',
            'role_id.required'     => 'El rol es requerido!',

            'email.email'          => 'El correo electrónico debe ser una dirección válida!',

            'name.regex'           => 'El campo nombre completo sólo permite letras y espacio',
        ]);

        $employee->name         = $request->name;
        $employee->email        = $request->email;
        $employee->gender       = $request->gender;
        $employee->area_id      = $request->area_id;
        $employee->description  = $request->description;
        $employee->notification = !empty($request->notification) ? $request->notification : 0;

        $response = $employee->save();

        /**
         * Employee Role 
         */
        EmployeeRole::where('employee_id', $employee->id)
                    ->whereNotIn('role_id', $request->role_id)
                    ->delete();

        foreach($request->role_id as $role){

            $validate = EmployeeRole::where([ 'employee_id' => $employee->id, 'role_id' => $role ])
                                    ->first();

            if(is_null($validate)){
                $employee_role = new EmployeeRole;
                $employee_role->employee_id = $employee->id;
                $employee_role->role_id     = $role;
    
                $employee_role->save();
            }
        }

        return compact('response');
    }

    public function destroy(Employee $employee)
    {
        try {
            EmployeeRole::where('employee_id', $employee->id)
                        ->delete();

            $response = $employee->delete();
        } catch (\Throwable $th) {
            $response = $th;
        }

        return compact('response');
    }

    public function formOptions()
    {
        $areas = Area::orderBy('name', 'ASC')->get();
        $roles = Role::orderBy('name', 'ASC')->get();

        return compact('areas', 'roles');
    }
}
