<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Generations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class GenerationsController extends Controller
{
    public function index() {
        $generations = Generations::get();
        return view('backend.buku.index', compact('generations'));
    }

    public function create()
    {
        $generations = Generations::get();
        return view('backend.buku.create', compact('generations'));
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('backend.manage.user')->with('error', 'The ID is empty!');
        } else {
            $generations = Generations::find($id);

            if ($generations) {
                return view('backend.buku.edit', compact('generations'));
            } else {
                return redirect()->route('backend.manage.user')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        request()->validate([
            'year'         => [
                'required',
                'unique:generations,year,'.$request->id,
            ]
        ]);

        $generations = Generations::find($request->id);


        Generations::where('id', $request->id)
            ->update(([
                'year'         => $request->year,
            ]));

        return redirect()->route('backend.manage.user')->with('success', 'Item Edited Successfully');

    }


    public function create_process(Request $request)
    {
        request()->validate([
            'year'         => [
                'required',
                'unique:generations',
            ]
        ]);
        Generations::create([
            'year'         => $request->year,
        ]);

        return redirect()
            ->route('backend.manage.user')
            ->with('success', 'Item Created Successfully');

    }

    public function destroy($id)
    {
        $generations = Generations::find($id);

        $generations->delete();

        return redirect()->route('backend.manage.user')->with('success', 'Item Deleted Successfully');
    }
}
