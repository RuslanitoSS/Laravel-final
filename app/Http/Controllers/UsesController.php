<?php

// app/Http/Controllers/UseController.php

namespace App\Http\Controllers;

use App\Models\Uses;
use App\Models\Thing;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class UsesController extends Controller
{
    /**
     * Отображает список всех использований вещей.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $uses = Uses::with(['thing', 'place', 'user'])->get();
        return view('uses.index', compact('uses'));
    }

    /**
     * Показывает форму для создания нового использования.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $things = Thing::all();
        $places = Place::all();
        $users = User::all();
        return view('uses.create', compact('things', 'places', 'users'));
    }

    /**
     * Сохраняет новое использование в базе данных.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'thing_id' => 'required|exists:things,id',
            'place_id' => 'required|exists:places,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer|min:1',
        ]);

        Uses::create($request->all());
        return redirect()->route('uses.index');
    }

    /**
     * Отображает конкретное использование.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $uses = Uses::with(['thing', 'place', 'user'])->findOrFail($id);
        return view('uses.show', compact('uses'));
    }

    /**
     * Показывает форму для редактирования использования.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $use = Uses::findOrFail($id);
        $things = Thing::all();
        $places = Place::all();
        $users = User::all();
        return view('uses.edit', compact('use', 'things', 'places','users'));
    }

    /**
     * Обновляет информацию о использовании.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'thing_id' => 'required|exists:things,id',
            'place_id' => 'required|exists:places,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer|min:1',
        ]);

        $Uses = Uses::findOrFail($id);
        $Uses->update($request->all());
        return redirect()->route('uses.index');
    }

    /**
     * Удаляет использование из базы данных.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Uses::destroy($id);
        return redirect()->route('uses.index');
    }
}
