@extends('layouts.profile')

@section('header')

    <div class="card-header">
        Profile <br>
    </div>

@endsection

@section('profile')

    <form method="POST" action="">
        @csrf

        {{--Typing Surname--}}
        <div class="form-group row">
            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                @if ($errors->has('surname'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row " >
            <div class="d-block my-3" style="margin-left: auto; margin-right: auto" >
                <button type="submit" class="btn btn-primary">
                    {{ __('Send information') }}
                </button>
            </div>
        </div>


    </form>


@endsection
