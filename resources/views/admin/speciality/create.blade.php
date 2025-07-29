@extends('layouts.master')

@section('title', 'لیست تخصص ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.specialities.index') }}">لیست تخصص ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ثبت تخصص</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.specialities.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                               <div class="form-group">
                                   <label for="title">عنوان تخصص</label>
                                   <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                               </div>
                            </div>
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" checked>
                                    <label class="form-check-label" for="status">
                                        فعال
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">ثبت تخصص</button>
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
