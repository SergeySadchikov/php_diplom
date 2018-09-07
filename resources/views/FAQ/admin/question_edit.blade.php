@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
{!! Form::open(array('route' => array('questions.update', $question->id),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
@method('PUT')
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for=""><h5 class="card-title font-weight-bold">Вопрос</h5></label>
            {!! Form::text('question_title', $question->title, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <label for=""><h5 class="card-title font-weight-bold">Тема</h5></label>
            {!! Form::select('category_id', $categories, $question->category_id, ['class' => 'form-control'])!!}
        </div>

        <div class="form-group col-md-2">
            <label for=""><h5 class="card-title font-weight-bold">Статус</h5></label>
            {!! Form::select('status', $statuses, $question->status, ['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group">
        <label for=""><h5 class="card-title font-weight-bold">Текст вопроса</h5></label>
        {!! Form::textarea('question_text', $question->text, ['class' => "form-control"]) !!}
    </div>
    @if($question->answer)
        <div class="form-group">
            <label for=""><h5 class="card-title font-weight-bold">Текст Ответа</h5></label>
            {!! Form::hidden('answer_id',$question->answer->id) !!}
            {!! Form::textarea('answer_text', $question->answer->text, ['class' => "form-control"]) !!}
        </div>
    @endif

    <div class="form-row">
        <div class="form-group col-md-2">
            <label for=""><h5 class="card-title font-weight-bold">Автор</h5></label>
            {!! Form::hidden('author_id',$question->author->id) !!}
            {!! Form::text('author_name', $question->author->name, ['class' => "form-control"]) !!}
        </div>

        <div class="form-group col-md-2">
            <label for=""><h5 class="card-title font-weight-bold">Email</h5></label>
            {!! Form::text('author_email', $question->author->email, ['class' => "form-control"]) !!}
        </div>
    </div>
    {!! Form::button('Сохранить', ['type'=>'submit', 'class' => "btn btn-primary"]) !!}
{{ Form::close() }}
</div>

