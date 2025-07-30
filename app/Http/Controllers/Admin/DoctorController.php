<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorStoreRequest;
use App\Http\Requests\Admin\DoctorUpdateRequest;
use App\Models\Doctor;
use App\Models\DoctorRole;
use App\Models\Speciality;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function index(): View
    {
        $doctors = Doctor::query()
            ->latest('id')
            ->with('speciality:id,title')
            ->paginate();

        return view('admin.doctor.index', compact('doctors'));
    }

    public function create(): View
    {
        $specialities = Cache::rememberForever('specialities', function () {
            return Speciality::query()->latest('id')->where('status', 1)->get(['id', 'title']);
        });
        $doctorRoles = Cache::rememberForever('doctorRoles', function () {
            return DoctorRole::query()->latest('id')->get(['id', 'title']);
        });

        return view('admin.doctor.create', compact('specialities', 'doctorRoles'));
    }

    public function store(DoctorStoreRequest $request): RedirectResponse
    {
        $speciality = Speciality::query()->find($request->input('speciality_id'));
        $doctor = $speciality->doctors()->create($request->validated());

        foreach ($request->input('doctor_roles') as $doctorRoleId) {
            $doctor->roles()->attach($doctorRoleId);
        }

        return redirect()->route('admin.doctors.index')
            ->with('success', 'دکتر با موفقیت ثبت شد.');
    }

    public function edit(Doctor $doctor): View
    {
        $specialities = Cache::rememberForever('specialities', function () {
            return Speciality::query()->latest('id')->where('status', 1)->get(['id', 'title']);
        });
        $doctorRoles = Cache::rememberForever('doctorRoles', function () {
            return DoctorRole::query()->latest('id')->get(['id', 'title']);
        });

        return view('admin.doctor.edit', compact('specialities', 'doctor', 'doctorRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor): RedirectResponse
    {
        $doctor->update($request->validated());
        $doctor->roles()->sync($request->input('doctor_roles'));

        return redirect()->route('admin.doctors.index')
            ->with('success', 'دکتر با موفقیت به روزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor): RedirectResponse
    {
        $doctor->delete();

        return redirect()->route('admin.doctors.index')
            ->with('success', 'دکتر با موفقیت حذف شد.');
    }
}
