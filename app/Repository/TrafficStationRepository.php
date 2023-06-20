<?php

namespace App\Repository;

use App\Interface\TrafficStationInterface;
use App\Models\PoliceStation;
use App\Models\PoliceStationTrafficPolice;
use App\Models\TrafficPolice;
use App\Models\TrafficStation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TrafficStationRepository implements TrafficStationInterface
{
    public function index()
    {
        if (Auth::guard("web")->check()) {
            $trafficStations = PoliceStationTrafficPolice::with("stations", "polices")->get();
            $polices = TrafficPolice::all();
            $stations = PoliceStation::all();
            return view("pages.TrafficStations.TrafficStations", compact("trafficStations", "polices", "stations"));
        } else if (Auth::guard("police")->check()) {
            $polices = TrafficPolice::all();
            $stations = PoliceStation::all();
            $trafficStations = PoliceStationTrafficPolice::where("traffic_police_id", auth("police")->user()->id)->with("stations", "polices")->get();
            return view("pages.TrafficStations.TrafficStations", compact("trafficStations", "polices", "stations"));
        }
    }
    public function create()
    {
        return "cre";
    }
    public function edit($id)
    {
        return "edit";
    }

    public function show($id)
    {
        return "show";
    }


    public function store($request)
    {
        $request->validate([
            'traffic_police_id' => 'required|numeric',
            'police_station_id' => 'required|numeric',
        ]);
        $check =  PoliceStationTrafficPolice::where("traffic_police_id", $request->traffic_police_id)

            ->where("Date", $request->date)->get();

        if ($request->date >= date("Y-m-d")) {
            if ($check->count() > 0) {
                return back()->with("error", "you can't add this is mission because is found before");
            } else {
                PoliceStationTrafficPolice::create([
                    'traffic_police_id' => $request->traffic_police_id,
                    'police_station_id' => $request->police_station_id,
                    'Date' => $request->date,
                ]);

                return back()->with("success", "data is Inserted successfully!");
            }
        } else {
            return back()->with("error", "this Date is old, choose new date");
        }
    }
    public function update($request)
    {
        $request->validate([
            'traffic_police_id' => 'required',
            'police_station_id' => 'required|numeric',
        ]);
        $check =  PoliceStationTrafficPolice::where("traffic_police_id", $request->traffic_police_id)

            ->where("Date", $request->date)->whereNotIn("id", [$request->id])->get();
        if ($request->date >= date("Y-m-d")) {
            if ($check->count() == 0) {

                $trafficStation = PoliceStationTrafficPolice::FindOrFail($request->id);
                $trafficStation->traffic_police_id = $request->traffic_police_id;
                $trafficStation->police_station_id = $request->police_station_id;
                $trafficStation->Date = $request->date;
                $trafficStation->save();

                return back()->with("success", "data updated successfully!");
            } else {
                return back()->with("error", "data is found");
            }
        } else {
            return back()->with("error", "this Date is old, choose new date");
        }
    }
    public function destroy($id)
    {
        PoliceStationTrafficPolice::destroy($id);
        return back()->with("success", "data is deleted successfully!");
    }
}
