<!-- resources/views/auth/register.blade.php -->

<form id="registrationForm">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Register</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#registrationForm').submit(function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('register') }}",
                type: 'POST',
                data: formData,
                success: function(response){
                    console.log(response);
                    // handle success response
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                    // handle error response
                }
            });
        });
    });
</script>
