@extends('admin.layout.header')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">User Blog Post </h3>

        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-article') }}" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                                    <!-- <input type="text" class="form-control" id="user_id" name="userid"  > -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Iamge Upload</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Mobile number" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label" >Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="description" rows="4" ></textarea>
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