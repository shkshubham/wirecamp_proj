@extends('layouts.app')

@section('content')
    <div class='row'>
        <div class='col-md-8 blog-show'>
            <h4>{{ $blog->title }}</h4>
            <p>{{ $blog->body }}</p>
            @if($blog->user_id == Auth::user()->id)
                <div class='blog-user'>
                <hr>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal">Edit</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                <hr>
                </div>
                      <!-- Modal -->
                        <div class="modal fade" id="deleteModal" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Blog Post</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure want to delete this blog ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/blogs/{{$blog->slug }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {!! csrf_field() !!}
                                            <input type="submit" value="Yes"  class='btn btn-danger delete-btn'>                
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                        </form>
                                   </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal -->                                              
                      <div class="modal fade" id="editModal" role="dialog">
                        <div class="modal-dialog modal-lg">
    
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Blog Post - {{ $blog->title }}</h4>
                                </div>
                            <div class="modal-body">
                                @include('blog.modals.edit')
                            </div>
                        </div>

                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection

@section('style')
.blog-show{
    min-height: 250px;
    background-color:white;
}
.blog-user{
    text-align:right;
    padding: 20px 0;
}
@endsection