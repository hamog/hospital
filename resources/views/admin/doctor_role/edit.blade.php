@extends('layouts.master')

@section('title', 'لیست نقش پزشک ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.specialities.index') }}">لیست نقش پزشک ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ویراش نقش پزشک</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.doctor-roles.update', $doctorRole->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col">
                               <div class="form-group">
                                   <label for="title">عنوان</label>
                                   <input type="text" id="title" name="title" class="form-control" value="{{ $doctorRole->title }}" required>
                               </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="quota">سهم پزشک</label>
                                    <input type="text" id="quota" name="quota" class="form-control" value="{{ $doctorRole->quota }}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="required" type="checkbox" value="1" id="required" @checked($doctorRole->required)>
                                    <label class="form-check-label" for="required">
                                        الزامی بودن
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">ویرایش نقش پزشک</button>
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
