<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function area(){
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function role(){
        return $this->hasMany(EmployeeRole::class, 'employee_id')
                    ->join('roles', 'roles.id', 'employee_roles.role_id')
                    ->select('roles.id', 'roles.name');
    }
}
