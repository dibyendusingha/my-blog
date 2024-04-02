@extends('user.layout.header')
@section('content')

<div class="container my-5">
      
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h1>Blog</h1> 
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <img  class="rounded  mx-auto d-block img"  src="{{ asset($blog_details->image) }}" alt="Card image cap">
                <div class="mt-4">
                    <h1>{{$blog_details->name}}</h1>
                  <p>{{$blog_details->description}}</p>
                </div><br/>
                <a href="/">Back Page</a>
        </div>
        
      </div>

    </div>


@endsection