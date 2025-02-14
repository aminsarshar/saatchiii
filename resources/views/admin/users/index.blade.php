@extends('admin.layouts.admin')
@section('title')
    کاربران
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.users.users />
            </div>
        </div>
    </section>
@endsection
