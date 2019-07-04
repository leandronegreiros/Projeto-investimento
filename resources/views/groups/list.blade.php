<table class="default-table">
        <thead>
            <tr>
                <td>#</td>
                <td>Nome do Grupo</td>
                <td>Instituição</td>
                <td>Nome do Resposnsável</td>
                <td>Opções </td>
            </tr>
        </thead>

        <tbody>
            @foreach($group_list as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->instituition->name }}</td>
                    <td>{{ $group->owner ? $group->owner->name : "não existe"}}</td>
                    <td>
                        {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Remover') !!}
                        {!! Form::close() !!}
                        <a href="{{ route('group.show', $group->id) }}">Detalhes</a>
                        <a href="{{ route('group.edit', $group->id) }}">Editar</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
