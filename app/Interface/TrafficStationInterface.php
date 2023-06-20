<?php

namespace App\Interface;


interface TrafficStationInterface
{
    public function index();

    public function edit($id);

    public function create();

    public function show($id);

    public function store($request);

    public function update($request);

    public function destroy($id);

}
