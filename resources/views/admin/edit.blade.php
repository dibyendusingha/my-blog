@extends('admin.layout.header')
@section('content')

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
<?php 

//echo $edit_user;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit Blog Post Form </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('update-article',$edit_article->id) }}" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$edit_article->name}}" placeholder="Name" >
                                </div>
                            </div>
                           
                            
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label" >Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="description" rows="4" >{{$edit_article->description}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label" >Status</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single" style="width:100%" name="status" id="status" >
                                        <option value="" >select status </option>
                                        <option value="1" {{($edit_article->status == '1') ? 'selected="selected"' : ""}}>Active</option>
                                        <option value="2" {{($edit_article->status == '2') ? 'selected="selected"' : ""}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Iamge Upload</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image" name="edit_image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Iamge Upload</label>
                                <div class="col-sm-9" id="previewContainer" >
                                    <img id="previewImage" src="{{asset($edit_article->image)}}" alt="" style="width: 140px; height: 130px; border-radius: 15px; border:3px solid black">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    @endsection