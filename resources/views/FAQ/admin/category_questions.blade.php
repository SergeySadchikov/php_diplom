
@if($category)
<h1>{{$category->title}}</h1>
@endif

@if($questions)
@foreach($questions as $question)
    <ol>
        <li><a href="{{route('questions.show',['id' => $question->id])}}" >{{$question->title}}</a></li>
    </ol>
@endforeach
@endif
