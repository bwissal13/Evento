<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(5); 
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
         $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   // app/Http/Controllers/EventController.php


   public function store(EventRequest $request)
   {

       $data = $request->validated();
   
       $data['auto_accept'] = $request->has('auto_accept') && $request->input('auto_accept') === '1';
   
       $data['auto_accept'] = (bool)$data['auto_accept'];
       $data['user_id'] = auth()->id();
   
       Event::create($data);
   
       return redirect()->route('events.index')->with('success', 'Event created successfully!');
   }
   
   

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories=Category::all();
        return view('events.edit', compact('event','categories'));
    }
    // public function showSinglePage()
    // {
    //     return view('frontEnd.single');
    // }
    public function showSinglePage(Event $event)
    {
        return view('frontEnd.single', compact('event'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
   

     public function destroy(Event $event)
     {
         $event->delete();
         return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
     }
}
