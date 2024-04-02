@extends('user.layout.header')
@section('content')


<div class="container my-5">
    <?php if ($blog_count  == 0) { ?>
        <h1>No Blog Found !</h1>

    <?php } else if ($blog_count > 0) { ?>
        <h1>Blog, world!</h1><br><br>
        <div class="col-lg-12 px-0">
            <div class="row">
                @foreach($blog as $key=> $b)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                       <a href="/blog/{{$b->id}}"> <img class="card-img-top" src="{{ asset($b->image) }}" alt="Card image cap"></a>
                        <div class="card-body">
                            <h2 class="card-title">Article : {{$b->name}}</h2>
                            <p class="card-text"> Post By : {{$b->user->name}}</p>
                           
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    <?php } ?>
</div>


@endsection