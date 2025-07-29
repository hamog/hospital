@extends('layouts.master')

@section('title', 'لیست دسته بندی ها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست دسته بندی ها</h3>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-end">ثبت دسته بندی جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته بندی</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if($category->status)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.categories.edit', $category->id) }}" role="button">
                                            ویرایش
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $category->id }}')">
                                            حذف
                                        </button>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" id="delete-{{ $category->id }}">
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
                    {{ $categories->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

