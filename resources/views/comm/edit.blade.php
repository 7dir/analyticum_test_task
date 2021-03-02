

{{ Form::model($comm, array('url' => array('comms', $comm->id), 'method' => 'PUT')) }}


    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}
    </div>

    <div class="form-group">
        {{ Form::label('text', 'Text') }}
        {{ Form::textarea('text') }}
    </div>

    <div class="form-group">
        {{ Form::label('parent_id', 'Parent') }}
        {{ Form::text('parent_id') }}
    </div>

    {{ Form::submit('Edit the comm!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('comms') }}">View All</a></li>
        <li><a href="{{ URL::to('comms/create') }}">Create</a>
        
    </ul>    