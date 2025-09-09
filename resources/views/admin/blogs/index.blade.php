@extends('admin.layouts.admin')
@section('title')
    مقالات
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.blogs.blogs/>
            </div>
        </div>
    </section>
@endsection
