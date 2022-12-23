<?php

namespace App\Http\Controllers;

use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * The datatable view.
     *
     */
    public function index(EmployeeService $employeeData){

        $employeeData = $employeeData->allEmployeeData();

        return view('employee.index-employee',compact('employeeData'));
    }

    /**
     * The create employee.
     *
     */
    public function create(){

        return view('employee.create-employee');
    }

    /**
     * The store employee.
     *
     */
    public function store(Request $request, EmployeeService $employeeStore){

        $inputs = $request->except('_method', '_token');

        $insertData = $employeeStore->employeeStore($inputs);

        if(isset($insertData['success'])){

            return redirect(route('employee.index'))->with('success', "Employee successfully Added.");
        }else{
            return redirect(route('employee.create'))->with('error', "Something went wrong.");
        }
    }

    /**
     * The edit employee.
     *
     */
    public function edit($id, EmployeeService $employee){

        $employee = $employee->getEmployeesById($id);

        return view('employee.edit-employee',compact('employee'));

    }

    /**
     * The edit employee.
     *
     */
    public function update(Request $request, $id, EmployeeService $employee){

        $inputs = $request->except('_method', '_token');

        $employee = $employee->deleteEmployee($id, $inputs);

        if(isset($employee['success'])){

            return redirect(route('employee.index'))->with('success', "Update Successfully.");
        }else{

            return redirect(route('employee.index'))->with('error', "Something went wrong.");
        }

    }

    /**
     * The delete employee.
     *
     */
    public function delete($id, EmployeeService $employee){

        $employee = $employee->deleteEmployeesById($id);

        if(isset($employee['success'])){

            return redirect(route('employee.index'))->with('success', "Successfully Deleted.");
        }else{

            return redirect(route('employee.index'))->with('error', "Something went wrong.");
        }
    }

}
