@extends('admin.layouts.admin')
@section('title')
    ویرایش کاربر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش کاربر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">

                            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">نام</label>
                                        <input @error('name') style="border: 1px solid red;" @enderror @error('name') placeholder="شماره تلفن الزامی است" @enderror  class="form-control" name="name" type="text" value="{{ $user->name }}">
                                        @error('name')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="name">ایمیل</label>
                                        <input @error('email') style="border: 1px solid red;" @enderror @error('email') placeholder="ایمیل الزامی است" @enderror  class="form-control" name="email" type="text" value="{{ $user->email }}">
                                        @error('email')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">شماره تلفن همراه</label>
                                        <input class="form-control" name="cellphone" type="text" value="{{ $user->cellphone }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="role">نقش کاربر</label>
                                        <select class="form-control" name="role" id="role">
                                            <option></option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}" {{ in_array($role->id , $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="accordion col-md-12 mt-3" id="accordionPermission">
                                        <div class="card">
                                            <div class="card-header p-1" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse"
                                                        data-target="#collapsePermission" aria-expanded="true" aria-controls="collapseOne">
                                                        مجوز های دسترسی
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapsePermission" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionPermission">
                                                <div class="card-body row">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-group form-check col-md-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="permission_{{ $permission->id }}" name="{{ $permission->name }}"
                                                                value="{{ $permission->name }}"
                                                                {{ in_array( $permission->id , $user->permissions->pluck('id')->toArray() ) ? 'checked' : '' }}
                                                                >
                                                            <label class="form-check-label mr-3"
                                                                for="permission_{{ $permission->id }}">{{ $permission->display_name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
