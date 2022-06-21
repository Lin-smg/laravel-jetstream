<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //
    public function addView()
    {
        if(Auth::id()) {
            if(Auth::user()->usertype==1) {

                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function upload(Request $request)
    {

        $doctor = new Doctor();

        $image = $request->file;
        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();

        return redirect()->back()->with("message", "Doctor Added Successfully");
    }

    public function showappointment()
    {
        if(Auth::id()) {
            if(Auth::user()->usertype==1) {

                $data = appointment::all();
                return view('admin.showappointment', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function approved($id)
    {
        $data = appointment::find($id);

        $data->status = "Approved";

        $data->save();

        return redirect()->back();
    }

    public function cancelled($id)
    {
        $data = appointment::find($id);

        $data->status = "Cancelled";

        $data->save();

        return redirect()->back();
    }

    public function showdoctor()
    {
        if(Auth::id()) {
            if(Auth::user()->usertype==1) {

                $data = doctor::all();
                return view('admin.showdoctor', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function delete_doctor($id)
    {
        $data = doctor::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Doctor deleted successfully');
    }

    public function updatedoctor($id)
    {
        $data = doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function update_doctor(Request $request, $id)
    {
        $doctor = doctor::find($id);

        $image = $request->file;
        if ($image) {
            $imagename = explode(".",$doctor->image)[0] . '.' . $image->getClientoriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image = $imagename;
        }
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with("message", "Doctor Updated Successfully");
    }

    public function emailview($id)
    {
        $data = appointment::find($id);
        return view('admin.email_view', compact('data'));
    }

    public function sendemail(Request $request, $id)
    {
        $data= appointment::find($id);

        $details = [
            "greeting" => $request->greeting,
            "body" => $request->body,
            "actiontext" => $request->actiontext,
            "actionurl" => $request->actionurl,
            "endpart" => $request->endpart,
            
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email sent successfully');
    }
}
