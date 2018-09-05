
<table class="table">
    <tr>
        <th>Тема</th>
        <th>Всего вопросов</th>
        <th>Опубликованные</th>
        <th>Ждут ответ</th>
        <th>Действие</th>
    </tr>
    @if($categories)
        @foreach($categories as $category)
            <tr>
                <td><a href="{{route('categories.show',['id' => $category->id])}}">{{$category->title}}</a></td>
                <td><a href="{{route('categories.show',['id' => $category->id])}}">{{$category->questions()->count()}}</a></td>
                <td><a href="{{route('categories.show',['id' => $category->id,'show' => 'published'])}}">{{$category->getPublishedQuestions()->count()}}</a></td>
                <td><a href="{{route('categories.show',['id' => $category->id,'show' => 'waiting'])}}">{{$category->getWaitingQuestions()->count()}}</a></td>
                <td>{!! Form::open(array('route' => array('categories.destroy','id' => $category->id),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', ['type'=>'submit']) !!}
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach
    @endif
</table>

{!! Form::open(array('route' => array('categories.store'),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
<ul>
    <li>
        <label><span><b>Добавить категорию</b></span></label>
    </li>
    <li>
        <label><span><b>Название</b></span></label>
        {!! Form::text('title') !!}
    </li>
    <li>
        {!! Form::button('Добавить', ['type'=>'submit']) !!}
    </li>
</ul>
{!! Form::close() !!}


