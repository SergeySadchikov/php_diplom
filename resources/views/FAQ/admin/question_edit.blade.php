{!! Form::open(array('route' => array('questions.update', $question->id),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
@method('PUT')
<ul>
    <li>
        <label>
            <span><b>Заголовок</b></span>
            {!! Form::text('question_title', $question->title) !!}
        </label>
    </li>
        <label>
            <span><b>Вопрос</b></span>
            {!! Form::textarea('question_text', $question->text) !!}
        </label>
    @if($question->answer)
    <li>
        <label>
            <span><b>Ответ</b></span>
            {!! Form::hidden('answer_id',$question->answer->id) !!}
            {!! Form::textarea('answer_text', $question->answer->text) !!}
        </label>
    </li>
    @endif
    <label>
        <span><b>Автор</b></span>
        {!! Form::hidden('author_id',$question->author->id) !!}
        {!! Form::text('author_name', $question->author->name) !!}
        {!! Form::text('author_email', $question->author->email) !!}
    </label>
    <li>

    </li>
    <label>
        <span><b>Статус</b></span>
        {!! Form::select('status', $statuses, $question->status)!!}
    </label>
    <li>
        <lablel>
            <span>Сменить тему</span>
            {!! Form::select('category_id', $categories, $question->category_id)!!}
        </lablel>
    </li>
    <li>>
        {!! Form::button('Сохранить', ['type'=>'submit']) !!}
    </li>


</ul>

{{ Form::close() }}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif