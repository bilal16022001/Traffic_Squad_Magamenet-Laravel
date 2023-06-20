<?php

namespace App\Http\Controllers\TrafficStations;

use App\Http\Controllers\Controller;
use App\Models\TrafficStation;
use Illuminate\Http\Request;
use App\Interface\TrafficStationInterface;


class TrafficStationController extends Controller
{
    protected $TrafficStation;

    public function __construct(TrafficStationInterface $TrafficStation)
    {
        $this->TrafficStation = $TrafficStation;
    }
    public function index()
    {
        return $this->TrafficStation->index();
    }


    public function create()
    {
        return $this->TrafficStation->create();
    }

    public function store(Request $request)
    {
        return $this->TrafficStation->store($request);
    }

    public function show($id)
    {
        return $this->TrafficStation->show($id);
    }

    public function edit(TrafficStation $id)
    {
        return $this->TrafficStation->edit($id);
    }


    public function update(Request $request)
    {
        return $this->TrafficStation->update($request);
    }


    public function destroy($id)
    {
        return $this->TrafficStation->destroy($id);
    }
}
