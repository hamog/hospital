@extends('layouts.master')

@section('title', 'لیست دکتر ها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست دکتر ها</h3>
                    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-end">ثبت دکتر جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>موبایل</th>
                            <th>کد ملی</th>
                            <th>کد نظام پزشکی</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->mobile }}</td>
                                    <td>{{ $doctor->national_code }}</td>
                                    <td>{{ $doctor->medical_number }}</td>
                                    <td>
                                        @if($doctor->status)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ verta($doctor->created_at)->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.doctors.edit', $doctor->id) }}" role="button">
                                            ویرایش
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $doctor->id }}')">
                                            حذف
                                        </button>
                                        <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="post" id="delete-{{ $doctor->id }}">
                                            @csrf
                                            @method('delete')

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $doctors->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

