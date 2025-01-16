<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Refcode</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Refcode</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Add Boxicons -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    :root {
        --color-default: #004f83;
        --color-second: #0067ac;
        --color-white: #fff;
        --color-body: #e4e9f7;
        --color-light: #e0e0e0;
    }


    * {
        padding: 0%;
        margin: 0%;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        min-height: 100vh;
    }

    .sidebar {
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* ดันเนื้อหาให้ห่างกัน */
    min-height: 100vh;
    width: 78px;
    padding-right: 10px;
    z-index: 99;
    background-color: var(--color-default);
    transition: all 0.5s ease;
    position: fixed;
    top: 0;
    left: 0;
    }

    .nav-list {
    display: flex;
    flex-direction: column;
    flex-grow: 1; /* ขยายเพื่อรองรับเนื้อหาด้านบน */
}

.logout {
    margin-top: auto; /* ดันปุ่ม Logout ไปด้านล่างสุด */
}


    .sidebar.open {
        width: 250px;
    }

    .sidebar .logo_details {
        height: 60px;
        display: flex;
        align-items: center;
        position: relative;
    }

    .sidebar .logo_details .icon {
        opacity: 0;
        transition: all 0.5s ease;
    }

    .sidebar .logo_details .logo_name {
        color: var(--color-white);
        font-size: 22px;
        font-weight: 600;
        opacity: 0;
        transition: all .5s ease;
    }

    .sidebar.open .logo_details .icon,
    .sidebar.open .logo_details .logo_name {
        opacity: 1;
        margin: 10px;
    }

    .sidebar .logo_details #btn {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        font-size: 23px;
        text-align: center;
        cursor: pointer;
        transition: all .5s ease;
    }

    .sidebar.open .logo_details #btn {
        text-align: right;
    }

    .sidebar i {
        color: var(--color-white);
        height: 60px;
        line-height: 60px;
        min-width: 50px;
        font-size: 25px;
        text-align: center;
    }

    .sidebar .nav-list {
        margin-top: 20px;
        height: 100%;
    }

    .sidebar li {
        position: relative;
        margin: 8px 0;
        list-style: none;
    }

    .sidebar li .tooltip {
        position: absolute;
        top: -20px;
        left: calc(100% + 15px);
        z-index: 3;
        background-color: var(--color-white);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        padding: 6px 14px;
        font-size: 15px;
        font-weight: 400;
        border-radius: 5px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
    }

    .sidebar li:hover .tooltip {
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar.open li .tooltip {
        display: none;
    }

    .sidebar input {
        font-size: 15px;
        color: var(--color-white);
        font-weight: 400;
        outline: none;
        height: 35px;
        width: 35px;
        border: none;
        border-radius: 5px;
        background-color: var(--color-second);
        transition: all .5s ease;
    }

    .sidebar input::placeholder {
        color: var(--color-light)
    }

    .sidebar.open input {
        width: 100%;
        padding: 0 20px 0 50px;
    }

    .sidebar .bx-search {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        font-size: 22px;
        background-color: var(--color-second);
        color: var(--color-white);
    }

    .sidebar li a {
        display: flex;
        height: 100%;
        width: 100%;
        align-items: center;
        text-decoration: none;
        background-color: var(--color-default);
        position: relative;
        transition: all .5s ease;
        z-index: 12;
    }

    .sidebar li a::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        transform: scaleX(0);
        background-color: var(--color-white);
        border-radius: 5px;
        transition: transform 0.3s ease-in-out;
        transform-origin: left;
        z-index: -2;
    }

    .sidebar li a:hover::after {
        transform: scaleX(1);
        color: var(--color-default)
    }

    .sidebar li a .link_name {
        color: var(--color-white);
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
        pointer-events: auto;
        transition: all 0.4s ease;
        pointer-events: none;
        opacity: 0;
    }

    .sidebar li a:hover .link_name,
    .sidebar li a:hover i {
        transition: all 0.5s ease;
        color: var(--color-default)
    }

    .sidebar.open li a .link_name {
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar li i {
        height: 35px;
        padding-right: 30px;
        line-height: 35px;
        font-size: 18px;
        border-radius: 5px;
    }

    .sidebar li.profile {
        position: fixed;
        height: 60px;
        width: 78px;
        left: 0;
        bottom: -8px;
        padding: 10px 14px;
        overflow: hidden;
        transition: all .5s ease;
    }

    .sidebar.open li.profile {
        width: 250px;
    }

    .sidebar .profile .profile_details {
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
    }

    .sidebar li img {
        height: 45px;
        width: 45px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 10px;
    }

    .sidebar li.profile .name,
    .sidebar li.profile .designation {
        font-size: 15px;
        font-weight: 400;
        color: var(--color-white);
        white-space: nowrap;
    }

    .sidebar li.profile .designation {
        font-size: 12px;
    }

    .sidebar .profile #log_out {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        background-color: var(--color-second);
        width: 100%;
        height: 60px;
        line-height: 60px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.5s ease;
    }

    .sidebar.open .profile #log_out {
        width: 50px;
        background: none;
    }

    .home-section {
        position: relative;
        background-color: var(--color-body);
        min-height: 100vh;
        top: 0;
        left: 78px;
        width: calc(100% - 78px);
        transition: all .5s ease;
        z-index: 2;
    }

    .home-section .text {
        display: inline-block;
        color: var(--color-default);
        font-size: 15px;
        font-weight: 500;

    }

    .sidebar.open~.home-section {
        left: 250px;
        width: calc(100% - 250px);
    }

    .fb {
        display: flex;
        flex-wrap: wrap;
        align-content: center;
        justify-content: center;
        align-items: center;
    }

    .modal-header {
        font-size: 10px;
        font-family: sans-serif;
        display: flex;
        align-items: center;
        gap: 50px;

    }

    .modal-backdrop.show {
        display: none;
    }

    .modal-body {
        font-size: 10px;
        max-height: 500px;
        /* กำหนดความสูงสูงสุดของตาราง */
        background: white;
        padding: 20px;
        border-radius: 10px;
    }

    /* input */
    .input-style {
        padding: 5px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 10px;
        color: #555;
        outline: none;
    }

    .input-style:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .hi {
        display: flex;
        align-items: baseline;
        gap: 10px;
    }



    /* Export*/
    .button {
        position: relative;
        width: 150px;
        height: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        border: 1px solid #17795E;
        background-color: #209978;
        overflow: hidden;
    }

    .button,
    .button__icon,
    .button__text {
        transition: all 0.3s;
    }

    .button .button__text {
        transform: translateX(22px);
        color: #fff;
        font-size: 9px;
        font-weight: 600;
    }

    .button .button__icon {
        position: absolute;
        transform: translateX(109px);
        height: 100%;
        width: 39px;
        background-color: #17795E;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .button .svg {
        width: 20px;
        fill: #fff;
    }

    .button:hover {
        background: #17795E;
    }

    .button:hover .button__text {
        color: transparent;
    }

    .button:hover .button__icon {
        width: 148px;
        transform: translateX(0);
    }

    .button:active .button__icon {
        background-color: #146c54;
    }

    .button:active {
        border: 1px solid #146c54;
    }


    .table>:not(caption)>*>* {
        text-align: center;
    }

    .table-wrapper {
        height: auto;
        /* กำหนดความสูงสูงสุดของตาราง */
        box-shadow: 0 2px 5px #8494a4;
        background: white;
        padding: 20px;
        border-radius: 10px;
    }

    /* ปรับการจัดตำแหน่งข้อความในตาราง */
    .table th,
    .table td {
        text-align: center;
    }

    .table-wrapper {
        max-height: 633px;
        box-shadow: 0 2px 5px #8494a4;
        background: white;
        padding: 20px;
        border-radius: 10px;
    }

    .table-container {
        display: flex;
        align-content: center;
        justify-content: center;
        align-items: baseline;
        font-family: sans-serif;
        width: 100%;
        height: 470px;
        overflow-y: auto;
        border: 1px solid #ccc;
    }

    .table thead th {
        position: sticky;
        /* ทำให้คงที่ */
        top: 0;
        /* ติดด้านบน */
        background-color: skyblue;
        /* กำหนดสีพื้นหลังของหัวตาราง */
        z-index: 2;
        /* ให้หัวคอลัมน์อยู่ด้านบนของเนื้อหา */
        text-align: center;
        padding: 5px;
        font-size: 11px;
    }


    .texeadd {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: baseline;
        gap: 1rem;
    }

    .mb-4 {
        font-size: 15px;
    }

    .mt-5 {
        margin-top: 1rem !important;
    }

    .table th {
        background-color: skyblue;
        /* กำหนดสีพื้นหลังของหัวตาราง */
        text-align: center;
        padding: 15px;
        font-size: 14px;
    }

    .table td {
        background-color: #ffffff33;
        padding: 0px;
        text-align: center;
    }

    .table thead {
        background-color: #55608f;
        /* สีพื้นหลังที่เหมาะสมสำหรับ thead */
    }

    tbody tr:hover {
        background-color: #ee0d3e4d;
        /* สีพื้นหลังเมื่อมีการ hover แถว */
    }
