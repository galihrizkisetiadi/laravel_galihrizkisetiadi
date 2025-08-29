<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalRequest;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Hospital::latest()->paginate(5);
        return view('hospital.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospital.form')->with('collection', new Hospital());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HospitalRequest $request)
    {

        Hospital::create($request->validated());

        return redirect()->route('hospital.index')->with('success', 'Hospital created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        return view('hospital.form')->with('collection', $hospital);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HospitalRequest $request, Hospital $hospital)
    {
        $hospital->update($request->validated());
        return redirect('/hospital');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Hospital::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['success' => 'Item deleted successfully!']);
        } else {
            return response()->json(['error' => 'Item not found!'], 404);
        }
    }
}
