@extends('main')
@section('content')
    <form class="needs-validation" method="post">
        {{csrf_field()}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Name</label>
                <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Full name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Email</label>
                <input type="email" name="email" class="form-control" id="validationCustom02" placeholder="Email"  required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom04">Password</label>
                    <input type="password" name="password" class="form-control" id="validationCustom04" placeholder="Password" required>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
