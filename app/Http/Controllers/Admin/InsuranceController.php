<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InsuranceStoreRequest;
use App\Http\Requests\Admin\InsuranceUpdateRequest;
use App\Models\Insurance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InsuranceController extends Controller
{
    public function index(): View
    {
        $insurances = Insurance::query()->latest('id')->paginate();

        return view('admin.insurance.index', compact('insurances'));
    }

    public function create(): View
    {
        return view('admin.insurance.create');
    }

    public function store(InsuranceStoreRequest $request): RedirectResponse
    {
        Insurance::query()->create($request->validated());

        return redirect()->route('admin.insurances.index')
            ->with('success', 'بیمه با موفقیت ثبت شد.');
    }

    public function edit(Insurance $insurance): View
    {
        return view('admin.insurance.edit', compact('insurance'));
    }

    public function update(InsuranceUpdateRequest $request, Insurance $insurance): RedirectResponse
    {
        $insurance->update($request->validated());

        return redirect()->route('admin.insurances.index')
            ->with('success', 'بیمه با موفقیت به روزرسانی شد.');
    }

    public function destroy(Insurance $insurance): RedirectResponse
    {
        $insurance->delete();

        return redirect()->route('admin.insurances.index')
            ->with('success', 'بیمه با موفقیت حذف شد.');
    }
}
