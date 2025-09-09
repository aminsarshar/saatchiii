@extends('admin.layouts.admin')
@section('title')
    محصولات
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.products.trashed-product />
            </div>
        </div>
    </section>
@endsection



