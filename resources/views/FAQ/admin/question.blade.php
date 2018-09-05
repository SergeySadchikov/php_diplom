<div>
    <h2>{{$question->title}}</h2>
    <div><p>{{$question->text}}</p></div>
    @if($question->answer)
        <div><p>{{$question->answer->text}}</p></div>
    @endif
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

        <li>
            {!! Form::button('Ответить', ['type'=>'submit']) !!}
        </li>
</ul>
{{ Form::close() }}
@endif

{!! Form::open(['url' => route('questions.edit',['questions'=>$question->id]),'method'=>'POST']) !!}
{{ method_field('GET') }}
{!! Form::button('Редактировать', ['type'=>'submit']) !!}
{!! Form::close() !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
