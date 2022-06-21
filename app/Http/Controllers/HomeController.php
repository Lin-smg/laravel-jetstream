<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;

class HomeController extends Controller
{
    //
    public function redirect()
    {

        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                return $this->viewUserHome();
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function viewUserHome()
    {

        $doctor = doctor::all();

        return view('user.home', compact('doctor'));
    }

    public function index()
    {
        // $doctor = doctor::all();

        // return view('user.home', compact('doctor'));
        if (Auth::id()) {
            return redirect('home');
        } else {

            return $this->viewUserHome();
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In Progress';
        if (Auth::id()) {

            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Request Appointment Successful. We will contact with you soon.');
    }


    public function myappointment()
    {
        if (Auth::id()) {
            if(Auth::user()->usertype ==0) {

                $userId = Auth::user()->id;
                $appointment = appointment::where('user_id', $userId)->get();

                return view('user.my_appointment', compact('appointment'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id) {
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
