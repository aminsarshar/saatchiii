@extends('admin.layouts.admin')
@section('title')
    بنر های حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.banners.trashed-banner />
            </div>
        </div>
    </section>
@endsection



