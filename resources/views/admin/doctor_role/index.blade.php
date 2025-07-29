@extends('layouts.master')

@section('title', 'لیست نقش پزشک ها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست نقش پزشک ها</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if($sumQuota != 100)
                        <div class="alert alert-danger" role="alert">
                            <strong>مجموع سهم پزشکان باید 100 درصد باشد!</strong>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان نقش پزشک</th>
                            <th>درصد سهم</th>
                            <th>الزامی بودن</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($doctorRoles as $doctorRole)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctorRole->title }}</td>
                                    <td>{{ $doctorRole->quota }}</td>
                                    <td>
                                        @if($doctorRole->required)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ verta($doctorRole->created_at)->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.doctor-roles.edit', $doctorRole->id) }}" role="button">
                                            ویرایش
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $doctorRoles->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

