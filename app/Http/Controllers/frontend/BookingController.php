<?php

namespace App\Http\Controllers\frontend;

use App\models\backend\Event;
use App\models\backend\TableTypes;
use App\models\backend\Table;
use App\Http\Controllers\Controller;
use App\models\frontend\BookingEvent;
use App\models\frontend\BookingTable;
use App\models\frontend\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Comparator\Book;

class BookingController extends Controller
{
    public function index()
    {
//        $tableTypes     =   TableTypes::all();
        return view('frontend/pages/reservation');
//            ->with('tableTypes',$tableTypes);
    }

    public function bookTableAddUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required',
            'table_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservation-form-error')->withErrors($validator)->withInput();
        } else {


            $bookings = BookingTable::all();//where('booking_date','>',date('yyyy-mm-dd'))
            $data = count($bookings);
            $tables = Table::where('table_types_id', '=', $request->table_type)->get();
            $cnt = 0;
            $booked_table = null;
            $booked_table_id = null;
            foreach ($tables as $table) {
                if ($data == 0) {
                    $booked_table .= $table->table_name;
                    $booked_table_id .= $table->id;
                    $customer = new  Customer();
                    $customer->first_name = $request->first_name;
                    $customer->last_name = $request->last_name;
                    $customer->email = $request->email;
                    $customer->phone = $request->phone;
                    $customer->address = $request->address;
                    $customer->gender = $request->gender;

                    $customer->save();

                    $lastInsertedId = $customer->id;

                    $booking = new BookingTable();
                    $booking->booking_date = $request->date;
                    $booking->booking_time = $request->time;
                    $booking->table_id = $table->id;
                    $booking->user_id = $lastInsertedId;
                    $booking->save();

                    $book_table = Table::find($booked_table_id);

                    if ($book_table->availability == 1) {
                        $book_table->availability = 0;
                    }

                    $book_table->save();

                    return redirect()->route('reservation-form-error')->with('success', 'Table booked on ' . $request->date . ' table no: ' . $booked_table);
                } else {
                    $bookings = BookingTable::where('table_id', '=', $table->id)
                        ->where('booking_date', '=', $request->date)->get();
                    $cntBook = count($bookings);
//                    $free = array();
                    if ($cntBook == 0) {
                        $booked_table = $table->table_name;
                        $booked_table_id = $table->id;
//                        array_push($free,$table->id);
                        $customer = new  Customer();
                        $customer->first_name = $request->first_name;
                        $customer->last_name = $request->last_name;
                        $customer->email = $request->email;
                        $customer->phone = $request->phone;
                        $customer->address = $request->address;
                        $customer->gender = $request->gender;

                        $customer->save();

                        $lastInsertedId = $customer->id;

                        $booking = new BookingTable();
                        $booking->booking_date = $request->date;
                        $booking->booking_time = $request->time;
                        $booking->table_id = $table->id;
                        $booking->user_id = $lastInsertedId;
                        $booking->save();

                        $cnt++;

                        $book_table = Table::find($booked_table_id);

                        if ($book_table->availability == 1) {
                            $book_table->availability = 0;
                        }

                        $book_table->save();

                        return redirect()->route('reservation-form-error')->with('success', 'Table booked on ' . $request->date . ' table no: ' . $booked_table);
                    }
                }
            }
            if ($cnt == 0) {
//                $tables = Table::where('id',$free);
                return redirect()->route('reservation-form-error')->with('fail', 'Sorry all tables are booked on this Date');
            }


        }


    }

    public function bookEvent(Request $request)
    {
        $event = new BookingEvent();
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[A-Za-z\s]{3,30}$/'
            ],
            'email' => 'required|email',
            'address' => [
                'required',
                'regex:/^[A-Za-z\s]{3,30}$/'
            ],
            'contact' => 'required|numeric',
            'person' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('event-form-error', $request->event_id)->withErrors($validator)->withInput();
        } else {

            $event->full_name = $request->name;
            $event->address = $request->address;
            $event->email = $request->email;
            $event->contact = $request->contact;
            $event->no_of_persons = $request->person;
            $event->event_id = $request->event_id;

            if ($event->save()) {
                return redirect()->route('event-form-error', $request->event_id)->with('success', 'Event was successfully booked.');
            }
            return redirect()->route('event-form-error', $request->event_id)->with('fail', 'There was some problem');
        }

    }
}
