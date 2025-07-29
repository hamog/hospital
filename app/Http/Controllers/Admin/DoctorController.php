<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorStoreRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function index(): View
    {
        $doctors = Doctor::query()
            ->latest('id')
            ->with('speciality:id,name')
            ->paginate();

        return view('admin.doctor.index', compact('doctors'));
    }

    public function create(): View
    {
        return view('admin.doctor.create');
    }

    public function store(DoctorStoreRequest $request)
    {
        //
    }

    public function edit(Doctor $doctor): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
