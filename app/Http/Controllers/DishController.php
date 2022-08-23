<?php

namespace App\Http\Controllers;

use App\Models\dish;
use App\Models\menu;
use App\Http\Requests\StoredishRequest;
use App\Http\Requests\UpdatedishRequest;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dishes = Dish::all();

        return view('dish.index', ['dishes' => $dishes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('dish.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish;

        $dish->menu_id = $request->create_dish_menu_id;
        $dish->name = $request->create_dish_name;
        $dish->description = $request->create_dish_description;
        // $dish->image = $request->create_dish_image;
        if ($request->file('create_dish_image')) {
            $image = $request->file('create_dish_image');
            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $image->move(public_path().'/images', $file);
            $dish->image = asset('/images') . '/' . $file;
        }

        $dish->save();

        return redirect()->route('dishes-index')->with('success', 'Created new dish!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(int $dish_id)
    {
        $menus = Menu::all();
        $dish = Dish::where('id', $dish_id)->first();

        return view('dish.edit', ['dish' => $dish, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedishRequest  $request
     * @param  \App\Models\dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dish $dish)
    {
        $dish->menu_id = $request->dish_menu_id;
        $dish->name = $request->dish_name;
        $dish->description = $request->dish_description;
        // $dish->image = $request->dish_image;
        if ($request->file('dish_image')) {

            $name = pathinfo($dish->image, PATHINFO_FILENAME);
            $ext = pathinfo($dish->image, PATHINFO_EXTENSION);
    
            // $path = asset('/images') . '/' . $name . '.' . $ext;
            $path = '\xampp\htdocs\egzaminas\public/images' . '/' . $name . '.' . $ext;
            if (file_exists($path)) {
                unlink($path);
            }
            $image = $request->file('dish_image');
            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $image->move(public_path().'/images', $file);
            $dish->image = asset('/images') . '/' . $file;
        }

        $dish->save();

        return redirect()->route('dishes-index')->with('success', 'Dish updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $dish_id)
    {
        $dish = Dish::where('id', $dish_id)->first();

        if ($dish->image) {
            $name = pathinfo($dish->image, PATHINFO_FILENAME);
            $ext = pathinfo($dish->image, PATHINFO_EXTENSION);
            // $path = asset('/images') . '/' . $name . '.' . $ext;
            $path = '\xampp\htdocs\egzaminas\public/images' . '/' . $name . '.' . $ext;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        

        $dish->delete();

        return redirect()->route('dishes-index')->with('delete', 'Dish deleted!');
    }
}
