@extends('main::layouts.master')

@section('content')
    
        <div class="row">
                
                <div class="col-xs-3 text-left">
                        <h2>Add post</h2>
                        {{-- "title","detail","need_type","field",
                        "date_start","date_finish","application_deadline" --}}
                        <p>
                            <form action="{{route('main.position.create')}}" method="POST">
                                @csrf
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="title">
                                <label>Field</label>
                                <input type="text" name="field" class="form-control" placeholder="field">
                                <label>Detail</label>
                                <textarea class="form-control" name="detail" placeholder="detail"></textarea>
                                <label>Type</label>
                                <select class="form-control" name="need_type">
                                    {{-- <option>Advisorship</option> --}}
                                    <option name="seminar">Seminar</option>
                                    <option name="advisorship">Advisorship</option>
                                </select>
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="date_start" placeholder="date_start">
                                <label>End Date</label>                                
                                <input type="date" class="form-control" name="date_finish" placeholder="date_start">
                                <label>Application deadline</label>
                                <input type="date" class="form-control" name="application_deadline" placeholder="date_start">
                                <button class="form-control btn btn-primary" type="submit">Create</button>
                            </form>
                            {{-- This view is loaded from module: {!! config('main.name') !!} --}}
                        </p>
                </div>
                <div class="col-xs-9 text-left row">
                        <h1>&nbsp;</h1>
                        
                        @foreach ($myposts as $post)    
                        <div class="post col-xs-6" style="background-color: whitesmoke; ">
                                @include('main::include.post')
                            </div>
                        @endforeach
                    </div>
        </div>
        



@stop
