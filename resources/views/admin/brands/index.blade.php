@extends('admin.layouts.admin')
@section('title')
    برند ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.brands.brands/>
            </div>
        </div>
    </section>
@endsection
