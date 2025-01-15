<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- เชื่อม CSS -->
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    
    <title>ยินต้อนรับเข้าสู่ระบบ</title>
</head>

<body>
<div class="login">
    <img src="https://cdn.pixabay.com/photo/2020/10/01/17/11/store-5619201_1280.jpg" alt="login image" class="login__img">

    <!-- แก้ไข form action ให้ส่งข้อมูลไปยัง route login -->
    <form action="{{ route('login') }}" method="POST" class="login__form">
        @csrf <!-- เพิ่ม CSRF Token -->
        <h1 class="login__title">Login</h1>

        <div class="login__content">
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input type="email" style="display:none">
                    <input type="email" name="email" required class="login__input" id="login-email" placeholder=" " autocomplete="off">
                    <label for="login-email" class="login__label">Email</label>
                </div>
            </div>

            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" name="password" required class="login__input" id="login-pass" placeholder=" ">
                    <label for="login-pass" class="login__label">Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>

                <!-- แสดงข้อความแจ้งเตือนสำหรับช่องรหัสผ่าน -->
                @error('password')
                <span class="error-message" style="color: red; font-size: 0.875rem;">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="login__check">
            <div class="login__check-group">
                <input type="checkbox" name="remember" class="login__check-input" id="login-check">
                <label for="login-check" class="login__check-label">Remember me</label>
            </div>
        </div>

        <div class="bt">
            <button type="submit" class="login__button">Login</button>
        </div>

        <!-- เพิ่มส่วนแสดงข้อความแจ้งเตือนทั่วไป -->
        @if($errors->any())
        <div class="alert alert-danger" style="color: red; margin-bottom: 1rem;">
            <strong>เกิดข้อผิดพลาด:</strong> {{ $errors->first() }}
        </div>
        @endif

    </form>
</div>

<!--=============== MAIN JS ===============-->
<script>
    /*=============== SHOW HIDDEN - PASSWORD ===============*/
    const showHiddenPass = (loginPass, loginEye) => {
        const input = document.getElementById(loginPass),
            iconEye = document.getElementById(loginEye)

        iconEye.addEventListener('click', () => {
            // Change password to text
            if (input.type === 'password') {
                // Switch to text
                input.type = 'text'

                // Icon change
                iconEye.classList.add('ri-eye-line')
                iconEye.classList.remove('ri-eye-off-line')
            } else {
                // Change to password
                input.type = 'password'

                // Icon change
                iconEye.classList.remove('ri-eye-line')
                iconEye.classList.add('ri-eye-off-line')
            }
        })

    }

    showHiddenPass('login-pass', 'login-eye')

    // ซ่อนข้อความแจ้งเตือนเมื่อผู้ใช้เริ่มพิมพ์ใหม่
    const passwordInput = document.getElementById('login-pass');
    const emailInput = document.getElementById('login-email');

    passwordInput.addEventListener('input', () => {
        const errorMessage = passwordInput.closest('.login__box').querySelector('.error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    });

    emailInput.addEventListener('input', () => {
        const errorMessage = emailInput.closest('.login__box').querySelector('.error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    });
</script>
</body>
</html>
