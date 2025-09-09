@extends('admin.layouts.admin')
@section('title')
    ویرایش تگ
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش تگ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">

                            <form action="{{ route('admin.tags.update', ['tag' => $tag->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">نام تگ</label>
                                        <input @error('name') style="border: 1px solid red;" @enderror
                                            @error('name') placeholder="نام تگ الزامی است" @enderror
                                            class="form-control" name="name" type="text" value="{{ $tag->name }}">
                                        @error('name')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.tags.index') }}"><i
                                                class="icon-trash"></i> لغو</a>
                                    </button>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="icon-note"></i> ویرایش
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
