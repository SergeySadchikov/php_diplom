@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
                <td><a class="text-info" href="{{route('categories.show',['id' => $category->id])}}">{{$category->title}}</a></td>
                <td><a class="text-warning" href="{{route('categories.show',['id' => $category->id])}}">{{$category->questions()->count()}}</a></td>
                <td><a class="text-success" href="{{route('categories.show',['id' => $category->id,'show' => 'published'])}}">{{$category->getPublishedQuestions()->count()}}</a></td>
                <td><a class="text-danger" href="{{route('categories.show',['id' => $category->id,'show' => 'waiting'])}}">{{$category->getWaitingQuestions()->count()}}</a></td>
                <td>{!! Form::open(array('route' => array('categories.destroy','id' => $category->id),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', ['type'=>'submit', 'class' => "btn btn-danger"]) !!}
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach
    @endif
</table>

{!! Form::open(array('route' => array('categories.store'),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
<div class="form-group">
    <label>Добавить категорию</label>
    <div class="form-row">
            <div class="col-md-2">
            {!! Form::text('title','', ['placeholder' => "Название" ,'class' => "form-control"]) !!}
            {!! Form::button('Добавить', ['type'=>'submit', 'class' => "btn btn-success"]) !!}
            </div>
    </div>
</div>
{!! Form::close() !!}


