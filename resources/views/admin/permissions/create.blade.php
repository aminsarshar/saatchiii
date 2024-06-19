{{-- @extends('admin.layouts.admin')

@section('title')
    create permissions
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد مجوز</h5>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form action="{{ route('admin.permissions.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام نمایشی</label>
                        <input class="form-control" name="display_name" type="text" {{ old('display_name') }}>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" type="text" {{ old('name') }}>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection

 --}}


 @extends('admin.layouts.admin')
 @section('title')
 ایجاد مجوز
 @endsection
 @section('content')
     <section id="hidden-label-form-layouts">

         <div class="row match-height">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <div class="card-title-wrap bar-success">
                             <h4 class="card-title">ساخت مجوز</h4>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="px-3">
                             <form class="form" novalidate method="POST" action="{{ route('admin.permissions.store') }}"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-body">
                                     <div class="row">
                                         <div class="form-group col-md-6 mb-2">
                                             <div class="controls">
                                             <label class="sr-only" for="projectinput2">نام مجوز</label>
                                             <input type="text" placeholder="نام مجوز" name="name" type="text" {{ old('name') }} class="form-control" required data-validation-required-message="فیلد نام مجوز الزامی است">
                                             </div>
                                         </div>

                                         <div class="form-group col-md-6 mb-2">
                                             <div class="controls">
                                             <label class="sr-only" for="projectinput2">نام نمایشی مجوز</label>
                                             <input type="text" placeholder="نام نمایشی مجوز" name="display_name" type="text" {{ old('display_name') }} class="form-control" required data-validation-required-message="فیلد نام نمایشی مجوز الزامی است">
                                             </div>
                                         </div>
                                     </div>


                                 </div>

                                 <div class="form-actions">
                                     <button type="button" class="btn btn-danger mr-1">
                                         <a class="text-white" href="{{ route('admin.permissions.index') }}"><i class="icon-back"></i> بازگشت</a>
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
