<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

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
    <div id="bikeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="bike_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">新增資料</h4>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>

                        <div class="form-group">
                            {!! Form::label('year','年份:') !!} 
                            {!! Form::selectRange('year', 2019, 2000,2018,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('raberu_id','廠牌ID:') !!} {!! Form::select('raberu_id',array( '台灣' =>array('1' => '光陽' ,'2' => '三陽' ,'3' =>
                            '台灣山葉','4' => '宏佳騰','6' => 'PGO摩特動力'), '日本' =>array('7' => 'HONDA' ,'8' => 'YAMAHA' ,'9'=> 'SUZUKI','10'=>
                            'KAWASAKI'), '義大利'=>array('11' => 'DUCATI','12' => 'APRILIA','12' => 'APRILIA','13' => 'MV AGUSTA','14'
                            => 'HUSQVARNA'), '美國' =>array('16' => 'HARLEY-DAVIDSON', '17' =>'INDIAN MOTORCYCLE'), '德國' =>array('18'
                            => 'BMW') ),1,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('model','車型') !!} 
                            {!! Form::text('model',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('HP','馬力') !!} 
                            {!! Form::text('HP',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cc_id','排氣量') !!} 
                            {!! Form::text('cc_id',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="bike_id" id="bike_id" value="" /> 
                        <input type="hidden" name="button_action" id="button_action" value="insert" />
                        <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    { "data": "action",orderable:true, searchable: true}
                    
                    
                ]
            });
            $('#add_data').click(function(){
            $('#bikeModal').modal('show');
            $('#bike_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
        });

        $('#bike_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"{{ route('userajax.postdata') }}",
                    method:"POST",
                    data:form_data,
                    dataType:"json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_output').html(error_html);
                        }
                        else
                        {
                            $('#form_output').html(data.success);
                            $('#bike_form')[0].reset();
                            $('#action').val('Add');
                            $('.modal-title').text('Add Data');
                            $('#button_action').val('insert');
                            $('#bike_table').DataTable().ajax.reload();
                        }
                    }
                })
        });



    });
    </script>

</body>

</html>