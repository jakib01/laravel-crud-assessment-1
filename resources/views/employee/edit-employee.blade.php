@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>
            Employee Edit
            <span><a href="/employee/index" class="btn btn-primary">Back</a></span>
        </h1>
        @include('layouts.partials.messages')

        <div class="container">
            <div class="row ">
                <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                                <form id="contact-form" role="form" method="post" action="{{ route('employee.update',$employee['id']) }}">
                                    @csrf
                                    @method('put')
                                    <div class="controls">

                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_name">Name</label>
                                                    <input id="form_name" type="text" name="name" class="form-control" value="{{isset($employee['name'])?$employee['name']:""}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="position">Position</label>
                                                    <input id="position" type="text" name="position" class="form-control" value="{{isset($employee['position'])?$employee['position']:""}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="office">office</label>
                                                    <input id="office" type="text" name="office" class="form-control" value="{{isset($employee['office'])?$employee['office']:""}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <input id="age" type="text" name="age" class="form-control" value="{{isset($employee['age'])?$employee['age']:""}}">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="joining_date">Join Date</label>
                                                    <input id="joining_date" type="date" name="joining_date"
                                                           class="form-control" value="{{isset($employee['joining_date'])?$employee['joining_date']:""}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="salary">Salary</label>
                                                    <input id="salary" type="number" name="salary" class="form-control" value="{{isset($employee['salary'])?$employee['salary']:""}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"
                                                       value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


