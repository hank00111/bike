<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Main;
use App\Raberu;
use App\ccdate;
//use App\User;
use Yajra\Datatables\Datatables;

class AjaxdataController extends Controller
{
    //
    function index(){

        return view('bike.index');
    }

    function edit($uid){
        $Main = main::find($uid);

        //$items = \App\Item::all('uid','type')->toArray();
        $selections = [];
       /* foreach ($items as $option)
            $selections[$option['uid']] = $option['type'];*/

        return view('bike.edit')->with(['selections'=>$selections, 'main'=>$Main]);
    }



    function update($id){
        $Main = Main::findOrFail($id);

        $Main->update($request->all());

        $Main = Main::all();
        //return view('baiku.index')->with('numbers', $test);
        return redirect()->route('bike.index');

    }

    function show($id){
        $Main = Main::find($id);
        return view('bike.show', compact('Main'));
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
        ->addColumn('action', function ($Main) {
            return '<a href="' . route("bike.edit", $Main->uid) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })
        
        /*->addColumn('action', function($Main){           
        return '<a href="{{ ' .$route. '}}" class="btn btn-xs btn-primary edit" id="'.$Main->uid.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        //.$users->id.'/edit  <a href="{{ route('baiku.edit', $Main->uid) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        })
        //->editColumn('id', '{{$uid}}')*/
        ->make(true);
        
    }

    function postdata(Request $request ,Main $Main){
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
                $success_output = '<div class="alert alert-success">新增成功</div>';
            }
            /*if($request->get('button_action') == 'update')
            {

                $uid = $request->input('uid');
                //$Main = Main::find($uid);

                $attendances = Main::where('uid', '=', $uid)->get();
    
    
                foreach ($attendances as $key => $attendance)
                {
                    $atts = Main::findOrFail($request->input('uid.'.$key));
            
                   
            
                    $temp['year'] = $request->input('year.' .$key);
                    $temp['raberu_id'] = $request->input('raberu_id.' .$key);
                    $temp['model'] = $request->input('model.' .$key);
                    $temp['HP'] = $request->input('HP.' .$key);
                    $temp['cc_id'] = $request->input('cc_id.' .$key);
            
                    $atts->update($temp);
                    
                }
                $success_output = '<div class="alert alert-success">"'.$Main.'"</div>';
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
        $Main = Main::find($uid);//->tojson();

        //echo json_encode($output);

        return $Main;

    }

    function bikeedit(){

    }
    
    

}
