<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;



class MenuController extends Controller
{
    public function index()
    {
        return Menu::latest()->paginate(15);
    }

    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create($request->validated());

        return response()->json($menu, 201);
    }

    public function show(Menu $menu)
    {
        return response()->json($menu);
    }

   public function update(UpdateMenuRequest $request, Menu $menu)
{
    $menu->update($request->validated());

    return response()->json($menu);
}

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->noContent();
    }
}