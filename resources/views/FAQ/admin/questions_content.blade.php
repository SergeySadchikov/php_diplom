{!! Form::open(array('route' => array('filter'),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}

<label for="">
    <span><b>Применить фильтр</b></span>
    {!!Form::select('sortByStatus', array('0' => 'Все', '1' => 'Ожидает ответ', '2' => 'Опубликован', '3' => 'Скрыт'), Request::input('sortByStatus'))!!}
    <span><b>По дате добавления</b></span>
    {!! Form::checkbox('sortByDate', 'sortByDate') !!}
</label>
    {!! Form::button('Применить', ['type'=>'submit']) !!}
    {{ Form::close() }}

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
                <td><a href="{{route('questions.show', ['questions'=>$question->id])}}" title="Просмотреть/Ответить/Редактировать">{{$question->title}}</a></td>
                <td>{{$question->category->title}}</td>
                <td>{{$question->created_at}}</td>
                <td>{{$question->status}}</td>
                {{--<td><a href="{{(route('questions.destroy', ['id' => $question->id]))}}">Удалить</a><a href="">Изменить</a></td>--}}
                <td>
                    {!! Form::open(['url' => route('questions.destroy',['questions'=>$question->id]),'method'=>'POST']) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', ['type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endif
</table>