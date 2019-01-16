@extends('layouts.app')

@section('contents')

    <h2>已開出之統一發票號碼的詳細資料：</h2>
    <hr>
    <table border="1" align="center">
        <tr>
            <th>id</th>
            <th>raberu_id</th>
            <th>廠牌</th>
            <th>year</th>
            <th>model</th>
            <th>HP</th>
            <th>cc_id</th>
            <th>操作</th>
        </tr>
        <tr>
            <td>{{ $Main->uid }}</td>   
            <td>{{ $Main->raberu_id }}</td>
            <td>{{ $Main->year }}</td>
            <td>{{ $Main->model }}</td>
            <td>{{ $Main->HP }}</td>
        </tr>
    </table>
@endsection