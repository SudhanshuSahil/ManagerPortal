<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('name','desc')->paginate(7);
        return view('events.index') -> with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'venue' => 'required',
            'event_image' => 'image|required|max:1999'
        ]);


        $fileNameExtended = $request->file('event_image')->getClientOriginalName();
        $fileName = pathinfo($fileNameExtended, PATHINFO_FILENAME);
        $fileExt = $request->file('event_image')->getClientOriginalExtension();

        $fileNameFinal = $fileName.'_'.time().'.'.$fileExt ;
        $path = $request->file('event_image')->storeAs('public/event_image', $fileNameFinal);
        

        $event = new Event;
        $event -> name = $request -> input('name');
        $event -> description = $request -> input('description');
        $event -> venue = $request -> input('venue');
        $event -> user_id = auth()->user()->id;
        $event -> event_image = $fileNameFinal;
        $event -> save();

        return redirect('/events') -> with('success', 'Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        if(auth()->user()->id !== $event->user_id){
            return redirect('/events')->with('error', 'Unauthorised');
        }
        return view('events.update')->with('event', $event);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'venue' => 'required',
            'event_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('event_image')){
            $fileNameExtended = $request->file('event_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExtended, PATHINFO_FILENAME);
            $fileExt = $request->file('event_image')->getClientOriginalExtension();
    
            $fileNameFinal = $fileName.'_'.time().'.'.$fileExt ;
            $path = $request->file('event_image')->storeAs('public/event_image', $fileNameFinal);    
        }

        $event = Event::find($id);
        $event -> name = $request -> input('name');
        $event -> description = $request -> input('description');
        $event -> venue = $request -> input('venue');
        $event -> user_id = auth()->user()->id;
        if($request->hasFile('event_image')){
            $event -> event_image = $fileNameFinal;
        }
        $event -> save();

        return redirect('/events') -> with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        $event = Event::find($id);
        if(auth()->user()->id !== $event->user_id){
            return redirect('/events')->with('error', 'Unauthorised');
        }
        
        $event -> delete();

        return redirect('/events') -> with('success', 'Event Deleted');
    }
}
