@extends('layouts.Tailwind')
@section('title', 'GTN')
@section('content')

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet" />

<!-- Flowbite JS (รวม Popover support) -->
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>


<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">



<style>
    /* Css สำหรับ checkbox */
    .checkbox-wrapper-46 input[type="checkbox"] {
        display: none;
        visibility: hidden;
    }

    .checkbox-wrapper-46 .cbx {
        margin: auto;
        -webkit-user-select: none;
        user-select: none;
        cursor: pointer;
    }

    .checkbox-wrapper-46 .cbx span {
        display: inline-block;
        vertical-align: middle;
        transform: translate3d(0, 0, 0);
    }

    .checkbox-wrapper-46 .cbx span:first-child {
        position: relative;
        width: 18px;
        height: 18px;
        border-radius: 3px;
        transform: scale(1);
        vertical-align: middle;
        border: 1px solid #9098a9;
        transition: all 0.2s ease;
    }

    .checkbox-wrapper-46 .cbx span:first-child svg {
        position: absolute;
        top: 3px;
        left: 2px;
        fill: none;
        stroke: #ffffff;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 16px;
        stroke-dashoffset: 16px;
        transition: all 0.3s ease;
        transition-delay: 0.1s;
        transform: translate3d(0, 0, 0);
    }

    .checkbox-wrapper-46 .cbx span:first-child:before {
        content: "";
        width: 100%;
        height: 100%;
        background: #506eec;
        display: block;
        transform: scale(0);
        opacity: 1;
        border-radius: 50%;
    }

    .checkbox-wrapper-46 .cbx span:last-child {
        padding-left: 8px;
    }

    .checkbox-wrapper-46 .cbx:hover span:first-child {
        border-color: #506eec;
    }

    .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child {
        background: #506eec;
        border-color: #506eec;
        animation: wave-46 0.4s ease;
    }

    .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child svg {
        stroke-dashoffset: 0;
    }

    .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child:before {
        transform: scale(3.5);
        opacity: 0;
        transition: all 0.6s ease;
    }

    @keyframes wave-46 {
        50% {
            transform: scale(0.9);
        }
    }

    .dropdown-trigger-site .left-icon-site {
        transform: rotate(45deg);
    }

    .dropdown-trigger-site .right-icon-site {
        transform: rotate(-45deg);
    }

    .dropdown-trigger-site.active .left-icon-site {
        transform: rotate(135deg);
    }

    .dropdown-trigger-site.active .right-icon-site {
        transform: rotate(-135deg);
    }
</style>


<!-- <div class="container mx-auto"> -->


