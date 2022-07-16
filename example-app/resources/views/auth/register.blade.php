@extends('layouts.admin')

@section('content')


<div class="row pt-4">
    <div class="col-12 col-xl-12">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Criar Administrador</h2>
            <form role="form" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="center">
                    <div class="col-md-4 mb-3">
                        <label for="name">Nome</label>
                            <div class="input-group">
                                <input id="name" type="text" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-3">
                                            <div>
                                                <label for="password">Password</label>
                                                    <div class="input-group">
                                                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>
                                                <label for="confirm_password">Confirme a Password</label>
                                                <div class="input-group">
                                                        <input id="password-confirm" placeholder="Password "type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-13 mb-3">
                                        <div class="mt-3 ">
                                            <button type="submit" class="btn btn-primary" style="float:right">
                                                {{ __('Registar') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
