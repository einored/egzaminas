<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\restaurant;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::all();

        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();

        return view('menu.create', ['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;

        $menu->restaurant_id = $request->create_menu_restaurant_id;
        $menu->name = $request->create_menu_name;

        $menu->save();

        return redirect()->route('menus-index')->with('success', 'Created new menu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(int $menu_id)
    {
        $restaurants = Restaurant::all();
        $menu = Menu::where('id', $menu_id)->first();

        return view('menu.edit', ['menu' => $menu, 'restaurants' => $restaurants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemenuRequest  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu $menu)
    {
        $menu->restaurant_id = $request->menu_restaurant_id;
        $menu->name = $request->menu_name;

        $menu->save();

        return redirect()->route('menus-index')->with('success', 'Menu updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus-index')->with('delete', 'Menu deleted!');
    }
}
