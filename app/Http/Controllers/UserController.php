<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $user = new user();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate(user::$rules);
        $data = $request->all();
        try {

            $data['clave'] = Hash::make($data['clave']);
            $user = user::create($data);
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', 'El usuario no se pudo crear, ya existe un usuario con ese nombre de usuario.');
        }
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = user::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = user::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  user $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, user $user)
    {
        request()->validate(user::$rules);
        $data = $request->all();
        try {
            if ($data['clave'] != null) {
                $data['clave'] = Hash::make($data['clave']);
            } else {
                unset($data['clave']);
            }
            $user->update($data);
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', 'El usuario no se puede actualizar, esta siendo utilizado en otra parte del sistema(lineas, clientes, etc).');
        }
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $user = user::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', 'El usuario no se puede eliminar, esta siendo utilizado en otra parte del sistema(lineas, clientes, etc).');
        }

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
