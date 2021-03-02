<li class="border" style="margin-bottom: 2em;">

    <p>
        Name: {{ $comm->name }}
        <br>
        Text: {{ $comm->text }}
        <br>
        <a class="float-right repl" id="re{{ $comm->id }}">Reply</a>
        <br>
    </p>

        <form style="display: none;" class="f" id="{{ $comm->id }}">
            <input type="text" name="name" placeholder="Name">
            <textarea type="text" name="text" placeholder="Text"></textarea>
            <input type="button" value="Send" class="send">
        </form>

    <ul>
        @foreach(App\Comm::all()->where('parent_id', $comm->id) as $key => $comm2)

            @component('comm1', ['comm' => $comm2])
            @endcomponent

        @endforeach
    </ul>

</li>
