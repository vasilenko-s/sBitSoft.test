@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{--вывод ошибок валидации--}}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>


                    </div>
                @endif

                <div class="card">

                    {{--Header--}}
                    @yield('header')
                    {{--End Header--}}



                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                            {{--echo relative to account type--}}
                        <br>Your account type is <span style="color: green"> {{ explode('\\', Auth::user()->userable_type)[1] }} </span>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection