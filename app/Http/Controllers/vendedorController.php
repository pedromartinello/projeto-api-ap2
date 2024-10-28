<?php

namespace App\Http\Controllers;

use App\Models\vendedor;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
class vendedorController extends Controller
{
    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'ano_de_nascimento' => 'required|integer',
            'cpf' => 'required|string'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(),'Validation error');
        }

        $customer = vendedor::create($request->all());
        return ApiResponse::ok('vendedor salvo com sucesso', $customer);
    }
    public function listarPeloId(int $id)
    {
        $customer = vendedor::findOrFail($id);
        return ApiResponse::ok('vendedor a ser listado', $customer);
    }

    public function listar()
    {
        $customers = vendedor::all();
        return ApiResponse::ok('Lista de vendedor', $customers);
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'ano_de_nascimento' => 'required|integer',
            'cpf' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(),'Validation error');
        }

        $customer = vendedor::findOrFail($id);
        $customer->update($request->all());

        return ApiResponse::ok('Registro atualizado com sucesso', $customer);
    }

    public function excluir(int $id)
    {
        $customer = vendedor::findOrFail($id);
        $customer->delete();

        return ApiResponse::ok('vendedor removido com sucesso', $customer);
    }
}
