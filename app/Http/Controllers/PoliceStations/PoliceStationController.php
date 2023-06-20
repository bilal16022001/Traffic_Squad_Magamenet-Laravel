<?php

namespace App\Http\Controllers\PoliceStations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interface\PoliceStationInterface;
use App\Http\Requests\PoliceStationRequest;

class PoliceStationController extends Controller
{

    protected $Station;

    public function __construct(PoliceStationInterface $Station)
    {
        $this->Station = $Station;
    }


    public function index()
    {

        return $this->Station->index();
    }


    public function create()
    {
        return $this->Station->create();
    }


    public function store(PoliceStationRequest $request)
    {
        return $this->Station->store($request);
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        return $this->Station->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Station->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Station->destroy($request);
    }
}
