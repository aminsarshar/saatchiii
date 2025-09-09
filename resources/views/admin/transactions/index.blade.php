@extends('admin.layouts.admin')
@section('title')
    تراکنش ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.transactions.transactions/>
            </div>
        </div>
    </section>
@endsection
