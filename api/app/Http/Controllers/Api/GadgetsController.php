<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Gadget\GadgetRepositoryInterface;
use Illuminate\Http\Request;

class GadgetsController extends Controller
{
    private $repository;
    public function __construct(GadgetRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $gadgets = $this->repository->getAll();
        return $gadgets;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'code' => "required",
            'status' => "required",
        ],[
            'name.required' => 'El campo nombre del equipo es obligatorio',
            'code.required' => 'El campo codigo del equipo es obligatorio',
            'status.required' => 'El campo status del equipo es obligatorio',
        ]);
        $gadget = $this->repository->createOrUpdateFromRequest();
        return response()->json(['message' => 'Equipo registrado exitosamente', 'data' => $gadget], 200);
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => "required",
            'code' => "required",
            'status' => "required",
        ],[
            'name.required' => 'El campo nombre del equipo es obligatorio',
            'code.required' => 'El campo codigo del equipo es obligatorio',
            'status.required' => 'El campo status del equipo es obligatorio',
        ]);
        $gadget = $this->repository->createOrUpdateFromRequest($id);
        return response()->json(['message' => 'Equipo fue actualizado exitosamente', 'data' => $gadget], 200);
    }
    public function show($id)
    {
       $gadget = $this->repository->findOneByPrimary($id);
        return response()->json($gadget);
    }
    public function destroy($id)
    {
        $gadget = $this->repository->deleteByPrimary($id);
        return response()->json(['message' => 'Equipo eliminado correctamente'], 200);
    }
}
