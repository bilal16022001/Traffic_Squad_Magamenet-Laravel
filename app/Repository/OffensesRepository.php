<?php


namespace App\Repository;

use App\Interface\OffensesInterface;
use App\Models\TrafficPolice;
use App\Models\PoliceStation;
use App\Models\Offense;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OffensesRepository implements OffensesInterface
{
    use AttachFilesTrait;

    public function index()
    {
        if (Auth::guard('offense')->check()) {
            $Offenses = Offense::all()->where("Phone", auth("offense")->user()->Phone);
            return view("pages.Offenses.Offenses", compact("Offenses"));
        } else if (Auth::guard("police")->check()) {

            $Offenses = Offense::all()->where("Traffic_id", auth("police")->user()->id);
            return view("pages.Offenses.Offenses", compact("Offenses"));
        } else {

            $Offenses = Offense::all();
            return view("pages.Offenses.Offenses", compact("Offenses"));
        }
    }



    public function edit($id)
    {
        $offense = Offense::FindOrFail($id);

        return view("pages.Offenses.EditOffense", compact("offense"));
    }

    public function create()
    {
        return view("pages.Offenses.AddOffense");
    }

    public function show($id)
    {

        $item = Offense::findOrFail($id);
        // if (Auth::guard('web')->check()) {
        //     return view("pages.Offenses.DetailOffense", compact("item"));
        // }
        // if (Auth::guard('police')->check()) {
        //     return view("pages.Offenses.DetailOffense", compact("item"));
        // } else {
        return view("pages.Offenses.DetailOffense", compact("item"));
        // }
    }

    public function generateOffense($id)
    {
        $item = Offense::findOrFail($id);
        $data = ['item' => $item];
        $today = Carbon::now()->format("d-m-Y");
        $pdf = Pdf::loadView('pages.Offenses.generateDetailOffense', $data);
        return $pdf->download('offense' . $item->id . '-' . $today . '.pdf');
    }




    public function pay($id)
    {
        // try{

        // }
        $offense = Offense::findOrFail($id);

        if (Auth::guard('web')->check()) {
            $offense->paidStatut = 1;
            $offense->PaidBy = 2;
            $offense->save();
            return back()->with("success", "payment has been saved successfully!");
        }
        if (Auth::guard('police')->check()) {
            $offense->paidStatut = 1;
            $offense->PaidBy = 1;
            $offense->save();
            return back()->with("success", "payment has been saved successfully!");
        }
        if (Auth::guard('offense')->check()) {
            $offense->paidStatut = 1;
            $offense->PaidBy = 3;
            $offense->save();
            return back()->with("success", "payment has been saved successfully!");
        }
    }


    public function store($request)
    {
        $path_img =  $request->file("image")->store("offenses", "bilal");

        Offense::create([
            'offense_number' => rand(0, 9999999),
            'offense_date' => date('Y-m-d'),
            'license_number' => $request->License,
            'offender_name' => $request->name,
            'place_violation' => $request->place,
            'section' => $request->section,
            'amount' => $request->Amount,
            'Vehicle_number' => $request->Vehicle_number,
            'Phone' => $request->phone,
            'password' => Hash::make($request->phone),
            'Traffic_id' => auth("police")->user()->id,
            'image' => $path_img,
            'paidStatut' => 0,
            'PaidBy' => 0,

        ]);

        return back()->with("success", "Offense has been inserted successfully!");
    }

    public function update($request)
    {

        $offense = Offense::FindOrFail($request->id);
        $offense->license_number = $request->License;
        $offense->offender_name = $request->name;
        $offense->place_violation = $request->place;
        $offense->section = $request->section;
        $offense->amount = $request->Amount;
        $offense->Vehicle_number = $request->Vehicle_number;
        $offense->Phone = $request->phone;
        $image = $offense->image;

        if (!empty($request->image)) {
            $path_img =  $request->file("image")->store("offenses", "bilal");
        } else {
            $path_img = $image;
        }
        $offense->image = $path_img;
        $offense->save();
        return back()->with("success", "Offense has been updated successfully!");
    }


    public function destroy($request)
    {
    }

    public function delete($id)
    {
        Offense::destroy($id);
        return back()->with("success", "Offense has been send successfully!");
    }

    public function Reports($request)
    {
        if (Auth::guard("offense")->check()) {
            $Offenses = Offense::whereBetween("offense_date", [$request->fromdate, $request->todate])->where("Phone", auth("offense")->user()->Phone)->get();
            return view("pages.Offenses.ReportOffenses", compact("Offenses"));
        } else {
            $Offenses = Offense::whereBetween("offense_date", [$request->fromdate, $request->todate])->get();
            return view("pages.Offenses.ReportOffenses", compact("Offenses"));
        }
    }

    public function Search($request)
    {
        $Offenses = Offense::where("offender_name", "LIKE", "%" . $request->name . "%")->get();
        return view("pages.Offenses.SearchOffenses", compact("Offenses"));
    }
}
