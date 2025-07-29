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
                    <h3 class="card-title">ویرایش تخصص</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.specialities.update', $speciality->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col">
                               <div class="form-group">
                                   <label for="title">عنوان تخصص</label>
                                   <input type="text" id="title" name="title" class="form-control" value="{{ $speciality->title }}" required>
                               </div>
                            </div>
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" @checked($speciality->status)>
                                    <label class="form-check-label" for="status">
                                        فعال
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">ویرایش تخصص</button>
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
