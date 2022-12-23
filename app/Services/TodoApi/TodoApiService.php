<?php

namespace App\Services\TodoApi;

use App\Models\TodoApi;

class TodoApiService
{
    public function getAllData(){

        $allData = TodoApi::with(['user'])->get();
        return $allData;

    }

}
