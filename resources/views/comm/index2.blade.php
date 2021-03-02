@extends('layouts.app')


@section('content')

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Text</td>
                <td>Parent</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($comms as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->text }}</td>
                <td>{{ $value->parent_id }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <a class="btn btn-small btn-success" href="{{ URL::to('comms/' . $value->id) }}">Show</a>

                    <!-- edit this comm (uses the edit method found at GET /comms/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('comms/' . $value->id . '/edit') }}">Edit</a>

                    {{ Form::open(array('url' => 'comms/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger ')) }}
                    {{ Form::close() }}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('comms') }}" class="btn btn-secondary">View All</a></li>
        <li><a href="{{ URL::to('comms/create') }}" class="btn btn-primary">Create</a>
    </ul>


    <div class="container">
            <div class="row">
                <h2>Comments</h2>
            </div>

            <div class="row">
                <div class="col-md-8">
                        <ul>
                            @foreach($comms_root as $key => $comm)

                                @component('comm1', ['comm' => $comm])
                                @endcomponent

                            @endforeach
                        </ul>
                </div>
            </div>
    </div>


<script>

// функция сериализации формы в JSON
$.fn.serializeObject = function()
{
   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};


// как только полностью загрузиться страница
$( document ).ready(function() {
// делать следующее

    $('.repl').click(function(a) {
        $form = $('<form class="f"></form>');
        $form.append('<input type="text" name="name" placeholder="Name">');
        $form.append('<textarea type="text" name="text" placeholder="Text"></textarea>');
        $form.append('<input type="button" value="Send" class="send">');
        $(this).parent().append($form);

        $('.send').click(function(a) {

            var t = $(this)
            var form1 = $(this).parent()
            var this_f = $(this).parent().serializeObject()
            var parent_id = $(this).parent().parent().find('.repl').attr('id')

            this_f['parent_id'] = parent_id
            this_f['_token'] = $('meta[name="csrf-token"]').attr('content')
            this_f['j']=true

            $.ajax({
                url: '/comms',
                type: 'post',
                data: this_f,
                success:function(data){
                    $(form1).hide()

                    var li = `<li class="border" style="margin-bottom: 2em;">
                    <p>
                        Name: ${data.name}
                        <br>
                        Text: ${data.text}
                        <br>
                        <a class="float-right repl" id="${data.id}">Reply</a>
                        <br>
                    </p>
                    <ul></ul>
                    </li>
                    `
                    var li_html = $(li)
                    $(t).parent().parent().next().prepend(li_html)
                }
            });


        })

    });




});
</script>

@stop
