@extends('layouts.Tailwind')
@section('title', 'Login')

@section('content')

<style>
    /* นำเข้าฟอนต์ Inter */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    body {
        font-family: 'Inter', sans-serif;
    }

    /* คอนเทนเนอร์หลัก: จัดเต็มหน้าจอและใช้ Flexbox */
    .login-container {
        /* ใช้ Tailwind min-h-screen แทน min-height: 100vh; */
        min-height: 100vh;
        background-color: #fff;
        /* พื้นหลังสีเข้มคล้ายในรูป */
    }

    /* ส่วนภาพซ้าย: พื้นหลังภาพนิ่งแบบเต็มพื้นที่ */
    .image-side {
        background: url('/GTN.jpg') no-repeat center center;
        background-size: 400px 400px;
        /* ใช้ภาพในสไตล์ Cyberpunk หรือ Cityscape เพื่อให้เข้ากับตัวอย่างภาพของคุณ */
        /* หรือใช้ภาพที่คุณต้องการ: url('CYBERPUNK_CITY_IMAGE_URL') */
        position: relative;
    }

    /* ส่วน Login ขวา: Glassmorphism Effect */
    .login-card {
        background-color: rgba(149, 109, 109, 0.05);
        /* สีพื้นหลังโปร่งใสมาก */
        border: 1px solid rgba(255, 255, 255, 0.997);
        /* เส้นขอบสีขาวจางๆ */
        box-shadow: 0 4px 30px rgba(216, 218, 213, 0.5);
        /* เงาเข้มขึ้น */
        backdrop-filter: blur(15px);
        /* เบลอมากขึ้นเพื่อให้ดูเป็น Glassmorphism ชัดเจน */
        -webkit-backdrop-filter: blur(15px);
        border-radius: 0;
        /* ลบ border-radius ออกสำหรับ split screen */
        padding: 4rem 3rem;

        /* Animation: ให้กล่องดูนิ่ง ไม่ต้อง Float */
        opacity: 0;
        animation: zoomIn 1s ease forwards;
    }

    /* Input Field สไตล์ Glassmorphism */
    .form-input-glass {
        background-color: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        color: #222020;
        border-radius: 9999px;
        padding: 0.75rem 1rem;
        width: 100%;
    }

    .form-input-glass::placeholder {
        color: rgba(197, 195, 195, 0.7);
    }

    .form-input-glass:focus {
        background-color: rgba(255, 255, 255, 0.3);
        border-color: #fff;
        outline: none;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    /* ปุ่ม Login สไตล์เด่น */
    .btn-primary {
        background-color: #4f46e5;
        /* เปลี่ยนปุ่มเป็นสีม่วงเพื่อให้โดดเด่น */
        color: #fff;
        font-weight: bold;
        border-radius: 9999px;
        padding: 0.75rem 1rem;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(79, 70, 229, 0.5);
    }

    .btn-primary:hover {
        background-color: #6366f1;
        /* สีม่วงอ่อนลง */
        transform: scale(1.02);
    }

    /* Keyframes สำหรับ Animation */
    @keyframes zoomIn {
        0% {
            transform: scale(0.9);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Media Query สำหรับ Responsive: บนจอขนาดเล็ก ให้กล่อง Login เต็มพื้นที่ */
    @media (max-width: 768px) {
        .image-side {
            display: none;
            /* ซ่อนภาพซ้ายบนมือถือ */
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.15);
            /* เพิ่มความเข้มขึ้นเล็กน้อยเมื่อไม่มีภาพ */
            border-radius: 1rem;
        }
    }
</style>

<div class="login-container flex flex-col md:flex-row">

    {{-- 1. ส่วนภาพด้านซ้าย (Left Side - Image) --}}
    {{-- ใช้ md:w-1/2 เพื่อให้กว้าง 50% บนจอขนาดกลางขึ้นไป --}}
    <div class="image-side hidden md:block md:w-1/2">
        {{-- พื้นหลังภาพถูกกำหนดใน CSS --}}
    </div>

    {{-- 2. ส่วน Login Form ด้านขวา (Right Side - Content) --}}
    {{-- ใช้ md:w-1/2 เพื่อให้กว้าง 50% บนจอขนาดกลางขึ้นไป และ flex-grow เพื่อยืดเต็มพื้นที่บนมือถือ --}}
    <div class="flex-grow w-full md:w-1/2 flex items-center justify-center">
        <div class="login-card w-full max-w-lg mx-auto">
            <div class="mb-8">
                {{-- เปลี่ยนให้เป็นโทนสีขาว/ม่วงนีออน --}}
                <h1 class="text-5xl font-extrabold text-rose-500 tracking-wider">
                    Collab<span class="text-blue-950">Hub</span>
                </h1>
                <p class="text-lg mt-2 text-blue-950 font-light">Sign in to access your dashboard.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="text-sm font-medium text-blue-950 block mb-1">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="your-os@gtn.co.th"
                        class=" form-input-glass @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        required autocomplete="email" autofocus />
                    @error('email')
                    <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-blue-950 block mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••"
                        class="form-input-glass @error('password') is-invalid @enderror" required
                        autocomplete="current-password" />
                    @error('password')
                    <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm pt-2">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-indigo-400 border-white/50 rounded focus:ring-indigo-400 bg-white/20" {{
                            old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 text-blue-950 select-none">Remember me</label>
                    </div>
                    {{--
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-indigo-200 hover:text-white transition duration-200">Forgot Password?</a>
                    @endif

                    --}}
                </div>

                <button type="submit"
                    class="mt-6 w-full bg-blue-950 text-white font-bold rounded-full py-3 hover:bg-blue-900 transition">
                    Log In
                </button>

            </form>
{{--
            <div class="text-center pt-8 text-sm">
                <p class="text-blue-950">
                    Need an account?
                    <a href="#" class="font-semibold text-rose-500 hover:text-indigo-300 transition duration-200">Sign
                        Up</a>
                </p>
            </div>
            --}}
        </div>
    </div>
</div>

@endsection