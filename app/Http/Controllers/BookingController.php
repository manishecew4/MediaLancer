<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function Booking(Request $request)
    {
        $booking = Booking::get();
        return view('admin.booking', compact('booking'));
    }

    public function ReqBooking(Request $request)
    {
        //return $request;
        $booking = new Booking;
        $booking->booking_id = time();
        $booking->user_id = Auth::user()->id;
        $booking->status = "active";
        $booking->plan = $request->plan;
        $booking->vendor_id = $request->vendor_id;

        if ($booking->save()) {
            return redirect()->back();
        }
    }

    public function BookingApprove($id)
    {
        //return $id;
        $booking = Booking::where(['id' => $id])->update(['is_allow' => 'true']);
        //$booking->is_allow = '';
        if ($booking) {
            return redirect()->back();
        }
    }

    public function VendorBookings()
    {
        $booking = Booking::where(['vendor_id' => Auth::user()->id, 'is_allow' => 'true'])->get();
        return view('vendor.booking', compact('booking'));
    }
}