@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Thread List</div>

                <div class="panel-body">
                            
                 <a href="{{ route('thread.create') }}" class="btn btn-info btn-xs pull-right">New Thread</a>  
                <table  id="example" class="table table-striped table-bordered" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Body</th>
                            <th>Contributer Name</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($threads as $key => $thread)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $thread->title or '' }}</td>
                            <td>{{ $thread->topic or '' }}</td>
                            <td>{{ $thread->body or '' }}</td>
                            <td>{{ $thread->contributor_name or '' }}</td>
                            <td>{{ $thread->created_at or '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    });
</script>
@endsection
