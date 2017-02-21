<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\User;
use Auth;
class ThreadController extends Controller
{   
    protected $thread;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }
    public function index()
    {
        //
        $thread['threads'] = $this->thread->all();
        return view('threadlist', $thread);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(isset(Auth::user()->id))
        {
            return view('create_thread');    
        }
        else
        {
            $message = 'please login or registration';
            return redirect()->route('thread.index')->with('message', 'Please Login or registration');
        }
        
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
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $thread = new $this->thread;
        $thread1 = $thread->fill($input);
        $thread->save();
        return redirect()->route('thread.index');
        
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
        $thread = $this->thread->with('comments')->find($id);
        return view('show')->with(compact('thread'));
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
        $thread = $this->thread->find($id);

        return view('edit')->with(compact('thread'));
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
        //
       $thread = $this->thread->find($id);
       $input = $request->except('_token');
       $thread->update($input);
       return redirect()->route('thread.index');
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
        
        $this->thread->destroy($id);
        return redirect()->route('thread.index');
    }
    public function search(Request $request)
    {
       $search = $request->search;
       $thread['threads'] = $this->thread->where('title', 'like', '%'.$search.'%')->get();
        return view('threadlist', $thread);
    }
}
