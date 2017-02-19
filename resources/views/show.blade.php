@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">{{ $thread->title or '' }}</div>
        <div class="panel-body">
			<p>{!! $thread->body or '' !!}</p>
			<p style="font-size:10px;" > <span class="pull-right">{{ $thread->contributor_name or ''}}</span>
			<span class="pull-left"> {{	 $thread->created_at or '' }} </span>
			 </p>
        </div>
</div>

	@if(Session::has('message'))
	<div class="alert alert-danger">
	<ul>
	<li>{{ Session::get('message') }}</li>
	</ul>
	</div>
	@endif	
	{!! Form::open(['route' => 'comment.store', 'method' => 'post']) !!}
		<div class="form-group">
			<label for="Comment">Comment</label>
			{{ Form::text('title', old('title'),['class' => 'form-control']) }}
			<!-- {{ Form::hidden('thread_id', 'secret') }} -->
			<input type="hidden" name="thread_id" value="{{ $thread->id }}">
		</div>
		<button class="btn btn-xs btn-primary">Submit</button>
	{!! Form::close() !!}

	@foreach($thread->comments as $comment)
	<p >{{ $comment->title or '' }}</p>
	<p class="pull-right"> {{ $comment->user->name or '' }} </p>
	@endforeach
    </div>
	
</div>
@endsection
@section('script')
    

@endsection