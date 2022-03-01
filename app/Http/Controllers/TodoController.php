<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //use this method if you want to get user's time zone from ip address ,
        $timezone = $this->getUserTimezone();
        $todos = Todo::latest()->get();
        return  view('todos',compact('todos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoRequest $request)
    {
        //get user timezone
        $timezone = $this->getUserTimezone();
        //convert users time to utc timezone
        $scheduled_at = Carbon::parse($request->scheduled_at,$timezone)->tz('UTC');
        Todo::create([
            'task_title' => $request->task_title,
            'scheduled_at' => $scheduled_at,
        ]);
        return redirect()->route('index')->with('success','Todo Added');
    }





    /**
     * Get user timezone from ip / session.
     *
     */

    public function getUserTimezone(){
        $user_ip = $_SERVER['REMOTE_ADDR'];
       if(!session()->get('local_timezone')){ //get timezone from ip
           $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
           $timezone = $geo["geoplugin_timezone"];
           session(['local_timezone' => $timezone]);
       }
       return session()->get('local_timezone');
    }







    /**
     * Store user's timezone in session that is recived from localmachine.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function saveTimeZone(Request $request){
        //if you want to get users timezone from localmachine
        session(['local_timezone' => $request->timezone]);
        return response()->json('success');
    }

}
