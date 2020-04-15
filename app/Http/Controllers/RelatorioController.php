<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("relatorio.index");
    }

    /**
     * Gerar relatório.
     *
     * @return \Illuminate\Http\Response
     */
    public function gerar()
    {
        //
    }
}
