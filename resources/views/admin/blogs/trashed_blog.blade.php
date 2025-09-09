@extends('admin.layouts.admin')
@section('title')
    مقالات حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.blogs.trashed-blog />
            </div>
        </div>
    </section>
@endsection



