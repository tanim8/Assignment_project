@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Edit thread</div>
        <div class="panel-body">
        {!! Form::model($thread ,['route' => ['thread.update', $thread->id], 'method' => 'PUT']) !!}
            @include('form')
        {!! Form::close() !!}
        {{ Form::open(['method' => 'DELETE', 'route' => ['thread.destroy', $thread->id]]) }}
    	{{ Form::submit('Delete', ['class' => 'btn  btn-xs btn-danger pull-right']) }}
		{{ Form::close() }}
        </div>
</div>
    </div>
</div>
@endsection
@section('script')
    

@endsection
