@extends('layouts.master')

@section('title', 'لیست دسته بندی ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">لیست دسته بندی ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ثبت دسته بندی</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col">
                               <div class="form-group">
                                   <label for="name">نام دسته بندی</label>
                                   <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
                               </div>
                            </div>
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" @checked($category->status)>
                                    <label class="form-check-label" for="status">
                                        فعال
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">ویرایش دسته بندی</button>
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
