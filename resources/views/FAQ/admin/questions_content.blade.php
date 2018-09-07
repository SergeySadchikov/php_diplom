<div class="bg-secondary text-dark">
    {!! Form::open(array('route' => array('filter'),'method'=> 'POST','enctype'=>'multipart/form-data'), ['class' => "form-inline"]) !!}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-1 col-form-label">Сортировать</label>
        <div class="col-sm-2">
            {!!Form::select('sortByStatus', array('0' => 'Все', '1' => 'Ожидает ответ', '2' => 'Опубликован', '3' => 'Скрыт'), Request::input('sortByStatus'), ['class' => "form-control"])!!}
        </div>
        <label for="" class="col-form-label"><span><b>По дате добавления</b></span>
            {!! Form::checkbox('sortByDate', 'sortByDate') !!}
        </label>
        {!! Form::button('Применить', ['type'=>'submit', 'class' => "btn btn-info ml-3"]) !!}
    </div>
    {{ Form::close() }}
</div>


<table class="table">
    <tr>
        <th>Вопрос</th>
        <th>Тема</th>
        <th>Дата создания</th>
        <th>Статус</th>
        <th>Действие</th>
    </tr>
    @if($questions)
        @foreach($questions as $question)
            <tr>
                <td><a href="{{route('questions.show', ['questions'=>$question->id])}}" title="Просмотреть/Ответить/Редактировать" class="text-info">{{$question->title}}</a></td>
                <td>{{$question->category->title}}</td>
                <td>{{$question->created_at}}</td>
                <td>{{$question->status}}</td>
                {{--<td><a href="{{(route('questions.destroy', ['id' => $question->id]))}}">Удалить</a><a href="">Изменить</a></td>--}}
                <td>
                    {!! Form::open(['url' => route('questions.destroy',['questions'=>$question->id]),'method'=>'POST']) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', ['type'=>'submit','class' => "btn btn-danger"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endif
</table>