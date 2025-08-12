@extends('admin.layouts.admin')
@section('title')
    تگ های حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.tags.trashed-tag />
            </div>
        </div>
    </section>
@endsection



