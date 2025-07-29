@extends('layouts.master')

@section('title', 'لیست تخصص ها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست تخصص ها</h3>
                    <a href="{{ route('admin.specialities.create') }}" class="btn btn-primary float-end">ثبت تخصص جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان تخصص</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($specialities as $speciality)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $speciality->title }}</td>
                                    <td>
                                        @if($speciality->status)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ $speciality->created_at->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.specialities.edit', $speciality->id) }}" role="button">
                                            ویرایش
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $speciality->id }}')">
                                            حذف
                                        </button>
                                        <form action="{{ route('admin.specialities.destroy', $speciality->id) }}" method="post" id="delete-{{ $speciality->id }}">
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
                    {{ $specialities->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

