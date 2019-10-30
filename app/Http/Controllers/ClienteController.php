<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests\ClienteRequest;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::all();
        $op = $request->session()->get('op');
        $result = $request->session()->get('result');
        $error = $request->session()->get('error');
        $datos = [
            'clientes' => $clientes    
        ];
        if(isset($result)) {
            $resultado = [
                'destroy' => [
                    0 => ['danger', 'El borrado ha fallado'],
                    1 => ['success', 'El borrado ha sido un éxito']
                ],     
                'update'  => [
                    0 => ['danger', 'El editado ha fallado'],
                    1 => ['success', 'El editado ha sido un éxito']    
                ],
                'store'   => [
                    0 => ['danger', 'El guardado ha fallado'],
                    1 => ['success', 'El guardado ha sido un éxito']
                ],
            ];
            $datos += [
                'tipo'      => $resultado[$op][$result][0],
                'mensaje'   => $resultado[$op][$result][1],
            ];
        }
       
        return view('cliente.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $error = '';
        $input = $request->validated();
        $cliente = new Cliente($input);
        $cliente->ip = $request->ip();
        try {
            $result = $cliente->save();
        } catch(\Exception $e) {
            $result = false;
            $error = 'Introduzca bien los datos, existen entradas repetidas.';
            return redirect(route('cliente.create'))->withErrors($error)->withInput(); //$request->except('clave')
        }
        
        $result = true;
        
        return redirect(route('cliente.index'))->with(['result' => $result, 'op' => 'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show')->with(['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $input = $request->validated();
        $input += ['ip' => $request->ip()];
        try{
            $result = $cliente->update($input);
        } catch(\Exception $e) {
            $error = 'Introduzca bien los datos, existen entradas repetidas.';
            return redirect('cliente/' . $cliente->id . '/edit')->withErrors($error)->withInput();
        }
        return redirect(route('cliente.index'))->with(['result' => $result, 'op' => 'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        try{
            $now = Carbon::now();
            $cliente->nombre = $cliente->nombre . '-' . $now->format('Y-m-d');
            $cliente->update();
            $cliente->delete();
            $result = true;
        } catch(\Exception $e) {
            $result = false;
        }
        return redirect(route('cliente.index'))->with(['result' => $result, 'op' => 'destroy']);
    }
}
