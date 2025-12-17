@extends('layouts.user')

@section('title', 'NEW JOB ASSIGNMENT')

@section('content')

<!-- Export To Excel -->
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

<script src="https://unpkg.com/lucide@latest"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@flaticon/flaticon-uicons/css/all/all.css">



<!-- Load Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">


<!-- แสดงข้อความ error -->
@if (session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<!-- แสดงข้อความสำเร็จ -->
@if (session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'ตกลง',
                    confirmButtonColor: '#22c55e',
                    customClass: {
                        title: 'swal-title',
                        content: 'swal-text'
                    }
                });
            });
</script>

@endif

<!-- Hover สำหรับ Filter -->
<style>
    .swal-title,
    .swal-text {
        font-family: 'Sarabun', sans-serif;
    }

    .filter-active i {
        color: #60a5fa !important;
    }

    thead th:hover .filter-icon:not(.filter-active) i {
        color: #93c5fd;
    }
</style>

<div class="flex flex-col lg:flex-row min-h-[calc(100vh-60px)] overflow-hidden">

    <!-- Aside Sidebar -->

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 overflow-y-auto">


        <div class="flex justify-between items-center bg-white p-4 rounded-xl mb-6 shadow-md">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full items-stretch">

                <!-- Summary -->
                <div class="bg-white p-2 rounded-xl shadow-md min-h-[60px]">
                    <h3 class="text-sm font-black text-gray-500 mb-2">Added Job Total</h3>
                    <div class="text-4xl font-bold text-blue-600 text-center">{{ $countAll }}</div>
                    <div class="text-sm text-gray-500 mt-1 text-center">
                        Completed: <span class="font-semibold">{{ $countApproved }}</span>
                    </div>
                </div>

                <!-- Reject -->
                <div class="bg-white p-2 rounded-xl shadow-md min-h-[60px]">
                    <h3 class="text-sm font-black text-gray-500 mb-2">Reject</h3>
                    <div class="text-4xl font-bold text-red-600 text-center">{{ $countRejected }}</div>
                </div>

                <!-- Pending -->
                <div class="bg-white p-2 rounded-xl shadow-md min-h-[60px]">
                    <h3 class="text-sm font-black text-gray-500 mb-2 ">Pending</h3>
                    <div class="text-4xl font-bold text-orange-400 text-center">{{ $countPending }}</div>
                </div>

                <!-- Approved -->
                <div class="bg-white p-2 rounded-xl shadow-md min-h-[60px]">
                    <h3 class="text-sm font-black text-gray-500 mb-2 ">Approved</h3>
                    <div class="text-4xl font-bold text-green-600 text-center">{{ $countApproved }}</div>
                </div>

            </div>


        </div>


        <!-- Modal Import New Job -->
        <div id="importModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 z-50">

            <!-- Modal Content -->
            <div
                class="bg-white rounded-lg shadow-lg w-11/12 max-w-lg p-6 relative transform scale-95 transition-all duration-300">

                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-slate-800">Import New Job</h2>
                    <button id="closeImportModal"
                        class="text-slate-500 hover:text-slate-700 text-2xl font-bold">&times;</button>
                </div>

                <!-- Download Template -->
                <a href="{{ asset('templates/Add_job_template.xlsx') }}" download
                    class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition">
                    Download Import Template
                </a>


                <!-- Form -->
                <form method="POST" action="{{ route('addjob.importnewjob') }}" enctype="multipart/form-data"
                    name="xlsx_file_add">
                    @csrf

                    <label class="block mb-2 font-semibold text-slate-700"> Upload File <span
                            class="text-red-600">(.xlsx)</span> </label>

                    <input type="file" name="xlsx_file_add" accept=".xlsx"
                        class="w-full border border-gray-300 rounded-md p-2 mb-4 focus:ring focus:ring-blue-300"
                        required>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="cancelImportBtn"
                            class="rounded-md border py-2 px-4 font-semibold text-slate-600 hover:bg-slate-100">
                            Cancel
                        </button>
                        <button type="submit"
                            class="rounded-md bg-green-600 text-white font-semibold py-2 px-4 hover:bg-green-700 shadow-md">
                            Import
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Modal แสดงข้อมูล Import -->

        <!-- Modal แสดงข้อมูล ที่ import เข้ามา -->
        @if (!empty($dataToSave) && (is_array($dataToSave) || is_object($dataToSave)))
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div
                class="relative w-full max-w-[70vw] mx-4 bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[50vh]">

                <!-- Header -->
                <div class="flex justify-between items-center px-4 md:px-6 py-3 border-b bg-blue-950">
                    <h2 class="text-md md:text-lg text-white">
                        <h2 class="text-white" style="font-family: 'Sarabun', sans-serif;">
                            จำนวนข้อมูลที่ import เข้า {{ count($dataToSave) }} รายการ
                        </h2>

                    </h2>
                    <a href="addjob" class="text-white hover:text-gray-200 transition text-xl">✖</a>
                </div>
                <!-- Body -->
                <div class="flex-1 overflow-y-auto p-2 min-h-[200px]">

                    <!-- ตารางแสดงข้อมูล -->
                    <div class="w-full h-full overflow-y-auto">
                        <table class="w-max md:w-full text-xs border-collapse">
                            <thead class="sticky top-0 bg-blue-50 shadow-sm ">
                                <tr class="text-sm text-center text-gray-700"
                                    style="font-family: 'Sarabun', sans-serif;">
                                    <th class="px-2 py-3 border">Site Code</th>
                                    <th class="px-2 py-3 border">Site Name</th>
                                    <th class="px-2 py-3 border">Job Description</th>
                                    <th class="px-2 py-3 border">Project Code</th>
                                    <th class="px-2 py-3 border">Office Code</th>
                                    <th class="px-2 py-3 border">Customer Region</th>
                                    <th class="px-2 py-3 border">Estimated Revenue</th>
                                    <th class="px-2 py-3 border">Estimated Service Cost</th>
                                    <th class="px-2 py-3 border">Estimated Material Cost</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach ($dataToSave as $data)
                                <tr class="hover:bg-gray-100 transition">

                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Site_Code'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Site_Name'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Job_Description'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Project_Code'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Office_Code'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Customer_Region'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Estimated_Revenue'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Estimated_Service_Cost'] ?? '-' }}</td>
                                    <td class="px-2 py-1 border text-center whitespace-nowrap text-[14px]">
                                        {{ $data['Estimated_Material_Cost'] ?? '-' }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end items-center px-6 py-2 border-t bg-gray-50">

                    <a href="addjob"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 transition">
                        ยกเลิก
                    </a>

                    <form action="{{ route('addjob.saveimportnewjob') }}" id="save" method="POST"
                        class="flex items-center gap-2 ml-2">
                        @csrf

                        @foreach ($dataToSave as $index => $data)
                        <input type="hidden" name="dataToSave[{{ $index }}][Site_Code]"
                            value="{{ $data['Site_Code'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Site_Name]"
                            value="{{ $data['Site_Name'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Job_Description]"
                            value="{{ $data['Job_Description'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Project_Code]"
                            value="{{ $data['Project_Code'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Office_Code]"
                            value="{{ $data['Office_Code'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Customer_Region]"
                            value="{{ $data['Customer_Region'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Estimated_Revenue]"
                            value="{{ $data['Estimated_Revenue'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Estimated_Service_Cost]"
                            value="{{ $data['Estimated_Service_Cost'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Estimated_Material_Cost]"
                            value="{{ $data['Estimated_Material_Cost'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Estimated_Gross_Profit]"
                            value="{{ $data['Estimated_Gross_Profit'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Estimated_Gross_ProfitMargin]"
                            value="{{ $data['Estimated_Gross_ProfitMargin'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Job_Adding_Status]"
                            value="{{ $data['Job_Adding_Status'] ?? '' }}">
                        <input type="hidden" name="dataToSave[{{ $index }}][Refcode]"
                            value="{{ $data['Refcode'] ?? '' }}">
                        @endforeach

                        <button type="submit" id="spin"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition flex items-center gap-2">
                            บันทึกข้อมูล

                            <svg id="spinnerSave" class="hidden animate-spin h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                        </button>
                    </form>


                </div>
            </div>
        </div>
        @else
        <!-- ไม่มีข้อมูลที่จะแสดง -->
        @endif



        <!-- Modal Add New Job -->
        <div id="modalLg"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 z-50">
            <!-- Modal Content -->
            <div
                class="bg-white rounded-lg shadow-lg w-11/12 max-w-4xl p-6 relative transform scale-95 transition-all duration-300 overflow-y-auto max-h-[95vh]">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-slate-800">Job Details</h2>
                    <button id="closeModalBtn"
                        class="text-slate-500 hover:text-slate-700 text-2xl font-bold">&times;</button>
                </div>

                <!-- Form -->
                <form action="{{ route('addjob.savenewjob') }}" method="POST" class="space-y-4" autocomplete="off">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <div>
                            <label class="block mb-1 font-semibold">Site Code<span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="site_code" class="border rounded-md w-full p-1" required>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Site Name</label>
                            <input type="text" name="site_name" class="border rounded-md w-full p-1">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Job Description <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="job_description" class="border rounded-md w-full p-1" required>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">
                                Project Code <span class="text-red-500">*</span>
                            </label>

                            <select name="project_code" class="border rounded-md w-full p-1" required>
                                <option value="" disabled selected>-- Select Project Code --</option>

                                @foreach ($projectCodes as $code)
                                <option value="{{ $code->projectCode }}">
                                    {{ $code->projectCode }}
                                </option>
                                @endforeach

                            </select>
                        </div>


                        <div>
                            <label class="block mb-1 font-semibold">
                                Office Code<span class="text-red-500">*</span>
                            </label>

                            <select name="office_code" class="border rounded-md w-full p-1" required>
                                <option value="" disabled selected>-- Select Office Code --</option>

                                @foreach ($officeCodes as $code)
                                <option value="{{ $code->officeCode }}">
                                    {{ $code->officeCode }}
                                </option>
                                @endforeach

                            </select>
                        </div>


                        <div>
                            <label class="block mb-1 font-semibold">Customer Region</label>
                            <input type="text" name="customer_region" class="border rounded-md w-full p-1">
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Estimated Revenue <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="estimated_revenue" name="estimated_revenue"
                                class="border rounded-md w-full p-1" required>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Estimated Service Cost <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="estimated_service_cost" name="estimated_service_cost"
                                class="border rounded-md w-full p-1" required>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Estimated Material Cost <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="estimated_material_cost" name="estimated_material_cost"
                                class="border rounded-md w-full p-1" required>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Estimated Gross Profit</label>
                            <input type="text" id="estimated_gross_profit" name="estimated_gross_profit" readonly
                                class="border rounded-md w-full p-1 font-semibold">
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold  whitespace-nowrap">Estimated Gross Profit
                                Margin</label>
                            <input type="text" id="estimated_gross_profit_margin" name="estimated_gross_profit_margin"
                                readonly class="border rounded-md w-full p-1 font-semibold">
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2 mt-4">

                        @php
                        $fields = [
                        'site_code',
                        'job_description',
                        'project_code',
                        'office_code',
                        'estimated_revenue',
                        'estimated_service_cost',
                        'estimated_material_cost',
                        ];
                        @endphp

                        @foreach ($fields as $field)
                        @error($field)
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @endforeach


                        <button type="button" id="cancelBtn"
                            class="rounded-md border py-2 px-4 font-semibold text-slate-600 hover:bg-slate-100">
                            Cancel
                        </button>
                        <button type="submit"
                            class="rounded-md bg-green-600 text-white py-2 px-4 font-semibold hover:bg-green-700 shadow-md">
                            Save
                        </button>
                    </div>

                </form>
            </div>
        </div>




        <!-- เปิด modal ถ้ามี error จากการ validate -->
        @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                        const addModal = document.getElementById('modalLg');
                        const addModalContent = addModal.querySelector('div');

                        addModal.classList.remove('pointer-events-none', 'opacity-0');
                        addModal.classList.add('opacity-100');

                        addModalContent.classList.remove('scale-95');
                        addModalContent.classList.add('scale-100');
                    });
        </script>
        @endif


        <div class="bg-white p-4 rounded-xl shadow-md h-[520px]">
            <div class="flex items-center justify-between w-full">

                <!-- H2 อยู่ซ้ายสุด -->
                <h2 class="text-2xl font-bold text-blue-900">
                    Added Job Records
                </h2>

                <!-- ปุ่มทั้งหมดอยู่ขวา -->
                <div class="flex space-x-3">

                    <!-- Add New Job -->
                    <button id="openModalBtn" class="px-4 py-2 rounded-lg font-semibold text-white 
               bg-gradient-to-r from-blue-700 to-blue-500 
               shadow-md hover:shadow-lg hover:scale-105 transition-all">
                        Add New Job
                    </button>

                    <!-- Import New Job -->
                    <button id="openModalBtn2" class="px-4 py-2 rounded-lg font-semibold text-white 
               bg-gradient-to-r from-indigo-600 to-purple-500
               shadow-md hover:shadow-lg hover:scale-105 transition-all">
                        Import New Job
                    </button>

                    <!-- Export Visible Data -->
                    <button type="button" id="exportPOToExcel" onclick="exportPOToExcel()" class="px-4 py-2 rounded-lg font-semibold text-white
              bg-gradient-to-r from-green-600 to-green-500
              shadow-md hover:shadow-lg hover:scale-105 transition-all">
                        <i class="fas fa-file-excel mr-2"></i> Export visible Data
                    </button>

                </div>


            </div>

            <div class="overflow-y-auto h-[350px] mt-2">
                <table class="min-w-full border-collapse table-auto">
                    <thead class="bg-blue-950 text-white text-base sticky top-0 z-10">
                        <tr>
                            <th class="py-3 px-4  border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Refcode</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="0">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>


                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Job <br>Adding Status</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="1">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Refcode On ERP</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="2">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Site Code</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="3">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Site Name</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="4">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Job <br> Description</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="5">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Project Code</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="6">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Office Code</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="7">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Customer<br>Region</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="8">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Estimated <br> Revenue</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="9">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Estimated <br> Service Cost</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="10">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Estimated <br> Material Cost</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="11">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Estimated <br> Gross Profit</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="12">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Estimated <br> GrossProfit Margin</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="13">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                            <th class="py-3 px-4 border-b whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Requester</span>

                                    <span class="filter-icon cursor-pointer inline-flex items-center" data-col="14">
                                        <i class="fi fi-br-bars-filter text-white"></i>
                                    </span>
                                </div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newjob as $item)
                        <tr class="hover:bg-red-100 transition-colors duration-200 text-xs ">
                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">{{ $item->Refcode }}</td>



                            <td class="py-1 px-4 border-b whitespace-nowrap text-center">
                                @php
                                $isAuthorized = Auth::check() && Auth::user()->status == 4;
                                $statusColors = [
                                'Pending' => [
                                'bg' => 'bg-yellow-100',
                                'text' => 'text-yellow-800',
                                'dot' => 'bg-yellow-500',
                                'hover' => 'hover:bg-yellow-200',
                                ],
                                'Approved' => [
                                'bg' => 'bg-green-100',
                                'text' => 'text-green-800',
                                'dot' => 'bg-green-500',
                                'hover' => 'hover:bg-green-200',
                                ],
                                'Rejected' => [
                                'bg' => 'bg-red-100',
                                'text' => 'text-red-800',
                                'dot' => 'bg-red-500',
                                'hover' => 'hover:bg-red-200',
                                ],
                                ];
                                $color =
                                $statusColors[$item->Job_Adding_Status] ?? $statusColors['Pending'];
                                @endphp

                                @if ($isAuthorized && $item->Job_Adding_Status === 'Pending')
                                {{-- Pending → Dropdown --}}
                                <div class="relative inline-block">
                                    <button type="button"
                                        class="status-dropdown-btn {{ $color['bg'] }} {{ $color['text'] }} px-2 py-1 rounded-full font-semibold text-sm {{ $color['hover'] }} transition cursor-pointer flex items-center gap-2"
                                        onclick="toggleDropdown(this)">
                                        <span class="w-2 h-2 {{ $color['dot'] }} rounded-full"></span>
                                        {{ $item->Job_Adding_Status }}
                                    </button>
                                    <div
                                        class="status-dropdown absolute top-full left-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg min-w-max z-10 hidden">
                                        <form action="{{ route('update.job.status', $item->id) }}" method="POST"
                                            style="display: contents;">
                                            @csrf
                                            @method('PUT')
                                            @foreach (['Approved', 'Rejected'] as $status)
                                            @php $c = $statusColors[$status]; @endphp
                                            <button type="submit" name="Job_Adding_Status" value="{{ $status }}"
                                                class="w-full px-4 py-2 text-left hover:bg-gray-100 {{ $c['text'] }} flex items-center gap-2 text-sm">
                                                <span class="w-2 h-2 {{ $c['dot'] }} rounded-full"></span>
                                                {{ $status }}
                                            </button>
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                @else
                                {{-- Approved / Rejected หรือ ผู้ใช้งานทั่วไป → ปิด dropdown แต่ UI เหมือนกัน --}}
                                <span
                                    class="inline-flex items-center {{ $color['bg'] }} {{ $color['text'] }} text-sm font-semibold px-2 py-1 rounded-full">
                                    <span class="w-2 h-2 mr-1 {{ $color['dot'] }} rounded-full"></span>
                                    {{ $item->Job_Adding_Status }}
                                </span>
                                @endif
                            </td>

                            <td>Ready/Not Ready</td>



                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">{{ $item->Site_Code }}
                            </td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">{{ $item->Site_Name }}
                            </td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">
                                {{ $item->Job_Description }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">{{ $item->Project_Code }}
                            </td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">{{ $item->Office_Code }}
                            </td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-left">
                                {{ $item->Customer_Region }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-right">
                                {{ $item->Estimated_Revenue }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-right">
                                {{ $item->Estimated_Service_Cost }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-right">
                                {{ $item->Estimated_Material_Cost }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-right">
                                {{ $item->Estimated_Gross_Profit }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-center">
                                {{ $item->Estimated_Gross_ProfitMargin }}</td>
                            <td class="py-1 px-4 border-b whitespace-nowrap text-center">{{ $item->Requester }}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="listViewPagination"
                class="mt-4 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 p-4 bg-gray-50 rounded-b-xl border border-t-0 border-gray-200">
                <!-- Row Count Dropdown -->
                <div class="flex items-center space-x-3">
                    <label for="rowsPerPage" class="text-sm font-medium text-gray-600">แสดงรายการ:</label>
                    <select id="rowsPerPageList" onchange="changeRowsPerPage(this.value)"
                        class="py-2 px-4 border border-gray-300 rounded-lg text-sm font-semibold bg-white cursor-pointer shadow-sm transition duration-150 hover:border-indigo-400 focus:ring-indigo-500 focus:border-indigo-500 appearance-none">
                        <option value="5">5 แถว</option>
                        <option value="10" selected>10 แถว</option>
                        <option value="20">20 แถว</option>
                    </select>
                </div>

                <!-- Pagination -->
                <nav class="flex items-center space-x-1" aria-label="Pagination">
                    <button id="prevPageBtnList" onclick="goToPage(currentPage - 1)"
                        class="pagination-btn p-3 rounded-full text-indigo-600 hover:bg-indigo-100 transition duration-150 disabled:opacity-50 disabled:cursor-not-allowed">
                        < </button>

                            <div id="pageNumbersList" class="flex space-x-1">
                                <!-- Page buttons -->
                            </div>

                            <button id="nextPageBtnList" onclick="goToPage(currentPage + 1)"
                                class="pagination-btn p-3 rounded-full text-indigo-600 hover:bg-indigo-100 transition duration-150 disabled:opacity-50 disabled:cursor-not-allowed">
                                >
                            </button>
                </nav>

                <!-- Status/Summary Text -->
                <span id="paginationSummaryList" class="text-sm text-gray-600">
                    แสดง 1-10 จากทั้งหมด 15 รายการ
                </span>
            </div>
        </div>


    </main>
</div>


<script>
    function toggleDropdown(btn) {
            const dropdown = btn.nextElementSibling;
                dropdown.classList.toggle('hidden');
                document.querySelectorAll('.status-dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.add('hidden');
                        });
                         }

                        document.addEventListener('click', function(e) {
                            if (!e.target.closest('.relative')) {
                            document.querySelectorAll('.status-dropdown').forEach(d => d.classList.add('hidden'));
                            }
                            });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {

            /* ===========================
               MODAL: ADD NEW JOB
            ============================ */
            const openAddBtn = document.getElementById('openModalBtn');
            const addModal = document.getElementById('modalLg');
            const addModalContent = addModal.querySelector('div');
            const closeAddBtn = document.getElementById('closeModalBtn');
            const cancelAddBtn = document.getElementById('cancelBtn');

            const revenueInput = document.getElementById('estimated_revenue');
            const serviceCostInput = document.getElementById('estimated_service_cost');
            const materialCostInput = document.getElementById('estimated_material_cost');
            const grossProfitInput = document.getElementById('estimated_gross_profit');
            const grossProfitMarginInput = document.getElementById('estimated_gross_profit_margin');

            const modalInputs = [revenueInput, serviceCostInput, materialCostInput, grossProfitInput,
                grossProfitMarginInput
            ];

            function calculateGross(format = true) {
                const revenue = parseFloat(revenueInput.value.replace(/,/g, '')) || 0;
                const serviceCost = parseFloat(serviceCostInput.value.replace(/,/g, '')) || 0;
                const materialCost = parseFloat(materialCostInput.value.replace(/,/g, '')) || 0;

                const grossProfit = (revenue - serviceCost) - materialCost;
                const grossProfitMargin = revenue ? (grossProfit / revenue) * 100 : 0;

                const formatNumber = (num) => num.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

                if (format && (revenue || serviceCost || materialCost)) {
                    revenueInput.value = formatNumber(revenue);
                    serviceCostInput.value = formatNumber(serviceCost);
                    materialCostInput.value = formatNumber(materialCost);
                    grossProfitInput.value = formatNumber(grossProfit);
                    grossProfitMarginInput.value = formatNumber(grossProfitMargin) + '%';
                } else {
                    grossProfitInput.value = grossProfit.toFixed(2);
                    grossProfitMarginInput.value = grossProfitMargin.toFixed(2) + '%';
                }
            }

            function openAddModal() {
                modalInputs.forEach(input => input.value = '');
                addModal.classList.remove('pointer-events-none', 'opacity-0');
                addModal.classList.add('opacity-100');
                addModalContent.classList.remove('scale-95');
                addModalContent.classList.add('scale-100');
            }

            function closeAddModal() {
                addModal.classList.remove('opacity-100');
                addModal.classList.add('opacity-0');
                addModalContent.classList.remove('scale-100');
                addModalContent.classList.add('scale-95');
                setTimeout(() => addModal.classList.add('pointer-events-none'), 300);
            }

            if (openAddBtn) openAddBtn.addEventListener('click', openAddModal);
            closeAddBtn.addEventListener('click', closeAddModal);
            cancelAddBtn.addEventListener('click', closeAddModal);

            addModal.addEventListener('click', (e) => {
                if (e.target === addModal) closeAddModal();
            });

            [revenueInput, serviceCostInput, materialCostInput].forEach(input => {
                input.addEventListener('keydown', (e) => {
                    if (e.key === '-' || e.key === 'e') e.preventDefault();
                });

                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^0-9.]/g, '');
                    calculateGross(false);
                });

                input.addEventListener('blur', () => {
                    calculateGross(true);
                });
            });

            /* ===========================
               MODAL: IMPORT JOB
            ============================ */

            const openImportBtn = document.getElementById('openModalBtn2');
            const importModal = document.getElementById('importModal');
            const importModalContent = importModal.querySelector('div');
            const closeImportBtn = document.getElementById('closeImportModal');
            const cancelImportBtn = document.getElementById('cancelImportBtn');

            function openImportModal() {
                importModal.classList.remove('pointer-events-none', 'opacity-0');
                importModal.classList.add('opacity-100');
                importModalContent.classList.remove('scale-95');
                importModalContent.classList.add('scale-100');
            }

            function closeImportModal() {
                importModal.classList.remove('opacity-100');
                importModal.classList.add('opacity-0');
                importModalContent.classList.remove('scale-100');
                importModalContent.classList.add('scale-95');

                setTimeout(() => importModal.classList.add('pointer-events-none'), 300);
            }

            openImportBtn.addEventListener('click', openImportModal);
            closeImportBtn.addEventListener('click', closeImportModal);
            cancelImportBtn.addEventListener('click', closeImportModal);

            importModal.addEventListener('click', (e) => {
                if (e.target === importModal) closeImportModal();
            });

        }); // END DOMContentLoaded
