@extends('layouts.master')

@section('title', 'لیست بیمه ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.insurances.index') }}">لیست بیمه ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ویرایش بیمه</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.insurances.update', $insurance->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="control-label">نام بیمه <span class="text-danger">&starf;</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="نام بیمه را اینجا وارد کنید" value="{{ old('name', $insurance->name) }}" required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="type" class="control-label">نوع بیمه</label>
                                    <span class="text-danger">&starf;</span>
                                    <select class="form-control" name="type" id="type" required>
                                        <option class="text-muted">-- نوع بیمه مورد نظر را انتخاب کنید --</option>
                                        <option value="basic" @selected(old('type', $insurance->type) == 'basic')>{{ __('app.basic') }}</option>
                                        <option value="supplementary" @selected(old('type', $insurance->type) == 'supplementary')>{{ __('app.supplementary') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="discount" class="control-label">درصد تخفیف <span class="text-danger">&starf;</span></label>
                                    <input type="number" class="form-control" min="1" max="99" name="discount" id="discount" placeholder="درصد تخفیف را اینجا وارد کنید" value="{{ old('discount', $insurance->discount) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" @checked(old('status', $insurance->status))>
                                    <label class="form-check-label" for="status">
                                        فعال
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">به روزرسانی</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
