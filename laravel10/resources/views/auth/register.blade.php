@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="registerForm">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter your name') }}">
                            <span class="text-danger" id="name-error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter your email') }}">
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter your password') }}">
                            <span class="text-danger" id="password-error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm your password') }}">
                            <span class="text-danger" id="password-confirmation-error"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission
            $('#name-error').text('');
            $('#email-error').text('');
            $('#password-error').text('');
            $('#password-confirmation-error').text('');

            var formData = $(this).serialize(); // Serialize form data

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '{{ route("register.post") }}', // Laravel route for registration
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    alert('{{ __("Registration successful!") }}');
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key + '-error').text(value[0]);
                    });
                }
            });
        });
    });
</script>
@endsection
