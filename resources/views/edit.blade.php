@extends('layouts.main')
@section('content')

    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
        @endforeach
    @endif
    <!-- Default form register -->
        <form class="text-center border border-light p-5" action="{{ route('update', $students->id) }}" method="post">
            @csrf
            <p class="h4 mb-4">Edit Student</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" value="{{ $students->first_name }}" name="first_name" placeholder="First name">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" value="{{ $students->last_name }}" name="last_name" placeholder="Last name">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" value="{{ $students->email }}" name="email" class="form-control mb-4" placeholder="E-mail">


            <!-- Phone number -->
            <input type="text" id="defaultRegisterPhonePassword" class="form-control" value="{{ $students->phone }}" name="phone" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">


            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Update Data</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Default form register -->
    </div>
@endsection