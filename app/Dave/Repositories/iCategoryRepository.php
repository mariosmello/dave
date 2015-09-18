<?php namespace App\Dave\Repositories;

interface iCategoryRepository
{

    public function index($busca);

    public function store($input);

    public function show($id);

    public function update($input, $id);

    public function destroy($id);

}