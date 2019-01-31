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



        {{--Chosing Professional Category--}}
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Choose your professional category:') }}</label>

            <div class="d-block my-3" style="margin-left: auto; margin-right: auto" >
                <div class="custom-control custom-radio">
                    <input id="High" value="High" name="category" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="High">High</label>
                </div>

                <div class="custom-control custom-radio">
                    <input id="First" value="First" name="category" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="First">First</label>
                </div>

                <div class="custom-control custom-radio">
                    <input id="Second" value="Second" name="category" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="Second">Second</label>
                </div>
            </div>
        </div>


        {{-- Typing Subjects --}}

        <div class="form-group row">
            <label for="subject" class="col-md-4 col-form-label text-md-right">Subjects</label>

                <div class="d-block my-3" style="margin-left: auto; margin-right: auto" >
                    <select class="custom-select d-block w-100 " id="subject[]" name="subject[]" multiple required>
                        <option value="" disabled>Choose...</option>

                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}"> {{ $subject->name }} </option>
                        @endforeach

                    </select>
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