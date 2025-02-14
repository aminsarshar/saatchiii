@extends('admin.layouts.admin')
@section('title')
    دسته بندی ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.categoryblogs.categoryblogs />
            </div>
        </div>
    </section>
@endsection
