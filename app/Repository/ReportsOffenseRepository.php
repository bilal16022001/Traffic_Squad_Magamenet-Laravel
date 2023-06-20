<?php


namespace App\Repository;

use App\Interface\ReportsOffenseInterface;
use App\Models\TrafficPolice;
use App\Models\PoliceStation;
use App\Models\Offense;

class ReportsOffenseRepository implements ReportsOffenseInterface
{

    public function index()
    {
        return view("pages.Offenses.ReportOffenses");


    }

    public function edit($id)
    {
        
    }

    public function create()
    {
       
    }

    public function show($id)
    {
        $item = Offense::findOrFail($id);
        return view("pages.Offenses.DetailOffense",compact("item"));
    } 
  

    public function store($request)
    {
        $Offenses = Offense::all()->whereBetween("offense_date",[$request->fromdate, $request->todate]);
        
        if(auth('web')->check()){

              return view("pages.Offenses.ReportOffenses",compact("Offenses"));
            // return "web"; 
        }
        if(auth('police')->check()){
            // $Offenses = Offense::all()->whereBetween("offense_date",[$request->fromdate, $request->todate]);
            return view("pages.Offenses.ReportOffenses",compact("Offenses"));
            // return "police";
        }
        if(auth('offense')->check()){
            $Offenses = Offense::all()->whereBetween("offense_date",[$request->fromdate, $request->todate])->where("Phone",auth("offense")->user()->Phone);
            return view("pages.Offenses.ReportOffenses",compact("Offenses"));
        }
       
       
    }

    public function update($request)
    {
     
    }

    public function destroy($request)
    {

    }
}
