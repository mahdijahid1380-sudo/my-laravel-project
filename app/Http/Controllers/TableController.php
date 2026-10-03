<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    public function index()
    {
        return Table::latest()->paginate(15);
    }

    public function store(StoreTableRequest $request)
    {
        $table = Table::create($request->validated());
        return response()->json($table, 201);
    }

    public function show(Table $table)
    {
        return response()->json($table);
    }

    public function update(UpdateTableRequest $request, Table $table)
    {
        $table->update($request->validated());
        return response()->json($table);
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return response()->noContent();
    }
}
