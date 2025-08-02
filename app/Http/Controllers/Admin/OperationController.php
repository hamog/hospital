<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OperationStoreRequest;
use App\Http\Requests\Admin\OperationUpdateRequest;
use App\Models\Operation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OperationController extends Controller
{
    public function index(): View
    {
        $operations = Operation::query()->latest('id')->paginate();

        return view('admin.operation.index', compact('operations'));
    }

    public function create(): View
    {
        return view('admin.operation.create');
    }

    public function store(OperationStoreRequest $request): RedirectResponse
    {
        Operation::query()->create($request->validated());

        return redirect()->route('admin.operations.index')
            ->with('success', 'عمل با موفقیت ثبت شد.');
    }

    public function edit(Operation $operation): View
    {
        return view('admin.operation.edit', compact('operation'));
    }

    public function update(OperationUpdateRequest $request, Operation $operation): RedirectResponse
    {
        $operation->update($request->validated());

        return redirect()->route('admin.operations.index')
            ->with('success', 'عمل با موفقیت به روزرسانی شد.');
    }

    public function destroy(Operation $operation): RedirectResponse
    {
        $operation->delete();

        return redirect()->route('admin.operations.index')
            ->with('success', 'عمل با موفقیت حذف شد.');
    }
}
