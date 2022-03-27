<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function datatable()
    {
        $data = Role::all();

		return Datatables::of($data)->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-action='update' data-route='".route('roles.update', $model->id)."' class='btn btn-secondary btn-modal-form-roles'><i class='fas fa-edit fa-1x'></i></a>";
                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('roles.destroy', $model->id)."' class='btn btn-danger btn-delete-roles' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
            $buttons .= '</div>';

			return $buttons;
        })->rawColumns(['actions'])->make(true);
    }

    public function index()
    {
        return view('roles.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required' => 'El nombre es requerido!',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $response = $role->save();

        return compact('response');
    }

    public function edit(Role $role)
    {
        return compact('role');
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required' => 'El nombre es requerido!',
        ]);

        $role->name = $request->name;
        $response = $role->save();

        return compact('response');
    }

    public function destroy(Role $role)
    {
        try {
            $response = $role->delete();
        } catch (\Throwable $th) {
            $response = $th;
        }

        return compact('response');
    }
}
