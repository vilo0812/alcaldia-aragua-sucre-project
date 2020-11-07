<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Departament\DepartamentRepositoryInterface;
use Illuminate\Http\Request;

class DepartamentsController extends Controller
{
    private $repository;
    public function __construct(DepartamentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $departaments = $this->repository->getAll();
        return $departaments;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
        ],[
            'name.required' => 'El campo departamento es obligatorio',
        ]);
        $departament = $this->repository->createOrUpdateFromRequest();
        return response()->json(['message' => 'Departamento creado exitosamente', 'data' => $departament], 200);
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => "required",
        ],[
            'name.required' => 'El campo departamento es obligatorio',
        ]);
        $departament = $this->repository->createOrUpdateFromRequest($id);
        return response()->json(['message' => 'Departamento actualizado correctamente', 'data' => $departament], 200);
    }
    public function show($id)
    {
       $departament = $this->repository->findOneByPrimary($id);
        return response()->json($departament);
    }
    public function destroy($id)
    {
        $departament = $this->repository->deleteByPrimary($id);
        return response()->json(['message' => 'Departamento eliminado correctamente'], 200);
    }
}
