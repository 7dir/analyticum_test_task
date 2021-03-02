        <p>
            <strong>Name:</strong> {{ $comm->name }}<br>
            <strong>Text:</strong> {{ $comm->text }}<br>
            <strong>Parent:</strong> {{ $comm->parent_id }}
        </p>

    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('comms') }}">View All</a></li>
        <li><a href="{{ URL::to('comms/create') }}">Create</a>
    </ul>