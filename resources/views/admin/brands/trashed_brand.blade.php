@extends('admin.layouts.admin')
@section('title')
    برند های حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.brands.trashed-brand />
            </div>
        </div>
    </section>
@endsection
