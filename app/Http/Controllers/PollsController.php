<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;

class PollsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls=Poll::orderby('created_at','desc')->paginate(10);
       return view('polls.index')->with('polls',$polls); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Deadline' => 'required',
            'Reason' => 'required',
            'Duration' => 'required'
        ]);
        date_default_timezone_set("Asia/Kolkata");
        if ($request->input('Deadline')<=date('Y-m-d'))
        {
            return redirect('/create')->with('error','Deadline should be in future.');
        }

        $poll=new Poll;
        $poll->Roll_no=auth()->user()->id;
        $poll->Duration= $request->input('Duration');
        $poll->Deadline= $request->input('Deadline');
        $poll->Reason= $request->input('Reason');
        $poll->yes=1;
        $poll->no=0;
        $poll->voted=$poll->Roll_no;
        $poll->save();
        return redirect('polls/')->with('success','Poll created');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll=Poll::find($id);
        $yes=$poll->Yes;
        $no=$poll->No;
        $total=$yes+$no;
        if ($yes/$total >= 0.8)
            {
                $poll->Result='Yes';
                $poll->Status='Dead';
            }
        else
        {
            $poll->Result='No';
            $poll->Status='Dead';
        }
        $poll->save();
        return redirect('/polls')->with('success','Result calculated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poll=Poll::find($id);
        $roll=auth()->user()->id;
        $prevroll=$poll->voted;
        $arr=explode(',',$prevroll);
        foreach($arr as $a)
    {
        if (strcmp($a,$roll)==0)
        {
            return redirect('/polls')->with('error','You have already voted');
        }
    }
    
    {
        $prevroll.=",".$roll;
       if ($request->input('Response')== 'Yes')
        {
            $poll->Yes+=1;
            $poll->voted=$prevroll;
            $poll->save();
        }
        else
        {
            $poll->No+=1;
            $poll->voted=$prevroll;
            $poll->save();
        }
    }
        return redirect('/polls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
