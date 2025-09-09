@extends('admin.layouts.admin')
@section('title')
    مجوز ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.permissions.permissions/>
            </div>
        </div>
    </section>
@endsection
