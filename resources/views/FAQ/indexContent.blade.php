@if($categories)
    <div class="cd-faq-items">
    @foreach($categories as $category)
            @if(!$category->getPublishedQuestions()->isEmpty())
                <ul id="{{$category->title}}" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>{{$category->title}}</h2></li>
                    @foreach($category->questions as $question)
                        @if($question->status === 'Опубликован')
                            <li>
                                <a class="cd-faq-trigger" href="#0">{{$question->title}}</a>
                                <div class="cd-faq-content">
                                    <p>{{$question->text}}</p>
                                    <p class=''>
                                        <a class="btn bg-success text-light" href="{{route('question.show', ['id' => $question->id])}}">Узнать больше</a>
                                    </p>
                                </div> <!-- cd-faq-content -->
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
    @endforeach

@endif

    <div id="add" class="container bg-dark fixed">
        {!! Form::open(array('route' => array('add.store'),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
        <div class="form-group">
            <label for="exampleFormControlInput1"><span class="badge badge-dark">Как вас зовут?</span></label>
            {!! Form::text('name','',['placeholder' => 'имя', 'class' => "form-control"]) !!}
            <label for="exampleFormControlInput1"><span class="badge badge-dark">Ваш email</span></label>
            {!! Form::text('email','',['class' => "form-control", 'id '=> "exampleFormControlInput1", 'placeholder' => "name@example.com"]) !!}
            <lablel><span class="badge badge-dark">Выбирите тему</span></lablel>
            {!! Form::select('category_id', $categorySelect, '0', ['class' => "form-control"])!!}
            <label for="exampleFormControlInput1"><span class="badge badge-dark">Краткое описание</span></label>
            {!! Form::text('title','',['placeholder' => 'Заголовок', 'class' => "form-control"]) !!}
            <label for="exampleFormControlTextarea1"><span class="badge badge-dark">Содержание</span></label>
            {!! Form::textarea('text','',['placeholder' => 'Описание', 'class' => "form-control", 'rows' => "3"]) !!}
            {!! Form::button('Отправить', ['type'=>'submit', 'class' => "btn btn-primary"]) !!}
        </div>
        {{ Form::close() }}
    </div>
</div>