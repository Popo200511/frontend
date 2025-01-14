<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editimport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Add Boxicons -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
.navbar.shifted {
    margin-left: 0px; /* Navbar ขยับตามความกว้างของ Sidebar */
}
.content.shifted {
    margin-left: 0px; /* Content ขยับตามความกว้างของ Sidebar */
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
        margin: 18px;
    }

    .sidebar.open~.home-section {
        left: 250px;
        width: calc(100% - 250px);
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
        font-weight: 600;
        font-size: 14px;
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
    .table td {
        background-color: #ffffff33;
        padding: 0px;
        text-align: center;
    }

    .table-wrapper {
        height: 500px;
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
        height: 400px;
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
        padding: 7px;
        font-size: 10px;
    }
    .table>:not(:last-child)>:last-child>* {
        border-bottom-color: #fff;
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
            <a href="/import">
                <i class="fa-solid fa-warehouse"></i>
                <span class="link_name">นำของเข้า</span>
            </a>
            <span class="tooltip">นำของเข้า</span>
        </li>
        <li>
            <a href="/withdraw">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <span class="link_name">เบิกของ</span>
            </a>
            <span class="tooltip">เบิกของ</span>
        </li>
        <li>
            <a href="/sum">
                <i class="fa-solid fa-square-poll-vertical"></i>
                <span class="link_name">วัสดุคงคลัง</span>
            </a>
            <span class="tooltip">วัสดุคงคลัง</span>
        </li>
        <li>
            <a href="/material">
                <i class="fa-solid fa-cart-plus"></i>
                <span class="link_name">รายการวัสดุ</span>
            </a>
            <span class="tooltip">รายการวัสดุ</span>
        </li>
        <li>
            <a href="/droppoint">
                <i class="fa-solid fa-location-dot"></i>
                <span class="link_name">สถานที่เก็บอุปกรณ์</span>
            </a>
            <span class="tooltip">สถานที่เก็บอุปกรณ์</span>
        </li>
        <li>
            <a href="/addrefcode">
                <i class="fa-solid fa-file-code"></i>
                <span class="link_name">Refcode</span>
            </a>
            <span class="tooltip">Refcode</span>
        </li>
        </div>
    

        <!-- Logout Button -->
        <div class="logout">
            <li class="logout">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link_name">ออกจากระบบ</span>
                </a>
                <span class="tooltip">ออกจากระบบ</span>
            </li>
        </div>
        
        <!-- Hidden Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </ul>
</div>


    <section class="home-section">

        <!-- Content  -->
        <div class="content" style="transition: margin-left 0.3s ease-in-out; padding-top: 60px;">
            <!-- Navbar -->
            <nav
                style="background: #f8f9fa; position: absolute; top: 0; width: 100%; z-index: 900; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
                <div id="sticky-wrapper" class="sticky-wrapper" style="height: 30px; background: #87ceeb; font-size: 15px">
                    <div class="container">
                        <div class="logoname" style=" height: 30px; display: flex; align-items: center;">
                            <div class="text" style="display: flex; align-items: center; gap:5px;">Inventory control<i class="fa-solid fa-truck-ramp-box"></i></div>
                            <div class="name" style="color: #f8f9fa; font-size: 15px;">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </nav>


     <!-- Form starts here -->
     <form action="/edit/save/withdraw" method="POST">
        @csrf

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



    <div class="container ">
        <div class="table-wrapper">
            <!-- Form starts here -->
     <form action="/edit/save" method="POST">
        @csrf

            <div class="texeadd">
                <div class="hi">
                    <h2 style="font-size: 15px; display:flex; gap:5px">Edit Data<i class="fa-regular fa-clipboard"></i></h2>
                </div>
            </div>

            <div class="table-container ">
                <table class="table" id="table">
                    <thead style="font-size: 12px; text-align:center">
                        <tr>
                            <th scope="col">Refcode</th>
                            <th scope="col">Refcode_withdraw</th>
                            <th scope="col">Material Code</th>
                            <th scope="col">Material Name</th>
                            <th scope="col">Spec</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Droppoint</th>
                            <th scope="col">Date</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Avilable</th>
                            <th scope="col">Withdraw</th>
                            <th scope="col">Remark</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        <tr style="text-align:center">
                            <td>
                                <input class="form-control" name="refcode_with" value="{{ $editWith->refcode_with }}"
                                    readonly style="font-size: 10px; width: 100px;">
                            </td>
    
                            <td><input type="text" class="form-control" name="refcode_before"
                                    value="{{ $editWith->refcode_before }}" readonly style="font-size: 10px; width: 110px; text-align: center;"></td>
    
                            <td><input type="text" class="form-control" name="material_code"
                                    value="{{ $editWith->material_code }}" readonly style="font-size: 10px; width: 110px; text-align: center;"></td>
    
                            <td><input type="text" class="form-control" name="material_name"
                                    value="{{ $editWith->material_name }}" readonly style="font-size: 10px; width: 100px; text-align: center;"></td>
    
                            <td><input type="text" class="form-control" name="spec" value="{{ $editWith->spec }}"
                                    readonly style="font-size: 10px; width: 100px; text-align: center;"></td>
    
                            <td><input type="text" class="form-control" name="unit" value="{{ $editWith->unit }}"
                                    readonly style="font-size: 10px; width: 100px; text-align: center;"></td>
    
                            @foreach ($droppoint as $no)
                                @if ($editWith->droppoint == $no->id)
                                    <td>
                                        <!-- แสดงชื่อ Droppoint -->
                                        <input type="text" class="form-control" name="droppoint" value="{{ $no->droppoint }}" readonly
                                        style="font-size: 10px; width: 100px; text-align: center;"> 
    
                                        <!-- บันทึกค่า ID ของ Droppoint 
                                        <input type="hidden" name="droppoint" value="{{ $no->droppoint }}">
                                        -->
                                    </td>
                                @endif
                            @endforeach
    
                            <td><input type="date" class="form-control" name="date" value="{{ $editWith->date }}"
                                    readonly style="font-size: 10px; width: 100px; text-align: center;"></td>
    
                            <td><input type="text" class="form-control" name="transaction_id"
                                    value="{{ $editWith->transaction_id }}" readonly style="font-size: 10px; width: 110px; text-align: center;"></td>
    
                            <td><input type="text" class="form-control" name="available"
                                    value="{{ $editWith->available }}" readonly style="font-size: 10px; width: 100px; text-align: center;"></td>
    
                            <td>
                                <input type="hidden" name="quantity" value="{{ $editWith->quantity_with }}" style="font-size: 10px; width: 100px; text-align: center;">
                                <!-- ซ่อนค่าเดิม -->
    
                                <input type="number" class="form-control" name="quantity_with" id="quantityInput"
                                    value="{{ $editWith->quantity_with }}" required style="background: #47d53a; font-size: 10px; width: 100px; text-align: center;" >
                            </td>
    
    
                            <td><input type="text" class="form-control" name="remark"
                                    value="{{ $editWith->remark }}" required style="background: #47d53a; font-size: 10px; width: 110px; text-align: center;"></td>
    
                        </tr>
                    </tbody>
                </table>

        </div>

                <!-- Submit Button -->
            
                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Edit</button>

                <a href="/withdraw">
                    <button type="button" class="btn btn-danger" style="margin-top: 10px;">
                        ย้อนกลับ
                    </button>
                </a>
                    
                </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    function confirmEdit() {
        return confirm("คุณแน่ใจหรือไม่ว่าต้องการแก้ไขข้อมูลนี้?");
    }
</script>

<script>
    window.onload = function() {
        const sidebar = document.querySelector(".sidebar");
        const closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", function() {
            sidebar.classList.toggle("open");
        });
    }
</script>

<!-- ซ่อน ประวัติการนำเข้า -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar'); // เลือก sidebar
        const showDataModal = document.getElementById('showDataModal'); // เลือก showDataModal

        // ซ่อน sidebar เมื่อ showDataModal เปิด
        showDataModal.addEventListener('show.bs.modal', function() {
            if (sidebar) {
                sidebar.classList.add('d-none'); // เพิ่มคลาสซ่อน
            }
        });

        // แสดง sidebar เมื่อ showDataModal ปิด
        showDataModal.addEventListener('hidden.bs.modal', function() {
            if (sidebar) {
                sidebar.classList.remove('d-none'); // เอาคลาสซ่อนออก
            }
        });
    });
</script>

</html>