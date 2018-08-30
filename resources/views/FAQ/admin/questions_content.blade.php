
<table class="table">
    <tr>
        <th>Вопрос</th>
        <th>Тема</th>
        <th>Дата создания</th>
        <th>Статус</th>
        <th>Действие</th>
    </tr>

    @foreach($questions as $question)
        <tr>
            <td>{{$question->title}}</td>
            <td>{{$question->category->title}}</td>
            <td>{{$question->created_at}}</td>
            <td><td>{{$question->status}}</td></td>
            <td><a href="">Удалить</a><a href="">Изменить</a></td>

        </tr>
    @endforeach
</table>