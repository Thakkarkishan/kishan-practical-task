<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';

    public static function getEmployees($Data, $sort_field, $orderBy, $c)
    {
        $query = Employee::query();
        if (!empty($Data['search']['value'])) {
            $query->where('id', "LIKE", "%{$Data['search']['value']}%")
            ->orWhere('first_name', "LIKE", "%{$Data['search']['value']}%")
            ->orWhere('last_name', "LIKE", "%{$Data['search']['value']}%")
            ->orWhere('mobile', "LIKE", "%{$Data['search']['value']}%")
            ->orWhere('email', "LIKE", "%{$Data['search']['value']}%");

        }
        
        $query->orderBy('id', $orderBy);
        if ($c == 1) {
            if ($Data['length'] != -1) {
                $query->offset($Data['start']);
                $query->limit($Data['length']);
            }
            return $query->get();
        } else {
            $result['NumRecords'] = $query->count();
            return $result;
        } 
    }
}
