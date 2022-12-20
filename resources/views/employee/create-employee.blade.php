@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>
            Employee Add
            <span><a href="/employee/index" class="btn btn-primary">Back</a></span>
        </h1>
        @include('layouts.partials.messages')

        <div class="container">
                <div class="row ">
                    <div class="col-lg-7 mx-auto">
                        <div class="card mt-2 mx-auto p-4 bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <form id="contact-form" role="form" method="post" action="{{ route('employee.store') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                        <div class="controls">


                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name">Name</label>
                                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name">Position</label>
                                                        <input id="form_name" type="text" name="position" class="form-control" placeholder="Position">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="office">office</label>
                                                        <input id="office" type="text" name="office" class="form-control" placeholder="Office">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input id="age" type="text" name="age" class="form-control" placeholder="Age">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="joining_date">Join Date</label>
                                                        <input id="joining_date" type="date" name="joining_date" class="form-control" placeholder="Join Date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="salary">Salary</label>
                                                        <input id="salary" type="number" name="salary" class="form-control" placeholder="Salary">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Save">
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


