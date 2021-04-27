<?php

namespace App\Http\Controllers;

class MonsterController extends Controller
{
    public function list() {
        $data = 'monster - list';
        return response()->json($data);
    }
}
