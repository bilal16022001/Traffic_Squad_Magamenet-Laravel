<?php

namespace App\Http\Controllers\Offenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interface\ReportsOffenseInterface;

class ReportsOffensesController extends Controller
{
    protected $Report;

    public function __construct(ReportsOffenseInterface $Report)
    {
        $this->Report = $Report;
    }


    public function index()
    {
        return $this->Report->index();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Report->store($request);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
