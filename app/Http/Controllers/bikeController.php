<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Main;
use App\Raberu;
use App\ccdate;
//use App\User;
use Datatables;

class bikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Main = Main::all();
        return view('bike.index')->with('Main', $Main);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ts = Main::find($id);
        return view('bike.show', compact('ts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Main = Main::find($id);

      //  $items = \App\Item::all('uid','type')->toArray();
        $selections = [];
        //foreach ($items as $option)
            //$selections[$option['uid']] = $option['type'];

        return view('bike.edit')->with(['selections'=>$selections, 'Main'=>$Main]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $Main = Main::find($uid);

        $Main->update($request->all());

        $Main = Main::all();
        return view('bike.index')->with('Main', $Main);
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $uid)
    {
        //
      
        //$uid->delete();
        
        //return redirect('bike.index');
        $Main = Main::find($uid);
        //return redirect()->route('baiku.index');
        //DB::table('users')->where('votes', '<', 100)->delete();
        if($Main->delete())
        {
            return redirect()->route('bike.index')->with('success', '刪除成功-'.$uid);
        } else {
            return redirect()->back()->with('error', '刪除失敗-'.$uid);
        }

    }
}
