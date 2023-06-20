<?php

namespace App\Http\Controllers\TrafficPolices;

use App\Http\Controllers\Controller;
use App\Interface\TrafficPoliceInterface;
use Illuminate\Http\Request;

class TrafficPoliceController extends Controller
{

    protected $Police;

    public function __construct(TrafficPoliceInterface $Police)
    {
        $this->Police = $Police;
    }


    public function index()
    {
        return $this->Police->index();
    }


    public function create()
    {
        return $this->Police->create();
    }
    public function delete($id)
    {
        // return $this->Police->delete($id);
    }


    public function store(Request $request)
    {
        return $this->Police->store($request);
    }

    public function show($id)
    {
        return $this->Police->show($id);
    }


    public function edit($id)
    {
        return $this->Police->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Police->update($request);
    }


    public function destroy($id)
    {
        return $this->Police->destroy($id);
    }
}
