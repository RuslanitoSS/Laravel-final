<?php


namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Отображает список всех мест хранения.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    /**
     * Показывает форму для создания нового места хранения.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Сохраняет новое место хранения в базе данных.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'repair' => 'boolean',
            'work' => 'boolean',
        ]);

        Place::create($request->all());
        return redirect()->route('places.index');
    }

    /**
     * Отображает конкретное место хранения.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('places.show', compact('place'));
    }

    /**
     * Показывает форму для редактирования места хранения.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('places.edit', compact('place'));
    }

    /**
     * Обновляет информацию о месте хранения.
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
            'repair' => 'boolean',
            'work' => 'boolean',
        ]);

        $place = Place::findOrFail($id);
        $place->update($request->all());
        return redirect()->route('places.index');
    }

    /**
     * Удаляет место хранения из базы данных.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Place::destroy($id);
        return redirect()->route('places.index');
    }
}
