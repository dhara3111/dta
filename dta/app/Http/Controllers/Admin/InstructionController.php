<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstructionController extends Controller
{
    public function posting($id){

        $types=Type::all();

        $type = Type::whereId($id)->first();
        return view('admin.instruction.posting', [
            'type' => $type,
            'types' => $types,
        ]);

    }
}
