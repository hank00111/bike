@extends('layouts.dataapp') 
@section('content')



<div class="container">
    <br />
    <h3 align="center">Datatables Server Side Processing in Laravel</h3>
    <br />
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">新增</button>
    </div>
    <br />
    <table id="bike_table" class="table table-bordered" style="width:100%">
        <thead>
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
        </thead>
    </table>
</div>


@endsection