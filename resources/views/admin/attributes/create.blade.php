{{-- @extends('admin.layouts.admin')

@section('title')
    create attributes
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد ویژگی</h5>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form action="{{ route('admin.attributes.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text" {{ old('name') }}>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.attributes.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection --}}

@extends('admin.layouts.admin')
 @section('title')
 ایجاد ویژگی محصول
 @endsection
 @section('content')
     <section id="hidden-label-form-layouts">

         <div class="row match-height">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <div class="card-title-wrap bar-success">
                             <h4 class="card-title">ساخت ویژگی محصول</h4>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="px-3">
                             <form class="form" novalidate method="POST" action="{{ route('admin.attributes.store') }}"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-body">
                                     <div class="row">
                                         <div class="form-group col-md-6 mb-2">
                                             <div class="controls">
                                             <label class="sr-only" for="projectinput2">نام ویژگی محصول</label>
                                             <input type="text" placeholder="نام ویژگی محصول" name="name" type="text" {{ old('name') }} class="form-control" required data-validation-required-message="فیلد نام ویژگی محصول الزامی است">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-actions">
                                     <button type="button" class="btn btn-danger mr-1">
                                         <a class="text-white" href="{{ route('admin.attributes.index') }}"><i class="icon-back"></i> بازگشت</a>
                                     </button>
                                     <button type="submit" class="btn btn-success">
                                         <i class="icon-note"></i> ذخیره
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

