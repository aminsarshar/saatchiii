@extends('admin.layouts.admin')
@section('title')
    کد های تخفیف
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.coupons.coupons/>
            </div>
        </div>
    </section>
@endsection
