@extends('layouts.app')

@section('content')

@section('title')
    <title>Profilim</title>
@endsection

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Profilim /</span> {{ auth()->user()->name }}
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="formAccountSettings">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" 
                                alt="user-avatar" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Şəkil yüklə</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Resetlə</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="user_name" class="form-label">İstifadəçi adı</label>
                            <input name="user_name" value="{{ auth()->user()->name }}" class="form-control" 
                                type="text" id="user_name" placeholder="İsitfadəçi adı"
                                autofocus required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input name="email" value="{{ auth()->user()->email }}"  class="form-control" type="text" 
                                id="email"  placeholder="E-mail"
                                placeholder="john.doe@example.com" required/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="current_password" class="form-label">Cari Parol</label>
                            <input name="current_password" class="form-control" type="password"
                                id="current_password" placeholder="............" 
                                required/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Yeni Parol</label>
                            <input name="password" class="form-control" type="password" 
                                id="password" placeholder="............" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">Təkrar Parol</label>
                            <input name="password_confirmation" class="form-control" 
                                type="password" id="password_confirmation" 
                                placeholder="............" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Yadda saxla</button>
                        <a href="{{ route('profile.index') }}" 
                            class="btn btn-label-secondary">
                            Ləğv et
                        </a>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>

@endsection
