<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrafficPolice;
use App\Models\PoliceStation;
use App\Models\Offense;
use App\Models\User;
use Notification;
use App\Notifications\SendEmailNotification;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function dashboard()
    {
        $data['polices'] = TrafficPolice::count();
        $data['stations'] = PoliceStation::count();
        $data['Offenses'] = Offense::count();
        $data['OffensesPnding'] = Offense::all()->where("paidStatut", 0)->count();
        $data['OffensesComplet'] = Offense::all()->where("paidStatut", 1)->count();

        return view('dashboard', compact("data"));
    }
    public function index()
    {
        return view("auth.selection");
    }
}
