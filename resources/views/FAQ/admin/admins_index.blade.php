@if($admins)
    <table class="table">
        <th>Login/Name</th>
        <th>Email</th>
        <th>Дата добавления</th>
        <th>Действие</th>
        @foreach($admins as $admin)
            <tr>
                <td><a class="text-info" href="{{route('admins.edit',['id' => $admin->id])}}">{{$admin->name}}</a></td>
                <td><a href="#">{{$admin->email}}</a></td>
                <td>{{$admin->created_at}}</td>
                <td>{!! Form::open(array('route' => array('admins.destroy','id' => $admin->id),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', ['type'=>'submit', 'class' => "btn btn-danger"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! Html::link(route('admins.create'),'Создать  администратора',['class' => "badge badge-success p-3"]) !!}
@endif