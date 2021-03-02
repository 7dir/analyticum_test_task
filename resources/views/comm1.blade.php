<li class="border" style="margin-bottom: 2em;">

    <p>
        Name: {{ $comm->name }}
        <br>
        Text: {{ $comm->text }}
        <br>
        <a class="float-right repl" id="{{ $comm->id }}">Reply</a>
        <br>
        <!-- здесь создается форма динамически -->
    </p>

    <ul>
        @foreach(App\Comm::all()->where('parent_id', $comm->id) as $key => $comm2)

            @component('comm1', ['comm' => $comm2])
            @endcomponent

        @endforeach
    </ul>

</li>
