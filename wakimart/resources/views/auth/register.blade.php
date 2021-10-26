@extends('layouts.app')

@section('pageTitle', 'Koffiesoft')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <form method="GET" action="{{ url('restregister') }}" accept-charset="UTF-8">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hp" class="col-md-4 col-form-label text-md-right">Hp</label>

                            <div class="col-md-6">
                                <input id="hp" type="text" class="form-control " name="hp" value="{{ old('hp') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control " name="firstname" value="{{ old('firstname') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control " name="lastname" value="{{ old('lastname') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="grup" class="col-md-4 col-form-label text-md-right">Grup</label>

                            <div class="col-md-6">
                            <select name="grup" id="grup" class="form-control">
                                <option value="ua">User Account</option>
                                <option value="member">Member</option>
                                <option value="mitra">Mitra</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
