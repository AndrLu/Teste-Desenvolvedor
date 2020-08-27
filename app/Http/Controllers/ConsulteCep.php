<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Request;

class ConsulteCep extends Controller
{
    public function consulte($cep)
    {
        $response = Http::get("https://serviceweb.aix.com.br/aixapi/api/cep/{$cep}");
        $enderecoCompleto = $response->body();

        $array_enderecos = json_decode($enderecoCompleto, true);
        foreach ($array_enderecos as $i => $value) {
            
            $cep = $array_enderecos['cep'];
            $bairro = $array_enderecos['bairro'];
            $rua = $array_enderecos['logradouro'];
            $cidade = $array_enderecos['cidade'];
            $estado = $array_enderecos['estado'];           
            
        }
        /*armazenar no banco aqui*/

        $end_formatado = "CEP: " . $cep . "\n" . "Bairro: " . $bairro ."\n" ."Rua: " . $rua;
        return $end_formatado;
    }
}