</script>







<!-- ก้อน Filter ที่ใช้ทุกคอลั่ม -->
<div id="column-filter-modal" class="fixed inset-0 z-[100] hidden bg-transparent">
    <div id="column-filter-content" onclick="event.stopPropagation()"
        class="shadow-2xl bg-white rounded-xl flex flex-col w-[300px] absolute border border-gray-100">

        <!-- Search Input -->
        <div class="px-4 py-3 border-b border-gray-100">
            <div class="relative">
                <i data-lucide="search"
                    class="fa-solid fa-magnifying-glass w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                <input type="text" id="column-filter-search" placeholder=""
                    class="pl-9 pr-3 w-full h-9 outline-none bg-gray-50 border border-gray-200 rounded-lg text-sm transition-all focus:border-blue-400 focus:bg-white"
                    oninput="handleSearch(this.value)">
            </div>
        </div>

        <!-- Selection and Sorting Controls -->
        <div class="px-4 pt-3 pb-2 border-b border-gray-100">
            <!-- Select / Deselect All -->
            <div class="flex justify-between space-x-2 mb-3">
                <button type="button" id="selectAllFilter" onclick="selectAll()"
                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1">
                    Select All
                </button>
                <button type="button" id="deselectAllFilter" onclick="deselectAll()"
                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1">
                    Deselect All
                </button>
            </div>

            <!-- Sort Buttons -->
            <div class="flex justify-between space-x-2">
                <button type="button" onclick="sortAZ()"
                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1">
                    <i data-lucide="arrow-down-a-to-z" class="w-3.5 h-3.5"></i>
                    <span>Sort A &rarr; Z</span>
                </button>
                <button type="button" onclick="sortZA()"
                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1">
                    <i data-lucide="arrow-up-z-to-a" class="w-3.5 h-3.5"></i>
                    <span>Sort Z &rarr; A</span>
                </button>
            </div>
        </div>

        <!-- Checkbox List -->
        <div id="column-filter-checkbox-list" class="overflow-y-auto px-4 py-2 text-sm max-h-60 flex-grow">
            <!-- Checkboxes generated by JS -->
        </div>

        <!-- Apply / Cancel Footer -->
        <div class="flex justify-end space-x-2 border-t px-4 py-3 bg-gray-50 rounded-b-xl">
            <button type="button" onclick="applyColumnFilter()"
                class="bg-blue-600 text-white px-4 py-2 text-xs rounded-lg font-semibold hover:bg-blue-700 transition shadow-md">OK</button>
            <button type="button" onclick="closeColumnFilterModal()"
                class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-xs rounded-lg font-semibold hover:bg-gray-100 transition shadow-sm">Cancel</button>
        </div>
    </div>
