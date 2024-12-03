<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function employee_add()
    {
        return view('add');
    }

    public function employee_list(Request $request)
    {
        $post = $request->input();
        if ($post) {
            $field_pos = array('id' => '0');
            $sort_field = array_search($post['order']['0']['column'], $field_pos);
            if ($post['order']['0']['dir'] == 'asc') {
                $orderBy = "ASC";
            } else {
                $orderBy = 'DESC';
            }
            $TotalRecord = Employee::getEmployees($post, $sort_field, $orderBy, 0);
            $userData = Employee::getEmployees($post, $sort_field, $orderBy, 1);
            $iTotalRecords = $TotalRecord['NumRecords'];
            $records = array();
            $records['data'] = array();
            foreach ($userData as $key => $value) {

                $current_date = date('Y-m-d');
                
                $view = '<a href="' . baseUrl() . '/employee/emplyee-view/' . $value->id . '" id="view_' . $value->id . '" data-value="' . $value->id . '" class="normal-click f-black"><i class="fa fa-eye normal-click f-black" aria-hidden="true"></i></span></a>';
                $delete = '<a class="ms-2" href="javascript:void(0)" id="delete_' . $value->id . '" data-value="' . $value->id . '"><i class="fa fa-trash normal-click f-black" aria-hidden="true"></i></span></a>';
                $actionDiv = '<div>' . $view . '' . $delete . '</div>';

                $records['data'][] = array(
                    $value->id,
                    $value->first_name,
                    $value->last_name,
                    $value->email,
                    $value->mobile,
                    $actionDiv
                );
            }
            $records['draw'] = intval($post['draw']);
            $records['recordsTotal'] = $iTotalRecords;
            $records['recordsFiltered'] = $iTotalRecords;
            echo json_encode($records);
            exit();
        }
    }
    public function employee_save(Request $req)
    {
       
        $emp = new Employee();
        $emp->first_name = $req->first_name;
        $emp->last_name = $req->last_name;
        $emp->email = $req->email;
        $emp->code = $req->code;
        $emp->mobile = $req->mobile;
        $emp->gender = $req->gender;
        $emp->hobby = $req->hobby;
        $emp->address = $req->address;

        $saveData = $emp->save();
       
        if($saveData){
        $profile = $req['profile']->store('emp/emp_'.$emp->id,
            'public');

        $updateData = $emp->where('id',$emp->id)->update(['profile'=>$profile]);
        return redirect('/dashboard');
    }
    else
    {
         return redirect('/dashboard');
    }
    }
    public function employee_view($id)
    {
        $empData = Employee::where('id',$id)->get();
        return view('view',['empData'=>$empData]);
    }

    public function employee_update(Request $req)
    {
        $updateData = array(
            'first_name' =>$req->first_name,
            'last_name' =>$req->last_name,
            'email' =>$req->email,
            'code' =>$req->code,
            'mobile' =>$req->mobile,
            'gender' =>$req->gender,
            'hobby' =>$req->hobby,
        );

        if(isset($req->profile))
        {
             $profile = $req['profile']->store('emp/emp_'.$req->id,
            'public');
             $updateData['profile'] = $profile;
        }

        $update = Employee::where('id',$req->id)->update($updateData);
        if($update)
        {

         return redirect('/dashboard');
        }
        else
        {
         return redirect('/dashboard');   
        }
    }
    public function employee_delete(Request $req)
    {
        Employee::where('id',$req->id)->delete();
        return true;
    }

}
