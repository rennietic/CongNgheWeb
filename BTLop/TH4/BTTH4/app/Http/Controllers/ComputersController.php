<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::with('issues')->paginate(10);
        return view('computers.index', compact('computers'));
    }
    public function store(Request $request)
    {
    $validated = $request->validate([
        'computer_name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'operating_system' => 'required|string|max:255',
        'processor' => 'required|string|max:255',
        'memory' => 'required|integer|min:1',
        'available' => 'required|boolean',
    ]);

    Computer::create($validated);

    return redirect()->route('computers.index')->with('success', 'Máy tính đã được thêm thành công!');
    }
    public function update(Request $request, Computer $computer)
    {
    $validated = $request->validate([
        'computer_name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'operating_system' => 'required|string|max:255',
        'processor' => 'required|string|max:255',
        'memory' => 'required|integer|min:1',
        'available' => 'required|boolean',
    ]);

    $computer->update($validated);

    return redirect()->route('computers.index')->with('success', 'Máy tính đã được cập nhật!');
}


}

