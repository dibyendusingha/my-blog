@extends('admin.layout.header')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">User Form </h3>

        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-user') }}" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile number" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9 d-flex ">
                                    <div class="form-check pe-2">
                                        <label class="form-check-label"><input type="radio" name="gender" value="male" class="form-check-input"> Male </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label"><input type="radio" name="gender" value="female" class="form-check-input"> Female </label>
                                    </div>
                                    <div class="form-check pe-2">
                                        <label class="form-check-label"><input type="radio" name="gender" value="other" class="form-check-input"> other </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Iamge Upload</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Mobile number" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label" >Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" id="address" rows="4" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Qualification</label>
                                <div class="col-sm-9">
                                    <select  style="width:100%;height: 40px;" id="qualification" name="qualification" >
                                        <option value="" selected>Select an option</option>
                                        <option value="M.A.">M.A.</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="B.tech">B.tech</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Hobbies</label>
                                <div class="col-sm-9 d-flex ">
                                    <div class="form-check pe-2">
                                        <label class="form-check-label"><input type="checkbox" name="hobbies[]" value="Playing" class="form-check-input"> Playing </label>
                                    </div>
                                    <div class="form-check pe-2">
                                        <label class="form-check-label"><input type="checkbox" name="hobbies[]" value="Singing" class="form-check-input"> Singing </label>
                                    </div>
                                    <div class="form-check pe-2">
                                        <label class="form-check-label"><input type="checkbox" name="hobbies[]" value="Cooking" class="form-check-input"> Cooking </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label" >Status</label>
                                <div class="col-sm-9">
                                    <select class="" style="width:100%;height: 40px;" name="status" id="status" >
                                        <option value="" selected>select status </option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    @endsection