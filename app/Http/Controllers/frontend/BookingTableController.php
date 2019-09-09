<?php

namespace App\Http\Controllers\frontend;

use App\models\backend\TableTypes;
use App\models\backend\Table;
use App\Http\Controllers\Controller;
use App\models\frontend\BookingTable;
use App\models\frontend\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Comparator\Book;

class BookingTableController extends Controller
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
            foreach ($tables as $table) {
                if ($data == 0) {
                    $booked_table .= $table->table_name;
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

                    return redirect()->route('reservation-form-error')->with('success', 'Table booked on ' . $request->date . ' table no: ' . $booked_table);
                } else {
                    $bookings = BookingTable::where('table_id', '=', $table->id)
                        ->where('booking_date', '=', $request->date)->get();
                    $cntBook = count($bookings);
//                    $free = array();
                    if ($cntBook == 0) {
                        $booked_table = $table->table_name;
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
                        return redirect()->route('reservation-form-error')->with('success', 'Table booked on ' . $request->date . ' table no: ' . $booked_table);
                    }
                }
            }
            if ($cnt == 0) {
//                $tables = Table::where('id',$free);
                return redirect()->route('reservation-form-error')->with('fail', 'Sorry all tables are booked');
            }

///==========================================================================================================/////////
            foreach ($bookings as $booking) {
                $book = BookingTable::find($booking->id);
                if ($book->table->tableType->id == $request->table_type && $request->date == $book->booking_date) {
                    $cnt++;
                }
            }
            $tables = Table::where('table_types_id', '=', $request->table_type)->get();
            if ($cnt == count($tables)) {
                return redirect()->route('reservation-form-error')->with('fail', 'Sorry all tables are booked');

            } else {
                //adding code
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
                $booking->table_id = $request->table_id;
                $booking->user_id = $lastInsertedId;
                $booking->save();

                return redirect()->route('reservation-form-error')->with('success', 'Table booked on ' . $request->date . ' table no: ' . $booked_table);

            }

            die();
            $table_type_id = $request->table_type;
            return $input_table_type = TableTypes::find($table_type_id);

            $date = $request->date;
            $time = $request->time;

            // ====== checks availability of table by requested table type  and returns available table_id and table_name ===
            $tables = TableTypes::find($table_type_id)->tables()->get();
            $table_id = null;
            $table_no = null;
            foreach ($tables as $table) {
                if ($table->availability == 1) {
                    $table_id .= $table->id;
                    $table_no .= $table->table_name;
                    break;
                }
            }
            if (empty($table_id)) {
                return redirect()->route('reservation-form-error')->with('fail', 'Sorry all tables are booked');
            }
            //    =====================================     //

            $bookings = BookingTable::all();
            $count = count($bookings);
            $table_id = [];
            if ($count > 0) {
                foreach ($bookings as $booking) {
                    array_push($table_id, $booking->table_id);
                    if ($booking->table->table_types_id == $table_type_id->id) ;
                }
            }
            $table_type = [];
            foreach ($table_id as $id) {
                echo Table::with('tableType')->where(['table_id' => $id]);
                array_push($table_type, Table::with('tableType')->where(['table_id' => $id]));

            }
            die();
            foreach ($table_type as $t) {
                return $t->id;
            }

            $book = BookingTable::all();

            foreach ($book as $b) {
                if ($date == $b->booking_date) {
                    return redirect()->route('reservation-form-error')->with('fail', 'Sorry no tables were available at theis date');
                }
            }

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
            $booking->booking_date = $date;
            $booking->booking_time = $time;
            $booking->table_id = $table_id;
            $booking->user_id = $lastInsertedId;
            $booking->save();

            $booked_table = Table::find($table_id);

            if ($booked_table->availability == 1) {
                $booked_table->availability = 0;
            }
            $booked_table->update();

            return redirect()->route('reservation-form-error')->with('success', 'Table booked on ' . $date . ' table no: ' . $table_no);


        }
    }
}
