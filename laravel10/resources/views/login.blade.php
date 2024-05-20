<!-- resources/views/auth/login.blade.php -->

@extends('layouts.master')

@section('main-content')
    <div class="container">
        <div class="col-md-12">
            <div class="form-appl">
                <div class="title-class">
                    <h2>Login</h2>
                </div>
                <div class="error" id="message"></div>

                <form id="frmLogin" class="frmAppl">
                    @csrf
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Your Email</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group col-md-12 mb-5">
                        <label for="">Password</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Enter Your Password">
                    </div>
                    <button type="submit" id="loginBtn" class="btn btn-primary">Login</button>
                    <a class="btn btn-danger" href="{{ route('applications.list') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="showMsg">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <h4>Thank you for submitting the form</h4>
                </div>
                <div class="modal-footer" style="border: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("js")
<script>
    $("#frmLogin").on("submit", function(event) {
        event.preventDefault();
        var error_ele = document.getElementsByClassName('err-msg');
        if (error_ele.length > 0) {
            for (var i=error_ele.length-1;i>=0;i--){
                error_ele[i].remove();
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('login') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $("#loginBtn").prop('disabled', true);
            },
            success: function(data) {
                // Handle success response
                console.log(data);
            },
            error: function (err) {
                // Handle error response
                console.log(err);
            },
            complete: function() {
                $("#loginBtn").prop('disabled', false);
            }
        });
    });
</script>
@endpush
