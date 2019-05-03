@extends('main::layouts.master')

@section('content')
    
        <div class="row">
                
                <div class="col-xs-3 text-left">
                        <h2></h2>
                        {{-- "title","detail","need_type","field",
                        "date_start","date_finish","application_deadline" --}}
                        <p>
                            <form action="{{route('main.position.create')}}" method="POST">
                                @csrf   
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <label>Title</label>
                                <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="title">
                                <label>Field</label>
                                <input type="text"  value="{{$post->field}}" name="field" class="form-control" placeholder="field">
                                <label>Detail</label>
                                <textarea class="form-control" name="detail" placeholder="detail">{{$post->detail}}</textarea>
                                <label>Type</label>
                                <select class="form-control" name="need_type">
                                    <option name="seminar">Seminar</option>
                                    <option name="advisorship">Advisorship</option>
                                </select>
                                <label>Start Date</label>
                                <input type="date" class="form-control"  value="{{$post->date_start}}" name="date_start" placeholder="date_start">
                                <label>End Date</label>                                
                                <input type="date" class="form-control"  value="{{$post->date_finishs}}" name="date_finish" placeholder="date_start">
                                <label>Application deadline</label>
                                <input type="date" class="form-control" name="application_deadline" placeholder="Application deadline"  value="{{$post->application_deadline}}">
                                <button class="form-control btn btn-primary" type="submit">Update</button>
                            </form>
                            {{-- This view is loaded from module: {!! config('main.name') !!} --}}
                        </p>
                </div>
                <div class="col-xs-9 text-left row">
                        <h4>&nbsp;</h4>

                        <div class="box box-solid">
                            <div class="box-header with-border">
                              {{-- <i class="fa fa-text-width"></i> --}}
                              <h3 class="box-title">Scholars who applied</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                    @foreach ($post->applications->pluck('scholar') as $scholar)
                                <li><a href="{{route('page.scholar_page',['id'=>encrypt($scholar->id)])}}">{{$scholar->user->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                    </div>
        </div>
        



@stop
