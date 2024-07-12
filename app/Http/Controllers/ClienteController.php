<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\clientes;
use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = clientes::paginate(10);

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $cliente = new clientes();
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);
        try{
            $cliente = clientes::create($request->all());
        }catch(\Exception $e){
            return redirect()->route('clientes.index')
                ->with('error', 'No se puede crear el cliente, ya existe un cliente con ese nombre.');
        }
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $cliente = clientes::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $cliente = clientes::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  clientes $cliente
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, clientes $cliente)
    {
        request()->validate(Cliente::$rules);
        try{
            $cliente->update($request->all());
        }catch(\Exception $e){
            return redirect()->route('clientes.index')
                ->with('error', 'No se puede actualizar el cliente, tiene registros asociados');
        }

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $cliente = clientes::find($id)->delete();
        }catch(\Exception $e){
            return redirect()->route('clientes.index')
                ->with('error', 'No se puede eliminar el cliente, tiene registros asociados');
        }

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente deleted successfully');
    }
}
