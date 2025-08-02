@extends('layouts.master')

@section('title', 'لیست عمل ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.insurances.index') }}">لیست عمل ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ویرایش عمل</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.operations.update', $operation->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="control-label">نام عمل <span class="text-danger">&starf;</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="نام عمل را اینجا وارد کنید" value="{{ old('name', $operation->name) }}" required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="price" class="control-label">قیمت (تومان) <span class="text-danger">&starf;</span></label>
                                    <input type="text" class="form-control comma" min="1" name="price" id="price" placeholder="قیمت را اینجا وارد کنید" value="{{ old('price', $operation->price) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" @checked(old('status', $operation->status))>
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
