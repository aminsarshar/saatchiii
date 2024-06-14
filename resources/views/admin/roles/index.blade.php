@extends('admin.layouts.admin')
@section('title')
    نقش ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.roles.roles/>
            </div>
        </div>
    </section>
@endsection