</div>



<!-- ฟังชั่น Filter  -->
<script>
    /* -----------------------------------------------------
   ICON CONFIG
----------------------------------------------------- */
const ICONS = {
  normal: `<i class="fi fi-br-bars-filter text-white transition duration-150"></i>`,
  active: `<i class="fi fi-br-bars-filter text-white transition duration-150"></i>`,
  filter: `<i class="fi fi-br-bars-filter text-blue-400 transition duration-150"></i>`
};

/* -----------------------------------------------------
   GLOBAL STATE
----------------------------------------------------- */
let openFilterColumn = null;
let filters = {};                 // filters[col] = array OR null
let originalColumnValues = {};    // ค่าทั้งหมดในแต่ละคอลัมน์ (สำหรับ Checkbox list)

let allRows = [];       // ทุก tr ใน tbody (ต้นฉบับ)
let visibleRows = [];   // tr ที่ผ่าน filter (สำหรับ pagination)
let totalRows = 0;

let rowsPerPage = 10;
let currentPage = 1;

/* -----------------------------------------------------
   INITIAL LOAD
----------------------------------------------------- */
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".filter-icon").forEach(icon => {
        icon.addEventListener("click", e => {
            e.stopPropagation(); // ❗ สำคัญมาก ป้องกันเปิดซ้อน
            openColumnFilter(Number(icon.dataset.col));
        });
    });



    /* เก็บค่าต้นทางทั้งหมด (แบบ Excel) */
    const trs = Array.from(document.querySelectorAll("tbody tr"));
    const colCount = document.querySelectorAll("thead th").length;

    for (let i = 0; i < colCount; i++) originalColumnValues[i] = new Set();

    trs.forEach(row => {
        [...row.children].forEach((cell, col) => {
            originalColumnValues[col].add(cell.innerText.trim());
        });
    });

    allRows = trs;
    // ตอนเริ่มต้น visibleRows = allRows
    visibleRows = allRows.slice();
    totalRows = visibleRows.length;

    setupRowsPerPageOptions();
    renderPagination();
});

