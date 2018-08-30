
<div>
     <h2>{{$question->title}}</h2>
    <p> {{$question->text}}</p>
</div>

@if(!$question->answer)
{!! Form::open(array('route' => array('reply.store'),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}

{!! Form::hidden('question_id',$question->id) !!}
    <ul>
        <li>
            <label>
                <span><b>Оставить ответ:</b></span>
                {!! Form::textarea('text') !!}
            </label>
        </li>

        <li>>
            {!! Form::button('Ответить', ['type'=>'submit']) !!}
        </li>
</ul>
{{ Form::close() }}
    @endif