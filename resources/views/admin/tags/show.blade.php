@extends('admin.layouts.admin')
@section('title')
    نمایش تگ
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h5 class="font-weight-bold"> نمایش تگ {{ $tag->title }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.tags.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نام تگ</label>
                                                <input class="form-control" type="text" placeholder="نام تگ"
                                                    name="name" type="text" value="{{ $tag->name }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">تاریخ ایجاد</label>
                                                <input class="form-control" type="text" placeholder="تاریخ ایجاد"
                                                    name="name" type="text"
                                                    value="{{ verta($tag->created_at)->format('%d  %B   %Y') }}" disabled>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.tags.index') }}"><i
                                                class="icon-back"></i> بازگشت</a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
