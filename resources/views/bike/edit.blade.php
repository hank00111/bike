@extends('layouts.app') 
@section('content')
    <h2>修改一筆統一發票號碼：</h2>
    <hr> {!! Form::model($Main, ['method'=>'PATCH','action'=>['bikeController@update', $Main->uid]]) !!}

        <div class="form-group">
            {!! Form::label('year','年份:') !!} {!! Form::selectRange('year', 2019, 2000,2018,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('raberu_id','廠牌ID:') !!} {!! Form::select('raberu_id',array( '台灣' =>array('1' => '光陽' ,'2' => '三陽' ,'3' =>
            '台灣山葉','4' => '宏佳騰','6' => 'PGO摩特動力'), '日本' =>array('7' => 'HONDA' ,'8' => 'YAMAHA' ,'9'=> 'SUZUKI','10'=> 'KAWASAKI'),
            '義大利'=>array('11' => 'DUCATI','12' => 'APRILIA','12' => 'APRILIA','13' => 'MV AGUSTA','14' => 'HUSQVARNA'), '美國' =>array('16'
            => 'HARLEY-DAVIDSON', '17' =>'INDIAN MOTORCYCLE'), '德國' =>array('18' => 'BMW') ),1,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('model','車型') !!} {!! Form::text('model',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('HP','馬力') !!} {!! Form::text('HP',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cc_id','排氣量') !!} {!! Form::text('cc_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('修改') !!}
        </div>
    {!! Form::close() !!}
@endsection