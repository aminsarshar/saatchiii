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
