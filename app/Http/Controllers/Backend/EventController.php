<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\Event;
use App\models\frontend\BookingEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Image;

class EventController extends Controller
{

    public function addEvent()
    {
        return view('backend/pages/event/add-event');
    }


    public function addEventAction(Request $request)
    {
        $this->validate($request, [
            'event_name' => 'required|min:10|unique:events,event_name',
            'event_date' => 'required|unique:events,event_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'required|image',
            'description' => 'required|min:50'
        ]);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->event_description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(50) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/event'))) {
                mkdir(public_path('custom/backend/images/event'));
            }

            $image->resize(720, 480)->save(public_path('custom/backend/images/event/' . $newName));
            $event->event_image = $newName;
        }

        if ($event->save()) {
            return redirect()->route('view-event')->with('success', 'Event was created successfully');
        }
        return redirect()->back()->with('fail', 'There was some problem');

    }


    public function viewEvent()
    {
        $events = Event::all();
        return view('backend/pages/event/view-event')->with('events', $events);
    }


    public function editEvent($id)
    {
        $event = Event::find($id);

        return view('backend/pages/event/edit-event')->with('event', $event);
    }


    public function editEventAction(Request $request, $id)
    {
        $event = Event::find($id);
        $this->validate($request, [
            'event_name' => [
                'required',
                'min:10',
                Rule::unique('events')->ignore($event->id)
            ],
            'event_date' => [
                'required',
                'date',
                Rule::unique('events')->ignore($event->id)
            ],
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'required|min:50'
        ]);

        $event = Event::find($id);
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->event_description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(50) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/event'))) {
                mkdir(public_path('custom/backend/images/event'));
            }

            if (file_exists(public_path('custom/backend/images/event/' . $event->event_image))) {
                unlink(public_path('custom/backend/images/event/' . $event->event_image));
            }

            $image->resize(720, 480)->save(public_path('custom/backend/images/event/' . $newName));
            $event->event_image = $newName;

            if ($event->save()) {
                return redirect()->route('view-event')->with('success', 'Event was successfully updated');
            }
            return redirect()->back()->with('fail', 'There was some problem');
        }
        if ($event->save()) {
            return redirect()->route('view-event')->with('success', 'Event was successfully updated');
        }
        return redirect()->route('view-event')->with('fail', 'There was some problem');
    }

    public function viewBookedEvents()
    {
        $bookedEvents = BookingEvent::all();
        return view('backend/pages/event/view-booked-events')->with('bookedEvents', $bookedEvents);
    }


    public function deleteEvent($id)
    {
        $event = Event::find($id);

        if (file_exists(public_path('custom/backend/images/event/' . $event->event_image))) {
            unlink(public_path('custom/backend/images/event/' . $event->event_image));
        }

        if ($event->delete()) {
            return redirect()->back()->with('success', 'Event was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
