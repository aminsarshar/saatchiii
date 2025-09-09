@extends('admin.layouts.admin')
@section('title')
    بنر ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.banners.banners/>
            </div>
        </div>
    </section>
@endsection
