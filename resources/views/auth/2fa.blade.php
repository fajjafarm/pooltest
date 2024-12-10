<!DOCTYPE html>
<html lang="en">


<head>
    @include('layouts.partials.title-meta', ['title' => '2FA'])

    @include('layouts.partials.head-css')
</head>

<body class="h-100">


    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <a href="{{ route('second', ['dashboards', 'index']) }}" class="auth-brand mb-3">
                        <img src="/images/logo-dark.png" alt="dark logo" height="24" class="logo-dark">
                        <img src="/images/logo.png" alt="logo light" height="24" class="logo-light">
                    </a>

                    <h3 class="fw-semibold mb-2">Set up your two-factor authentication.</h3>

                    <div class="bg-body-secondary border border-dashed p-3 rounded my-3 text-center">
                        <img src="/images/png/qr-code.png" alt="" class="" height="130">
                        <p class="mt-3 mb-0">Scan this code with your Google authenticator app to continue this process.
                        </p>
                    </div>

                    <form action="{{ route('second', ['dashboards', 'index']) }}" class="text-start mb-3">
                        <label class="form-label" for="code">Verification Code</label>
                        <div class="d-flex gap-2 mt-1 mb-3">
                            <input type="text" maxlength="1" class="form-control text-center">
                            <input type="text" maxlength="1" class="form-control text-center">
                            <input type="text" maxlength="1" class="form-control text-center">
                            <input type="text" maxlength="1" class="form-control text-center">
                            <input type="text" maxlength="1" class="form-control text-center">
                            <input type="text" maxlength="1" class="form-control text-center">
                        </div>
                        <div class="mb-3 d-grid">
                            <button class="btn btn-primary" type="submit">Continue</button>
                        </div>
                        <p class="mb-0 text-center">Don't received code yet? <a href="#!"
                                class="link-primary fw-semibold text-decoration-underline">Send Again</a></p>
                    </form>

                    <p class="text-danger fs-14 mb-4">Back To <a href="{{ route('second', ['dashboards', 'index']) }}"
                            class="fw-semibold text-dark ms-1">Home !</a></p>

                    <p class="mt-auto mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Osen - By <span
                            class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
                    </p>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.partials.footer-scripts')

</body>

</html>