/* -----------------------------------------------------
   FILTER
----------------------------------------------------- */
function openColumnFilter(colIndex) {
    if (openFilterColumn === colIndex) {
        closeColumnFilterModal(false);
        return;
    }

    openFilterColumn = colIndex;
    loadFilterValues(colIndex);

    document.querySelectorAll(".filter-icon").forEach(x => {
        x.classList.toggle("filter-active", Number(x.dataset.col) === colIndex);
    });

    showFilterModal(
        document.querySelector(`.filter-icon[data-col="${colIndex}"]`)
    );
}




function showFilterModal(icon) {
    const modal = document.getElementById("column-filter-modal");
    const box = document.getElementById("column-filter-content");

    modal.classList.remove("hidden");

    const rect = icon.getBoundingClientRect();
    const boxWidth = 300; // ความกว้าง filter popup ของคุณ
    const screenWidth = window.innerWidth;

    let left = rect.left;

    // ถ้าจะล้นจอ → ขยับไปทางซ้าย
    if (left + boxWidth > screenWidth - 10) {
        left = screenWidth - boxWidth - 10;
    }

    box.style.left = `${left}px`;
    box.style.top = `${rect.bottom + window.scrollY}px`;
}


function loadFilterValues(colIndex) {
    const list = document.getElementById("column-filter-checkbox-list");
    list.innerHTML = "";

    // --- ต้องแสดงค่าทั้งหมดในคอลัมน์นี้เสมอ (เหมือน Excel) ---
    const values = [...originalColumnValues[colIndex]].sort((a,b) =>
        a.localeCompare(b, undefined, {numeric:true})
    );

    const selected = filters[colIndex] || null;

    values.forEach(v => {
        list.innerHTML += `
            <label class="flex items-center space-x-2 py-1">
                <input type="checkbox" class="filter-checkbox" value="${v}"
                    ${(selected === null || selected.includes(v)) ? "checked" : ""}>
                <span>${v}</span>
            </label>
        `;
    });
}



