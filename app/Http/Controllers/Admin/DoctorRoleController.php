<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorRoleUpdateRequest;
use App\Models\DoctorRole;
use App\Models\Speciality;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DoctorRoleController extends Controller
{
    public function index(): View
    {
        $doctorRoles = DoctorRole::query()->latest('id')->paginate();
        $sumQuota = DoctorRole::getSumQuota();

        return view('admin.doctor_role.index', compact('doctorRoles', 'sumQuota'));
    }

    public function edit(DoctorRole $doctorRole): View
    {
        return view('admin.doctor_role.edit', compact('doctorRole'));
    }

    public function update(DoctorRoleUpdateRequest $request, DoctorRole $doctorRole): RedirectResponse
    {
        $doctorRole->update($request->validated());

        return redirect()->route('admin.doctor-roles.index')
            ->with('success', 'نقش پزشک با موفقیت به روزرسانی شد.');
    }
}
