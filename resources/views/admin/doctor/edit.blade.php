@extends('layouts.master')

@section('title', 'لیست دکتر ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.doctors.index') }}">لیست دکتر ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ویرایش دکتر</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="control-label">نام و نام خانوادگی <span class="text-danger">&starf;</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="نام و نام خانوادگی را اینجا وارد کنید" value="{{ old('name', $doctor->name) }}" required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="speciality_id">تخصص</label>
                                    <select name="speciality_id" id="speciality_id" class="form-control" required>
                                        <option value="" class="text-muted">-- یک تخصص را انتخاب کنید --</option>
                                        @foreach($specialities as $speciality)
                                            <option value="{{ $speciality->id }}" @selected(old('speciality_id', $doctor->speciality_id) == $speciality->id)>{{ $speciality->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="mobile" class="control-label">شماره موبایل <span class="text-danger">&starf;</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="شماره موبایل را اینجا وارد کنید" value="{{ old('mobile', $doctor->mobile) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="national_code" class="control-label">کد ملی</label>
                                    <input type="text" class="form-control" name="national_code" id="national_code" placeholder="کد ملی را اینجا وارد کنید" value="{{ old('national_code', $doctor->national_code) }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="medical_number" class="control-label">کد نظام پزشکی</label>
                                    <input type="text" class="form-control" name="medical_number" id="medical_number" placeholder="کد نظام پزشکی را اینجا وارد کنید" value="{{ old('medical_number', $doctor->medical_number) }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="password"  class="control-label">کلمه عبور</label>
                                    <input class="form-control" id="password" placeholder="کلمه عبور را اینجا وارد کنید" name="password" type="password">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="password_confirmation"  class="control-label">تکرار کلمه عبور</label>
                                    <input class="form-control" id="password_confirmation" placeholder="تکرار کلمه عبور را اینجا وارد کنید" name="password_confirmation" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="doctor_roles" class="control-label">نقش پزشک</label>
                                    <span class="text-danger">&starf;</span>
                                    <select class="form-control" name="doctor_roles[]" id="doctor_roles" required multiple>
                                        @foreach($doctorRoles as $doctorRole)
                                            <option value="{{ $doctorRole->id }}" @selected(in_array($doctorRole->id, old('doctor_roles', $doctor->roles->pluck('id')->toArray())))>{{ $doctorRole->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" @checked(old('status', $doctor->status))>
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
