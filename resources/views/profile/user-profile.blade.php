@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- //! 2FA -->
            @include('profile.two-factor')
            <!-- //! Profile Info -->
            @include('profile.edit')
            <!-- //! Password -->
            @include('profile.password')

        </div>
    </div>
</div>
@endsection