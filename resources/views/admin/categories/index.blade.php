@extends('admin.layouts.admin')
@section('title')
    دسته بندی ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.categories.categories/>
            </div>
        </div>
    </section>
@endsection
