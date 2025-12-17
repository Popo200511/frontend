@extends('layouts.Tailwind')
@section('title', 'Dashboard Home')

@section('content')

{{-- ... Style และ Script Blocks เดิม (ไม่เปลี่ยนแปลง) ... --}}

<style>
    /* Custom styles for Dashboard Boxes */
    .dashboard-box {
        /* ... styles เดิม ... */
        transition: all 0.3s ease;
        transform: translateY(0);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
    }

    .dashboard-box:hover {
        /* ... styles เดิม ... */
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
    }

    /* เพิ่มสไตล์สำหรับ Big Number Box เพื่อให้ดูเหมือนภาพตัวอย่าง */
    .big-number-box {
        padding: 1.5rem;
        /* p-6 */
        border-radius: 0.75rem;
        /* rounded-xl */
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    /* Modal Table Style (สำหรับ Modal Member Total) */
    .tailwind-table {
        width: 100%;
        border-collapse: collapse;
    }

    .tailwind-table th,
    .tailwind-table td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .tailwind-table thead th {
        background-color: #4f46e5;
        color: white;
        font-weight: 600;
    }
</style>

<div class="flex h-screen bg-gray-100">
    {{-- include sidebar --}}
    @include('layouts.user')

    {{-- Overlay สำหรับ Sidebar บนมือถือ --}}
    <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black opacity-50 z-40 hidden md:hidden">
    </div>

    {{-- 2. Main Content Area (ส่วนเนื้อหาหลัก) --}}
    <div class="flex-1 flex flex-col overflow-hidden main-content-area">


        @auth
        <header class="bg-white shadow-lg z-10 sticky top-0 px-6 md:px-8 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">

                {{-- Welcome ชื่อ User และ รูปโปรไฟล์ User --}}
                <div class="flex items-center space-x-3">
                    <img src="https://scontent.fbkk22-8.fna.fbcdn.net/v/t39.30808-6/557604303_24664240786548972_7522257762793615554_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=aGb5oXg4JegQ7kNvwGue--3&_nc_oc=AdletkEB9NgSyE2fihfzHiiz8WoI6IHT4eAcMQYZPEWw4YY72Nrj98JawQuAHPAgbPs&_nc_zt=23&_nc_ht=scontent.fbkk22-8.fna&_nc_gid=BkvieLIrkrHSUY3MpWo4ZA&oh=00_Afn3LfCEHajrG6LYuxH1_ClKCUPDXMPLYpo_9UVXLgnpaw&oe=69404DCD"
                        alt="Avatar" class="h-12 w-12 rounded-full object-cover border-2 border-gray-200">
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-900 tracking-tight">
                            Welcome {{ Auth::user()->name ?? 'Guest User' }}
                        </h2>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email ?? 'No Email' }}</p>
                    </div>
                </div>

                {{-- Action Buttons (Messages and Settings) --}}
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-3">
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            {{-- 1. ปุ่มกระดิ่ง (Bell Button) --}}
                            <button @click="open = !open" type="button"
                                class="flex items-center bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-xl hover:bg-gray-800 transition-all duration-300 shadow-sm border border-gray-700 focus:outline-none">
                                <div class="relative mr-2.5 flex items-center">
                                    <i class="fa-solid fa-bell text-base text-gray-300"></i>
                                    {{-- จุดแจ้งเตือนสีแดง --}}
                                    <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span
                                            class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500 border border-gray-900"></span>
                                    </span>
                                </div>
                                <span>Notifications</span>
                            </button>

                            {{-- 2. กล่องรายการแจ้งเตือน (Dropdown Panel) --}}
                            <div x-show="open" @click.outside="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95 transform"
                                x-transition:enter-end="opacity-100 scale-100 transform"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100 transform"
                                x-transition:leave-end="opacity-0 scale-95 transform"
                                class="absolute right-0 mt-3 w-80 md:w-96 bg-white rounded-2xl shadow-2xl z-50 overflow-hidden border border-gray-100 origin-top-right">

                                {{-- Header ของการแจ้งเตือน --}}
                                <div
                                    class="px-4 py-3 border-b border-gray-100 flex justify-between items-center bg-white sticky top-0">
                                    <h3 class="text-xl font-bold text-gray-900">การแจ้งเตือน</h3>
                                    <button
                                        class="text-indigo-600 text-sm font-medium hover:underline">ดูทั้งหมด</button>
                                </div>

                                {{-- ตัวกรอง (Filter Tabs) --}}
                                <div class="px-4 py-2 flex gap-2 bg-white">
                                    <span
                                        class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold cursor-pointer">ทั้งหมด</span>
                                    <span
                                        class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold cursor-pointer hover:bg-gray-200">ยังไม่ได้อ่าน</span>
                                </div>

                                {{-- รายการแจ้งเตือน (Notification List) --}}
                                <div class="max-h-[450px] overflow-y-auto custom-scrollbar">

                                    {{-- ตัวอย่างรายการที่ 1: แจ้งเตือนแก้ไขข้อมูล --}}
                                    <a href="#"
                                        class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition border-b border-gray-50">
                                        <div class="relative flex-shrink-0">
                                            <img src="https://ui-avatars.com/api/?name=Admin&background=4f46e5&color=fff"
                                                class="w-12 h-12 rounded-full shadow-sm" alt="User">
                                            <div
                                                class="absolute -bottom-1 -right-1 bg-blue-500 text-white w-5 h-5 rounded-full flex items-center justify-center text-[10px] border-2 border-white">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 leading-snug">
                                                <span class="font-bold text-gray-900">Admin</span> ได้แก้ไขข้อมูล Site
                                                Code <span class="font-mono bg-gray-100 px-1 rounded">NRT7622F</span>
                                            </p>
                                            <span class="text-xs text-indigo-600 font-medium">1 ชั่วโมงที่แล้ว</span>
                                        </div>
                                        <div class="w-2.5 h-2.5 bg-blue-500 rounded-full mt-2"></div> {{--
                                        จุดสีฟ้าบอกว่ายังไม่ได้อ่าน --}}
                                    </a>

                                    {{-- ตัวอย่างรายการที่ 2: แจ้งเตือน Balance เปลี่ยน --}}
                                    <a href="#"
                                        class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition border-b border-gray-50">
                                        <div class="relative flex-shrink-0">
                                            <img src="https://ui-avatars.com/api/?name=System&background=10b981&color=fff"
                                                class="w-12 h-12 rounded-full shadow-sm" alt="System">
                                            <div
                                                class="absolute -bottom-1 -right-1 bg-green-500 text-white w-5 h-5 rounded-full flex items-center justify-center text-[10px] border-2 border-white">
                                                <i class="fa-solid fa-calculator"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 leading-snug">
                                                ยอด <span class="text-red-600 font-bold">Banlace_IN</span>
                                                มีการอัปเดตในรายการ RefCode: 88-24-050005
                                            </p>
                                            <span class="text-xs text-gray-500">3 ชั่วโมงที่แล้ว</span>
                                        </div>
                                    </a>

                                    {{-- ตัวอย่างรายการที่ 3: แจ้งเตือนนำเข้าไฟล์ --}}
                                    <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition">
                                        <div class="relative flex-shrink-0">
                                            <div
                                                class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                                                <i class="fa-solid fa-file-import text-xl"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 leading-snug">
                                                การนำเข้าไฟล์ <span
                                                    class="font-medium italic">Template_Import.csv</span> สำเร็จแล้ว
                                            </p>
                                            <span class="text-xs text-gray-500">เมื่อวานนี้</span>
                                        </div>
                                    </a>

                                </div>

                                {{-- Footer --}}
                                <div class="p-2 bg-gray-50 text-center">
                                    <a href="#"
                                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">ดูประวัติทั้งหมด</a>
                                </div>
                            </div>
                        </div>

                        <button
                            class="flex items-center bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-indigo-500 transition">
                            <i class="fas fa-cog mr-2"></i>
                            <span>Settings</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @endauth
        {{-- ****************************************************** --}}

        {{-- Content View (Dashboards & Modules) --}}
        <main class="flex-1 overflow-x-hidden overflow-y-auto px-6 md:px-8 pt-6 pb-4 md:pb-6 bg-gray-100">

            {{-- Navigation Tabs (Home, Budget, Team - ตามภาพ) --}}
            <div class="flex space-x-4 mb-6 text-sm font-semibold border-b border-gray-300">
                <a href="#" class="pb-2 border-b-2 border-indigo-600 text-indigo-600">Home</a>
                <a href="#" class="pb-2 border-b-2 border-transparent text-gray-500 hover:text-indigo-600">Budget</a>
                <a href="#" class="pb-2 border-b-2 border-transparent text-gray-500 hover:text-indigo-600">Team</a>
            </div>

            {{-- 3. Dashboard Boxes (ปรับปรุงให้เหมือนภาพ) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                {{-- Box 1: Summary (Due Tasks) --}}
                <div class="big-number-box bg-white dashboard-box border-t-4 border-indigo-600">
                    <div class="flex justify-between items-center mb-1">
                        <p class="text-sm font-semibold text-gray-700">Summary</p>
                        <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </div>
                    <p class="text-5xl font-extrabold text-indigo-600">21</p>
                    <p class="text-sm font-medium text-gray-600 mb-2">Due Tasks</p>
                    <p class="text-xs text-gray-400">Completed: 13</p>
                </div>

                {{-- Box 2: Overdue (Tasks) --}}
                <div class="big-number-box bg-white dashboard-box border-t-4 border-red-500">
                    <div class="flex justify-between items-center mb-1">
                        <p class="text-sm font-semibold text-gray-700">Overdue</p>
                        <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </div>
                    <p class="text-5xl font-extrabold text-red-500">17</p>
                    <p class="text-sm font-medium text-gray-600 mb-2">Tasks</p>
                    <p class="text-xs text-gray-400">From yesterday: 9</p>
                </div>

                {{-- Box 3: Issues (Open) --}}
                <div class="big-number-box bg-white dashboard-box border-t-4 border-yellow-500">
                    <div class="flex justify-between items-center mb-1">
                        <p class="text-sm font-semibold text-gray-700">Issues</p>
                        <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </div>
                    <p class="text-5xl font-extrabold text-yellow-500">24</p>
                    <p class="text-sm font-medium text-gray-600 mb-2">Open</p>
                    <p class="text-xs text-gray-400">Closed today: 19</p>
                </div>

                {{-- Box 4: Features (Proposals) --}}
                <div class="big-number-box bg-white dashboard-box border-t-4 border-green-500">
                    <div class="flex justify-between items-center mb-1">
                        <p class="text-sm font-semibold text-gray-700">Features</p>
                        <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </div>
                    <p class="text-5xl font-extrabold text-green-500">38</p>
                    <p class="text-sm font-medium text-gray-600 mb-2">Proposals</p>
                    <p class="text-xs text-gray-400">Implemented: 16</p>
                </div>
            </div>

            <!--
            <h3 class="text-xl font-bold text-gray-800 mb-4">Github Issues Summary</h3> -->

            {{-- ส่วนเนื้อหาอื่นๆ (ถ้ามี) --}}

        </main>
    </div>

</div>

{{-- 5. Modal (Member Total) --}}
@if (isset($users))
@php $isAuthorized = Auth::check() && Auth::user()->status == 4; @endphp
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
    {{-- ... เนื้อหา Modal ... --}}
</div>
@endif





@endsection