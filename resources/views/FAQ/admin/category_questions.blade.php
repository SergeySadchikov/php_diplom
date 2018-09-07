@if($category)
    <h1 class="card-title font-weight-bold">В категории {{$category->title}}</h1>
@endif

@if($questions)
    @foreach($questions as $question)
        <div class="row">
            <ul class="list-group col-md-2">
                <li class="list-group-item"><a href="{{route('questions.show',['id' => $question->id])}}" ><h3 class="card-title font-weight-bold text-muted">{{$question->title}}</h3></a></li>
            </ul>
        </div>
    @endforeach
@endif
