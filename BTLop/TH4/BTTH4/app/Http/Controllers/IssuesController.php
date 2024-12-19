<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index()
    {
        $computers = Computer::with('issues')->paginate(10);
        return view('computers.index', compact('computers'));
    }
}
