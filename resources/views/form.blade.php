<div class="form-group">
{{ Form::label('Title', 'Title', ['class'=> 'control-label'])}}
{{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title']) }}
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Topics</label>
    <select name="topic_id" id="">
        <option value="1">Thread 1</option>
        <option value="2">Thread 2</option>
        <option value="3">Thread 3</option>
    </select>
</div>
<div class="form-group">
{{ Form::label('Description', 'Description', ['class'=> 'control-label'])}}
{{ Form::text('body', old('body'), ['class' => 'form-control', 'placeholder' => 'Description']) }}
</div>
<div class="form-group">
{{ Form::label('contributor_name', 'contributor_name', ['class'=> 'control-label'])}}
{{ Form::text('contributor_name', old('contributor_name'), ['class' => 'form-control', 'placeholder' => 'contributor_name']) }}
</div> 
<button class="btn btn-xs btn-primary" style="margin:4px 0px;">Submit</button> 
