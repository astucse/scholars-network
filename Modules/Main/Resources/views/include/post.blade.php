<div class="user-block">
    <img class="img-circle img-bordered-sm" src="{{$post->university->logo}}" alt="user image">
    <span class="username">
        <a >{{$post->title}}</a> |  {{$post->university->name}}
    </span>
    <span class="description"> {{$post->created_at->diffForHumans()}} | {{$post->created_at->isoFormat('dddd, D MMMM, Y')}}</span>
</div>
<p>
    Field: {{$post->field}}<br>
    Type: {{$post->need_type}}<br>
    Application deadline: {{$post->application_deadline->isoFormat('dddd, D MMMM, Y')}} | {{ $post->application_deadline->diffInDays(now(), false) }} days remain<br>
    Duration: For {{ $post->date_finish->diffInDays($post->date_start, false) }} days
</p>
<p>
    {{$post->detail}}
</p>
@guest
    <a href="{{route('main.apply',['id'=>encrypt($post->id)])}}" class="btn btn-success">Click to Apply</a>
@elseif(Auth::user()->university)



@elseif(Auth::user()->scholar)

    @if ($post->applications->pluck('scholar_id')->contains(Auth::user()->id))
    <a href="{{route('main.apply_not',['id'=>encrypt($post->id)])}}" class="btn btn-sm btn-danger">Cancel Application</a>
    @else
    <a href="{{route('main.apply',['id'=>encrypt($post->id)])}}" class="btn btn-success">Click to Apply</a>
    @endif

@endguest

<ul class="list-inline">
    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
    <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>
        {{$post->applications->count()}} people applied

        @if (Auth::user() && Auth::user()->university && $post->university == Auth::user()->university->university)
            | <a href="{{route('page.mysinglepost',['id'=>encrypt($post->id)])}}"> Detail </a>
        @endif
    </a></li>
</ul>