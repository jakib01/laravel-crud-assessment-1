@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>
            Employee List
            <span><a href="/employee/create" class="btn btn-primary">Add</a></span>
        </h1>
        @include('layouts.partials.messages')
        <table id="employee" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tbody>
                @foreach($employeeData as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->position}}</td>
                        <td>{{$data->office}}</td>
                        <td>{{$data->age}}</td>
                        <td>{{$data->joining_date}}</td>
                        <td>{{$data->salary}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

