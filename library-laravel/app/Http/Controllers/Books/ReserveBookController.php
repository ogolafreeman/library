<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Reservation;
use App\Models\ReservationStatuses;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReserveBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $students = User::where('user_type_id', 1)->get();
        $variable = GlobalVariable::findOrFail(1);

        $datee = Carbon::now()->addDays($variable->value)->format('Y-m-d');


        return view('pages.books.transactions.reservation.reserve_book', compact('book', 'students', 'variable', 'datee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $librarian = Auth::user();
        $variable = GlobalVariable::findOrFail(1);

        $reservation = new Reservation();
        $reservation->book_id = 1;
        $reservation->reservationMadeFor_user_id = $request->input('reservationMadeFor_user_id');
        $reservation->reservationMadeBy_user_id = $librarian->id;
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->request_date = Carbon::parse($reservation->reservation_date)->addDays($variable->value);;
       
        $reservation->save();

        DB::table('reservation_statuses')->insert([
            'reservation_id' => $reservation->id,
            'status_reservations_id' => 3,
        ]);

        return to_route('all-books');
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
        //
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