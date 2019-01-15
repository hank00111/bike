<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Main;
use App\Raberu;
use App\ccdate;
//use App\User;
use Datatables;

class AjaxdataController extends Controller
{
    //
    function index(){

        return view('user.users');
    }

    function getdata(Main $Main){
        
        /*$Main = $Main
        ->join('raberus', 'mains.raberu_id', '=', 'raberus.id')
        ->get();

        return Datatables::of($Main)->make(true);*/
       
        
        $Main = $Main
        ->join('raberus', 'mains.raberu_id', '=', 'raberus.id')
        ->get();
        
        return Datatables::of($Main)
        ->addColumn('action', function($Main){
            
        return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$Main->uid.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        //.$users->id.'/edit  <a href="datatables/'.$Main->uid.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        })
        //->editColumn('id', '{{$uid}}')
        ->make(true);
        
    }

    function postdata(Request $request){
        $validation = Validator::make($request->all(), [
            'raberu_id' => 'required',
            'model'  => 'required',
            'year'  => 'required',
            'cc_id'  => 'required'
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {   
                $Main = Main::create([
                    'raberu_id'   => $request->raberu_id,
                    'year' => $request->year,
                    'model'  => $request->model,
                    'HP' => $request->HP,
                    'cc_id' => $request->cc_id,
                ]);
                $Main->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
           /* if($request->get('button_action') == 'update')
            {
                $Main = Main::find($request->get('student_id'));
                $Main->first_name = $request->get('first_name');
                $Main->last_name = $request->get('last_name');
                $Main->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }*/
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request){
        $uid = $request->input('uid');
        $Main = Main::find($uid)->tojson();

        //echo json_encode($output);

        return $Main;

    }
    
    

}
