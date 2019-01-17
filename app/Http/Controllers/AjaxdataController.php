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

        //->rawColumns(['test1', 'action'])
        ->addColumn('action', function($Main){
            
        return '
        <a href="'.route('bike.show',['uid' => $Main['uid']]).'" class="btn btn btn-primary edit" id="'.$Main->uid.'"><i class="glyphicon glyphicon-edit"></i>詳細</a>
        <a href="'.route('bike.edit',['uid' => $Main['uid']]).'" class="btn btn btn-primary edit" id="'.$Main->uid.'"><i class="glyphicon glyphicon-edit"></i>修改</a>
        <a href="'.route('bike.destroy',['uid' => $Main['uid']]).'" "method = delete" class="btn bbtn btn-primary edit"><i class="glyphicon glyphicon-edit"></i>刪除</a>';
        
        })
        //->editColumn('id', 'ID: {{$id}}')
        

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
            if($request->get('button_action') == 'update')
            {
             /*   $uid = $request->input('uid');
                //$Main = Main::find($uid);

                $attendances = Main::where('uid', '=', $uid)->get();
    
    
                foreach ($attendances as $key => $attendance)
                {
                    $atts = Main::findOrFail($request->input('uid.'.$key));
            
                   
            
                    $temp['year'] = $request->input('year.' .$key);
                    $temp['raberu_id'] = $request->input('raberu_id.' .$key);
                    $temp['model'] = $request->input('model.' .$key);
                    $temp['HP'] =input('HP.' .$key);
                    $temp['cc_id'] = $request->input('cc_id.' .$key);
            
                    $atts->update($temp);
                    
                }
                $success_output = '<div class="alert alert-success">good</div>';

                */
                $uid = $request->input('uid');
                $raberu_id = $request->input('raberu_id');
                $Main = Main::find($uid);
                $Main->year = $request->get('#year');
                //$Main->year = get('year');
                //$Main->model = get('model');
                //$Main->HP = $request->get('HP');
                $Main->raberu_id = $raberu_id;
                $Main->save();
                $success_output = '<div class="alert alert-success">"'.$Main.'"good</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request){
        $uid = $request->input('uid');
        $Main = Main::find($uid);
        /*$output = array(
            'uid' =>$Main->uid,
            'raberu_id' =>$Main->raberu_id,
            'year' =>$Main->year,
            'model' =>$Main->model,
            'HP' =>$Main->HP,
            'cc_id' =>$Main->cc_id,
        );*/

        //echo json_encode($output);
        /*$id = $request->input('id');
        $student = Student::find($id);
        $output = array(
            'first_name'    =>  $student->first_name,
            'last_name'     =>  $student->last_name
        );*/
        echo json_encode($Main);
        
        //return $Main;

    }
    
    

}
