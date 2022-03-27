<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    public function datatable()
    {
        $data = Area::all();

		return Datatables::of($data)->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-action='update' data-route='".route('areas.update', $model->id)."' class='btn btn-secondary btn-modal-form-areas'><i class='fas fa-edit fa-1x'></i></a>";
                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('areas.destroy', $model->id)."' class='btn btn-danger btn-delete-areas' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
            $buttons .= '</div>';

			return $buttons;
        })->rawColumns(['actions'])->make(true);
    }

    public function index()
    {
        return view('areas.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required' => 'El nombre del área es requerido!',
        ]);

        $area = new Area;
        $area->name = $request->name;
        $response   = $area->save();

        return compact('response');
    }

    public function edit(Area $area)
    {
        return compact('area');
    }

    public function update(Request $request, Area $area)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required' => 'El nombre del área es requerido!',
        ]);

        $area->name = $request->name;
        $response = $area->save();

        return compact('response');
    }

    public function destroy(Area $area)
    {
        try {
            $response = $area->delete();
        } catch (\Throwable $th) {
            $response = $th;
        }

        return compact('response');
    }
}