function handleSearch(text) {
    const list = document.getElementById("column-filter-checkbox-list");
    const keyword = text.toLowerCase().trim();

    const items = list.querySelectorAll("label");

    items.forEach(label => {
        const value = label.querySelector("span").innerText.toLowerCase();
        label.style.display = (value.includes(keyword)) ? "" : "none";
    });
}


function selectAll() {
    document.querySelectorAll("#column-filter-checkbox-list .filter-checkbox")
        .forEach(cb => cb.checked = true);
}

function deselectAll() {
    document.querySelectorAll("#column-filter-checkbox-list .filter-checkbox")
        .forEach(cb => cb.checked = false);
}

function sortAZ() {
    sortTable(openFilterColumn, 'asc');
}


function sortZA() {
    sortTable(openFilterColumn, 'desc');
}




function applyColumnFilter() {
    const col = openFilterColumn;

    const checkboxes = document.querySelectorAll(".filter-checkbox");
    const selected = [...checkboxes]
        .filter(cb => cb.checked)
        .map(cb => cb.value);

    const total = checkboxes.length;

    // 🔑 ถ้าเลือกทั้งหมด หรือไม่ได้เลือกอะไรเลย = ไม่มี filter
    if (selected.length === 0 || selected.length === total) {
        filters[col] = null;
    } else {
        filters[col] = selected;
    }

    applyAllFilters();
    closeColumnFilterModal(false);
}





