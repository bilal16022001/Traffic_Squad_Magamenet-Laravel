<?php


namespace App\Repository;

use App\Interface\TrafficPoliceInterface;
use App\Models\TrafficPolice;
use App\Models\PoliceStation;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrafficPoliceMailable;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TrafficPoliceRepository implements TrafficPoliceInterface
{

    public function index()
    {

        // if (Auth::guard('police')->check()) {
        //     $Traffic_Polices = TrafficPolice::all()->where("email", auth("police")->user()->email);
        //     return view("pages.TrafficPolices.Traffic_Police", compact("Traffic_Polices"));
        // } else {
        $Traffic_Polices = TrafficPolice::get();
        return view("pages.TrafficPolices.Traffic_Police", compact("Traffic_Polices"));
        // }
    }

    public function edit($id)
    {
        $Police_Stations = PoliceStation::get();
        $Traffic_Police = TrafficPolice::findOrFail($id);
        return view("pages.TrafficPolices.edit", compact("Traffic_Police", "Police_Stations"));
    }

    public function create()
    {
    }

    public function show($id)
    {
        // $Traffic_Police = Traffic_Police::findOrFail($id);
        //    return view("pages.TrafficPolices.PoliceDetail");
    }


    public function store($request)
    {
        $request->validate([
            'Name' => 'required',
            'email' => 'required|email|unique:trafficpolices,email',
            'Phone' => 'required|unique:trafficpolices,Phone',
            'Address' => 'required',
            'password' => 'required',
        ], [
            'Name.required' => 'Please enter the name.',
            'email.required' => 'Please enter the email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already registered.',
            'Phone.required' => 'Please enter the phone number.',
            'Phone.unique' => 'The phone number is already registered.',
            'Address.required' => 'Please enter the address.',
            'password.required' => 'Please enter a password.',
        ]);

        try {

            TrafficPolice::create([
                'Name' => $request->Name,
                'email' => $request->email,
                'Phone' => $request->Phone,
                'Address' => $request->Address,
                'password' => Hash::make($request->password),

            ]);


            return back()->with("success", "Traffic has been send successfully!");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {


        try {

            $Traffic_Police = TrafficPolice::findOrFail($request->id);
            $old_pass = $Traffic_Police->password;

            $Traffic_Police->Name = $request->Name;
            $Traffic_Police->email = $request->email;
            $Traffic_Police->Phone = $request->Phone;
            $Traffic_Police->Address = $request->Address;

            if (!empty($request->password)) {
                $Traffic_Police->password = Hash::make($request->password);
            } else {
                $Traffic_Police->password = $old_pass;
            }

            $Traffic_Police->save();
            return back()->with("success", "Data has been updated successfully!");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            TrafficPolice::destroy($request);
            return back()->with("error", "Data has been deleted successfully!");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
