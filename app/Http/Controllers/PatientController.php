<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['collections'] = Patient::with('hospital')->latest()->paginate(10);
        return view('patient.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.form')->with('collection', new Patient());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        Patient::create($request->validated());

        return redirect()->route('patient.index')->with('success', 'Patient created successfully!');
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
    public function edit(Patient $patient)
    {
        return view('patient.form')->with('collection', $patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());
        return redirect()->route('patient.index')->with('success', 'Patient edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Patient::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['success' => 'Item deleted successfully!']);
        } else {
            return response()->json(['error' => 'Item not found!'], 404);
        }
    }
}