function applyAllFilters() {
    // เริ่มจาก allRows เสมอ แล้วคัดเฉพาะที่ผ่าน filter
    visibleRows = allRows.filter(row => {
        for (let colKey in filters) {
            const allowed = filters[colKey];
            if (!allowed) continue;
            const colIndex = Number(colKey);
            const value = (row.children[colIndex] && row.children[colIndex].innerText) ? row.children[colIndex].innerText.trim() : "";
            if (!allowed.includes(value)) return false;
        }
        return true;
    });

    totalRows = visibleRows.length;

    // reset pagination
    currentPage = 1;
    renderPagination();

    // update icons (in case filters cleared)
    document.querySelectorAll(".filter-icon").forEach(x => {
        const idx = x.dataset.col;
        x.classList.toggle("filter-active", !!filters[idx]);
    });

}

function closeColumnFilterModal(resetIcon = true) {
    document.getElementById("column-filter-modal").classList.add("hidden");

    if (resetIcon && openFilterColumn != null) {
        const icon = document.querySelector(`.filter-icon[data-col="${openFilterColumn}"]`);
        icon.innerHTML = filters[openFilterColumn] ? ICONS.filter : ICONS.normal;
    }


    openFilterColumn = null;
}


/* ปิด modal เมื่อคลิกข้างนอก */
document.addEventListener("mousedown", e => {
    const modal = document.getElementById("column-filter-modal");
    if (modal.classList.contains("hidden")) return;

    const box = document.getElementById("column-filter-content");
    if (!box.contains(e.target)) closeColumnFilterModal();
});

