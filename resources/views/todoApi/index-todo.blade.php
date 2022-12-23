@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>
            Todo
            <span><a href="/todo/call/api" class="btn btn-primary">Call Api</a></span>
        </h1>
        @include('layouts.partials.messages')

        @if(isset($allData))

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-success" href="{{ route('todo.apiCall.exportPdf') }}" style="float:right">Export
                        to PDF</a>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table id="employee" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>User Name</th>
                            <th>Completed</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                @if(isset($data->user))
                                    <td>{{$data->user->username}}</td>
                                @else
                                    <td>N/A</td>
                                @endif
                                <td>{{ $data->completed == 1 ? 'Completed' : 'Incomplete' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>User</th>
                            <th>Completed</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>


        @endif
    </div>

@endsection
