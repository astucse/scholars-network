@extends('main::layouts.master')

@section('title')
Home Page
@endsection

@section('content')
        

<div class="col-xs-12 text-left row">
    <div class="col-md-12">
    </div>
    
    @foreach ($posts as $post)    
    <div class="post col-xs-6" style="background-color: whitesmoke; ">
        @include('main::include.post')
        {{-- <input class="form-control input-sm" type="text" placeholder="Type a comment"> --}}
        </div>
    @endforeach
</div>



@stop
