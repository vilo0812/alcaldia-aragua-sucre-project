<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MayorResource;
use App\Repository\Mayor\MayorRepositoryInterface;
use Illuminate\Http\Request;
class MayorsController extends Controller
{
    private $repository;
    private $resource = MayorResource::class;
    public function __construct(MayorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $mayors = $this->repository->getAll();
        return $this->resource::collection($mayors);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
        ],[
            'name.required' => 'El campo alcaldia es obligatorio',
        ]);
        $mayor = $this->repository->createOrUpdateFromRequest();
        return response()->json(['message' => 'Alcaldia creada exitosamente', 'data' => new $this->resource($mayor)], 200);
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => "required",
        ],[
            'name.required' => 'El campo alcaldia es obligatorio',
        ]);
        $mayor = $this->repository->createOrUpdateFromRequest($id);
        return response()->json(['message' => 'Alcaldia actualizado correctamente', 'data' => new $this->resource($mayor)], 200);
    }
    public function show($id)
    {
       $mayor = $this->repository->findOneByPrimary($id);
        return response()->json(new $this->resource($mayor));
    }
    public function destroy($id)
    {
        $mayor = $this->repository->deleteByPrimary($id);
        return response()->json(['message' => 'Alcaldia eliminada correctamente'], 200);
    }
}