<div class=" overflow-x-auto h-screen border border-gray-300 rounded-md shadow-md ">

    <table class="min-w-[1800px] text-[10px] text-gray-700 table-fixed">
        <thead class="bg-blue-600 text-black font-[Roboto] text-[10px]">
            <tr class="text-center">
                <!-- Sticky Column -->
                <th class="sticky top-0 left-0 bg-yellow-300 z-30 min-w-[40px] max-w-[60px] p-1 break-words">
                    Edit
                </th>


                <!-- RefCode -->
                <th class="sticky left-[40px] z-30 bg-yellow-300 text-center min-w-[100px]">
                    <div class="inline-block w-full relative">
                        <button id="dropdownButtonRefcode" onclick="openDropdown('refcode')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">

                            <span class="text-center">RefCode</span>

                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>

                        </button>

                        <!-- Dropdown RefCode -->
                        <div id="dropdownRefCode"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input RefCode -->
                            <input id="input-search-refcode" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">

                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('refcode')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('refcode')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('refcode')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('refcode')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox Refcode-->
                            <div id="checkbox-list-refcode" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('refcode')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('refcode')">Cancel</button>
                            </div>


                        </div>
                    </div>
                </th>

                <!-- Site Code -->
                <th class="sticky left-[140px] z-30 bg-yellow-300 text-center min-w-[100px]">
                    <div class="inline-block w-full relative">
                        <button id="dropdownButtonSiteCode" onclick="openDropdown('sitecode')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">

                            <span class="text-center">Site Code</span>

                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>

                        </button>

                        <!-- Dropdown SiteCode -->
                        <div id="dropdownSiteCode"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Site Code -->
                            <input id="input-search-sitecode" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">

                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('sitecode')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('sitecode')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('sitecode')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('sitecode')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox Site-->
                            <div id="checkbox-list-sitecode" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('sitecode')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('sitecode')">Cancel</button>
                            </div>


                        </div>
                    </div>
                </th>



                <!-- Site Name -->
                <th class="sticky left-[240px] z-30 bg-yellow-300 text-center min-w-[100px]">
                    <div class="inline-block w-full relative">
                        <button id="dropdownButtonSiteName" onclick="openDropdown('sitename')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">

                            <span class="text-center">Site Name</span>

                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>

                        </button>

                        <!-- Dropdown Site Name -->
                        <div id="dropdownSiteName"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input SiteName -->
                            <input id="input-search-sitename" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">

                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('sitename')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('sitename')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('sitename')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('sitename')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox Sitename-->
                            <div id="checkbox-list-sitename" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('sitename')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('sitename')">Cancel</button>
                            </div>


                        </div>
                    </div>
                </th>



                <!-- GTN Office -->
                <th class="relative sticky left-[340px] z-30 bg-yellow-300 text-center min-w-[100px]">
                    <div class="inline-block w-full relative">
                        <button id="dropdownButtonGTN-Office" onclick="openDropdown('gtnoffice')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">GTN Office</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>


                        <!-- Dropdown -->
                        <div id="dropdownGTN-Office"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input GTN Office -->
                            <input id="input-search-GTN-Office" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">

                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('gtnoffice')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('gtnoffice')">
                                    Deselect All
                                </button>
                            </div>


                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('gtnoffice')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('gtnoffice')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox GTN Office -->
                            <div id="checkbox-list-gtnoffice" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('gtnoffice')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('gtnoffice')">Cancel</button>
                            </div>
                        </div>
                </th>


                <!-- TRUE Region -->
                <th class="sticky left-[440px] z-30 bg-yellow-300 text-center min-w-[100px]">
                    <div class="inline-block w-full relative">
                        <button id="dropdownButtonTrueRegion" onclick="openDropdown('trueRegion')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">TRUE Region</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTrueRegion"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input TRUE Region -->
                            <input id="input-search-TRUE-Region" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('trueRegion')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('trueRegion')">
                                    Deselect All
                                </button>
                            </div>


                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('trueRegion')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('trueRegion')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox TrueRegion -->
                            <div id="checkbox-list-trueRegion" class="pt-2 space-y-2 "></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('trueRegion')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('trueRegion')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>





                <!-- Tower Type -->
                <th data-popover-target="popover-hover-Tower-Type" data-popover-trigger="hover"
                    class="relative sticky left-[540px] z-30 bg-yellow-300 text-center min-w-[100px] cursor-pointer group">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTowerType" onclick="openDropdown('towerType')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Type</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTowerType"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Type -->
                            <input id="input-search-Tower-Type" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerType')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerType')">
                                    Deselect All
                                </button>
                            </div>


                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerType')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerType')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox TowerType -->
                            <div id="checkbox-list-towerType" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerType')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerType')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>
                <!-- Popover: Tower Type -->
                <div data-popover id="popover-hover-Tower-Type" role="tooltip"
                    class="absolute z-30 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>ประเภทเสา</p>
                    </div>
                </div>



                <!-- Tower Model -->
                <th data-popover-target="popover-hover-Tower-Model" data-popover-trigger="hover"
                    class="relative sticky left-[640px] z-30 bg-yellow-300 text-center min-w-[100px] cursor-pointer group">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTowerModel" onclick="openDropdown('towerModel')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Model</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTowerModel"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Model -->
                            <input id="input-search-Tower-Model" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerModel')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerModel')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerModel')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerModel')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox towerModel -->
                            <div id="checkbox-list-towerModel" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerModel')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerModel')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover Tower Model -->
                <div data-popover id="popover-hover-Tower-Model" role="tooltip"
                    class="absolute z-30 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>รุ่นเสา</p>
                    </div>
                </div>

                <!-- Estimated Tower Weight (Kg.) -->
                <th data-popover-target="popover-hover-Estimated-Tower-Weight-(Kg.)" data-popover-trigger="hover"
                    class="relative sticky left-[740px] z-30 bg-yellow-300 text-center min-w-[100px] cursor-pointer group">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimated-Tower-Weight-(Kg.)"
                            onclick="openDropdown('estimatedtowerweightKg')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Tower Weight (Kg.) </span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimated-Tower-Weight-(Kg.)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated Tower Weight (Kg.) -->
                            <input id="input-search-Estimated-Tower-Weight-(Kg.)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedtowerweightKg')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedtowerweightKg')">
                                    Deselect All
                                </button>
                            </div>


                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedtowerweightKg')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedtowerweightKg')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- checkbox TowerType -->
                            <div id="checkbox-list-estimated-tower-weight-Kg" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedtowerweightKg')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedtowerweightKg')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Estimated Tower Weight (Kg.) -->
                <div data-popover id="popover-hover-Estimated-Tower-Weight-(Kg.)" role="tooltip"
                    class="absolute z-30 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>น้ำหนักเสาโดยประมาณ</p>
                    </div>
                </div>


                <!-- Actual Tower Weight (Kg.) -->
                <th data-popover-target="popover-hover-Actual-Tower-Weight" data-popover-trigger="hover"
                    class="relative sticky left-[840px] z-30 bg-yellow-300 text-center min-w-[100px] cursor-pointer group">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActualTowerWeight" onclick="openDropdown('actualTowerWeight')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual Tower Weight (Kg.)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActualTowerWeight"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual Tower Weight (Kg.) -->
                            <input id="input-search-Actual-Tower-Weight" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualTowerWeight')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualTowerWeight')">
                                    Deselect All
                                </button>
                            </div>


                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualTowerWeight')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualTowerWeight')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual Tower Weight -->
                            <div id="checkbox-list-actualTowerWeight" class="pt-2 space-y-2"></div>




                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualTowerWeight')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualTowerWeight')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Estimated Tower Weight (Kg.) -->
                <div data-popover id="popover-hover-Actual-Tower-Weight" role="tooltip"
                    class="absolute z-30 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>น้ำหนักเสาจริง</p>
                    </div>
                </div>


                <!-- Remark -->
                <th data-popover-target="popover-hover-Remark" data-popover-trigger="hover"
                    class="relative sticky left-[940px] z-30 bg-yellow-300 text-center min-w-[100px] cursor-pointer group">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonRemark" onclick="openDropdown('remark')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md bg-yellow-300 transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Remark</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownRemark"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Remark -->
                            <input id="input-search-Remark" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('remark')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('remark')">
                                    Deselect All
                                </button>
                            </div>


                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('remark')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('remark')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Remark -->
                            <div id="checkbox-list-remark" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('remark')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('remark')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>



                <!--------------------------------------------------------         Estimated Price        ----------------------------------------->

                <!-- Estimated Revenue -->
                <th data-popover-target="popover-hover-Estimated-Revenue" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimatedRevenue" onclick="openDropdown('estimatedrevenue')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Revenue</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimatedRevenue"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated Revenue -->
                            <input id="input-search-Estimated-Revenue" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedrevenue')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedrevenue')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedrevenue')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedrevenue')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimated Revenue -->
                            <div id="checkbox-list-estimatedrevenue" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedrevenue')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedrevenue')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover Estimated Revenue -->
                <div data-popover id="popover-hover-Estimated-Revenue" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[250px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>ประมาณราคารับ (รื้อถอน + ขายเสา)</p>
                    </div>
                </div>

                <!-- Estimated Service cost -->
                <th data-popover-target="popover-hover-Estimated-Service-cost" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimated-Service-cost" onclick="openDropdown('estimatedservicecost')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Service cost</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimated-Service-cost"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated-Service-cost -->
                            <input id="input-search-Estimated-Service-cost" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedservicecost')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedservicecost')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedservicecost')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedservicecost')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimated Service cost -->
                            <div id="checkbox-list-estimatedservicecost" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedservicecost')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedservicecost')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover Estimated Service cost -->
                <div data-popover id="popover-hover-Estimated-Service-cost" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>ประมาณค่าบริการรื้อถอนเสา</p>
                    </div>
                </div>


                <!-- Estimated buyback cost -->
                <th data-popover-target="popover-hover-Estimated-buyback-cost" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimatedbuybackcost" onclick="openDropdown('estimatedbuybackcost')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated buyback cost</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimatedbuybackcost"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated buyback cost -->
                            <input id="input-search-estimatedbuybackcost" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedbuybackcost')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedbuybackcost')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedbuybackcost')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedbuybackcost')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimatedbuy back cost -->
                            <div id="checkbox-list-estimatedbuybackcost" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedbuybackcost')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedbuybackcost')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Estimated buyback cost -->
                <div data-popover id="popover-hover-Estimated-buyback-cost" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>ค่าซื้อเสาโดยประมาณ</p>
                    </div>
                </div>


                <!-- Estimated Transportation Cost -->
                <th data-popover-target="popover-hover-Estimated-Transportation-Cost" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimatedTransportationCost"
                            onclick="openDropdown('estimatedtransportationcost')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Transportation Cost</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimatedTransportationCost"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated Transportation Cost -->
                            <input id="input-search-estimatedtransportationcost" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedtransportationcost')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedtransportationcost')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedtransportationcost')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedtransportationcost')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimated Transportation Cost -->
                            <div id="checkbox-list-estimatedtransportationcost" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedtransportationcost')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedtransportationcost')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Estimated Transportation Cost -->
                <div data-popover id="popover-hover-Estimated-Transportation-Cost" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>ค่าขนส่งโดยประมาณ</p>
                    </div>
                </div>

                <!-- Estimated Other Cost -->
                <th data-popover-target="popover-hover-Estimated-Other-Cost" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimatedOtherCost" onclick="openDropdown('estimatedothercost')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Other Cost</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimatedOtherCost"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input EstimatedOtherCost -->
                            <input id="input-search-estimatedothercost" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedothercost')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedothercost')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedothercost')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedothercost')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimated Other Cost -->
                            <div id="checkbox-list-estimatedothercost" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedothercost')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedothercost')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Estimated Other Cost -->
                <div data-popover id="popover-hover-Estimated-Other-Cost" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex items-center justify-center p-2 ">
                        <p>ค่าใช้จ่ายอื่นๆ</p>
                    </div>
                </div>


                <!-- Estimated Gross Profit -->
                <th data-popover-target="popover-hover-Estimated-Gross-Profit" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimatedGrossProfit" onclick="openDropdown('estimatedgrossprofit')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Gross Profit</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimatedGrossProfit"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated Gross Profit -->
                            <input id="input-search-estimatedgrossprofit" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedgrossprofit')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedgrossprofit')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedgrossprofit')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedgrossprofit')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimated Gross Profit -->
                            <div id="checkbox-list-estimatedgrossprofit" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedgrossprofit')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedgrossprofit')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Estimated Gross Profit Margin -->
                <th data-popover-target="popover-hover-Estimated-Gross-Profit-Margin" data-popover-trigger="hover"
                    class=" z-30 text-center bg-blue-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonEstimated-Gross-Profit-Margin"
                            onclick="openDropdown('estimatedgrossprofitmargin')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Estimated Gross Profit Margin</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownEstimatedGrossProfitMargin"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated Gross Profit Margin -->
                            <input id="input-search-estimatedgrossprofitmargin" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('estimatedgrossprofitmargin')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('estimatedgrossprofitmargin')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('estimatedgrossprofitmargin')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('estimatedgrossprofitmargin')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Estimated Gross Profit Margin -->
                            <div id="checkbox-list-estimatedgrossprofitmargin" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('estimatedgrossprofitmargin')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('estimatedgrossprofitmargin')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!---------------------------------------------Working Progress--------------------------------------------------->


                <!-- Job Assigned date by Customer -->
                <th data-popover-target="popover-hover-Job-Assigned-date-by-Customer" data-popover-trigger="hover"
                    class=" z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonJobAssigneddatebyCustomer"
                            onclick="openDropdown('jobassigneddatebycustomer')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Job Assigned date by Customer</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownJobAssigneddatebyCustomer"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Estimated Gross Profit Margin -->
                            <input id="input-search-jobassigneddatebycustomer" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('jobassigneddatebycustomer')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('jobassigneddatebycustomer')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('jobassigneddatebycustomer')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('jobassigneddatebycustomer')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Job Assigned date by Customer  -->
                            <div id="checkbox-list-jobassigneddatebycustomer" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('jobassigneddatebycustomer')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('jobassigneddatebycustomer')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Job Assigned date by Customer -->
                <div data-popover id="popover-hover-Job-Assigned-date-by-Customer" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่ได้รับงาน</p>

                        </div>
                    </div>
                </div>


                <!-- Plan Surveyed date -->
                <th class=" z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPlanSurveyeddate" onclick="openDropdown('plansurveyeddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Plan Surveyed date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPlanSurveyeddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Plan Surveyed date -->
                            <input id="input-search-plansurveyeddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('plansurveyeddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('plansurveyeddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('plansurveyeddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('plansurveyeddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Plan Surveyed date  -->
                            <div id="checkbox-list-plansurveyeddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('plansurveyeddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('plansurveyeddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Actual Surveyed date -->
                <th class=" z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActualSurveyeddate" onclick="openDropdown('actualsurveyeddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual Surveyed date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActualSurveyeddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual Surveyed Date -->
                            <input id="input-search-actualsurveyeddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualsurveyeddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualsurveyeddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualsurveyeddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualsurveyeddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual Surveyed Date  -->
                            <div id="checkbox-list-actualsurveyeddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualsurveyeddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualsurveyeddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Customer Committed date -->
                <th data-popover-target="popover-hover-Customer-Committed-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonCustomerCommitteddate" onclick="openDropdown('customercommitteddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center"> Customer Committed date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownCustomerCommitteddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Customer Committed date -->
                            <input id="input-search-customercommitteddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('customercommitteddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('customercommitteddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('customercommitteddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('customercommitteddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer Committed date  -->
                            <div id="checkbox-list-customercommitteddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('customercommitteddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('customercommitteddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Customer Committed date -->
                <div data-popover id="popover-hover-Customer-Committed-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่รับปากลูกค้าว่างานจะเสร็จ</p>

                        </div>
                    </div>
                </div>


                <!-- Tower Dismantling SubC -->
                <th data-popover-target="popover-hover-Tower-Dismantling-SubC" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTowerDismantlingSubC" onclick="openDropdown('towerdismantlingsubc')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Dismantling SubC</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTowerDismantlingSubC"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Dismantling SubC -->
                            <input id="input-search-towerdismantlingsubc" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerdismantlingsubc')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerdismantlingsubc')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerdismantlingsubc')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerdismantlingsubc')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower Dismantling SubC  -->
                            <div id="checkbox-list-towerdismantlingsubc" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerdismantlingsubc')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerdismantlingsubc')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Tower Dismantling SubC -->
                <div data-popover id="popover-hover-Tower-Dismantling-SubC" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[140px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ผู้รับเหมางานรื้อ</p>

                        </div>
                    </div>
                </div>


                <!-- Plan started date -->
                <th data-popover-target="popover-hover-Plan-started-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPlanstarteddate" onclick="openDropdown('planstarteddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Plan started date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPlanstarteddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Plan started date -->
                            <input id="input-search-planstarteddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('planstarteddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('planstarteddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('planstarteddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('planstarteddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Plan started date  -->
                            <div id="checkbox-list-planstarteddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('planstarteddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('planstarteddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Plan started date -->
                <div data-popover id="popover-hover-Plan-started-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>แผนเริ่มงาน</p>

                        </div>
                    </div>
                </div>

                <!-- Actual started date -->
                <th data-popover-target="popover-hover-Actual-started-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActualstarteddate" onclick="openDropdown('actualstarteddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual started date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActualstarteddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual started date -->
                            <input id="input-search-actualstarteddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualstarteddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualstarteddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualstarteddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualstarteddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual started date  -->
                            <div id="checkbox-list-actualstarteddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualstarteddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualstarteddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Actual started date -->
                <div data-popover id="popover-hover-Actual-started-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[120px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่เริ่มงานจริง</p>

                        </div>
                    </div>
                </div>


                <!-- Plan Finished date -->
                <th data-popover-target="popover-hover-Plan-Finished-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPlanFinisheddate" onclick="openDropdown('planfinisheddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Plan Finished date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPlanFinisheddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Plan Finished date -->
                            <input id="input-search-planfinisheddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('planfinisheddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('planfinisheddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('planfinisheddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('planfinisheddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual started date  -->
                            <div id="checkbox-list-planfinisheddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('planfinisheddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('planfinisheddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Plan Finished date -->
                <div data-popover id="popover-hover-Plan-Finished-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[120px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>แผนเสร็จงาน</p>

                        </div>
                    </div>
                </div>

                <!-- Actual Finished date -->
                <th data-popover-target="popover-hover-Actual-Finished-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActualFinisheddate" onclick="openDropdown('actualfinisheddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual Finished date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActualFinisheddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual Finished date -->
                            <input id="input-search-actualfinisheddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualfinisheddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualfinisheddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualfinisheddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualfinisheddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual Finished date  -->
                            <div id="checkbox-list-actualfinisheddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualfinisheddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualfinisheddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Actual Finished date -->
                <div data-popover id="popover-hover-Actual-Finished-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[130px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่เสร็จงานจริง</p>

                        </div>
                    </div>
                </div>


                <!-- Working Issue -->
                <th data-popover-target="popover-hover-Working-Issue" data-popover-trigger="hover"
                    class="z-30 text-center bg-orange-400 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonWorkingIssue" onclick="openDropdown('workingissue')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Working Issue</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownWorkingIssue"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Working Issue -->
                            <input id="input-search-workingissue" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('workingissue')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('workingissue')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('workingissue')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('workingissue')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Working Issue  -->
                            <div id="checkbox-list-workingissue" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('workingissue')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('workingissue')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Working Issue -->
                <div data-popover id="popover-hover-Working-Issue" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[130px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ปัญหาในการทำงาน</p>

                        </div>
                    </div>
                </div>


                <!----------------------------------Tower Buyback Data---------------------------------------------------------------->

                <!-- Tower Price -->
                <th data-popover-target="popover-hover-Tower-Price" data-popover-trigger="hover"
                    class="z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTowerPrice" onclick="openDropdown('towerprice')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Price</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTowerPrice"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Price-->
                            <input id="input-search-towerprice" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerprice')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerprice')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerprice')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerprice')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower Price  -->
                            <div id="checkbox-list-towerprice" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerprice')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerprice')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Tower Price -->
                <div data-popover id="popover-hover-Tower-Price" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[120px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ราคารับซื้อเสา</p>

                        </div>
                    </div>
                </div>


                <!-- Tower buyback-Plan Paid date -->
                <th data-popover-target="popover-hover-Tower-buyback-Plan-Paid-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTowerbuyback-Plan-Paid-date"
                            onclick="openDropdown('towerbuybackplanpaiddate')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower buyback - Plan Paid date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTowerbuyback-Plan-Paid-date"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower buyback-Plan Paid date-->
                            <input id="input-search-towerbuybackplanpaiddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerbuybackplanpaiddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerbuybackplanpaiddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerbuybackplanpaiddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerbuybackplanpaiddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower buyback-Plan Paid date  -->
                            <div id="checkbox-list-towerbuybackplanpaiddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerbuybackplanpaiddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerbuybackplanpaiddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Tower buyback - Plan Paid date -->
                <div data-popover id="popover-hover-Tower-buyback-Plan-Paid-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[170px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>แผนจ่ายเงินค่าซื้อเสา</p>

                        </div>
                    </div>
                </div>

                <!-- Tower buyback-Actual Paid date -->
                <th data-popover-target="popover-hover-Tower-buyback-Actual-Paid-date" data-popover-trigger="hover"
                    class="z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTower-buyback-Actual-Paid-date"
                            onclick="openDropdown('towerbuybackactualpaiddate')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower buyback-Actual Paid date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTower-buyback-Actual-Paid-date"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower buyback-Actual Paid date-->
                            <input id="input-search-towerbuybackactualpaiddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerbuybackactualpaiddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerbuybackactualpaiddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerbuybackactualpaiddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerbuybackactualpaiddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower buyback-Actual Paid date  -->
                            <div id="checkbox-list-towerbuybackactualpaiddate" class="pt-2 space-y-2"></div>


                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerbuybackactualpaiddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerbuybackactualpaiddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Tower buyback - Actual Paid date -->
                <div data-popover id="popover-hover-Tower-buyback-Actual-Paid-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่จ่ายเงินซื้อเสาลูกค้าจริง</p>

                        </div>
                    </div>
                </div>


                <!-- Receipt No. -->
                <th data-popover-target="popover-hover-Receipt-No." data-popover-trigger="hover"
                    class="z-30 text-center bg-yellow-300 align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonReceipt-No." onclick="openDropdown('receiptno')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Receipt No.</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownReceipt-No."
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Receipt No. -->
                            <input id="input-search-receiptno" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('receiptno')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('receiptno')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('receiptno')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('receiptno')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Receipt No.  -->
                            <div id="checkbox-list-receiptno" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('receiptno')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('receiptno')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Receipt No. -->
                <div data-popover id="popover-hover-Receipt-No." role="tooltip"
                    class="absolute z-10 invisible inline-block w-[180px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>หมายเลขใบเสร็จซื้อเสา</p>

                        </div>
                    </div>
                </div>


                <!---------------------------------------------Tower Selling data---------------------------------------------->


                <!-- Tower Buyer Name -->
                <th data-popover-target="popover-hover-Tower-Buyer-Name" data-popover-trigger="hover"
                    class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTower-Buyer-Name" onclick="openDropdown('towerbuyername')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Buyer Name</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTower-Buyer-Name"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Buyer Name -->
                            <input id="input-search-towerbuyername" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerbuyername')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerbuyername')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerbuyername')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerbuyername')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower Buyer Name  -->
                            <div id="checkbox-list-towerbuyername" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerbuyername')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerbuyername')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Tower Buyer Name -->
                <div data-popover id="popover-hover-Tower-Buyer-Name" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ชื่อผู้ซื้อเสา</p>

                        </div>
                    </div>
                </div>


                <!-- Tower Selling Price -->
                <th data-popover-target="popover-hover-Tower-Selling-Price" data-popover-trigger="hover"
                    class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTowerSellingPrice" onclick="openDropdown('towersellingprice')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Selling Price</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTowerSellingPrice"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Selling Price -->
                            <input id="input-search-towersellingprice" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towersellingprice')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towersellingprice')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towersellingprice')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towersellingprice')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower Selling Price  -->
                            <div id="checkbox-list-towersellingprice" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towersellingprice')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towersellingprice')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Tower Selling Price -->
                <div data-popover id="popover-hover-Tower-Selling-Price" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ราคาเสาที่ขาย</p>

                        </div>
                    </div>
                </div>

                <!-- Plan Get Paid date -->
                <th data-popover-target="popover-hover-Plan-Get-Paid-date" data-popover-trigger="hover"
                    class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPlanGetPaiddate" onclick="openDropdown('plangetpaiddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Plan Get Paid date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPlanGetPaiddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Plan Get Paid date -->
                            <input id="input-search-plangetpaiddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('plangetpaiddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('plangetpaiddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('plangetpaiddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('plangetpaiddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Plan Get Paiddate  -->
                            <div id="checkbox-list-plangetpaiddate" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('plangetpaiddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('plangetpaiddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Plan Get Paid date -->
                <div data-popover id="popover-hover-Plan-Get-Paid-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>แผนได้รับเงินค่าขายเสา</p>

                        </div>
                    </div>
                </div>



                <!-- Actual Get paid date -->
                <th data-popover-target="popover-hover-Actual-Get-paid-date" data-popover-trigger="hover"
                    class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActualGetpaiddate" onclick="openDropdown('actualgetpaiddate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual Get paid date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActualGetpaiddate"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual Get paid date -->
                            <input id="input-search-actualgetpaiddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualgetpaiddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualgetpaiddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualgetpaiddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualgetpaiddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual Get paid date  -->
                            <div id="checkbox-list-actualgetpaiddate" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualgetpaiddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualgetpaiddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Actual Get paid date -->
                <div data-popover id="popover-hover-Actual-Get-paid-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่ได้รับเงินค่าขายเสาจริง</p>

                        </div>
                    </div>
                </div>


                <!-------------------------------------------Revenue Detail----------------------------------------------------->

                <!-- Tower Dismantling Service Price -->
                <th data-popover-target="popover-hover-Tower-Dismantling-Service-Price" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonTower-Dismantling-Service-Price"
                            onclick="openDropdown('towerdismantlingserviceprice')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Tower Dismantling Service Price</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownTower-Dismantling-Service-Price"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Tower Dismantling Service Price -->
                            <input id="input-search-towerdismantlingserviceprice" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('towerdismantlingserviceprice')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('towerdismantlingserviceprice')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('towerdismantlingserviceprice')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('towerdismantlingserviceprice')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Tower Dismantling Service Price  -->
                            <div id="checkbox-list-towerdismantlingserviceprice" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('towerdismantlingserviceprice')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('towerdismantlingserviceprice')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Tower Dismantling Service Price -->
                <div data-popover id="popover-hover-Tower-Dismantling-Service-Price" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ค่าบริการรื้อเสา</p>

                        </div>
                    </div>
                </div>



                <!-- Customer - Quotation Subbmitted Date (Plan) -->
                <th data-popover-target="popover-hover-Customer-Quotation-Subbmitted-Date-(Plan)"
                    data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonCustomer-Quotation-Subbmitted-Date-(Plan)"
                            onclick="openDropdown('customerquotationsubbmitteddateplan')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Customer - Quotation Subbmitted Date (Plan)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownCustomer-Quotation-Subbmitted-Date-(Plan)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Customer - Quotation Subbmitted Date (Plan) -->
                            <input id="input-search-customerauotationsubbmitteddate(plan)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('customerquotationsubbmitteddateplan')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('customerquotationsubbmitteddateplan')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('customerquotationsubbmitteddateplan')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('customerquotationsubbmitteddateplan')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer - Quotation Subbmitted Date (Plan)  -->
                            <div id="checkbox-list-customerquotationsubbmitteddateplan" class="pt-2 space-y-2">
                            </div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('customerquotationsubbmitteddateplan')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('customerquotationsubbmitteddateplan')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Customer - Quotation Subbmitted Date (Plan) -->
                <div data-popover id="popover-hover-Customer-Quotation-Subbmitted-Date-(Plan)" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>แผนส่งใบเสนอราคาให้ลูกค้า</p>

                        </div>
                    </div>
                </div>


                <!-- Customer - Quotation Subbmitted Date (Actual) -->
                <th data-popover-target="popover-hover-Customer-Quotation-Subbmitted-Date-(Actual)"
                    data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonCustomer-Quotation-Subbmitted-Date-(Actual)"
                            onclick="openDropdown('customerquotationsubbmitteddateactual')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Customer - Quotation Subbmitted Date (Actual)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownCustomer-Quotation-Subbmitted-Date-(Actual)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Customer - Quotation Subbmitted Date (Actual) -->
                            <input id="input-search-customerquotationsubbmitteddate(actual)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('customerquotationsubbmitteddateactual')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('customerquotationsubbmitteddateactual')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('customerquotationsubbmitteddateactual')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('customerquotationsubbmitteddateactual')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer - Quotation Subbmitted Date (Actual)  -->
                            <div id="checkbox-list-customerquotationsubbmitteddateactual" class="pt-2 space-y-2">
                            </div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('customerquotationsubbmitteddateactual')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('customerquotationsubbmitteddateactual')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Customer - Quotation Subbmitted Date (Actual) -->
                <div data-popover id="popover-hover-Customer-Quotation-Subbmitted-Date-(Actual)" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[300px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่ส่งใบเสนอราคาค่าบริการรื้อเสาให้ลูกค้าจริง</p>
                        </div>
                    </div>
                </div>


                <!-- Customer - Quotation Amount -->
                <th data-popover-target="popover-hover-Customer-Quotation-Amount" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonCustomer-Quotation-Amount"
                            onclick="openDropdown('customerquotationamount')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Customer-Quotation Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[4px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownCustomer-Quotation-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Customer - Quotation Amount -->
                            <input id="input-search-customerquotationamount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('customerquotationamount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('customerquotationamount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('customerquotationamount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('customerquotationamount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer - Quotation Amount  -->
                            <div id="checkbox-list-customerquotationamount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('customerquotationamount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('customerquotationamount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Customer - Quotation Amount) -->
                <div data-popover id="popover-hover-Customer-Quotation-Amount" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ราคาที่เสนอ</p>

                        </div>
                    </div>
                </div>

                <!-- Customer - PO Amount-->
                <th data-popover-target="popover-hover-Customer-PO-Amount" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonCustomer-PO-Amount" onclick="openDropdown('customerpoamount')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Customer-PO Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownCustomer-PO-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Customer-PO Amount -->
                            <input id="input-search-customerpoamount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('customerpoamount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('customerpoamount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('customerpoamount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('customerpoamount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer-PO Amount  -->
                            <div id="checkbox-list-customerpoamount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('customerpoamount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('customerpoamount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Customer - PO Amount -->
                <div data-popover id="popover-hover-Customer-PO-Amount" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ราคา PO ค่าบริการรื้อเสา</p>

                        </div>
                    </div>
                </div>


                <!-- Customer - PO Received date-->
                <th data-popover-target="popover-hover-Customer-PO-Received-date" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonCustomer-PO-Received-date"
                            onclick="openDropdown('customerporeceiveddate')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Customer-PO Received date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownCustomer-PO-Received-date"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Customer-PO Received date -->
                            <input id="input-search-customerporeceiveddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('customerporeceiveddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('customerporeceiveddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('customerporeceiveddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('customerporeceiveddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer-PO Amount  -->
                            <div id="checkbox-list-customerporeceiveddate" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('customerporeceiveddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('customerporeceiveddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Popover: Customer - PO Received date -->
                <div data-popover id="popover-hover-Customer-PO-Received-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่ได้รับ PO จากลูกค้า</p>

                        </div>
                    </div>
                </div>


                <!-- Plan Invoice Placed date-->
                <th data-popover-target="popover-hover-Plan-Invoice-Placed-date" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPlan-Invoice-Placed-date"
                            onclick="openDropdown('planinvoiceplaceddate')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Plan Invoice Placed date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPlan-Invoice-Placed-date"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Plan Invoice Placed date -->
                            <input id="input-search-planinvoiceplaceddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('planinvoiceplaceddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('planinvoiceplaceddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('planinvoiceplaceddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('planinvoiceplaceddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer-PO Amount  -->
                            <div id="checkbox-list-planinvoiceplaceddate" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('planinvoiceplaceddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('planinvoiceplaceddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Plan Invoice Placed date -->
                <div data-popover id="popover-hover-Plan-Invoice-Placed-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[130px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>แผนวาง Invoice</p>

                        </div>
                    </div>
                </div>




                <!-- Plan Invoice Amount-->
                <th data-popover-target="popover-hover-Plan-Invoice-Amount" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPlan-Invoice-Amount" onclick="openDropdown('planinvoiceamount')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Plan Invoice Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPlan-Invoice-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Plan Invoice Amount -->
                            <input id="input-search-planinvoiceamount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('planinvoiceamount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('planinvoiceamount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('planinvoiceamount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('planinvoiceamount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Customer-PO Amount  -->
                            <div id="checkbox-list-planinvoiceamount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('planinvoiceamount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('planinvoiceamount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Plan Invoice Amount -->
                <div data-popover id="popover-hover-Plan-Invoice-Amount" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ราคา Invoice ที่คาดว่าวางได้</p>

                        </div>
                    </div>
                </div>


                <!-- Invoice No.-->
                <th data-popover-target="popover-hover-Invoice-No." data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonInvoice-No." onclick="openDropdown('invoiceno')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Invoice No.</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownInvoice-No."
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Invoice No. -->
                            <input id="input-search-invoiceno" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('invoiceno')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('invoiceno')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('invoiceno')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('invoiceno')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Invoice No.  -->
                            <div id="checkbox-list-invoiceno" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('invoiceno')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('invoiceno')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Invoice No. -->
                <div data-popover id="popover-hover-Invoice-No." role="tooltip"
                    class="absolute z-10 invisible inline-block w-[130px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>หมายเลข Invoice</p>

                        </div>
                    </div>
                </div>


                <!-- Actual Invoice Amount-->
                <th data-popover-target="popover-hover-Actual-Invoice-Amount" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActual-Invoice-Amount" onclick="openDropdown('actualinvoiceamount')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual Invoice Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActual-Invoice-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual Invoice Amount -->
                            <input id="input-search-actualinvoiceamount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualinvoiceamount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualinvoiceamount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualinvoiceamount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualinvoiceamount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual Invoice Amount  -->
                            <div id="checkbox-list-actualinvoiceamount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualinvoiceamount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualinvoiceamount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Actual Invoice Amount -->
                <div data-popover id="popover-hover-Actual-Invoice-Amount" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[140px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ราคา Invoice จริง</p>

                        </div>
                    </div>
                </div>



                <!-- Actual Invoice Placed date-->
                <th data-popover-target="popover-hover-Actual-Invoice-Placed-date" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActual-Invoice-Placed-date"
                            onclick="openDropdown('actualinvoiceplaceddate')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Actual Invoice Placed date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActual-Invoice-Placed-date"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Actual Invoice Placed date -->
                            <input id="input-search-actualinvoiceplaceddate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('actualinvoiceplaceddate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('actualinvoiceplaceddate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('actualinvoiceplaceddate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('actualinvoiceplaceddate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Actual Invoice Amount  -->
                            <div id="checkbox-list-actualinvoiceplaceddate" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('actualinvoiceplaceddate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('actualinvoiceplaceddate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>



                <!-- Popover: Actual Invoice Placed date -->
                <div data-popover id="popover-hover-Actual-Invoice-Placed-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[150px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่วาง Invoice จริง</p>

                        </div>
                    </div>
                </div>


                <!-- Confirmed Due date-->
                <th data-popover-target="popover-hover-Confirmed-Due-date" data-popover-trigger="hover"
                    class="bg-yellow-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonConfirmed-Due-date" onclick="openDropdown('confirmedduedate')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Confirmed Due date</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownConfirmed-Due-date"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Confirmed Due date -->
                            <input id="input-search-confirmedduedate" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('confirmedduedate')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('confirmedduedate')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('confirmedduedate')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('confirmedduedate')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Confirmed Due date  -->
                            <div id="checkbox-list-confirmedduedate" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('confirmedduedate')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('confirmedduedate')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Confirmed Due date -->
                <div data-popover id="popover-hover-Confirmed-Due-date" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>วันที่ได้รับ Due</p>

                        </div>
                    </div>
                </div>



                <!--------------------------------------------------------Payment Detail----------------------------------------------->


                <!-- SubC Name-->
                <th data-popover-target="popover-hover-SubC-Name" data-popover-trigger="hover"
                    class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonSubC-Name" onclick="openDropdown('subcname')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">SubC Name</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownSubC-Name"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input SubC Name -->
                            <input id="input-search-subcname" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('subcname')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('subcname')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('subcname')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('subcname')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox SubC Name  -->
                            <div id="checkbox-list-subcname" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('subcname')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('subcname')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: SubC Name -->
                <div data-popover id="popover-hover-SubC-Name" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>ชื่อผู้รับเหมา</p>

                        </div>
                    </div>
                </div>


                <!-- Activity of payment-->
                <th data-popover-target="popover-hover-Activity-of-payment" data-popover-trigger="hover"
                    class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">

                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonActivity-of-payment" onclick="openDropdown('activityofpayment')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Activity of payment</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownActivity-of-payment"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Activity of payment -->
                            <input id="input-search-activityofpayment" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('activityofpayment')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('activityofpayment')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('activityofpayment')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('activityofpayment')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Activity of payment  -->
                            <div id="checkbox-list-activityofpayment" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('activityofpayment')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('activityofpayment')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Popover: Activity of payment -->
                <div data-popover id="popover-hover-Activity-of-payment" role="tooltip"
                    class="absolute z-10 invisible inline-block w-[100px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="">
                        <div class="flex items-center justify-center mb-2">
                            <p>จ่ายค่าอะไร</p>

                        </div>
                    </div>
                </div>

                <!-- PR Amount -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPR-Amount" onclick="openDropdown('pramount')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center"> PR Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPR-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input PR Amount -->
                            <input id="input-search-pramount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('pramount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('pramount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('pramount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('pramount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox PR Amount  -->
                            <div id="checkbox-list-pramount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('pramount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('pramount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- PR requested date (Email) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPR-requested-date-(Email)"
                            onclick="openDropdown('prrequesteddateemail')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">PR requested date (Email)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPR-requested-date-(Email)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input PR requested date (Email) -->
                            <input id="input-search-prrequesteddateemail" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('prrequesteddateemail')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('prrequesteddateemail')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('prrequesteddateemail')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('prrequesteddateemail')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox PR requested date (Email)  -->
                            <div id="checkbox-list-prrequesteddateemail" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('prrequesteddateemail')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('prrequesteddateemail')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- PR Approved date (Email) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPR-Approved-date-(Email)"
                            onclick="openDropdown('prapproveddateemail')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">PR Approved date (Email)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPR-Approved-date-(Email)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input PR Approved date (Email) -->
                            <input id="input-search-prapproveddate(email)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('prapproveddateemail')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('prapproveddateemail')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('prapproveddateemail')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('prapproveddateemail')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox PR Approved date (Email)  -->
                            <div id="checkbox-list-prapproveddate(email)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('prapproveddateemail')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('prapproveddateemail')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- PR No. (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPR-No.(ERP)" onclick="openDropdown('prnoerp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">PR No. (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPR-No.(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input PR Approved date (Email) -->
                            <input id="input-search-prno.(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('prnoerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('prnoerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('prnoerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('prnoerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox PR Approved date (Email)  -->
                            <div id="checkbox-list-prno.(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('prnoerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('prnoerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- PR Issued date (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPR-Issued-date-(ERP)" onclick="openDropdown('prissueddateerp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">PR Issued date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPR-Issued-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input PR Issued date (ERP) -->
                            <input id="input-search-prissueddate(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('prissueddateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('prissueddateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('prissueddateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('prissueddateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox PR Issued date (ERP)  -->
                            <div id="checkbox-list-prissueddate(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('prissueddateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('prissueddateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- PR Approved date (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonPR-Approved-date-(ERP)" onclick="openDropdown('prapproveddateerp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">PR Approved date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPR-Approved-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input PR Approved date (ERP) -->
                            <input id="input-search-prapproveddate(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('prapproveddateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('prapproveddateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('prapproveddateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('prapproveddateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox PR Approved date (ERP)  -->
                            <div id="checkbox-list-prapproveddate(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('prapproveddateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('prapproveddateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- WO Amount (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonWO-Amount-(ERP)" onclick="openDropdown('woamounterp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">WO Amount (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownWO-Amount-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input WO Amount (ERP) -->
                            <input id="input-search-woamount(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('woamount(erp)')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('woamount(erp)')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('woamount(erp)')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('woamount(erp)')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox WO Amount (ERP)  -->
                            <div id="checkbox-list-woamount(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('woamount(erp)')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('woamount(erp)')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- WO No. -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonWO-No." onclick="openDropdown('wono')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">WO No.</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownWO-No."
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input WO No. -->
                            <input id="input-search-wono." placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('wono')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('wono')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('wono.')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('wono')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox WO No.  -->
                            <div id="checkbox-list-wono." class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('wono.')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('wono')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- WO Issue date (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonWO-Issue-date-(ERP)" onclick="openDropdown('woissuedateerp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">WO Issue date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownWO-Issue-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input WO Issue date (ERP) -->
                            <input id="input-search-woissuedate(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('woissuedateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('woissuedateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('woissuedateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('woissuedateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox WO Issue date (ERP)  -->
                            <div id="checkbox-list-woissuedate(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('woissuedateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('woissuedateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- WO Approved date (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonWO-Approved-date-(ERP)" onclick="openDropdown('woapproveddateerp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">WO Approved date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownWO-Approved-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input WO Approved date (ERP) -->
                            <input id="input-search-woapproveddate(ERP)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('woapproveddateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('woapproveddateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('woapproveddateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('woapproveddateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox WO Issue date (ERP)  -->
                            <div id="checkbox-list-woapproveddate(ERP)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('woapproveddateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('woapproveddateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Date sent WO to SubC (Email) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonDate-sent-WO-to-SubC-(Email)"
                            onclick="openDropdown('datesentwotosubcemail')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Date sent WO to SubC (Email)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownDate-sent-WO-to-SubC-(Email)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Date sent WO to SubC (Email) -->
                            <input id="input-search-datesentwotosubc(email)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('datesentwotosubcemail')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('datesentwotosubcemail')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('datesentwotosubcemail')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('datesentwotosubcemail')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Date sent WO to SubC (Email)  -->
                            <div id="checkbox-list-datesentwotosubc(email)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('datesentwotosubcemail')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('datesentwotosubcemail')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>



                <!-- Billing Amount -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonBilling-Amount" onclick="openDropdown('billingamount')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Billing Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownBilling-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Billing Amount -->
                            <input id="input-search-billingamount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('billingamount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('billingamount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('billingamount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('billingamount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Billing Amount  -->
                            <div id="checkbox-list-billingamount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('billingamount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('billingamount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Billing Requested date (Email) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonBilling-Requested-date-(Email)"
                            onclick="openDropdown('billingrequesteddateemail')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Billing Requested date (Email)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownBilling-Requested-date-(Email)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Billing Requested date (Email) -->
                            <input id="input-search-billingrequesteddate(email)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('billingrequesteddateemail')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('billingrequesteddateemail')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('billingrequesteddateemail')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('billingrequesteddateemail')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox Billing Requested date (Email)  -->
                            <div id="checkbox-list-billingrequesteddate(email)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('billingrequesteddateemail')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('billingrequesteddateemail')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Billing Approved date (Email) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonBilling-Approved-date-(Email)"
                            onclick="openDropdown('billingapproveddateemail')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Billing Approved date (Email)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownBilling-Approved-date-(Email)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Billing Approved date (Email) -->
                            <input id="input-search-billingapproveddate(email)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('billingapproveddateemail')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('billingapproveddateemail')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('billingapproveddateemail')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('billingapproveddateemail')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Billing Approved date (Email)  -->
                            <div id="checkbox-list-billingapproveddate(email)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('billingapproveddateemail')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('billingapproveddateemail')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Billing No. (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonBilling-No.(ERP)" onclick="openDropdown('billingnoerp')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Billing No. (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownBilling-No.(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Billing No. (ERP) -->
                            <input id="input-search-billingno.(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('billingnoerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('billingnoerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('billingnoerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('billingnoerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Billing No. (ERP)  -->
                            <div id="checkbox-list-billingno.(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('billingnoerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('billingnoerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Billing Issued date (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonBilling-Issued-date-(ERP)"
                            onclick="openDropdown('billingissueddateerp')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Billing Issued date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownBilling-Issued-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Billing Issued date (ERP) -->
                            <input id="input-search-billingissueddate(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('billingissueddateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('billingissueddateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('billingissueddateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('billingissueddateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Billing Issued date (ERP)  -->
                            <div id="checkbox-list-billingissueddate(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('billingissueddateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('billingissueddateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- Billing Approved date (ERP) -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonBilling-Approved-date-(ERP)"
                            onclick="openDropdown('billingapproveddateerp')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Billing Approved date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownBilling-Approved-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Billing Approved date (ERP) -->
                            <input id="input-search-billingapproveddate(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('billingapproveddateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('billingapproveddateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('billingapproveddateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('billingapproveddateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Billing Approved date (ERP)  -->
                            <div id="checkbox-list-billingapproveddate(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('billingapproveddateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('billingapproveddateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Date sent Billing to SubC -->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonDate-sent-Billing-to-SubC"
                            onclick="openDropdown('datesentbillingtosubc')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Date sent Billing to SubC</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownDate-sent-Billing-to-SubC"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Date sent Billing to SubC -->
                            <input id="input-search-datesentbillingtosubc" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('datesentbillingtosubc')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('datesentbillingtosubc')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('datesentbillingtosubc')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('datesentbillingtosubc')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Date sent Billing to SubC  -->
                            <div id="checkbox-list-datesentbillingtosubc" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('datesentbillingtosubc')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('datesentbillingtosubc')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>


                <!-- Invoice Placed date by SubC-->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonInvoice-Placed-date-by-SubC"
                            onclick="openDropdown('invoiceplaceddatebysubc')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Invoice Placed date by SubC</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownInvoice-Placed-date-by-SubC"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input Invoice Placed date by SubC -->
                            <input id="input-search-invoiceplaceddatebysubc" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('invoiceplaceddatebysubc')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('invoiceplaceddatebysubc')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('invoiceplaceddatebysubc')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('invoiceplaceddatebysubc')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Invoice Placed date by SubC  -->
                            <div id="checkbox-list-invoiceplaceddatebysubc" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('invoiceplaceddatebysubc')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('invoiceplaceddatebysubc')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

                <!-- SubC - Invoice Amount-->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButtonSubC-Invoice-Amount" onclick="openDropdown('subcinvoiceamount')"
                            data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">SubC-Invoice Amount</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownSubC-Invoice-Amount"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3">

                            <!-- Search Input SubC-Invoice Amount -->
                            <input id="input-search-subcinvoiceamount" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('subcinvoiceamount')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('subcinvoiceamount')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('subcinvoiceamount')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('subcinvoiceamount')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  SubC-Invoice Amount  -->
                            <div id="checkbox-list-subcinvoiceamount" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('subcinvoiceamount')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('subcinvoiceamount')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>



                <!-- Payment confirmed date (ERP)-->
                <th class="bg-orange-400 z-30 text-center align-middle  min-w-[140px] cursor-pointer">
                    <div class="inline-block w-full relative">

                        <button id="dropdownButonPayment-confirmed-date-(ERP)"
                            onclick="openDropdown('paymentconfirmeddateerp')" data-dropdown-placement="bottom"
                            class="dropdown-trigger-site inline-flex items-center justify-center w-full px-2 py-1 text-black rounded-md transition-all font-semibold text-[10px] space-x-1">
                            <span class="text-center">Payment confirmed date (ERP)</span>
                            <span class="icon-wrapper relative w-3 h-3 flex items-center justify-center">
                                <span
                                    class="left-icon-site block absolute w-[8px] h-[2px] bg-black rotate-45 transition-transform"></span>
                                <span
                                    class="right-icon-site block absolute w-[8px] h-[2px] bg-black -rotate-45 transition-transform left-[6px]"></span>
                            </span>
                        </button>

                        <!-- Dropdown -->
                        <div id="dropdownPayment-confirmed-date-(ERP)"
                            class="z-50 hidden absolute bg-white rounded-lg shadow-sm w-60 mt-2 dark:bg-gray-700 p-3 ">

                            <!-- Search Input Payment confirmed date (ERP) -->
                            <input id="input-search-paymentconfirmeddate(erp)" placeholder=""
                                class="border-2 border-transparent w-48 h-8 px-3 outline-none overflow-hidden bg-gray-100 rounded-lg transition-all hover:border-blue-400 focus:border-blue-400 focus:shadow-[0_0_0_7px_rgba(74,157,236,0.2)] focus:bg-white mb-3 text-sm"
                                type="text">


                            <!-- ปุ่ม Select All / Deselect All -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-green-300 hover:bg-green-400 text-gray-800 rounded py-1"
                                    onclick="selectAllCheckboxes('paymentconfirmeddateerp')">
                                    Select All
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-red-300 hover:bg-red-400 text-gray-800 rounded py-1"
                                    onclick="deselectAllCheckboxes('paymentconfirmeddateerp')">
                                    Deselect All
                                </button>
                            </div>

                            <!-- Sort Buttons -->
                            <div class="flex justify-between space-x-2 mb-3">
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableAsc('paymentconfirmeddateerp')">
                                    Sort A → Z
                                </button>
                                <button type="button"
                                    class="w-1/2 text-xs text-center bg-gray-200 hover:bg-gray-300 text-gray-700 rounded py-1"
                                    onclick="sortTableDesc('paymentconfirmeddateerp')">
                                    Sort Z → A
                                </button>
                            </div>

                            <!-- Checkbox  Payment confirmed date (ERP)  -->
                            <div id="checkbox-list-paymentconfirmeddate(erp)" class="pt-2 space-y-2"></div>

                            <div style="display: flex; justify-content: end; gap: 0.5rem; margin-top: 1rem;">
                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#23c483'; this.style.boxShadow='0px 8px 16px rgba(46,229,157,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="confirmSelection('paymentconfirmeddateerp')">OK</button>

                                <button type="button"
                                    style="padding: 0.5em 1.2em; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; color: #000; background-color: #fff; border: none; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none;"
                                    onmouseover="this.style.backgroundColor='#e85959'; this.style.boxShadow='0px 8px 16px rgba(232,89,89,0.4)'; this.style.color='#fff'; this.style.transform='translateY(-3px)'"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.boxShadow='0px 4px 10px rgba(0,0,0,0.1)'; this.style.color='#000'; this.style.transform='none'"
                                    onmousedown="this.style.transform='translateY(-1px)'"
                                    onmouseup="this.style.transform='translateY(-3px)'"
                                    onclick="cancelSelection('paymentconfirmeddateerp')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </th>

            </tr>
        </thead>

        <tbody>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1">D_BKK1234</td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1">D_BKK1234</td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">01_BKK</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R1: BMA West</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Guyed Mast Tower</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">3,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">60000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">02_CMI</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R2: BMA East</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Self-Support Tower</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">03_KKN</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R3: East</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Pole on Roof</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">04_UBR</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R4: North</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Electic Pole</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">05_HYI</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">Wall Pole</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Guyed Mast Tower</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1">D_Rov</td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">06_PLK</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R6: Northeast2</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Wall Mount</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1">D_Rov</td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">06_PLK</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R7: Central West</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Guyed Mast Tower</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <tr class="bg-red hover:bg-blue-50 border-b text-[10px]">

                <!-- Edit-->
                <td class="sticky left-0 bg-white z-20 text-center px-2 py-1">✏️</td>

                <!-- RefCode-->
                <td class="sticky left-[40px] bg-white z-20 text-center font-size-10px px-2 py-1">54-25-010001</td>

                <!-- Site Code-->
                <td class="sticky left-[140px] bg-white z-20 text-center px-2 py-1"></td>

                <!-- Site Site Name-->
                <td class="sticky left-[240px] bg-white z-20 text-center px-2 py-1">D_Rov</td>

                <!-- GTN Office-->
                <td class="sticky left-[340px] bg-white z-20 text-center px-2 py-1">06_PLK</td>

                <!-- TRUE Region -->
                <td class="sticky left-[440px] bg-white z-20 text-center px-2 py-1">R8: South</td>

                <!-- Tower Type -->
                <td class="sticky left-[540px] bg-white z-20 text-center px-2 py-1">Guyed Mast Tower</td>

                <!-- Tower Model -->
                <td class="sticky left-[640px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Estimated Tower Weight (Kg.)-->
                <td class="sticky left-[740px] bg-white z-20 text-center px-2 py-1">GGL42_AWC</td>

                <!-- Actual Tower Weight (Kg.) -->
                <td class="sticky left-[840px] bg-white z-20 text-center px-2 py-1">4,000.00</td>

                <!-- Remark-->
                <td class="sticky left-[940px] bg-white z-20 text-center px-2 py-1">4,958.00</td>


                <!-- ด้านขวา -->
                <!-- Estimated Revenue-->
                <td class="text-center px-2 py-1">90000</td>

                <!-- Estimated Service cost-->
                <td class="text-center px-2 py-1">97,000</td>

                <!-- Estimated buyback cost-->
                <td class="text-center px-2 py-1">60,000</td>

                <!-- Estimated Transportation Cost-->
                <td class="text-center px-2 py-1">-</td>

                <!-- Estimated Other Cost-->
                <td class="text-center px-2 py-1">1,000</td>

                <!-- Estimated Gross Profit-->
                <td class="text-center px-2 py-1">72,000</td>

                <!-- Estimated Gross Profit Margin-->
                <td class="text-center px-2 py-1">31%</td>

                <!-- Job Assigned date by Customer-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Surveyed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer Committed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling SubC-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual started date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Finished date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Working Issue-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Plan Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower buyback - Actual Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Receipt No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Buyer Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Selling Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Get Paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Get paid date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Tower Dismantling Service Price-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Plan)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Subbmitted Date (Actual)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - Quotation Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Customer - PO Received date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Plan Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Invoice No.-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Actual Invoice Placed date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Confirmed Due date-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- SubC Name-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- Activity of payment-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Amount-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR requested date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (Email)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR No. (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Issued date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- PR Approved date (ERP)-->
                <td class="text-center px-2 py-1">24/Apr/25</td>

                <!-- WO Amount (ERP)-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- WO No.-->
                <td class="text-center px-2 py-1">WO123456</td>

                <!-- WO Issue date (ERP)-->
                <td class="text-center px-2 py-1">5/5/2025</td>

                <!-- WO Approved date (ERP)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Date sent WO to SubC (Email)-->
                <td class="text-center px-2 py-1">9/5/2025</td>

                <!-- Billing Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Billing Requested date (Email)-->
                <td class="text-center px-2 py-1">10/5/2025</td>

                <!-- Billing Approved date (Email)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing No. (ERP)-->
                <td class="text-center px-2 py-1">BIL123456</td>

                <!-- Billing Issued date (ERP)-->
                <td class="text-center px-2 py-1">13/5/2025</td>

                <!-- Billing Approved date (ERP)-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Date sent Billing to SubC-->
                <td class="text-center px-2 py-1">16/5/2025</td>

                <!-- Invoice Placed date by SubC-->
                <td class="text-center px-2 py-1">17/5/2025</td>

                <!-- SubC - Invoice Amount-->
                <td class="text-center px-2 py-1">97000</td>

                <!-- Payment confirmed date (ERP)-->
                <td class="text-center px-2 py-1">20/6/2025</td>

            </tr>

            <!-- More rows if needed -->
        </tbody>
    </table>
</div>
</div>



<script>
    // ฟังก์ชันสำหรับ Search (อันเดียวใช้ได้กับทุก input)
    function setupSearch(inputId, listId) {
        const input = document.getElementById(inputId);
        const list = document.getElementById(listId);
    
        input.addEventListener('input', function () {
            const filter = input.value.toUpperCase();
            const items = list.querySelectorAll('.checkbox-wrapper-46');
    
            items.forEach(item => {
                const label = item.querySelector('label span:last-child');
                if (label) {
                    const text = label.innerText.toUpperCase();
                    item.style.display = text.includes(filter) ? '' : 'none';
                }
            });
        });
    }
    
    // เรียกใช้งานสำหรับแต่ละช่อง
    setupSearch('input-search-code', 'checkbox-list-site');
    setupSearch('input-search-GTN-Office', 'checkbox-list-gtn');
    setupSearch('input-search-TRUE-Region', 'checkbox-list-true');
</script>


refcode: [],
<script>
    let previousChecked = { 
    refcode: [],
    sitecode: [],
    gtnoffice: [],
    trueRegion: [],
    towerType:[],
    towerModel: [],
    estimatedTowerWeight: [],
    actualTowerWeight: [],
    sitename: [],
    remark: [],

    // Estimated Price

    estimatedrevenue: [],
    estimatedbuybackcost: [],
    estimatedtransportationcost: [],
    estimatedothercost: [],
    estimatedgrossprofit: [],
    estimatedgrossprofitmargin: [],

    // Working Progress

    jobassigneddatebycustomer: [],
    plansurveyeddate: [],
    actualsurveyeddate: [],
    customercommitteddate: [],
    towerdismantlingsubc: [],
    planstarteddate: [],
    actualstarteddate: [],
    planfinisheddate: [],
    actualfinisheddate: [],
    workingissue: [],

    // Tower Buyback Data 

    towerprice: [],
    towerbuybackplanpaiddate: [],
    towerbuybackactualpaiddate: [],
    receiptno: [],

    // Tower Selling data

    towerbuyername: [],
    towersellingprice: [],
    plangetpaiddate: [],
    actualgetpaiddate: [],

    // Revenue Detail

    towerdismantlingserviceprice: [],
    customerquotationsubbmitteddateplan: [],
    customerquotationsubbmitteddateactual: [],
    customerquotationamount: [],
    customerpoamount: [],
    customerporeceiveddate: [],
    planinvoiceplaceddate: [],
    planinvoiceamount: [],
    invoiceno: [],
    actualinvoiceamount: [],
    actualinvoiceplaceddate: [],
    confirmedduedate: [],

    // Payment Detail
    
    subcname: [],
    activityofpayment: [],
    pramount: [],
    prrequesteddateemail: [],
    prapproveddateemail: [],
    prnoerp: [],
    prissueddateerp: [],
    prapproveddateerp: [],
    woamounterp: [],
    wono: [],
    woissuedateerp: [],
    woapproveddateerp: [],
    datesentwotosubcemail: [],
    billingamount: [],
    billingrequesteddateemail: [],
    billingapproveddateemail: [],
    billingnoerp: [],
    billingissueddateerp: [],
    billingapproveddateerp: [],
    datesentbillingtosubc: [],
    invoiceplaceddatebysubc: [],
    subcinvoiceamount: [],
    paymentconfirmeddateerp: [],

    };
    let currentOpenDropdown = null;
    let initialDropdownOpened = null;


    function filterBy(type) {
  const allRows = document.querySelectorAll('tbody tr');
  allRows.forEach(row => row.style.display = ''); // แสดงทั้งหมดก่อน

  const selector = `#checkbox-list-${type} input[type='checkbox']`;
  const checkboxes = Array.from(document.querySelectorAll(selector));
  const checkedValues = checkboxes.filter(cb => cb.checked).map(cb => cb.value);

  const columnIndex = getColumnIndex(type);

  if (checkedValues.length === checkboxes.length) {
    // ถ้าเลือกครบ ให้แสดงทั้งหมด
    allRows.forEach(row => row.style.display = '');
    return;
  }

  allRows.forEach(row => {
    const cell = row.querySelectorAll('td')[columnIndex];
    const cellValue = cell?.innerText.trim() || '';
    if (!checkedValues.includes(cellValue)) {
      row.style.display = 'none';
    }
  });
}

    
function openDropdown(type) {
  const dropdownId = getDropdownId(type);
  const dropdownEl = document.getElementById(dropdownId);
  if (!dropdownEl) return;

  const button = getButtonByType(type);

  if (currentOpenDropdown && currentOpenDropdown.type === type) {
    dropdownEl.classList.add('hidden');
    button?.classList.remove('active');
    currentOpenDropdown = null;
    return;
  }

  closeAllDropdowns();
  dropdownEl.classList.remove('hidden');
  button?.classList.add('active');
  currentOpenDropdown = { type, id: dropdownId };

  // 🔽 เก็บ dropdown แรกที่เปิด
  if (!initialDropdownOpened) {
    initialDropdownOpened = type;
  }

  updateCheckboxList(type, type === initialDropdownOpened);
  const selector = `#checkbox-list-${type} input[type='checkbox']`;
  previousChecked[type] = Array.from(document.querySelectorAll(selector))
    .filter(cb => cb.checked)
    .map(cb => cb.value);

  setupSearch(`input-search-${getSearchId(type)}`, `checkbox-list-${type}`);
}

    
    function confirmSelection(type) {
      const dropdownId = getDropdownId(type);
      const selector = `#checkbox-list-${type} input[type='checkbox']`;
      previousChecked[type] = Array.from(document.querySelectorAll(selector))
        .filter(cb => cb.checked)
        .map(cb => cb.value);
    
      applyAllFilters();
      document.getElementById(dropdownId).classList.add('hidden');
      getButtonByType(type)?.classList.remove('active');
      currentOpenDropdown = null;
    }
    
    function cancelSelection(type) {
      const selector = `#checkbox-list-${type} input[type='checkbox']`;
      document.querySelectorAll(selector).forEach(cb => {
        cb.checked = previousChecked[type].includes(cb.value);
      });
      document.getElementById(getDropdownId(type)).classList.add('hidden');
      getButtonByType(type)?.classList.remove('active');
      currentOpenDropdown = null;
    }
    
    function applyAllFilters() {
      const rows = document.querySelectorAll('tbody tr');
      rows.forEach(row => row.style.display = '');
    
      const types = [
    'refcode',
    'sitecode',
    'gtnoffice',
    'trueRegion',
    'towerType',
    'towerModel',
    'estimatedTowerWeight',
    'actualTowerWeight',
    'sitename',
    'remark',

    // Estimated Price

    'estimatedrevenue',
    'estimatedservicecost',
    'estimatedbuybackcost',
    'estimatedtransportationcost',
    'estimatedothercost',
    'estimatedgrossprofit',
    'estimatedgrossprofitmargin',

    // Working Progress

    'jobassigneddatebycustomer',
    'plansurveyeddate',
    'actualsurveyeddate',
    'customercommitteddate',
    'towerdismantlingsubc',
    'planstarteddate',
    'actualstarteddate',
    'planfinisheddate',
    'actualfinisheddate',
    'workingissue',

    // Tower Buyback Data 

    'towerprice',
    'towerbuybackplanpaiddate',
    'towerbuybackactualpaiddate',
    'receiptno',

    // Tower Selling data

    'towerbuyername',
    'towersellingprice',
    'plangetpaiddate',
    'actualgetpaiddate',

    // Revenue Detail

    'towerdismantlingserviceprice',
    'customerquotationsubbmitteddateplan',
    'customerquotationsubbmitteddateactual',
    'customerquotationamount',
    'customerpoamount',
    'customerporeceiveddate',
    'planinvoiceplaceddate',
    'planinvoiceamount',
    'invoiceno',
    'actualinvoiceamount',
    'actualinvoiceplaceddate',
    'confirmedduedate',

    // Payment Detail
    
    'subcname',
    'activityofpayment',
    'pramount',
    'prrequesteddateemail',
    'prapproveddateemail',
    'prnoerp',
    'prissueddateerp',
    'prapproveddateerp',
    'woamounterp',
    'wono',
    'woissuedateerp',
    'woapproveddateerp',
    'datesentwotosubcemail',
    'billingamount',
    'billingrequesteddateemail',
    'billingapproveddateemail',
    'billingnoerp',
    'billingissueddateerp',
    'billingapproveddateerp',
    'datesentbillingtosubc',
    'invoiceplaceddatebysubc',
    'subcinvoiceamount',
    'paymentconfirmeddateerp',
      ];
      const filters = {};
    
      types.forEach(type => {
        const selector = `#checkbox-list-${type} input[type='checkbox']`;
        const checkboxes = Array.from(document.querySelectorAll(selector));
        const checked = checkboxes.filter(cb => cb.checked).map(cb => cb.value);
        filters[type] = (checked.length === checkboxes.length) ? [] : checked;
      });
    
      rows.forEach(row => {
        let visible = true;
        types.forEach(type => {
          const colIndex = getColumnIndex(type);
          const cellValue = row.querySelectorAll('td')[colIndex]?.innerText.trim();
          if (filters[type].length > 0 && !filters[type].includes(cellValue)) {
            visible = false;
          }
        });
        row.style.display = visible ? '' : 'none';
      });
    }
    
    function updateCheckboxList(type, includeFilteredOut = false) {
  const columnIndex = getColumnIndex(type);
  const listEl = document.getElementById(`checkbox-list-${type}`);
  const values = new Set();

  document.querySelectorAll('tbody tr').forEach(row => {
    const isVisible = row.style.display !== 'none';
    if (includeFilteredOut || isVisible) {
      const cell = row.querySelectorAll('td')[columnIndex];
      if (cell) {
        const text = cell.innerText.trim();
        if (text) values.add(text); // ✅ เก็บเฉพาะข้อมูลที่มีอยู่
      }
    }
  });

  const sorted = Array.from(values).sort();

  if (sorted.length === 0) {
    listEl.innerHTML = `<div class="text-gray-400 text-sm italic text-center">No data in this column</div>`;
    return;
  }

  listEl.innerHTML = sorted.map((val, i) => `
    <div class="checkbox-wrapper-46">
      <input class="inp-cbx" id="cbx-${type}-${i}" type="checkbox" value="${val}" 
        ${previousChecked[type]?.includes(val) ? 'checked' : ''} />
      <label for="cbx-${type}-${i}" class="cbx flex items-center justify-start space-x-2">
        <span>
          <svg viewBox="0 0 12 10" height="10px" width="12px">
            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
          </svg>
        </span>
        <span>${val}</span>
      </label>
    </div>
  `).join('');
}


    function selectAllCheckboxes(type) {
      const checkboxes = document.querySelectorAll(`#checkbox-list-${type} input[type='checkbox']`);
      checkboxes.forEach(cb => cb.checked = true);
      previousChecked[type] = Array.from(checkboxes).map(cb => cb.value);
    }
    
    function deselectAllCheckboxes(type) {
      document.querySelectorAll(`#checkbox-list-${type} input[type='checkbox']`).forEach(cb => cb.checked = false);
    }
    
    function sortTableAsc(type) {
      sortTableData(type, 'asc');
    }
    
    function sortTableDesc(type) {
      sortTableData(type, 'desc');
    }
    
    function sortTableData(type, order) {
      const columnIndex = getColumnIndex(type);
      const tbody = document.querySelector('tbody');
      const rows = Array.from(tbody.querySelectorAll('tr')).filter(row => row.style.display !== 'none');
    
      rows.sort((a, b) => {
        const textA = a.children[columnIndex]?.innerText.trim().toUpperCase();
        const textB = b.children[columnIndex]?.innerText.trim().toUpperCase();
        return order === 'asc' ? textA.localeCompare(textB) : textB.localeCompare(textA);
      });
    
      rows.forEach(row => tbody.appendChild(row));
      closeAllDropdowns();
    }
    
    function setupSearch(inputId, listId) {
      const input = document.getElementById(inputId);
      const list = document.getElementById(listId);
      if (!input || !list) return;
    
      input.addEventListener('input', function () {
        const filter = input.value.toUpperCase();
        const items = list.querySelectorAll('.checkbox-wrapper-46');
        items.forEach(item => {
          const label = item.querySelector('label span:last-child');
          const text = label?.innerText.toUpperCase() || '';
          item.style.display = text.includes(filter) ? '' : 'none';
        });
      });
    }
    
    // id = dropdown.... -->
    function getDropdownId(type) {
    return {
    refcode: 'dropdownRefCode',
    sitecode: 'dropdownSiteCode',
    gtnoffice: 'dropdownGTN-Office',
    trueRegion: 'dropdownTrueRegion',
    towerType: 'dropdownTowerType',
    towerModel: 'dropdownTowerModel',
    estimatedtowerweightKg:'dropdownEstimated-Tower-Weight-(Kg.)',
    actualTowerWeight: 'dropdownActualTowerWeight',
    sitename: 'dropdownSiteName',
    remark: 'dropdownRemark',

    // Estimated Price

    estimatedrevenue: 'dropdownEstimatedRevenue',
    estimatedservicecost: 'dropdownEstimated-Service-cost',
    estimatedbuybackcost: 'dropdownEstimatedbuybackcost',
    estimatedtransportationcost: 'dropdownEstimatedTransportationCost',
    estimatedothercost: 'dropdownEstimatedOtherCost',
    estimatedgrossprofit: 'dropdownEstimatedGrossProfit',
    estimatedgrossprofitmargin: 'dropdownEstimatedGrossProfitMargin', 

    // Working Progress

    jobassigneddatebycustomer: 'dropdownJobAssigneddatebyCustomer',
    plansurveyeddate: 'dropdownPlanSurveyeddate',
    actualsurveyeddate: 'dropdownActualSurveyeddate',
    customercommitteddate: 'dropdownCustomerCommitteddate',
    towerdismantlingsubc: 'dropdownTowerDismantlingSubC',
    planstarteddate: 'dropdownPlanstarteddate',
    actualstarteddate: 'dropdownActualstarteddate',
    planfinisheddate: 'dropdownPlanFinisheddate',
    actualfinisheddate: 'dropdownActualFinisheddate',
    workingissue: 'dropdownWorkingIssue',

    // Tower Buyback Data 

    towerprice: 'dropdownTowerPrice',
    towerbuybackplanpaiddate:'dropdownTowerbuyback-Plan-Paid-date',
    towerbuybackactualpaiddate: 'dropdownTower-buyback-Actual-Paid-date',
    receiptno: 'dropdownReceipt-No.',

    // Tower Selling data

    towerbuyername: 'dropdownTower-Buyer-Name',
    towersellingprice: 'dropdownTowerSellingPrice',
    plangetpaiddate: 'dropdownPlanGetPaiddate',
    actualgetpaiddate: 'dropdownActualGetpaiddate',

    // Revenue Detail

    towerdismantlingserviceprice: 'dropdownTower-Dismantling-Service-Price',
    customerquotationsubbmitteddateplan: 'dropdownCustomer-Quotation-Subbmitted-Date-(Plan)',
    customerquotationsubbmitteddateactual:'dropdownCustomer-Quotation-Subbmitted-Date-(Actual)',
    customerquotationamount: 'dropdownCustomer-Quotation-Amount',
    customerpoamount:'dropdownCustomer-PO-Amount',
    customerporeceiveddate:'dropdownCustomer-PO-Received-date',
    planinvoiceplaceddate: 'dropdownPlan-Invoice-Placed-date',
    planinvoiceamount: 'dropdownPlan-Invoice-Amount',
    invoiceno: 'dropdownInvoice-No.',
    actualinvoiceamount:'dropdownActual-Invoice-Amount',
    actualinvoiceplaceddate:'dropdownActual-Invoice-Placed-date',
    confirmedduedate:'dropdownConfirmed-Due-date',

    // Payment Detail
    
    subcname:'dropdownSubC-Name',
    activityofpayment:'dropdownActivity-of-payment',
    pramount:'dropdownPR-Amount',
    prrequesteddateemail:'dropdownPR-requested-date-(Email)',
    prapproveddateemail:'dropdownPR-Approved-date-(Email)',
    prnoerp:'dropdownPR-No.(ERP)',
    prissueddateerp:'dropdownPR-Issued-date-(ERP)',
    prapproveddateerp:'dropdownPR-Approved-date-(ERP)',
    woamounterp: 'dropdownWO-Amount-(ERP)',
    wono:'dropdownWO-No.',
    woissuedateerp:'dropdownWO-Issue-date-(ERP)',
    woapproveddateerp: 'dropdownWO-Approved-date-(ERP)',
    datesentwotosubcemail:'dropdownDate-sent-WO-to-SubC-(Email)',
    billingamount:'dropdownBilling-Amount',
    billingrequesteddateemail:'dropdownBilling-Requested-date-(Email)',
    billingapproveddateemail: 'dropdownBilling-Approved-date-(Email)',
    billingnoerp: 'dropdownBilling-No.(ERP)',
    billingissueddateerp: 'dropdownBilling-Issued-date-(ERP)',
    billingapproveddateerp: 'dropdownBilling-Approved-date-(ERP)',
    datesentbillingtosubc:'dropdownDate-sent-Billing-to-SubC',
    invoiceplaceddatebysubc:'dropdownInvoice-Placed-date-by-SubC',
    subcinvoiceamount: 'dropdownSubC-Invoice-Amount',
    paymentconfirmeddateerp:'dropdownPayment-confirmed-date-(ERP)'



  }[type];
}

function getColumnIndex(type) {
  return {
    refcode: 1,
    sitecode: 2,
    sitename: 3,
    gtnoffice: 4,
    trueRegion: 5,
    towerType: 6,
    towerModel: 7,
    estimatedtowerweightKg: 8,
    actualTowerWeight: 9,
    remark: 10,

    // Estimated Price 

    estimatedrevenue: 11,
    estimatedservicecost: 12,
    estimatedbuybackcost: 13,
    estimatedtransportationcost: 14,
    estimatedothercost: 15,
    estimatedgrossprofit: 16,
    estimatedgrossprofitmargin: 17,

    // Working Progress

    jobassigneddatebycustomer: 18,
    plansurveyeddate: 19,
    actualsurveyeddate: 20,
    customercommitteddate: 21,
    towerdismantlingsubc: 22,
    planstarteddate: 23,
    actualstarteddate: 24,
    planfinisheddate: 25,
    actualfinisheddate: 26,
    workingissue: 27,

    // Tower Buyback Data 

    towerprice: 28,
    towerbuybackplanpaiddate: 29,
    towerbuybackactualpaiddate: 30,
    receiptno: 31,

    // Tower Selling data

    towersellingprice: 32,
    plangetpaiddate: 33,
    actualgetpaiddate: 34,

    // Revenue Detail 

    towerdismantlingserviceprice: 35,
    customerquotationsubbmitteddateplan: 36,
    customerquotationsubbmitteddateactual: 37,
    customerquotationamount: 38,
    customerpoamount: 39,
    customerporeceiveddate: 40,
    planinvoiceplaceddate: 41,
    planinvoiceamount: 42,
    invoiceno: 43,
    actualinvoiceamount: 44,
    actualinvoiceplaceddate: 45,
    confirmedduedate: 46,

    // Payment Detail

    subcname: 47,
    activityofpayment: 48,
    pramount: 49,
    prrequesteddateemail: 50,
    prapproveddateEmail: 51 ,
    prnoerp: 52,
    prissueddateerp: 53,
    prapproveddateerp: 54,
    woamounterp: 55,
    wono: 56,
    woissuedateerp: 57,
    woapproveddateerp: 58,
    datesentwotosubcemail: 59,
    billingamount: 60,
    billingrequesteddateemail: 61,
    billingapproveddateemail: 62,
    billingnoerp: 63,
    billingissueddateerp: 64,
    billingapproveddateerp: 65,
    datesentbillingtosubc: 66,
    invoiceplaceddatebysubc: 67,
    subcinvoiceamount: 68,
    paymentconfirmeddateerp: 69,

  }[type];
}

function getSearchId(type) {
  return {
    sitecode: 'sitecode',
    sitename: 'sitename',
    gtnoffice: 'gtnoffice',
    trueRegion: 'TRUE-Region',
    towerType: 'Tower-Type',
    towerModel: 'Tower-Model',
    estimatedtowerweightKg:'estimatedtowerweightKg',
    actualTowerWeight: 'Actual-Tower-Weight',
    remark: 'Remark',
    refcode: 'refcode',

    // Estimated Price

    estimatedrevenue:'Estimated-Revenue',
    estimatedservicecost:'estimatedservicecost',
    estimatedbuybackcost:'Estimatedbuybackcost',
    estimatedtransportationcost: 'EstimatedTransportationCost',
    estimatedothercost: 'EstimatedOtherCost',
    estimatedgrossprofit: 'estimatedgrossprofit',
    estimatedgrossprofitmargin: 'estimatedgrossprofitmargin',

    // Working Progress
    
    jobassigneddatebycustomer: 'jobassigneddatebycustomer',
    plansurveyeddate: 'plansurveyeddate',
    actualsurveyeddate: 'actualsurveyeddate',
    customercommitteddate: 'customercommitteddate',
    towerdismantlingsubc: 'towerdismantlingsubc',
    planstarteddate: 'planstarteddate',
    actualstarteddate: 'actualstarteddate',
    planfinisheddate: 'planfinisheddate',
    actualfinisheddate: 'actualfinisheddate',
    workingissue: 'workingissue',

    // Tower Buyback Data

    towerprice: 'towerprice',
    towerbuybackplanpaiddate: 'towerbuybackplanpaiddate',
    towerbuybackactualpaiddate: 'towerbuybackactualpaiddate',
    receiptno:'receiptno',

    // Tower Selling data

    towerbuyername: 'towerbuyername',
    towersellingprice: 'towersellingprice',
    plangetpaiddate:'plangetpaiddate',
    actualgetpaiddate:'actualgetpaiddate',

    // Revenue Detail 

    towerdismantlingserviceprice: 'towerdismantlingserviceprice',
    customerquotationsubbmitteddateplan: 'customerquotationsubbmitteddateplan',
    customerquotationsubbmitteddateactual: 'customerquotationsubbmitteddateactual',
    customerquotationamount: 'customerquotationamount',
    customerpoamount: 'customerpoamount',
    customerporeceiveddate: 'customerporeceiveddate',
    planinvoiceplaceddate: 'planinvoiceplaceddate',
    planinvoiceamount: 'planinvoiceamount',
    invoiceno: 'invoiceno',
    actualinvoiceamount:'actualinvoiceamount',
    actualinvoiceplaceddate: 'actualinvoiceplaceddate',
    confirmedduedate:'confirmedduedate',
    
    // Payment Detail
    
    subcname:'subcname',
    activityofpayment:'activityofpayment',
    pramount:'pramount',
    prrequesteddateemail:'prrequesteddateemail',
    prapproveddateemail:'prapproveddateemail',
    prnoerp:'prnoerp',
    prissueddateerp:'prissueddateerp',
    prapproveddateerp:'prapproveddateerp',
    woamounterp:'woamounterp',
    wono:'wono',
    woissuedateerp:'woissuedateerp',
    woapproveddateerp:'woapproveddateerp',
    datesentwotosubcemail:'datesentwotosubcemail',
    billingamount: 'billingamount',
    billingrequesteddateemail: 'billingrequesteddateemail',
    billingnoerp: 'billingnoerp',
    billingissueddateerp:'billingissueddateerp',
    billingapproveddateerp:'billingapproveddateerp',
    datesentbillingtosubc: 'datesentbillingtosubc',
    subcinvoiceamount:'subcinvoiceamount',
    paymentconfirmeddateerp:'paymentconfirmeddateerp',
    

  }[type];
}

// dropdownButton
function getButtonByType(type) {
    return {
    refcode: document.getElementById('dropdownButtonRefcode'),
    sitecode: document.getElementById('dropdownButtonSiteCode'),
    sitename: document.getElementById('dropdownButtonSiteName'),
    gtnoffice: document.getElementById('dropdownButtonGTN-Office'),
    trueRegion: document.getElementById('dropdownButtonTrueRegion'),
    towerType: document.getElementById('dropdownButtonTowerType'),
    towerModel: document.getElementById('dropdownButtonTowerModel'),
    estimatedtowerweightKg: document.getElementById('dropdownButtonEstimated-Tower-Weight-(Kg.)'),
    actualTowerWeight: document.getElementById('dropdownButtonActualTowerWeight'),
    remark: document.getElementById('dropdownButtonRemark'),

    // Estimated Price

    estimatedrevenue: document.getElementById('dropdownButtonEstimatedRevenue'),
    estimatedservicecost: document.getElementById('dropdownButtonEstimated-Service-cost'),
    estimatedbuybackcost: document.getElementById('dropdownButtonEstimatedbuybackcost'),
    estimatedtransportationcost: document.getElementById('dropdownButtonEstimatedTransportationCost'),
    estimatedothercost: document.getElementById('dropdownButtonEstimatedOtherCost'),
    estimatedgrossprofit: document.getElementById('dropdownButtonEstimatedGrossProfit'),
    estimatedgrossprofitmargin: document.getElementById('dropdownButtonEstimated-Gross-Profit-Margin'),

    // Working Progress

    jobassigneddatebycustomer: document.getElementById('dropdownButtonJobAssigneddatebyCustomer'),
    plansurveyeddate: document.getElementById('dropdownButtonPlanSurveyeddate'),
    actualsurveyeddate: document.getElementById('dropdownButtonActualSurveyeddate'),
    customercommitteddate: document.getElementById('dropdownButtonCustomerCommitteddate'),
    towerdismantlingsubc: document.getElementById('dropdownButtonTowerDismantlingSubC'),
    planstarteddate: document.getElementById('dropdownButtonPlanstarteddate'),
    actualstarteddate: document.getElementById('dropdownButtonActualstarteddate'),
    planfinisheddate: document.getElementById('dropdownButtonPlanFinisheddate'),
    actualfinisheddate: document.getElementById('dropdownButtonActualFinisheddate'),
    workingissue: document.getElementById('dropdownButtonWorkingIssue'),

    // Tower Buyback Data 

    towerprice: document.getElementById('dropdownButtonTowerPrice'),
    towerbuybackplanpaiddate: document.getElementById('dropdownButtonTowerbuyback-Plan-Paid-date'),
    towerbuybackactualpaiddate: document.getElementById('dropdownButtonTower-buyback-Actual-Paid-date'),
    receiptno: document.getElementById('dropdownButtonReceipt-No.'),

    // Tower Selling data

    towerbuyername: document.getElementById('dropdownButtonTower-Buyer-Name'),
    towersellingprice: document.getElementById('dropdownButtonTowerSellingPrice'),
    plangetpaiddate: document.getElementById('dropdownButtonPlanGetPaiddate'),
    actualgetpaiddate: document.getElementById('dropdownButtonActualGetpaiddate'),

    // Revenue Detail 

    towerdismantlingserviceprice: document.getElementById('dropdownButtonTower-Dismantling-Service-Price'),
    customerquotationsubbmitteddateplan: document.getElementById('dropdownButtonCustomer-Quotation-Subbmitted-Date-(Plan)'),
    customerquotationsubbmitteddateactual: document.getElementById('dropdownButtonCustomer-Quotation-Subbmitted-Date-(Actual)'),
    customerquotationamount: document.getElementById('dropdownButtonCustomer-Quotation-Amount'),
    customerpoamount: document.getElementById('dropdownButtonCustomer-PO-Amount'),
    customerporeceiveddate: document.getElementById('dropdownButtonCustomer-PO-Received-date'),
    planinvoiceplaceddate: document.getElementById('dropdownButtonPlan-Invoice-Placed-date'),
    planinvoiceamount: document.getElementById('dropdownButtonPlan-Invoice-Amount'),
    invoiceno: document.getElementById('dropdownButtonInvoice-No.'),
    actualinvoiceamount: document.getElementById('dropdownButtonActual-Invoice-Amount'),
    actualinvoiceplaceddate: document.getElementById('dropdownButtonActual-Invoice-Placed-date'),
    confirmedduedate: document.getElementById('dropdownButtonConfirmed-Due-date'),

    // Payment Detail

    subcname: document.getElementById('dropdownButtonSubC-Name'),
    activityofpayment:document.getElementById('dropdownButtonActivity-of-payment'),
    pramount:document.getElementById('dropdownButtonPR-Amount'),
    prrequesteddateemail:document.getElementById('dropdownButtonPR-requested-date-(Email)'),
    prapproveddateemail:document.getElementById('dropdownButtonPR-Approved-date-(Email)'),
    prnoerp:document.getElementById('dropdownButtonPR-No.(ERP)'),
    prissueddateerp:document.getElementById('dropdownButtonPR-Issued-date-(ERP)'),
    prapproveddateerp:document.getElementById('dropdownButtonPR-Approved-date-(ERP)'),
    woamounterp:document.getElementById('dropdownButtonWO-Amount-(ERP)'),
    wono:document.getElementById('dropdownButtonWO-No.'),
    woissuedateerp:document.getElementById('dropdownButtonWO-Issue-date-(ERP)'),
    woapproveddateerp:document.getElementById('dropdownButtonWO-Approved-date-(ERP)'),
    datesentwotosubcemail:document.getElementById('dropdownButtonDate-sent-WO-to-SubC-(Email)'),
    billingamount:document.getElementById('dropdownButtonBilling-Amount'),
    billingrequesteddateemail:document.getElementById('dropdownButtonBilling-Requested-date-(Email)'),
    billingapproveddateemail:document.getElementById('dropdownButtonBilling-Approved-date-(Email)'),
    billingnoerp:document.getElementById('dropdownButtonBilling-No.(ERP)'),
    billingissueddateerp:document.getElementById('dropdownButtonBilling-Issued-date-(ERP)'),
    billingapproveddateerp:document.getElementById('dropdownButtonBilling-Approved-date-(ERP)'),
    datesentbillingtosubc:document.getElementById('dropdownButtonDate-sent-Billing-to-SubC'),
    invoiceplaceddatebysubc:document.getElementById('dropdownButtonInvoice-Placed-date-by-SubC'),
    subcinvoiceamount:document.getElementById('dropdownButtonSubC-Invoice-Amount'),
    paymentconfirmeddateerp:document.getElementById('dropdownButonPayment-confirmed-date-(ERP)'),
    
  }[type];
}  
// function เอาไว้สำหรับเวลาไปกดคอลั่มอื่นให้ dropdown หุบลงโดยไม่ต้องกดซ้ำ
function closeAllDropdowns() {
    ['dropdownRefCode','dropdownSiteCode', 'dropdownGTN-Office', 'dropdownTrueRegion', 'dropdownTowerType', 'dropdownTowerModel', 'dropdownEstimated-Tower-Weight-(Kg.)', 'dropdownActualTowerWeight', 'dropdownSiteName', 'dropdownRemark',

        // Estimated Price

      'dropdownEstimatedRevenue','dropdownEstimated-Service-cost','dropdownEstimatedbuybackcost','dropdownEstimatedTransportationCost','dropdownEstimatedOtherCost', 'dropdownEstimatedGrossProfit','dropdownEstimatedGrossProfitMargin',
      
        // Working Progress

      'dropdownJobAssigneddatebyCustomer','dropdownPlanSurveyeddate','dropdownActualSurveyeddate','dropdownCustomerCommitteddate','dropdownTowerDismantlingSubC','dropdownPlanstarteddate','dropdownActualstarteddate','dropdownPlanFinisheddate','dropdownActualFinisheddate','dropdownWorkingIssue',
        
        // Tower Buyback Data 

      'dropdownTowerPrice','dropdownTowerbuyback-Plan-Paid-date', 'dropdownTower-buyback-Actual-Paid-date','dropdownReceipt-No.',

        // Tower Selling data

      'dropdownTower-Buyer-Name','dropdownTowerSellingPrice','dropdownPlanGetPaiddate','dropdownActualGetpaiddate',

        // Revenue Detail 
      'dropdownTower-Dismantling-Service-Price','dropdownCustomer-Quotation-Subbmitted-Date-(Plan)','dropdownCustomer-Quotation-Subbmitted-Date-(Actual)','dropdownCustomer-Quotation-Amount','','dropdownCustomer-PO-Amount','dropdownCustomer-PO-Received-date','dropdownPlan-Invoice-Placed-date','dropdownPlan-Invoice-Amount','dropdownInvoice-No.','dropdownActual-Invoice-Amount','dropdownActual-Invoice-Placed-date','dropdownConfirmed-Due-date',
    
        // Payment Detail

      'dropdownSubC-Name','dropdownActivity-of-payment','dropdownPR-Amount','dropdownPR-requested-date-(Email)','dropdownPR-Approved-date-(Email)','dropdownPR-No.(ERP)','dropdownPR-Issued-date-(ERP)','dropdownPR-Approved-date-(ERP)','dropdownWO-Amount-(ERP)','dropdownWO-No.','dropdownWO-Issue-date-(ERP)','dropdownWO-Approved-date-(ERP)','dropdownDate-sent-WO-to-SubC-(Email)','dropdownBilling-Amount','dropdownBilling-Requested-date-(Email)','dropdownBilling-Approved-date-(Email)','dropdownBilling-No.(ERP)','dropdownBilling-Issued-date-(ERP)','dropdownBilling-Approved-date-(ERP)','dropdownDate-sent-Billing-to-SubC','dropdownInvoice-Placed-date-by-SubC','dropdownSubC-Invoice-Amount','dropdownPayment-confirmed-date-(ERP)'

    ]
                                                                            
    .forEach(id => {
    document.getElementById(id)?.classList.add('hidden');
  });

  ['dropdownButtonRefcode','dropdownButtonSiteCode','dropdownButtonSiteName','dropdownButtonGTN-Office', 'dropdownButtonTrueRegion', 'dropdownButtonTowerType','dropdownButtonTowerModel','dropdownButtonEstimated-Tower-Weight-(Kg.)','dropdownButtonActualTowerWeight','dropdownButtonRemark',

  // Estimated Price

  'dropdownButtonEstimatedRevenue','dropdownButtonEstimated-Service-cost','dropdownButtonEstimatedbuybackcost','dropdownButtonEstimatedTransportationCost','dropdownButtonEstimatedOtherCost','dropdownButtonEstimatedGrossProfit','dropdownButtonEstimated-Gross-Profit-Margin',

  // Working Progress

  'dropdownButtonJobAssigneddatebyCustomer','dropdownButtonPlanSurveyeddate','dropdownButtonActualSurveyeddate','dropdownButtonCustomerCommitteddate','dropdownButtonTowerDismantlingSubC','dropdownButtonPlanstarteddate','dropdownButtonActualstarteddate','dropdownButtonPlanFinisheddate','dropdownButtonActualFinisheddate','dropdownButtonWorkingIssue',
  
  // Tower Buyback Data 
  
  'dropdownButtonTowerPrice','dropdownButtonTowerbuyback-Plan-Paid-date','dropdownButtonTower-buyback-Actual-Paid-date','dropdownButtonReceipt-No.',

  // Tower Selling data

  'dropdownButtonTower-Buyer-Name','dropdownButtonTowerSellingPrice','dropdownButtonPlanGetPaiddate','dropdownButtonActualGetpaiddate',
  
  // Revenue Detail 
  
  'dropdownButtonTower-Dismantling-Service-Price','dropdownButtonCustomer-Quotation-Subbmitted-Date-(Plan)','dropdownButtonCustomer-Quotation-Subbmitted-Date-(Actual)','dropdownButtonCustomer-Quotation-Amount','dropdownButtonCustomer-PO-Amount','dropdownButtonCustomer-PO-Received-date','dropdownButtonPlan-Invoice-Placed-date','dropdownButtonPlan-Invoice-Amount','dropdownButtonInvoice-No.','dropdownButtonActual-Invoice-Amount','dropdownButtonActual-Invoice-Placed-date','dropdownButtonConfirmed-Due-date',

  // Payment Detail

  'dropdownButtonSubC-Name','dropdownButtonActivity-of-payment','dropdownButtonPR-Amount','dropdownButtonPR-requested-date-(Email)','dropdownButtonPR-Approved-date-(Email)','dropdownButtonPR-No.(ERP)','dropdownButtonPR-Issued-date-(ERP)','dropdownButtonPR-Approved-date-(ERP)','dropdownButtonWO-Amount-(ERP)','dropdownButtonWO-No.','dropdownButtonWO-Issue-date-(ERP)','dropdownButtonWO-Approved-date-(ERP)','dropdownButtonDate-sent-WO-to-SubC-(Email)','dropdownButtonBilling-Amount','dropdownButtonBilling-Requested-date-(Email)','dropdownButtonBilling-Approved-date-(Email)','dropdownButtonBilling-No.(ERP)','dropdownButtonBilling-Issued-date-(ERP)','dropdownButtonBilling-Approved-date-(ERP)','dropdownButtonDate-sent-Billing-to-SubC','dropdownButtonInvoice-Placed-date-by-SubC','dropdownButtonSubC-Invoice-Amount','dropdownButonPayment-confirmed-date-(ERP)'




  ].forEach(id => {
    document.getElementById(id)?.classList.remove('active');
  });

  currentOpenDropdown = null;
}
    
    // ปิด dropdown เมื่อคลิกนอกพื้นที่
    document.addEventListener('click', function (event) {
      if (!currentOpenDropdown) return;
      const dropdown = document.getElementById(currentOpenDropdown.id);
      const button = getButtonByType(currentOpenDropdown.type);
      if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.classList.add('hidden');
        button?.classList.remove('active');
        currentOpenDropdown = null;
      }
    });
</script>



@endsection