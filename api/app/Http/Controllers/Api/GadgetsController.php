<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GadgetResource;
use App\Repository\Gadget\GadgetRepositoryInterface;
use Illuminate\Http\Request;

class GadgetsController extends Controller
{
    private $repository;
    private $resource = GadgetResource::class;
    public function __construct(GadgetRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $gadgets = $this->repository->getAll();
        return $this->resource::collection($gadgets);
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
        return response()->json(['message' => 'Equipo registrado exitosamente', 'data' => new $this->resource($gadget)], 200);
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
        return response()->json(['message' => 'Equipo fue actualizado exitosamente', 'data' => new $this->resource($gadget)], 200);
    }
    public function show($id)
    {
       $gadget = $this->repository->findOneByPrimary($id);
        return response()->json(new $this->resource($gadget));
    }
    public function destroy($id)
    {
        $gadget = $this->repository->deleteByPrimary($id);
        return response()->json(['message' => 'Equipo eliminado correctamente'], 200);
    }
}
