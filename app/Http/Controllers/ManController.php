<?php

namespace App\Http\Controllers;

use App\Models\Man;
use Illuminate\Http\Request;

class ManController extends Controller
{
    public function index(Request $request)
    {
        $query = Man::query();

        if ($request->filled(['start_date', 'end_date'])) {
            $query->whereBetween('birthday', [$request->start_date, $request->end_date]);
        }

        $mans = $query->get();
        return view('man.index', compact('mans'));
    }

    public function create()
    {
        return view('man.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mans',
            'birthday' => 'required|date',
        ]);

        Man::create($request->only('name', 'email', 'birthday'));

        return redirect()->route('man.index');
    }

    public function edit(Man $man)
    {
        return view('man.edit', compact('man'));
    }

    public function update(Request $request, Man $man)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mans,email,' . $man->id,
            'birthday' => 'required|date',
        ]);

        $man->update($request->only('name', 'email', 'birthday'));
        return redirect()->route('man.index');
    }

    public function destroy(Man $man)
    {
        $man->delete();
        return redirect()->route('man.index');
    }
}
