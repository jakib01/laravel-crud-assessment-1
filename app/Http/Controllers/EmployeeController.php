<?php

namespace App\Http\Controllers;

use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(EmployeeService $employeeData){
        $employeeData = $employeeData->employeeData();
        return view('employee.index',compact('employeeData'));
    }

    public function create(){
        return view('employee.create-employee');
    }

    public function store(Request $request, EmployeeService $employeeStore){

        $inputs = $request->except('_method', '_token');

        $insertData = $employeeStore->employeeStore($inputs);

        if(isset($insertData['success'])){

            return redirect(route('employee.index'))->with('success', "Employee successfully Added.");
        }else{
            return redirect(route('employee.create'))->with('error', "Something went wrong.");
        }
    }
}
