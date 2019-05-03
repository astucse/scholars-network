@extends('main::layouts.master')

@section('title')
Home Page
@endsection

@section('content')
        

<div class="col-xs-12 text-left row">
    <div class="col-md-12">
        <div class="box box-solid">
            {{-- <div class="col-md-4">Field
                <select class="form-control">
                    <option>Social Science</option>
                    <option>Engineering</option>
                    <option>Medical</option>
                </select>
            </div>
            <div class="col-md-4">University
                <select class="form-control">
                    @foreach ($universities as $univ)
                        <option>{{$univ->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">Type
                <select class="form-control">
                    <option>Advisorship</option>
                </select>
            </div> --}}
        </div>
    </div>
    
    @foreach ($posts as $post)    
    <div class="post col-xs-6" style="background-color: whitesmoke; ">
        @include('main::include.post')
        {{-- <input class="form-control input-sm" type="text" placeholder="Type a comment"> --}}
        </div>
    @endforeach
</div>



@stop
