@extends('layouts.master')

@section('title', 'لیست بیمه ها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست بیمه ها</h3>
                    <a href="{{ route('admin.insurances.create') }}" class="btn btn-primary float-end">ثبت بیمه جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام بیمه</th>
                            <th>نوع</th>
                            <th>درصد تخفیف</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($insurances as $insurance)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $insurance->name }}</td>
                                    <td>{{ __('app.' . $insurance->type) }}</td>
                                    <td>{{ $insurance->discount }}</td>
                                    <td>
                                        @if($insurance->status)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ verta($insurance->created_at)->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.insurances.edit', $insurance->id) }}" role="button">
                                            ویرایش
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $insurance->id }}')">
                                            حذف
                                        </button>
                                        <form action="{{ route('admin.insurances.destroy', $insurance->id) }}" method="post" id="delete-{{ $insurance->id }}">
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
                    {{ $insurances->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

