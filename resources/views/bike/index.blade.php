    @extends('layouts.app')

    @section('content')
        <h2>bike</h2>
        <hr>
        <table border="1" align="center">
            <tr>
                <th>uid</th>
                <th>raberu_id</th>
                <th>year</th>
                <th>model</th>
                <th>HP</th>
                <th>cc_id</th>
                <th>updated_at</th>
                <th>created_at</th>
                <th>詳細</th>
                <th>修改</th>
                <th>刪除</th>
            </tr>
            @foreach($Main as $ts)
            <tr>
                <td>{{ $ts->uid }}</td>
                <td>{{ $ts->raberu_id }}</td>
                <td>{{ $ts->year }}</td>
                <td>{{ $ts->model }}</td>
                <td>{{ $ts->HP }}</td>
                <td>{{ $ts->cc_id }}</td>
                <td>{{ $ts->created_at }}</td>
                <td>{{ $ts->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['bike.show', $ts->uid], 'method' => 'get']) !!}
                    {!! Form::submit('詳細') !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['bike.edit', $ts->uid], 'method' => 'get']) !!}
                    {!! Form::submit('修改') !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['bike.destroy', $ts->uid], 'method' => 'delete']) !!}
                    {!! Form::submit('刪除') !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </table>


        <script type="text/javascript">
        $(document).ready(function() {
            $('#bike_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('userajax.getdata') }}",
                "columns":[
                    { "data": "uid" ,name: 'uid'},
                    { "data": "raberu_id",name: 'raberu_id' },
                    { "data": "raberu",name: 'raberu' },
                    { "data": "year",name: 'year' },
                    { "data": "model",name: 'model' },
                    { "data": "HP",name: 'HP' },
                    { "data": "cc_id",name: 'cc_id' },
                    //{ "data": "action", orderable:false, searchable: false}
                                    
                ]
            });
        });
       
       </script> 
    
    @endsection