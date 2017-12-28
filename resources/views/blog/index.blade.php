@extends('layouts.app')

@section('content')
    <div class='row'>
        <div class='col-md-8'>
            <div class='row'>
            @foreach($blogs as $blog)
                <div class='col-md-4'>
                <div class='blog-post'>
                    <h4>{{ $blog->TrimTitle }}</h4>
                    <p>{{ $blog->TrimBody }}</p>
                    <a href='/blogs/{{$blog->slug }}' class='btn btn-success readmore-btn'>Read More</a>
                </div>
                </div>        
            @endforeach
            </div>
        </div>
    </div>
@endsection

@section('style')
.blog-post{
    padding: 10px 10px;
    margin: 10px 0px;
    background-color:white;
}
.readmore-btn{
    margin:8px 0;
}
@endsection