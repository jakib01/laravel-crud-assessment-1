@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>
            Employee List
            <span><a href="/employee/create" class="btn btn-primary">Add</a></span>
        </h1>
        @include('layouts.partials.messages')

        @if(isset($employeeData))
            <table id="employee" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Action</th>
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
                        <td>
                            <a href="/employee/edit/{{$data->id}}" class="btn btn-warning sm-btn">Edit</a>
                            <a href="/employee/delete/{{$data->id}}" class="btn btn-danger sm-btn">Delete</a>
                        </td>
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
        @endif
    </div>

@endsection

