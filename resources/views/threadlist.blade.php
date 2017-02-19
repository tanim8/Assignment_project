@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Thread List</div>
                    @if(Session::has('message'))
                    <div class="alert alert-danger">
                    <ul>
                    <li>{{ Session::get('message') }}</li>
                    </ul>
                    </div>
                    @endif
                <div class="panel-body">   
                  <a href="{{ route('thread.create') }}" class="btn btn-info btn-xs pull-right">New Thread</a> 
                <table id="data-table" class="table table-bordered table-striped" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Body</th>
                            <th>Contributer Name</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($threads as $key => $thread)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td href="{{ url('thread/'.$thread->id) }}">
                            {{ $thread->title or '' }}</td>
                            <td>{{ $thread->topic_id or '' }}</td>
                            <td>{{ $thread->body or '' }}</td>
                            <td>{{ $thread->contributor_name or '' }}</td>
                            <td>{{ $thread->created_at or '' }}</td>
                            <td> @if( isset(Auth::user()->id) && $thread->user->id == Auth::user()->id )
                            <a href="{{ url('thread/'.$thread->id.'/edit') }}" class="btn btn-xs btn-primary">Edit</a> | 
                            @endif
                            <a href="{{ url('thread/'.$thread->id) }}" class="btn btn-xs btn-primary">Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
