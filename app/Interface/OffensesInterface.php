<?php


namespace App\Interface;


interface OffensesInterface

{
    public function index();

    public function edit($id);

    public function create();

    public function show($id);

    public function store($request);

    public function update($request);

    public function destroy($id);

    public function pay($id);

    public function delete($id);

    public function generateOffense($id);
    public function Reports($request);
    public function Search($request);
}
