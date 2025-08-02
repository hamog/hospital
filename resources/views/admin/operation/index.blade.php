@extends('layouts.master')

@section('title', 'لیست عمل ها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست عمل ها</h3>
                    <a href="{{ route('admin.operations.create') }}" class="btn btn-primary float-end">ثبت عمل جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام عمل</th>
                            <th>قیمت (تومان)</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($operations as $operation)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $operation->name }}</td>
                                    <td>{{ number_format($operation->price) }}</td>
                                    <td>
                                        @if($operation->status)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ verta($operation->created_at)->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.operations.edit', $operation->id) }}" role="button">
                                            ویرایش
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $operation->id }}')">
                                            حذف
                                        </button>
                                        <form action="{{ route('admin.operations.destroy', $operation->id) }}" method="post" id="delete-{{ $operation->id }}">
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
                    {{ $operations->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

