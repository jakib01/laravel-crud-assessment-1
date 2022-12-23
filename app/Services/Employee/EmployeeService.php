<?php

namespace App\Services\Employee;


use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    public function employeeStore($inputs): array
    {
        DB::beginTransaction();
        try{
            $inserted = Employee::create($inputs);
            if(isset($inserted)){
                DB::commit();
                return ["name"=> $inserted->name ,"success" => "Successfully created"];
            }
            else {
                DB::rollBack();
                return ["error" => "Something went wrong"];
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return ["error" => $e->getMessage()];
        }
    }

    public function allEmployeeData(): \Illuminate\Database\Eloquent\Collection|array
    {
        try{

            $employees = Employee::All()->whereNull('deleted_at');
            return $employees;

        }catch (\Exception $e) {

            return ["error" => $e->getMessage()];

        }
    }


    public function getEmployeesById($id){

        $employee = Employee::find($id);

        return $employee;
    }

    public function deleteEmployee($id, $updateDate){

        DB::BeginTransaction();
        try{
            $employee = Employee::find($id);
            $employee->update([
                    'name' => $updateDate['name'],
                    'position' => $updateDate['position'],
                    'office' => $updateDate['office'],
                    'age' => $updateDate['age'],
                    'joining_date' => $updateDate['joining_date'],
                    'salary' => $updateDate['salary'],
                ]);
            DB::Commit();
            return ["name"=> $employee['name'] ,"success" => " Update Successfully"];

        }catch (\Exception $e) {
            DB::Rollback();
            return ["error" => $e->getMessage()];
        }

    }

    public function deleteEmployeesById($id){

        try{
            $employee = Employee::find($id);

            $employee->delete();

            return ["name"=> $employee['name'] ,"success" => "Successfully Deleted."];

        }catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }



    }

}
