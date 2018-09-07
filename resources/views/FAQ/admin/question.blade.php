<div class="card">
    <h5 class="card-header font-weight-bold">Вопрос:</h5>
    <div class="card-body">
        <h5 class="card-title font-weight-bold"><b>{{$question->title}}</b></h5>
        <p class="card-text">{{$question->text}}</p>
    </div>
</div>

@if($question->answer)
<div class="card">
    <div class="card-header">
        <h5 class="card-title font-weight-bold"><b>Ответ:</b></h5>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{$question->answer->text}}</p>
        </blockquote>
    </div>
</div>
@endif

@if(!$question->answer)
<div class="my-2">
    {!! Form::open(array('route' => array('reply.store'),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
    {!! Form::hidden('question_id',$question->id) !!}
        <label class="font-weight-bold my-3">Оставить ответ:</label>
        {!! Form::textarea('text', '', ['class' => "form-control", 'placeholder' => "Напишите свой ответ"]) !!}
        {!! Form::button('Ответить', ['type'=>'submit', 'class' => "btn btn-success"]) !!}
    {{ Form::close() }}
</div>
@endif

<div class="my-2">
    {!! Form::open(['url' => route('questions.edit',['questions'=>$question->id]),'method'=>'POST']) !!}
    {{ method_field('GET') }}
    {!! Form::button('Редактировать', ['type'=>'submit', 'class' => "btn btn-warning"]) !!}
    {!! Form::close() !!}
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
