@extends('admin.layouts.admin')
@section('title')
    ویژگی های محصول
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.attributes.attributes/>
            </div>
        </div>
    </section>
@endsection