/* -----------------------------------------------------
   PAGINATION (ทำงานร่วมกับ Filter)
----------------------------------------------------- */
function setupRowsPerPageOptions() {
    const select = document.getElementById("rowsPerPageList");
    if (!select) return;
    select.innerHTML = "";

    const presets = [5, 10, 20, 50, 100];

    presets.forEach(n => {
        if (n < allRows.length) {
            let opt = document.createElement("option");
            opt.value = n;
            opt.textContent = `${n} แถว`;
            select.appendChild(opt);
        }
    });

    let allOpt = document.createElement("option");
    allOpt.value = allRows.length;
    allOpt.textContent = `ทั้งหมด (${allRows.length} แถว)`;
    select.appendChild(allOpt);

    select.value = rowsPerPage;
}

function renderPagination() {
    // ป้องกัน totalPages = 0
    const totalPages = Math.max(1, Math.ceil(totalRows / rowsPerPage));

    if (currentPage > totalPages) currentPage = totalPages;
    if (currentPage < 1) currentPage = 1;

    /* ซ่อนทั้งหมดก่อน */
    allRows.forEach(r => r.style.display = "none");

    /* คำนวณขอบเขตและแสดงเฉพาะ visibleRows ในช่วงหน้า */
    if (totalRows === 0) {
        document.getElementById("paginationSummaryList").innerText = `แสดง 0-0 จากทั้งหมด 0 รายการ`;
    } else {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        visibleRows.slice(start, end).forEach(r => r.style.display = "");
        document.getElementById("paginationSummaryList").innerText =
            `แสดง ${start + 1}-${Math.min(end, totalRows)} จากทั้งหมด ${totalRows} รายการ`;
    }

    /* ปุ่ม pagination */
    document.getElementById("prevPageBtnList").disabled = currentPage === 1;
    document.getElementById("nextPageBtnList").disabled = currentPage >= totalPages;

    const pageContainer = document.getElementById("pageNumbersList");
    if (pageContainer) {
        pageContainer.innerHTML = "";
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement("button");
            btn.textContent = i;
            btn.className =
                "px-3 py-1 rounded-lg text-sm font-semibold transition " +
                (i === currentPage
                    ? "bg-indigo-600 text-white"
                    : "bg-white border border-gray-300 text-indigo-600 hover:bg-indigo-100");
            btn.onclick = () => goToPage(i);
            pageContainer.appendChild(btn);
        }
    }
}

