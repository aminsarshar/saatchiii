@extends('admin.layouts.admin')
@section('title')
    تگ ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.tags.tags/>
            </div>
        </div>
    </section>
@endsection



