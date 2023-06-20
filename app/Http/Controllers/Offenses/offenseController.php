<?php

namespace App\Http\Controllers\Offenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interface\OffensesInterface;

class OffenseController extends Controller
{

    protected $Offense;

    public function __construct(OffensesInterface $Offense)
    {
        $this->Offense = $Offense;
    }


    public function index()
    {
        return $this->Offense->index();
    }

    public function edit($id)
    {
        return $this->Offense->edit($id);
    }

    public function generateOffense($id)
    {
        return $this->Offense->generateOffense($id);
    }

    public function create()
    {
        return $this->Offense->create();
    }


    public function store(Request $request)
    {
        return $this->Offense->store($request);
    }


    public function show($id)
    {
        return $this->Offense->show($id);
    }



    public function update(Request $request, $id)
    {
        return $this->Offense->update($request);
    }


    public function destroy($id)
    {
        return $this->Offense->destroy($id);
    }
    public function delete($id)
    {
        return $this->Offense->delete($id);
    }
    public function pay($id)
    {

        return $this->Offense->pay($id);
    }
    public function Reports(Request $request)
    {
        return $this->Offense->Reports($request);
    }
    public function Search(Request $request)
    {
        return $this->Offense->Search($request);
    }
}
