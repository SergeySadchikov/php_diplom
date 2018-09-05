@if($admins)
    <table class="table">
        <th>Login/Name</th>
        <th>Email</th>
        <th>Дата добавления</th>
        <th>Действие</th>
        @foreach($admins as $admin)
            <tr>
                <td><a href="{{route('admins.edit',['id' => $admin->id])}}">{{$admin->name}}</a></td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->created_at}}</td>
                <td>{!! Form::open(array('route' => array('admins.destroy','id' => $admin->id),'method'=> 'POST','enctype'=>'multipart/form-data')) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', ['type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! Html::link(route('admins.create'),'Создать  администратора') !!}
@endif