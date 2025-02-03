<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '00',
                'telefone' => '00000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'ddd' => '85',
                'telefone' => '00000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'ddd' => '32',
                'telefone' => '00000-0000'
            ],
        ];

        // $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ Nao informado';
        // echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
