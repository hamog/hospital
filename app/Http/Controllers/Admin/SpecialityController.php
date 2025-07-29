<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialityStoreRequest;
use App\Http\Requests\Admin\SpecialityUpdateRequest;
use App\Models\Speciality;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SpecialityController extends Controller
{
    public function index(): View
    {
        $specialities = Speciality::query()->latest('id')->paginate();

        return view('admin.speciality.index', compact('specialities'));
    }

    public function create(): View
    {
        return view('admin.speciality.create');
    }

    public function store(SpecialityStoreRequest $request): RedirectResponse
    {
        Speciality::query()->create($request->validated());

        return redirect()->route('admin.specialities.index')
            ->with('success', 'دسته بندی با موفقیت ثبت شد.');
    }

    public function edit(Speciality $speciality): View
    {
        return view('admin.speciality.edit', compact('speciality'));
    }

    public function update(SpecialityUpdateRequest $request, Speciality $speciality): RedirectResponse
    {
        $speciality->update($request->validated());

        return redirect()->route('admin.specialities.index')
            ->with('success', 'دسته بندی با موفقیت به روزرسانی شد.');
    }

    public function destroy(Speciality $speciality): RedirectResponse
    {
        $speciality->delete();

        return redirect()->route('admin.specialities.index')
            ->with('success', 'دسته بندی با موفقیت حذف شد.');
    }
}
