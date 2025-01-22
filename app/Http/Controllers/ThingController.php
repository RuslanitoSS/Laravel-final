<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    /**
     * Отображает список всех вещей.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $things = Thing::all();
        return view('things.index', compact('things'));
    }

    /**
     * Показывает форму для создания новой вещи.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('things.create');
    }

    /**
     * Сохраняет новую вещь в базе данных.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'wrnt' => 'nullable|string',
            'master' => 'required|exists:users,id',
        ]);

        Thing::create($request->all());
        return redirect()->route('things.index');
    }

    /**
     * Отображает конкретную вещь.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $thing = Thing::findOrFail($id);
        return view('things.show', compact('thing'));
    }

    /**
     * Показывает форму для редактирования вещи.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $thing = Thing::findOrFail($id);
        return view('things.edit', compact('thing'));
    }

    /**
     * Обновляет информацию о вещи.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'wrnt' => 'nullable|string',
            'master' => 'required|exists:users,id',
        ]);

        $thing = Thing::findOrFail($id);
        $thing->update($request->all());
        return redirect()->route('things.index');
    }

    /**
     * Удаляет вещь из базы данных.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Thing::destroy($id);
        return redirect()->route('things.index');
    }
}
