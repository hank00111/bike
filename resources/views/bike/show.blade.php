@extends('layouts.app')

@section('content')

    <h2>已開出之統一發票號碼的詳細資料：</h2>
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
        </tr>
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
                {!! Form::open(['route' => ['bike.destroy', $ts->uid], 'method' => 'delete']) !!}
                {!! Form::submit('刪除') !!}
                {!! Form::close() !!}
            </td>
        </tr>
    </table>
@endsection