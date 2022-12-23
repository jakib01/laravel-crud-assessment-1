<?php

namespace App\Http\Controllers;

use App\Models\TodoApi;
use App\Services\TodoApi\TodoApiService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoApiController extends Controller
{
    public function index(TodoApiService $data){

        $allData = $data->getAllData();


        return view('todoApi.index-todo',compact('allData'));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apiCall(){

        $data = json_decode(Http::get('https://jsonplaceholder.typicode.com/todos')->body(), true);

        $inserted = TodoApi::insert($data);

        if($inserted){
            return redirect(route('employee.index-todo'))->with('success', "Successfully Deleted.");
        }
    }

    public function exportPdf(){

        $allData = TodoApi::with(['user'])->get()->toArray();

        view()->share('allData',$allData);
        $pdf = PDF::loadView('todoApi.pdf-view' ,$allData);
        return $pdf->download('pdf_file.pdf');

    }

}
