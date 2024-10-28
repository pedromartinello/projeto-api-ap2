<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
class produtoController extends Controller
{
    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(),'Validation error');
        }

        $customer = produto::create($request->all());
        return ApiResponse::ok('Produto salvo com sucesso', $customer);
    }
    public function listarPeloId(int $id)
    {
        $customer = produto::findOrFail($id);
        return ApiResponse::ok('Produto a ser listado', $customer);
    }

    public function listar()
    {
        $customers = produto::all();
        return ApiResponse::ok('Lista de produtos', $customers);
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(),'Validation error');
        }

        $customer = produto::findOrFail($id);
        $customer->update($request->all());

        return ApiResponse::ok('Registro atualizado com sucesso', $customer);
    }

    public function excluir(int $id)
    {
        $customer = produto::findOrFail($id);
        $customer->delete();

        return ApiResponse::ok('Produto removido com sucesso', $customer);
    }
}
