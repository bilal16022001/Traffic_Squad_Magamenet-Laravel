<?php

namespace App\Http\Controllers\Offenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interface\SearchOffenseInterface;

class SearchOffenseController extends Controller
{

    protected $Search;

    public function __construct(SearchOffenseInterface $Search)
    {
        $this->Search = $Search;
    }

    public function index()
    {
        return $this->Search->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Search->store($request);
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

    public function SearchOffense(Request $request)
    {
        return $request;
    }
}
