<?php

namespace App\Http\Controllers;

use App\Models\Bancosraw;
use Illuminate\Http\Request;

/**
 * Class BancosrawController
 * @package App\Http\Controllers
 */
class BancosrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {

        return view('bancosraw.index', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $bancosraw = new Bancosraw();
        return view('bancosraw.create', compact('bancosraw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate(Bancosraw::$rules);
        try {
            $bancosraw = Bancosraw::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('bancosraws.index')
                ->with('error', 'No se puede crear el banco, ya existe un estado de cuenta igual.');
        }

        return redirect()->route('bancosraws.index')
            ->with('success', 'Bancosraw created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $bancosraw = Bancosraw::find($id);

        return view('bancosraw.show', compact('bancosraw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $bancosraw = Bancosraw::find($id);

        return view('bancosraw.edit', compact('bancosraw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bancosraw $bancosraw
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Bancosraw $bancosraw)
    {
        request()->validate(Bancosraw::$rules);

        $bancosraw->update($request->all());

        return redirect()->route('bancosraws.index')
            ->with('success', 'Bancosraw updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $bancosraw = Bancosraw::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('bancosraws.index')
                ->with('error', 'No se puede eliminar este registro, esta siendo utilizado en otra parte del sistema.');
        }

        return redirect()->route('bancosraws.index')
            ->with('success', 'Bancosraw deleted successfully');
    }
}