</style>


<body>


    <div class="sidebar">
        <div class="logo_details">
            <div class="logo_name">GTN</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
    
        <ul class="nav-list">
            <div class="sidebox">
            <li>
                <a href="import">
                    <i class="fa-solid fa-warehouse"></i>
                    <span class="link_name">นำของเข้า</span>
                </a>
                <span class="tooltip">นำของเข้า</span>
            </li>
            <li>
                <a href="withdraw">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <span class="link_name">เบิกของ</span>
                </a>
                <span class="tooltip">เบิกของ</span>
            </li>
            <li>
                <a href="sum">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <span class="link_name">วัสดุคงคลัง</span>
                </a>
                <span class="tooltip">วัสดุคงคลัง</span>
            </li>
            <li>
                <a href="material">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span class="link_name">รายการวัสดุ</span>
                </a>
                <span class="tooltip">รายการวัสดุ</span>
            </li>
            <li>
                <a href="droppoint">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="link_name">สถานที่เก็บอุปกรณ์</span>
                </a>
                <span class="tooltip">สถานที่เก็บอุปกรณ์</span>
            </li>
            <li>
                <a href="addrefcode">
                    <i class="fa-solid fa-file-code"></i>
                    <span class="link_name">Refcode</span>
                </a>
                <span class="tooltip">Refcode</span>
            </li>
            </div>
        
    
            <!-- ออกจากระบบ ลงทะเบียน Button -->
        <div class="logout">

            <li class="register">
                <a href="{{ route('register') }}" 
                   onclick="event.preventDefault(); document.getElementById('register-form').submit();">
                   <i class="fa-regular fa-address-card"></i>
                   <span class="link_name">ลงทะเบียน</span>
                </a>
                <span class="tooltip">ลงทะเบียน</span>
            </li>
            
            <!-- Hidden register Form -->
            <form id="register-form" action="{{ route('register') }}" method="POST" class="d-none">
                @csrf
            </form>
            

            <li class="logout">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link_name">ออกจากระบบ</span>
                </a>
                <span class="tooltip">ออกจากระบบ</span>
            </li>
    
        </ul>
    </div>

    <div class="home-section">
     <!-- Content -->