function goToPage(page) {
    currentPage = page;
    renderPagination();
}

function changeRowsPerPage(v) {
    rowsPerPage = parseInt(v);
    currentPage = 1;
    renderPagination();
}
</script>


<!-- ฟังชั่น Sort A -> Z Sort Z -> A -->
<script>
    function sortTable(colIndex, direction = 'asc') {
    // copy rows เพื่อจัดเรียง
    let sorted = [...allRows];

    sorted.sort((a, b) => {
        const v1 = a.children[colIndex]?.innerText.trim().toLowerCase() ?? "";
        const v2 = b.children[colIndex]?.innerText.trim().toLowerCase() ?? "";

        return direction === 'asc'
            ? v1.localeCompare(v2, undefined, { numeric: true })
            : v2.localeCompare(v1, undefined, { numeric: true });
    });

    // update allRows
    allRows = sorted;

    // เมื่อ sort แล้ว ต้องนำ filter มาคัดอีกครั้ง
    applyAllFilters();
}

</script>







<!-- ฟังชันสำหรับ Export -->
<script>
    function exportPOToExcel() {
    const table = document.querySelector("table");
    const tbody = table.querySelector("tbody");
    const visibleRows = Array.from(tbody.querySelectorAll("tr"))
        .filter(row => row.style.display !== "none");

    if (visibleRows.length === 0) {
        alert("ไม่มีข้อมูลในหน้านี้เพื่อทำการ Export");
        return;
    }

    // เตรียม JSON data
    const exportData = [];

    visibleRows.forEach(row => {
        const cells = row.querySelectorAll("td");

        exportData.push({
            "Refcode": cells[0].innerText.trim(),
            "Job Adding Status": cells[1].innerText.trim(),
            "Refcode on ERP": cells[2].innerText.trim(),
            "Site Code": cells[3].innerText.trim(),
            "Site Name": cells[4].innerText.trim(),
            "Job Description": cells[5].innerText.trim(),
            "Project Code": cells[6].innerText.trim(),
            "Office Code": cells[7].innerText.trim(),
            "Customer Region": cells[8].innerText.trim(),
            "Estimated Revenue": cells[9].innerText.trim(),
            "Estimated Service Cost": cells[10].innerText.trim(),
            "Estimated Material Cost": cells[11].innerText.trim(),
            "Estimated Gross Profit": cells[12].innerText.trim(),
            "Gross Profit Margin": cells[13].innerText.trim(),
            "Requester": cells[14].innerText.trim(),
        });
    });

    // สร้าง Workbook
    const ws = XLSX.utils.json_to_sheet(exportData);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Visible Data");

    // ดาวน์โหลดไฟล์
    XLSX.writeFile(wb, "Visible_Table_Data.xlsx");
}

</script>



<script>
    const notifBtn = document.getElementById('notification-button');
    const notifDropdown = document.getElementById('notification-dropdown');

    notifBtn.addEventListener('click', () => {
        notifDropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        if (!notifBtn.contains(event.target) && !notifDropdown.contains(event.target)) {
            notifDropdown.classList.add('hidden');
        }
    });
</script>



@endsection