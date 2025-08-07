@extends('admin.layouts.admin')

@section('title')
    create blog
@endsection

@section('script')
{{-- <script src="https://cdn.ckbox.io/CKBox/2.1.0/ckbox.js"></script>
<script src="{{asset('assets/ckjs/configuration-dialog.js')}}"></script> --}}
{{-- <script src="{{asset('assets/ckjs/script.js')}}"></script> --}}
<script src="{{asset('assets/ckjs/ckeditor.js')}}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('.editor'), {

            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    'code',
                    'codeBlock',
                    'fontBackgroundColor',
                    'fontColor',
                    'fontSize',
                    'highlight'
                ]
            },
            language: 'fa',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side',
                    'linkImage'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',


        })
        .then(editor => {
            window.editor = editor;








        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: fotmady28o1t-fx1wlfayz8ed');
            console.error(error);
        });


        // Show File Name
        $('#primary_image').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });
</script>

<style>
    .ck .ck-content{
        height: 200px;
    }
</style>

<script>

        // Show File Name
        $('#primary_image').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });
</script>

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

            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="title">نام مقاله</label>
                        <input class="form-control" id="title" name="title" type="text" {{ old('title') }}>
                    </div>

                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر اصلی </label>
                    <div class="custom-file">
                        <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                        <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="brand_id">برند</label>
                    <select id="brandSelect" name="brand_id" class="form-control" data-live-search="true">
                        <option value="0"></option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="description">متن مقاله</label>
                    <textarea name="description" id="my_editor" class="editor">
                    </textarea>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

        </div>

    </div>




<style>
    .ck .ck-content{
        height: 200px;
    }
</style>



@endsection
