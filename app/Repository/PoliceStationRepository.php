<?php


namespace App\Repository;

use App\Interface\PoliceStationInterface;
use App\Models\PoliceStationTrafficPolice;
use App\Models\PoliceStation;
use App\Models\TrafficPolice;

use Illuminate\Support\Facades\Auth;

class PoliceStationRepository implements PoliceStationInterface
{

    public function index()
    {
        if (Auth::guard("web")->check()) {
            $TrafficPolices = PoliceStation::get();
            return view("pages.PoliceStations.PoliceStation", compact("TrafficPolices"));
        } else {
            $TrafficPolices = TrafficPolice::FindOrFail(auth("police")->user()->id)->station;
            return view("pages.PoliceStations.PoliceStation", compact("TrafficPolices"));       
        }
    }

    public function edit($id)
    {
        $Police_Station = PoliceStation::findOrFail($id);
        return view("pages.PoliceStations.edit", compact("Police_Station"));
    }

    public function create()
    {
        return view("pages.PoliceStations.Add");
    }

    public function show($id)
    {
    }



    public function store($request)
    {

        try {

            PoliceStation::create([
                'Police_Station' => $request->NameStation,
                'Police_code' => $request->CodeStation,
                'Date' => now(),
            ]);

            return back()->with("success", "Data has been saved successfully!");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            $Police_Station = PoliceStation::findOrFail($request->id);
            $Police_Station->Police_Station = $request->NameStation;
            $Police_Station->Police_code = $request->CodeStation;
            $Police_Station->save();


            return back()->with("success", "Data has been updated successfully!");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            PoliceStation::destroy($request->id);
            return back()->with("error", "Data has been deleted successfully!");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