<div class="content" style="transition: margin-left 0.3s ease-in-out; padding-top: 40px;">
    <!-- Navbar -->
    <nav
        style="background: #f8f9fa; position: absolute; top: 0; width: 100%; z-index: 900; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 30px; background: #87ceeb; font-size: 15px">
            <div class="container">
                <div class="logoname" style=" height: 30px; display: flex; align-items: center; justify-content: space-between;">
                    <div class="text" style="display: flex; align-items: center; gap:5px;">Inventory control<i class="fa-solid fa-truck-ramp-box"></i></div>
                    <div class="name" style="color: #f8f9fa; font-size: 15px;">
                        <i class="fa-regular fa-user"> {{ Auth::user()->name }}</i> 
                    </div>
                </div>
            </div>
        </div>
    </nav>

        <!-- แสดงข้อความสำเร็จ -->
        @if (session('success'))
            <div class="alert alert-success style=margin: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->has('error'))
            <div class="alert alert-danger style=margin: 20px;">
                {{ $errors->first('error') }}
            </div>
        @endif

        <div class="container">
            <form action="/addrefcode" method="POST" enctype="multipart/form-data" id="csvForm" class="d-flex align-items-center gap-2" style="flex-wrap: nowrap; justify-content: center;">
                @csrf
                <input type="file" class="form-control" name="csv_file_add" accept=".csv" required style="width: 300px; height: 29px; font-size: 10px;">
                <input type="submit" class="btn btn-primary" name="preview_add" value="แสดงข้อมูล Refcode ที่ต้องการเพิ่ม"
                    data-bs-toggle="modal" data-bs-target="#exampleModal"style="font-size: 10px;" >
            </form>
        </div>


    

        @if (!empty($dataToSave) && (is_array($dataToSave) || is_object($dataToSave)))
            <div class="modal fade show d-block" id="refcodeModal" tabindex="-1" role="dialog"
                aria-labelledby="refcodeModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="refcodeModalLabel" style="font-size: 15px;">ตรวจสอบข้อมูล Refcode</h5>
                            <input placeholder=" " class="input-style" type="text" id="refcodeSearch" name="refcodeSearch">
                            <a href="/addrefcode" class="btn-close" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <div class="table-container">
                                <table class="table table-bordered" id="modalTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Refcode</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Check Refcode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataToSave as $row)
                                            <tr>
                                                @foreach ($row as $key => $cell)
                                                    <td>{{ $cell }}</td>
                                                @endforeach
                                                <td>
                                                    @php
                                                        $check = false;
                                                        foreach ($refcode as $item) {
                                                            if ($item->refcode === $row['refcode']) {
                                                                $check = true;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    @if ($check)
                                                        <span style="color: red;">refcode ซ้ำกัน</span>
                                                    @else
                                                        <span style="color: green;">สามารถ Upload refcode ได้</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form action="/saveadd" method="POST">
                                @csrf
                                <input type="hidden" name="data_add" value="{{ json_encode($dataToSave) }}">
                                <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
                            </form>
                            <a href="/addrefcode" class="btn btn-danger">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <script>
            function confirmUpdate() {
                // แสดงกล่องยืนยัน
                if (confirm('คุณต้องการเพิ่มข้อมูลหรือไม่?')) {
                    return true; // ถ้าผู้ใช้ยืนยัน ให้ส่งฟอร์ม
                } else {
                    return false; // ถ้าผู้ใช้ยกเลิก ไม่ส่งฟอร์ม
                }
            }
        </script>

        <div class="container mt-5">
            <div class="table-wrapper">
                <div class="texeadd">
                    <div class="hi">
                        <h3 class="mb-4" style="display: flex; gap:7px">Refcode<i class="fa-solid fa-file-code"></i></h3>
                    </div>

                    <button class="button" type="button" aria-label="Export" id="exportButton">
                        <span class="button__text">Export visible data</span>
                        <span class="button__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35"
                                id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg">
                                <path
                                    d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z">
                                </path>
                                <path
                                    d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z">
                                </path>
                                <path
                                    d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>

                <div class="table-container " style="height: 549px;">
                    <table class="table" id="table">
                        <thead style="font-size: 12px; text-align:center">
                            <tr>
                                <!-- ค้นหา Ref Code -->
                                <th scope="background-color: skyblue;" style="width: 20rem; text-align: center; vertical-align: middle;">
                                    Ref Code
                                    <div style="display: flex; justify-content: center; align-items: center; margin-top: 5px;">
                                        <input class="input-style" type="text" id="searchRefCode" name="searchRefCode"
                                            style="width: 120px; height: 20px; padding: 5px; font-size: 10px;">
                                    </div>
                                </th>

                                <!-- ค้นหา Description -->
                                <th scope="background-color: skyblue;" style="width: 20rem; text-align: center; vertical-align: middle;">
                                    Description
                                    <div style="display: flex; justify-content: center; align-items: center; margin-top: 5px;">
                                        <input class="input-style" type="text" id="searchDescription" name="searchDescription"
                                            style="width: 12rem; height: 20px; padding: 5px; font-size: 10px;">
                                    </div>
                                </th>

    

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($refcode as $item)
                                <tr style="font-size: 10px; text-align:center">
                                    <td>{{ $item->refcode }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const sidebar = document.querySelector(".sidebar");
                const mainContent = document.querySelector(".main-content");
                const toggleButton = document.querySelector("#btn");

                toggleButton.addEventListener("click", function() {
                    sidebar.classList.toggle("open");
                    mainContent.style.marginLeft = sidebar.classList.contains("open") ? "70px" : "250px";
                });
            });
        </script>


        <script>
            //ฟังก์ชันกรองข้อมูลของ Refcode
            document.addEventListener('DOMContentLoaded', () => {
                const table = document.querySelector('#table'); // อ้างถึงตารางข้อมูล
                const filterInputs = [
                    '#searchRefCode',      // ช่องกรอง Ref Code
                    '#searchDescription'   // ช่องกรอง Description
                ].map(selector => document.querySelector(selector));

                function filterTable() {
                    table.querySelectorAll('tbody tr').forEach(row => {
                        row.style.display = filterInputs.every((input, i) => {
                            const filterValue = input?.value.trim().toUpperCase();
                            const cellValue = row.cells[i]?.textContent.trim().toUpperCase() || '';
                            return !filterValue || cellValue.includes(filterValue);
                        }) ? '' : 'none';
                    });
                }

                filterInputs.forEach(input => input?.addEventListener('keyup', filterTable));
            });


        </script>



        <script>
            $(document).ready(function() {
                // ฟังก์ชันค้นหาเฉพาะใน Modal
                $('#refcodeModal #refcodeSearch').on('keyup', function() {
                    var query = $(this).val().toLowerCase(); // รับค่าที่กรอกในช่องค้นหา
                    $('#refcodeModal #modalTable tbody tr').filter(function() {
                        var combinedText = $(this).text().toLowerCase(); // รวมข้อความทั้งหมดในแถว
                        $(this).toggle(combinedText.indexOf(query) > -1); // แสดงเฉพาะแถวที่ตรงกับ query
                    });
                });
            });
        </script>

        <script>
            // ฟังก์ชันส่งออก export
            document.getElementById('exportButton').addEventListener('click', function() {
                var wb = XLSX.utils.book_new();
                var ws = XLSX.utils.table_to_sheet(document.getElementById('table'));
                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                XLSX.writeFile(wb, 'refcode_data.xlsx');
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>






</body>

</html>
