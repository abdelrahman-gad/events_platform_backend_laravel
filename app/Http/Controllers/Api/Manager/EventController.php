<?php

namespace App\Http\Controllers\Api\Manager;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Admin\Event\StoreRequest;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('id','DESC')->get();
        
        $response = ['data'=>$events];

        return response($response, 200);
    }

    public function store(StoreRequest $request)
    {
        $newEvent = Event::create($request->all());

        $response=['data'=>$newEvent,'message'=>'Event Create Succefully'];

        return response($response, 201);
    }

    public function destroy($id){

      $event = Event::find($id);

      if(!$event) return response(['message'=>'event not found'],404);

      $event->delete();

      $response = [
        'data' => 'Event Deleted successfully'
      ];
      return response($response);
    }
}
