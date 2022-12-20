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

    public function employeeData()
    {
        try{

            $employees = Employee::All();
            return $employees;

        }catch (\Exception $e) {

            return ["error" => $e->getMessage()];

        }
    }

}
