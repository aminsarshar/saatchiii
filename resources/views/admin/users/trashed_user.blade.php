@extends('admin.layouts.admin')
@section('title')
    کاربران حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.users.trashed-user />
            </div>
        </div>
    </section>
@endsection



