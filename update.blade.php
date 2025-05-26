@extends('layouts.Tailwind')

@section('title', 'Update')
@section('content')


    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>




    <style>
        span {
            color: black;
            /* เปลี่ยนสีตัวอักษรใน span เป็นสีดำ */
        }

        label {
            color: black;
            /* เปลี่ยนสีตัวอักษรใน label เป็นสีดำ */
        }
    </style>


    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successModalEl = document.getElementById('successModal');
                var successModal = new bootstrap.Modal(successModalEl);
                successModal.show();

                setTimeout(function() {
                    successModal.hide();
                }, 1500); // 1.5 วินาที
            });
        </script>
    @endif

    @if (session('success'))
        <!-- Modal Popup -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-success">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="successModalLabel">สำเร็จ!</h5>
                        <!--   <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> -->
                    </div>
                    <div class="modal-body text-success">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="max-w-[1400px] w-full mx-auto p-4">

        <form id="updateForm" class="row g-3 custom-form" autocomplete="off" method="POST"
            action="{{ route('towerDismantle.updateId', $blog->id) }}">
            @csrf


            <div id="accordion-color" class="min-h-64" data-accordion="collapse"
                data-active-classes="bg-green-500 dark:bg-green-800 text-green-600 dark:text-white">

                <!--Header-->

                <h2 id="accordion-color-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-white bg-green-500 border border-b-0 border-green-100 rounded-t-xl focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        aria-expanded="true" aria-controls="accordion-color-body-1">
                        <span>Detail</span>

                    </button>
                </h2>
                <div id="accordion-color-body-1" aria-labelledby="accordion-color-heading-1">
                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">
                        <div class="row">


                            {{-- RefCode Input --}}
                            <div class="col-md-4 mb-3 position-relative">
                                <label for="refCode" class="form-label">RefCode</label>
                                <input type="text" class="form-control" id="refCode" name="refCode" autocomplete="off"
                                    required value="{{ old('refCode', $blog->refCode ?? '') }}">

                                <ul id="refcode-list" class="list-group position-absolute w-100"
                                    style="z-index: 9999; max-height: 200px; overflow-y: auto; display: none;"></ul>
                            </div>


                            {{-- SiteCode Input --}}
                            <div class="col-md-4 mb-3 position-relative">
                                <label for="siteCode" class="form-label">SiteCode</label>
                                <input type="text" class="form-control" id="siteCode" name="siteCode" autocomplete="off"
                                    required value="{{ old('siteCode', $blog->siteCode ?? '') }}">
                                <ul id="sitecode-list" class="list-group position-absolute w-100"
                                    style="z-index: 9999; max-height: 200px; overflow-y: auto; display: none;"></ul>
                            </div>

                            <div class="col-md-4 mb-3 position-relative">
                                <label for="siteName" class="form-label">SiteName</label>
                                <input type="text" class="form-control" id="siteName" name="siteName" autocomplete="off"
                                    required value="{{ old('siteName', $blog->siteName ?? '') }}">

                                <ul id="sitecode-list" class="list-group position-absolute w-100"
                                    style="z-index: 9999; max-height: 200px; overflow-y: auto; display: none;"></ul>
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="gtnOffice" class="form-label">GTN Office</label>
                                <select class="form-select" id="gtnOffice" name="gtnOffice" required>
                                    <option value="">-- กรุณาเลือก --</option>
                                    <option value="R1:BMA_West"
                                        {{ old('gtnOffice', $blog->gtnOffice ?? '') == 'R1:BMA_West' ? 'selected' : '' }}>
                                        01_BKK</option>
                                    <option value="R2:BMA_East"
                                        {{ old('gtnOffice', $blog->gtnOffice ?? '') == 'R2:BMA_East' ? 'selected' : '' }}>
                                        02_CMI</option>
                                    <option value="R3:East"
                                        {{ old('gtnOffice', $blog->gtnOffice ?? '') == 'R3:East' ? 'selected' : '' }}>03_KKN
                                    </option>
                                    <option value="R4:North"
                                        {{ old('gtnOffice', $blog->gtnOffice ?? '') == 'R4:North' ? 'selected' : '' }}>
                                        04_UBR</option>
                                    <option value="R5:Northeast1"
                                        {{ old('gtnOffice', $blog->gtnOffice ?? '') == 'R5:Northeast1' ? 'selected' : '' }}>
                                        05_HYI</option>
                                    <option value="R6:Northeast2"
                                        {{ old('gtnOffice', $blog->gtnOffice ?? '') == 'R6:Northeast2' ? 'selected' : '' }}>
                                        06_PLK</option>
                                </select>
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="trueRegion" class="form-label">True Region</label>
                                <select class="form-select" id="trueRegion" name="trueRegion" required>
                                    <option value="">-- กรุณาเลือก --</option>
                                    <option value="R1:BMA_West"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R1:BMA_West' ? 'selected' : '' }}>
                                        R1: BMA West</option>
                                    <option value="R2:BMA_East"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R2:BMA_East' ? 'selected' : '' }}>
                                        R2: BMA East</option>
                                    <option value="R3:East"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R3:East' ? 'selected' : '' }}>R3:
                                        East</option>
                                    <option value="R4:North"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R4:North' ? 'selected' : '' }}>
                                        R4: North</option>
                                    <option value="R5:Northeast1"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R5:Northeast1' ? 'selected' : '' }}>
                                        R5: Northeast1</option>
                                    <option value="R6:Northeast2"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R6:Northeast2' ? 'selected' : '' }}>
                                        R6: Northeast2</option>
                                    <option value="R7:CentralWest"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R7:CentralWest' ? 'selected' : '' }}>
                                        R7: Central West</option>
                                    <option value="R8:CentralWest"
                                        {{ old('trueRegion', $blog->trueRegion ?? '') == 'R8:South' ? 'selected' : '' }}>
                                        R8: South</option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="towerType" class="form-label">Tower Type</label>
                                <select class="form-select" id="towerType" name="towerType" required>
                                    <option value="">-- กรุณาเลือก --</option>
                                    <option value="Guyed Mast Tower"
                                        {{ old('towerType', $blog->towerType ?? '') == 'Guyed Mast Tower' ? 'selected' : '' }}>
                                        Guyed Mast Tower</option>
                                    <option value="Self-Support Tower"
                                        {{ old('towerType', $blog->towerType ?? '') == 'Self-Support Tower' ? 'selected' : '' }}>
                                        Self-Support Tower</option>
                                    <option value="Pole on Roof"
                                        {{ old('towerType', $blog->towerType ?? '') == 'Pole on Roof' ? 'selected' : '' }}>
                                        Pole on Roof</option>
                                    <option value="Electic Pole"
                                        {{ old('towerType', $blog->towerType ?? '') == 'Electic Pole' ? 'selected' : '' }}>
                                        Electic Pole</option>
                                    <option value="Wall Pole"
                                        {{ old('towerType', $blog->towerType ?? '') == 'Wall Pole' ? 'selected' : '' }}>
                                        Wall Pole</option>
                                    <option value="Wall Mount"
                                        {{ old('towerType', $blog->towerType ?? '') == 'Wall Mount' ? 'selected' : '' }}>
                                        Wall Mount</option>
                                </select>
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="towerModel" class="form-label">Tower Model</label>
                                <input type="text" class="form-control" id="towerModel" name="towerModel"
                                    value="{{ old('towerModel', $blog->towerModel ?? '') }}">

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="estimatedTowerWeight" class="form-label">Estimated Tower Weight (Kg.)</label>
                                <input type="number" class="form-control" id="estimatedTowerWeight"
                                    name="estimatedTowerWeight"
                                    value="{{ old('estimatedTowerWeight', $blog->estimatedTowerWeight ?? '') }}">

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="actualTowerWeight" class="form-label">Actual Tower Weight (Kg.)</label>
                                <input type="number" class="form-control" id="actualTowerWeight"
                                    name="actualTowerWeight"
                                    value="{{ old('actualTowerWeight', $blog->actualTowerWeight ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="remark" class="form-label">Remark</label>
                                <input type="text" class="form-control" id="remark" name="remark"
                                    value="{{ old('remark', $blog->remark ?? '') }}">
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Estimated Price -->
                <h2 id="accordion-color-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-gray-500 border border-b-0 border-green-200 focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                        aria-controls="accordion-color-body-2">
                        <span>Estimated Price</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">
                        <div class="row">

                            @php
                                $revenue = old('est_revenue', $blog->est_revenue ?? 0);

                                $serviceCost = old('est_serviceCost', $blog->est_serviceCost ?? 0);
                                $buybackCost = old('est_buybackCost', $blog->est_buybackCost ?? 0);
                                $transportationCost = old('est_transportationCost', $blog->est_transportationCost ?? 0);
                                $otherCost = old('est_otherCost', $blog->est_otherCost ?? 0);

                                $sum = $serviceCost + $buybackCost + $transportationCost + $otherCost;

                                $total = $revenue - $sum;

                                // คำนวณ % Gross Profit Margin
                                if ($revenue != 0) {
                                    $grossProfitMargin = ($total * 100) / $revenue;
                                    $grossProfitMargin = floor($grossProfitMargin); // ทำเป็นจำนวนเต็ม (ปัดลง)
                                } else {
                                    $grossProfitMargin = 0;
                                }

                                // เพิ่ม % ลงท้าย
                                $grossProfitMarginWithPercent = $grossProfitMargin . '%';
                            @endphp




                            <div class="col-md-3 mb-3">
                                <label for="est_revenue" class="form-label">Estimated Revenue</label>
                                <input type="number" class="form-control" id="est_revenue" name="est_revenue"
                                    value="{{ old('est_revenue', $blog->est_revenue ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="est_serviceCost" class="form-label">Estimated Service cost</label>
                                <input type="number" class="form-control" id="est_serviceCost" name="est_serviceCost"
                                    value="{{ old('est_serviceCost', $blog->est_serviceCost ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="est_buybackCost" class="form-label">Estimated buyback cost</label>
                                <input type="number" class="form-control" id="est_buybackCost" name="est_buybackCost"
                                    value="{{ old('est_buybackCost', $blog->est_buybackCost ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="est_transportationCost" class="form-label">Estimated Transportation
                                    Cost</label>
                                <input type="number" class="form-control" id="est_transportationCost"
                                    name="est_transportationCost"
                                    value="{{ old('est_buybackCost', $blog->est_transportationCost ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="est_otherCost" class="form-label">Estimated Other Cost</label>
                                <input type="number" class="form-control" id="est_otherCost" name="est_otherCost"
                                    value="{{ old('est_otherCost', $blog->est_otherCost ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="est_grossProfit" class="form-label">Estimated Gross Profit</label>
                                <input type="number" class="form-control" id="est_grossProfit" name="est_grossProfit"
                                    disabled value="{{ old('est_grossProfit', $total) }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="est_grossProfitMargin" class="form-label">Estimated Gross Profit
                                    Margin</label>
                                <input type="text" class="form-control" id="est_grossProfitMargin" disabled
                                    name="est_grossProfitMargin"
                                    value="{{ old('est_grossProfitMargin', $grossProfitMarginWithPercent) }}" readonly>
                            </div>


                        </div>
                    </div>
                </div>


                <!-- Working Progress -->
                <h2 id="accordion-color-heading-3">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-gray-500 border border-b-0 border-green-200 focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                        aria-controls="accordion-color-body-3">
                        <span>Working Progress</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">
                        <div class="row">

                            <div class="col-md-3 mb-3">
                                <label for="work_JobAssignedDateByCustomer" class="form-label">Job Assigned date by
                                    Customer</label>
                                <input type="date" class="form-control" id="work_JobAssignedDateByCustomer"
                                    name="work_JobAssignedDateByCustomer"
                                    value="{{ old('work_JobAssignedDateByCustomer', $blog->work_JobAssignedDateByCustomer ?? '') }}">

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_PlanSurveyedDate" class="form-label">Plan Surveyed date</label>
                                <input type="date" class="form-control" id="work_PlanSurveyedDate"
                                    name="work_PlanSurveyedDate"
                                    value="{{ old('work_PlanSurveyedDate', $blog->work_PlanSurveyedDate ?? '') }}">

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_ActualSurveyedDate" class="form-label">Actual Surveyed date</label>
                                <input type="date" class="form-control" id="work_ActualSurveyedDate"
                                    name="work_ActualSurveyedDate"
                                    value="{{ old('work_ActualSurveyedDate', $blog->work_ActualSurveyedDate ?? '') }}">
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="work_CustomerCommittedDate" class="form-label">Customer Committed date</label>
                                <input type="date" class="form-control" id="work_CustomerCommittedDate"
                                    name="work_CustomerCommittedDate"
                                    value="{{ old('work_CustomerCommittedDate', $blog->work_CustomerCommittedDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_TowerDismantlingSubC" class="form-label">Tower Dismantling SubC</label>
                                <input type="text" class="form-control" id="work_TowerDismantlingSubC"
                                    name="work_TowerDismantlingSubC"
                                    value="{{ old('work_TowerDismantlingSubC', $blog->work_TowerDismantlingSubC ?? '') }}">
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="work_PlanStartedDate" class="form-label">Plan Started Date</label>
                                <input type="date" class="form-control" id="work_PlanStartedDate"
                                    name="work_PlanStartedDate"
                                    value="{{ old('work_PlanStartedDate', $blog->work_PlanStartedDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_ActualStartedDate" class="form-label">Actual Started Date</label>
                                <input type="date" class="form-control" id="work_ActualStartedDate"
                                    name="work_ActualStartedDate"
                                    value="{{ old('work_ActualStartedDate', $blog->work_ActualStartedDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_PlanFinishedDate" class="form-label">Plan Finished Date</label>
                                <input type="date" class="form-control" id="work_PlanFinishedDate"
                                    name="work_PlanFinishedDate"
                                    value="{{ old('work_PlanFinishedDate', $blog->work_PlanFinishedDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_ActualFinishedDate" class="form-label">Actual Finished Date</label>
                                <input type="date" class="form-control" id="work_ActualFinishedDate"
                                    name="work_ActualFinishedDate"
                                    value="{{ old('work_ActualFinishedDate', $blog->work_ActualFinishedDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="work_WorkingIssue" class="form-label">Working Issue</label>
                                <input type="text" class="form-control" id="work_WorkingIssue"
                                    name="work_WorkingIssue"
                                    value="{{ old('work_WorkingIssue', $blog->work_WorkingIssue ?? '') }}">
                            </div>

                        </div>
                    </div>
                </div>



                <!--Tower Buyback Data -->
                <h2 id="accordion-color-heading-4">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-gray-500 border border-b-0 border-green-200 focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        data-accordion-target="#accordion-color-body-4" aria-expanded="false"
                        aria-controls="accordion-color-body-4">
                        <span>Tower Buyback Data</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-4">
                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">
                        <div class="row">


                            <div class="col-md-3 mb-3">
                                <label for="tower_TowerPrice" class="form-label">Tower Price</label>
                                <input type="number" class="form-control" id="tower_TowerPrice" name="tower_TowerPrice"
                                    value="{{ old('tower_TowerPrice', $blog->tower_TowerPrice ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="tower_Towerbuyback_PlanPaidDate" class="form-label">Tower buyback - Plan Paid
                                    date</label>
                                <input type="date" class="form-control" id="tower_Towerbuyback_PlanPaidDate"
                                    name="tower_Towerbuyback_PlanPaidDate"
                                    value="{{ old('tower_Towerbuyback_PlanPaidDate', $blog->tower_Towerbuyback_PlanPaidDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="tower_Towerbuyback_ActualPaidDate" class="form-label">Tower buyback - Actual
                                    Paid date</label>
                                <input type="date" class="form-control" id="tower_Towerbuyback_ActualPaidDate"
                                    name="tower_Towerbuyback_ActualPaidDate"
                                    value="{{ old('tower_Towerbuyback_ActualPaidDate', $blog->tower_Towerbuyback_ActualPaidDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="tower_ReceiptNo" class="form-label">Receipt No.</label>
                                <input type="text" class="form-control" id="tower_ReceiptNo" name="tower_ReceiptNo"
                                    value="{{ old('tower_ReceiptNo', $blog->tower_ReceiptNo ?? '') }}">
                            </div>
                        </div>

                    </div>
                </div>




                <!-- Tower Selling data -->
                <h2 id="accordion-color-heading-5">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-gray-500 border border-b-0 border-green-200 focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        data-accordion-target="#accordion-color-body-5" aria-expanded="false"
                        aria-controls="accordion-color-body-5">
                        <span>Tower Selling Data</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-color-body-5" class="hidden" aria-labelledby="accordion-color-heading-5">
                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">


                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="towersell_TowerBuyerName" class="form-label">Tower Buyer Name</label>
                                <input type="text" class="form-control" id="towersell_TowerBuyerName"
                                    name="towersell_TowerBuyerName"
                                    value="{{ old('towersell_TowerBuyerName', $blog->towersell_TowerBuyerName ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="towersell_TowerSellingPrice" class="form-label">Tower Selling Price</label>
                                <input type="number" class="form-control" id="towersell_TowerSellingPrice"
                                    name="towersell_TowerSellingPrice"
                                    value="{{ old('towersell_TowerSellingPrice', $blog->towersell_TowerSellingPrice ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="towersell_PlanGetPaidDate" class="form-label">Plan Get Paid Date</label>
                                <input type="date" class="form-control" id="towersell_PlanGetPaidDate"
                                    name="towersell_PlanGetPaidDate"
                                    value="{{ old('towersell_PlanGetPaidDate', $blog->towersell_PlanGetPaidDate ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="towersell_ActualGetPaidDate" class="form-label">Actual Get Paid Date</label>
                                <input type="date" class="form-control" id="towersell_ActualGetPaidDate"
                                    name="towersell_ActualGetPaidDate"
                                    value="{{ old('towersell_ActualGetPaidDate', $blog->towersell_ActualGetPaidDate ?? '') }}">
                            </div>
                        </div>

                    </div>
                </div>



                <!-- Revenue Detail    -->
                <h2 id="accordion-color-heading-6">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-gray-500 border border-b-0 border-green-200 focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        data-accordion-target="#accordion-color-body-6" aria-expanded="false"
                        aria-controls="accordion-color-body-6">
                        <span>Revenue Detail</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-color-body-6" class="hidden" aria-labelledby="accordion-color-heading-6">

                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">

                        <div class="mb-4 space-x-2">
                            <button type="button" onclick="showForm(1)"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">PO 1</button>
                            <button type="button" onclick="showForm(2)"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">PO 2</button>
                            <button type="button" onclick="showForm(3)"
                                class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">PO 3</button>
                        </div>

                        <div id="form1" class="form-section">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="re1_TowerDismantlingServicePrice" class="form-label">Tower Dismantling
                                        Service Price</label>
                                    <input type="number" class="form-control" id="re1_TowerDismantlingServicePrice"
                                        name="re1_TowerDismantlingServicePrice"
                                        value="{{ old('re1_TowerDismantlingServicePrice', $blog->re1_TowerDismantlingServicePrice ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_Customer_QuotationSubbmittedDatePlan" class="form-label"
                                        style="font-size: 14px">Customer - Quotation Subbmitted Date (Plan) </label>
                                    <input type="date" class="form-control"
                                        id="re1_Customer_QuotationSubbmittedDatePlan"
                                        name="re1_Customer_QuotationSubbmittedDatePlan"
                                        value="{{ old('re1_Customer_QuotationSubbmittedDatePlan', $blog->re1_Customer_QuotationSubbmittedDatePlan ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_Customer_QuotationSubbmittedDateActual" class="form-label"
                                        style="font-size: 13px">Customer - Quotation Subbmitted Date (Actual)</label>
                                    <input type="date" class="form-control"
                                        id="re1_Customer_QuotationSubbmittedDateActual"
                                        name="re1_Customer_QuotationSubbmittedDateActual"
                                        value="{{ old('re1_Customer_QuotationSubbmittedDateActual', $blog->re1_Customer_QuotationSubbmittedDateActual ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_Customer_QuotationAmount" class="form-label">Customer - Quotation
                                        Amount</label>
                                    <input type="number" class="form-control" id="re1_Customer_QuotationAmount"
                                        name="re1_Customer_QuotationAmount"
                                        value="{{ old('re1_Customer_QuotationAmount', $blog->re1_Customer_QuotationAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_Customer_POAmount" class="form-label">Customer - PO Amount</label>
                                    <input type="number" class="form-control" id="re1_Customer_POAmount"
                                        name="re1_Customer_POAmount"
                                        value="{{ old('re1_Customer_POAmount', $blog->re1_Customer_POAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_Customer_POReceivedDate" class="form-label">Customer - PO Received
                                        date</label>
                                    <input type="date" class="form-control" id="re1_Customer_POReceivedDate"
                                        name="re1_Customer_POReceivedDate"
                                        value="{{ old('re1_Customer_POReceivedDate', $blog->re1_Customer_POReceivedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_PlanInvoicePlacedDate" class="form-label">Plan Invoice Placed
                                        date</label>
                                    <input type="date" class="form-control" id="re1_PlanInvoicePlacedDate"
                                        name="re1_PlanInvoicePlacedDate"
                                        value="{{ old('re1_PlanInvoicePlacedDate', $blog->re1_PlanInvoicePlacedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_PlanInvoiceAmount" class="form-label">Plan Invoice Amount</label>
                                    <input type="number" class="form-control" id="re1_PlanInvoiceAmount"
                                        name="re1_PlanInvoiceAmount"
                                        value="{{ old('re1_PlanInvoiceAmount', $blog->re1_PlanInvoiceAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_InvoiceNo" class="form-label">Invoice No.</label>
                                    <input type="text" class="form-control" id="re1_InvoiceNo" name="re1_InvoiceNo"
                                        value="{{ old('re1_InvoiceNo', $blog->re1_InvoiceNo ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_ActualInvoiceAmount" class="form-label">Actual Invoice Amount</label>
                                    <input type="number" class="form-control" id="re1_ActualInvoiceAmount"
                                        name="re1_ActualInvoiceAmount"
                                        value="{{ old('re1_ActualInvoiceAmount', $blog->re1_ActualInvoiceAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_ActualInvoicePlacedDate" class="form-label">Actual Invoice Placed
                                        date</label>
                                    <input type="date" class="form-control" id="re1_ActualInvoicePlacedDate"
                                        name="re1_ActualInvoicePlacedDate"
                                        value="{{ old('re1_ActualInvoicePlacedDate', $blog->re1_ActualInvoicePlacedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re1_ConfirmedDueDate" class="form-label">Confirmed Due date</label>
                                    <input type="date" class="form-control" id="re1_ConfirmedDueDate"
                                        name="re1_ConfirmedDueDate"
                                        value="{{ old('re1_ConfirmedDueDate', $blog->re1_ConfirmedDueDate ?? '') }}">
                                </div>

                            </div>
                        </div>

                        <div id="form2" class="form-section hidden">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="re2_TowerDismantlingServicePrice" class="form-label">Tower Dismantling
                                        Service Price</label>
                                    <input type="number" class="form-control" id="re2_TowerDismantlingServicePrice"
                                        name="re2_TowerDismantlingServicePrice"
                                        value="{{ old('re2_TowerDismantlingServicePrice', $blog->re2_TowerDismantlingServicePrice ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_Customer_QuotationSubbmittedDatePlan" class="form-label"
                                        style="font-size: 14px">Customer - Quotation Subbmitted Date (Plan) </label>
                                    <input type="date" class="form-control"
                                        id="re2_Customer_QuotationSubbmittedDatePlan"
                                        name="re2_Customer_QuotationSubbmittedDatePlan"
                                        value="{{ old('re2_Customer_QuotationSubbmittedDatePlan', $blog->re2_Customer_QuotationSubbmittedDatePlan ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_Customer_QuotationSubbmittedDateActual" class="form-label"
                                        style="font-size: 13px">Customer - Quotation Subbmitted Date (Actual) </label>
                                    <input type="date" class="form-control"
                                        id="re2_Customer_QuotationSubbmittedDateActual"
                                        name="re2_Customer_QuotationSubbmittedDateActual"
                                        value="{{ old('re2_Customer_QuotationSubbmittedDateActual', $blog->re2_Customer_QuotationSubbmittedDateActual ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_Customer_QuotationAmount" class="form-label">Customer - Quotation
                                        Amount</label>
                                    <input type="number" class="form-control" id="re2_Customer_QuotationAmount"
                                        name="re2_Customer_QuotationAmount"
                                        value="{{ old('re2_Customer_QuotationAmount', $blog->re2_Customer_QuotationAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_Customer_POAmount	" class="form-label">Customer - PO 2 Amount</label>
                                    <input type="number" class="form-control" id="re2_Customer_POAmount"
                                        name="re2_Customer_POAmount"
                                        value="{{ old('re2_Customer_POAmount	', $blog->re2_Customer_POAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_Customer_POReceivedDate" class="form-label">Customer - PO 2 Received
                                        date</label>
                                    <input type="date" class="form-control" id="re2_Customer_POReceivedDate"
                                        name="re2_Customer_POReceivedDate"
                                        value="{{ old('re2_Customer_POReceivedDate', $blog->re2_Customer_POReceivedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_PlanInvoicePlacedDate" class="form-label">Plan Invoice 2 Placed
                                        date</label>
                                    <input type="date" class="form-control" id="re2_PlanInvoicePlacedDate"
                                        name="re2_PlanInvoicePlacedDate"
                                        value="{{ old('re2_PlanInvoicePlacedDate', $blog->re2_PlanInvoicePlacedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_PlanInvoiceAmount" class="form-label">Plan Invoice 2 Amount</label>
                                    <input type="number" class="form-control" id="re2_PlanInvoiceAmount"
                                        name="re2_PlanInvoiceAmount"
                                        value="{{ old('re2_PlanInvoiceAmount', $blog->re2_PlanInvoiceAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_InvoiceNo" class="form-label">Invoice No. 2</label>
                                    <input type="text" class="form-control" id="re2_InvoiceNo" name="re2_InvoiceNo"
                                        value="{{ old('re2_InvoiceNo', $blog->re2_InvoiceNo ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_ActualInvoiceAmount" class="form-label">Actual Invoice 2
                                        Amount</label>
                                    <input type="number" class="form-control" id="re2_ActualInvoiceAmount"
                                        name="re2_ActualInvoiceAmount"
                                        value="{{ old('re2_ActualInvoiceAmount', $blog->re2_ActualInvoiceAmount ?? '') }}">
                                </div>



                                <div class="col-md-3 mb-3">
                                    <label for="re2_ActualInvoicePlacedDate" class="form-label">Actual Invoice 2 Placed
                                        date</label>
                                    <input type="date" class="form-control" id="re2_ActualInvoicePlacedDate"
                                        name="re2_ActualInvoicePlacedDate"
                                        value="{{ old('re2_ActualInvoicePlacedDate', $blog->re2_ActualInvoicePlacedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re2_ConfirmedDueDate" class="form-label">Confirmed Due date</label>
                                    <input type="date" class="form-control" id="re2_ConfirmedDueDate"
                                        name="re2_ConfirmedDueDate"
                                        value="{{ old('re2_ConfirmedDueDate', $blog->re2_ConfirmedDueDate ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div id="form3" class="form-section hidden">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="re3_TowerDismantlingServicePrice" class="form-label">Tower Dismantling
                                        Service Price</label>
                                    <input type="number" class="form-control" id="re3_TowerDismantlingServicePrice"
                                        name="re3_TowerDismantlingServicePrice"
                                        value="{{ old('re3_TowerDismantlingServicePrice', $blog->re3_TowerDismantlingServicePrice ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_Customer_QuotationSubbmittedDatePlan" class="form-label"
                                        style="font-size: 14px;">
                                        Customer - Quotation Subbmitted Date (Plan)
                                    </label>
                                    <input type="date" class="form-control"
                                        id="re3_Customer_QuotationSubbmittedDatePlan"
                                        name="re3_Customer_QuotationSubbmittedDatePlan"
                                        value="{{ old('re3_Customer_QuotationSubbmittedDatePlan', $blog->re3_Customer_QuotationSubbmittedDatePlan ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_Customer_QuotationSubbmittedDateActual" class="form-label"
                                        style="font-size: 13px">
                                        Customer - Quotation Subbmitted Date (Actual)</label>
                                    <input type="date" class="form-control"
                                        id="re3_Customer_QuotationSubbmittedDateActual"
                                        name="re3_Customer_QuotationSubbmittedDateActual"
                                        value="{{ old('re3_Customer_QuotationSubbmittedDateActual', $blog->re3_Customer_QuotationSubbmittedDateActual ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_Customer_QuotationAmount" class="form-label">Customer - Quotation
                                        Amount</label>
                                    <input type="number" class="form-control" id="re3_Customer_QuotationAmount"
                                        name="re3_Customer_QuotationAmount"
                                        value="{{ old('re3_Customer_QuotationAmount', $blog->re3_Customer_QuotationAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_Customer_POAmount" class="form-label">Customer - PO 3 Amount</label>
                                    <input type="number" class="form-control" id="re3_Customer_POAmount"
                                        name="re3_Customer_POAmount"
                                        value="{{ old('re3_Customer_POAmount', $blog->re3_Customer_POAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_Customer_POReceivedDate" class="form-label">Customer - PO 3 Received
                                        date</label>
                                    <input type="date" class="form-control" id="re3_Customer_POReceivedDate"
                                        name="re3_Customer_POReceivedDate"
                                        value="{{ old('re3_Customer_POReceivedDate', $blog->re3_Customer_POReceivedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_PlanInvoicePlacedDate" class="form-label">Plan Invoice 3 Placed
                                        date</label>
                                    <input type="date" class="form-control" id="re3_PlanInvoicePlacedDate"
                                        name="re3_PlanInvoicePlacedDate"
                                        value="{{ old('re3_PlanInvoicePlacedDate', $blog->re3_PlanInvoicePlacedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_PlanInvoiceAmount" class="form-label">Plan Invoice 3 Amount</label>
                                    <input type="number" class="form-control" id="re3_PlanInvoiceAmount"
                                        name="re3_PlanInvoiceAmount"
                                        value="{{ old('re3_PlanInvoiceAmount', $blog->re3_PlanInvoiceAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_InvoiceNo" class="form-label">Invoice No. 3</label>
                                    <input type="text" class="form-control" id="re3_InvoiceNo" name="re3_InvoiceNo"
                                        value="{{ old('re3_InvoiceNo', $blog->re3_InvoiceNo ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_ActualInvoiceAmount" class="form-label">Actual Invoice 3
                                        Amount</label>
                                    <input type="number" class="form-control" id="re3_ActualInvoiceAmount"
                                        name="re3_ActualInvoiceAmount"
                                        value="{{ old('re3_ActualInvoiceAmount', $blog->re3_ActualInvoiceAmount ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_ActualInvoicePlacedDate" class="form-label">Actual Invoice 3 Placed
                                        date</label>
                                    <input type="date" class="form-control" id="re3_ActualInvoicePlacedDate"
                                        name="re3_ActualInvoicePlacedDate"
                                        value="{{ old('re3_ActualInvoicePlacedDate', $blog->re3_ActualInvoicePlacedDate ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="re3_ConfirmedDueDate" class="form-label">Confirmed Due date</label>
                                    <input type="date" class="form-control" id="re3_ConfirmedDueDate"
                                        name="re3_ConfirmedDueDate"
                                        value="{{ old('re3_ConfirmedDueDate', $blog->re3_ConfirmedDueDate ?? '') }}">
                                </div>


                            </div>
                        </div>


                    </div>
                </div>



                <!-- Payment Detail  -->
                <h2 id="accordion-color-heading-7">
                    <button type="button"
                        class="flex items-center justify-between w-full h-12 px-5 font-medium text-gray-500 border border-b-0 border-green-200 focus:ring-4 focus:ring-green-200 dark:focus:ring-green-800 dark:border-green-700 dark:text-green-400 hover:bg-green-500 dark:hover:bg-green-800 gap-3"
                        data-accordion-target="#accordion-color-body-7" aria-expanded="false"
                        aria-controls="accordion-color-body-7">
                        <span>Payment Detail</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-color-body-7" class="hidden" aria-labelledby="accordion-color-heading-7">

                    <div class="py-4 px-5 border border-b-0 border-gray-200 bg-gray-100">

                        <div class="mb-4 space-x-2">
                            <button type="button" onclick="showForm(4)"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">WO 1</button>
                            <button type="button" onclick="showForm(5)"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">WO 2</button>
                            <button type="button" onclick="showForm(6)"
                                class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">WO 3</button>
                        </div>

                        <!-- WO 1 -->


                        <div id="form4" class="form-section">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="pay1_SubCName" class="form-label">SubC Name 1</label>
                                    <input type="text" class="form-control" id="pay1_SubCName" name="pay1_SubCName"
                                        value="{{ old('pay1_SubCName', $blog->pay1_SubCName ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="pay1_ActivityOfPayment" class="form-label">Activity Of Payment</label>
                                    <input type="text" class="form-control" id="pay1_ActivityOfPayment"
                                        name="pay1_ActivityOfPayment"
                                        value="{{ old('pay1_ActivityOfPayment', $blog->pay1_ActivityOfPayment ?? '') }}">
                                </div>


                                <div id="accordion-open" data-accordion="open" class="space-y-4">
                                    <h2 id="accordion-open-heading-1">
                                        <button type="button"
                                            class=" h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-1" aria-expanded="hidden"
                                            aria-controls="accordion-open-body-1">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>PO</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-1" class="hidden"
                                        aria-labelledby="accordion-open-heading-1">
                                        <div
                                            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">

                                            <div class="row">

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PRAmount" class="form-label">PR Amount</label>
                                                    <input type="text" class="form-control" id="pay1_PRAmount"
                                                        name="pay1_PRAmount"
                                                        value="{{ old('pay1_PRAmount', $blog->pay1_PRAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PRrequestedDateEmail" class="form-label">PR requested
                                                        date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_PRrequestedDateEmail" name="pay1_PRrequestedDateEmail"
                                                        value="{{ old('pay1_PRrequestedDateEmail', $blog->pay1_PRrequestedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PRApprovedDateEmail" class="form-label">PR Approved
                                                        date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_PRApprovedDateEmail" name="pay1_PRApprovedDateEmail"
                                                        value="{{ old('pay1_PRApprovedDateEmail', $blog->pay1_PRApprovedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PRNoERP" class="form-label">PR No. (ERP)</label>
                                                    <input type="text" class="form-control" id="pay1_PRNoERP"
                                                        name="pay1_PRNoERP"
                                                        value="{{ old('pay1_PRNoERP', $blog->pay1_PRNoERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PRIssuedDateERP" class="form-label">PR Issued date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control" id="pay1_PRIssuedDateERP"
                                                        name="pay1_PRIssuedDateERP"
                                                        value="{{ old('pay1_PRIssuedDateERP', $blog->pay1_PRIssuedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PRApprovedDateERP" class="form-label">PR Approved
                                                        date (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_PRApprovedDateERP" name="pay1_PRApprovedDateERP"
                                                        value="{{ old('pay1_PRApprovedDateERP', $blog->pay1_PRApprovedDateERP ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2 id="accordion-open-heading-2">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                                            aria-controls="accordion-open-body-2">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>WO</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>

                                    <div id="accordion-open-body-2" class="hidden"
                                        aria-labelledby="accordion-open-heading-2">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_WOAmountERP" class="form-label">WO Amount
                                                        (ERP)</label>
                                                    <input type="number" class="form-control" id="pay1_WOAmountERP"
                                                        name="pay1_WOAmountERP"
                                                        value="{{ old('pay1_WOAmountERP', $blog->pay1_WOAmountERP ?? '') }}">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_WONo" class="form-label">WO No.</label>
                                                    <input type="text" class="form-control" id="pay1_WONo"
                                                        name="pay1_WONo"
                                                        value="{{ old('pay1_WONo', $blog->pay1_WONo ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_WOIssueDateERP" class="form-label">WO Issue date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control" id="pay1_WOIssueDateERP"
                                                        name="pay1_WOIssueDateERP"
                                                        value="{{ old('pay1_WOIssueDateERP', $blog->pay1_WOIssueDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_WOApprovedDateERP" class="form-label">WO Approved
                                                        Date ERP</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_WOApprovedDateERP" name="pay1_WOApprovedDateERP"
                                                        value="{{ old('pay1_WOApprovedDateERP', $blog->pay1_WOApprovedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_DatesentWOtoSubCEmail" class="form-label">Date sent
                                                        WO to SubC
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_DatesentWOtoSubCEmail" name="pay1_DatesentWOtoSubCEmail"
                                                        value="{{ old('pay1_DatesentWOtoSubCEmail', $blog->pay1_DatesentWOtoSubCEmail ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <h2 id="accordion-open-heading-3">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                                            aria-controls="accordion-open-body-3">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>Billing</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-3" class="hidden"
                                        aria-labelledby="accordion-open-heading-3">
                                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_BillingAmount" class="form-label">Billing
                                                        Amount</label>
                                                    <input type="number" class="form-control" id="pay1_BillingAmount"
                                                        name="pay1_BillingAmount"
                                                        value="{{ old('pay1_BillingAmount', $blog->pay1_BillingAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_BillingRequestedDateEmail" class="form-label">Billing
                                                        Requested
                                                        date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_BillingRequestedDateEmail"
                                                        name="pay1_BillingRequestedDateEmail"
                                                        value="{{ old('pay1_BillingRequestedDateEmail', $blog->pay1_BillingRequestedDateEmail ?? '') }}">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_BillingApprovedDateEmail" class="form-label">Billing
                                                        Approved date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_BillingApprovedDateEmail"
                                                        name="pay1_BillingApprovedDateEmail"
                                                        value="{{ old('pay1_BillingApprovedDateEmail', $blog->pay1_BillingApprovedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_BillingNoERP" class="form-label">Billing No.
                                                        (ERP)</label>
                                                    <input type="text" class="form-control" id="pay1_BillingNoERP"
                                                        name="pay1_BillingNoERP"
                                                        value="{{ old('pay1_BillingNoERP', $blog->pay1_BillingNoERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_BillingIssuedDateERP" class="form-label">Billing
                                                        Issued date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_BillingIssuedDateERP" name="pay1_BillingIssuedDateERP"
                                                        value="{{ old('pay1_BillingIssuedDateERP', $blog->pay1_BillingIssuedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_BillingApprovedDateERP" class="form-label">Billing
                                                        Approved date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_BillingApprovedDateERP"
                                                        name="pay1_BillingApprovedDateERP"
                                                        value="{{ old('pay1_BillingApprovedDateERP', $blog->pay1_BillingApprovedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_DatesentBillingtoSubC" class="form-label">Date sent
                                                        Billing to
                                                        SubC</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_DatesentBillingtoSubC"
                                                        name="pay1_DatesentBillingtoSubC"
                                                        value="{{ old('pay1_DatesentBillingtoSubC', $blog->pay1_DatesentBillingtoSubC ?? '') }}">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_InvoicePlaceddatebySubC" class="form-label">Invoice
                                                        Placed date by
                                                        SubC</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_InvoicePlaceddatebySubC"
                                                        name="pay1_InvoicePlaceddatebySubC"
                                                        value="{{ old('pay1_InvoicePlaceddatebySubC', $blog->pay1_InvoicePlaceddatebySubC ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_SubC_InvoiceAmount" class="form-label">SubC -
                                                        Invoice
                                                        Amount</label>
                                                    <input type="number" class="form-control"
                                                        id="pay1_SubC_InvoiceAmount" name="pay1_SubC_InvoiceAmount"
                                                        value="{{ old('pay1_SubC_InvoiceAmount', $blog->pay1_SubC_InvoiceAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay1_PaymentconfirmedDateERP" class="form-label">Payment
                                                        confirmed date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay1_PaymentconfirmedDateERP"
                                                        name="pay1_PaymentconfirmedDateERP"
                                                        value="{{ old('pay1_PaymentconfirmedDateERP', $blog->pay1_PaymentconfirmedDateERP ?? '') }}">
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>


                        <!-- WO 2 -->


                        <div id="form5" class="form-section hidden">
                            <div class="row">

                                <div class="col-md-3 mb-3">
                                    <label for="pay2_SubCName" class="form-label">SubC Name 2</label>
                                    <input type="text" class="form-control" id="pay2_SubCName"
                                        name="pay2_SubCName"
                                        value="{{ old('pay2_SubCName', $blog->pay2_SubCName ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="pay2_ActivityOfPayment" class="form-label">Activity Of Payment</label>
                                    <input type="text" class="form-control" id="pay2_ActivityOfPayment"
                                        name="pay2_ActivityOfPayment"
                                        value="{{ old('pay2_ActivityOfPayment', $blog->pay2_ActivityOfPayment ?? '') }}">
                                </div>


                                <div id="accordion-open-2" data-accordion="open" class="space-y-4">
                                    <h2 id="accordion-open-heading-4">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-4" aria-expanded="false"
                                            aria-controls="accordion-open-body-4">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> PO</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-4" class="hidden"
                                        aria-labelledby="accordion-open-heading-4">
                                        <div
                                            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PRAmount" class="form-label">PR Amount</label>
                                                    <input type="text" class="form-control" id="pay2_PRAmount"
                                                        name="pay2_PRAmount"
                                                        value="{{ old('pay2_PRAmount', $blog->pay2_PRAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PRrequestedDateEmail" class="form-label">PR
                                                        requested date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_PRrequestedDateEmail" name="pay2_PRrequestedDateEmail"
                                                        value="{{ old('pay2_PRrequestedDateEmail', $blog->pay2_PRrequestedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PRApprovedDateEmail" class="form-label">PR Approved
                                                        date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_PRApprovedDateEmail" name="pay2_PRApprovedDateEmail"
                                                        value="{{ old('pay2_PRApprovedDateEmail', $blog->pay2_PRApprovedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PRNoERP" class="form-label">PR No. (ERP)</label>
                                                    <input type="text" class="form-control" id="pay2_PRNoERP"
                                                        name="pay2_PRNoERP"
                                                        value="{{ old('pay2_PRNoERP', $blog->pay2_PRNoERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PRIssuedDateERP" class="form-label">PR Issued date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_PRIssuedDateERP" name="pay2_PRIssuedDateERP"
                                                        value="{{ old('pay2_PRIssuedDateERP', $blog->pay2_PRIssuedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PRApprovedDateERP" class="form-label">PR Approved
                                                        date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_PRApprovedDateERP" name="pay2_PRApprovedDateERP"
                                                        value="{{ old('pay2_PRApprovedDateERP', $blog->pay2_PRApprovedDateERP ?? '') }}">
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <h2 id="accordion-open-heading-5">
                                        <button type="button"
                                            class=" h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-5" aria-expanded="false"
                                            aria-controls="accordion-open-body-5">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>WO</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-5" class="hidden"
                                        aria-labelledby="accordion-open-heading-5">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <div class="row">

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_WOAmountERP" class="form-label">WO Amount
                                                        (ERP)</label>
                                                    <input type="number" class="form-control" id="pay2_WOAmountERP"
                                                        name="pay2_WOAmountERP"
                                                        value="{{ old('pay2_WOAmountERP', $blog->pay2_WOAmountERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_WONo" class="form-label">WO No.</label>
                                                    <input type="text" class="form-control" id="pay2_WONo"
                                                        name="pay2_WONo"
                                                        value="{{ old('pay2_WONo', $blog->pay2_WONo ?? '') }}">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_WOIssueDateERP" class="form-label">WO Issue date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_WOIssueDateERP" name="pay2_WOIssueDateERP"
                                                        value="{{ old('pay2_WOIssueDateERP', $blog->pay2_WOIssueDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_WOApprovedDateERP" class="form-label">WO Approved
                                                        Date ERP</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_WOApprovedDateERP" name="pay2_WOApprovedDateERP"
                                                        value="{{ old('pay2_WOApprovedDateERP', $blog->pay2_WOApprovedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_DatesentWOtoSubCEmail" class="form-label">Date sent
                                                        WO to SubC
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_DatesentWOtoSubCEmail"
                                                        name="pay2_DatesentWOtoSubCEmail"
                                                        value="{{ old('pay2_DatesentWOtoSubCEmail', $blog->pay2_DatesentWOtoSubCEmail ?? '') }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <h2 id="accordion-open-heading-6">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-6" aria-expanded="false"
                                            aria-controls="accordion-open-body-6">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Billing</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-6" class="hidden"
                                        aria-labelledby="accordion-open-heading-6">
                                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                            <div class="row">

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_BillingAmount" class="form-label">Billing
                                                        Amount</label>
                                                    <input type="number" class="form-control" id="pay2_BillingAmount"
                                                        name="pay2_BillingAmount"
                                                        value="{{ old('pay2_BillingAmount', $blog->pay2_BillingAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_BillingRequestedDateEmail"
                                                        class="form-label">Billing Requested
                                                        date (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_BillingRequestedDateEmail"
                                                        name="pay2_BillingRequestedDateEmail"
                                                        value="{{ old('pay2_BillingRequestedDateEmail', $blog->pay2_BillingRequestedDateEmail ?? '') }}">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_BillingApprovedDateEmail"
                                                        class="form-label">Billing Approved date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_BillingApprovedDateEmail"
                                                        name="pay2_BillingApprovedDateEmail"
                                                        value="{{ old('pay2_BillingApprovedDateEmail', $blog->pay2_BillingApprovedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_BillingNoERP" class="form-label">Billing No.
                                                        (ERP)</label>
                                                    <input type="text" class="form-control" id="pay2_BillingNoERP"
                                                        name="pay2_BillingNoERP"
                                                        value="{{ old('pay2_BillingNoERP', $blog->pay2_BillingNoERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_BillingIssuedDateERP" class="form-label">Billing
                                                        Issued date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_BillingIssuedDateERP" name="pay2_BillingIssuedDateERP"
                                                        value="{{ old('pay2_BillingIssuedDateERP', $blog->pay2_BillingIssuedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_BillingApprovedDateERP" class="form-label">Billing
                                                        Approved date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_BillingApprovedDateERP"
                                                        name="pay2_BillingApprovedDateERP"
                                                        value="{{ old('pay2_BillingApprovedDateERP', $blog->pay2_BillingApprovedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_DatesentBillingtoSubC" class="form-label">Date sent
                                                        Billing to
                                                        SubC</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_DatesentBillingtoSubC"
                                                        name="pay2_DatesentBillingtoSubC"
                                                        value="{{ old('pay2_DatesentBillingtoSubC', $blog->pay2_DatesentBillingtoSubC ?? '') }}">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_InvoicePlaceddatebySubC" class="form-label">Invoice
                                                        Placed date by
                                                        SubC</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_InvoicePlaceddatebySubC"
                                                        name="pay2_InvoicePlaceddatebySubC"
                                                        value="{{ old('pay2_InvoicePlaceddatebySubC', $blog->pay2_InvoicePlaceddatebySubC ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_SubC_InvoiceAmount" class="form-label">SubC -
                                                        Invoice
                                                        Amount</label>
                                                    <input type="number" class="form-control"
                                                        id="pay2_SubC_InvoiceAmount" name="pay2_SubC_InvoiceAmount"
                                                        value="{{ old('pay2_SubC_InvoiceAmount', $blog->pay2_SubC_InvoiceAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay2_PaymentconfirmedDateERP" class="form-label">Payment
                                                        confirmed date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay2_PaymentconfirmedDateERP"
                                                        name="pay2_PaymentconfirmedDateERP"
                                                        value="{{ old('pay2_PaymentconfirmedDateERP', $blog->pay2_PaymentconfirmedDateERP ?? '') }}">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- WO 3 -->


                        <div id="form6" class="form-section hidden">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="pay3_SubCName" class="form-label">SubC Name 3</label>
                                    <input type="text" class="form-control" id="pay3_SubCName"
                                        name="pay3_SubCName"
                                        value="{{ old('pay3_SubCName', $blog->pay3_SubCName ?? '') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="pay3_ActivityOfPayment" class="form-label">Activity Of Payment</label>
                                    <input type="text" class="form-control" id="pay3_ActivityOfPayment"
                                        name="pay3_ActivityOfPayment"
                                        value="{{ old('pay3_ActivityOfPayment', $blog->pay3_ActivityOfPayment ?? '') }}">
                                </div>



                                <div id="accordion-open-3" data-accordion="open" class="space-y-4">
                                    <h2 id="accordion-open-heading-7">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-7" aria-expanded="false"
                                            aria-controls="accordion-open-body-7">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> PO</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-7" class="hidden"
                                        aria-labelledby="accordion-open-heading-7">
                                        <div
                                            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PRAmount" class="form-label">PR Amount</label>
                                                    <input type="text" class="form-control" id="pay3_PRAmount"
                                                        name="pay3_PRAmount"
                                                        value="{{ old('pay3_PRAmount', $blog->pay3_PRAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PRrequestedDateEmail" class="form-label">PR
                                                        requested date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_PRrequestedDateEmail" name="pay3_PRrequestedDateEmail"
                                                        value="{{ old('pay3_PRrequestedDateEmail', $blog->pay3_PRrequestedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PRApprovedDateEmail" class="form-label">PR Approved
                                                        date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_PRApprovedDateEmail" name="pay3_PRApprovedDateEmail"
                                                        value="{{ old('pay3_PRApprovedDateEmail', $blog->pay3_PRApprovedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PRNoERP" class="form-label">PR No. (ERP)</label>
                                                    <input type="text" class="form-control" id="pay3_PRNoERP"
                                                        name="pay3_PRNoERP"
                                                        value="{{ old('pay3_PRNoERP', $blog->pay3_PRNoERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PRIssuedDateERP" class="form-label">PR Issued date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_PRIssuedDateERP" name="pay3_PRIssuedDateERP"
                                                        value="{{ old('pay3_PRIssuedDateERP', $blog->pay3_PRIssuedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PRApprovedDateERP" class="form-label">PR Approved
                                                        date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_PRApprovedDateERP" name="pay3_PRApprovedDateERP"
                                                        value="{{ old('pay3_PRApprovedDateERP', $blog->pay3_PRApprovedDateERP ?? '') }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-open-heading-8">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-8" aria-expanded="false"
                                            aria-controls="accordion-open-body-8">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> WO</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-8" class="hidden"
                                        aria-labelledby="accordion-open-heading-8">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_WOAmountERP" class="form-label">WO Amount
                                                        (ERP)</label>
                                                    <input type="number" class="form-control" id="pay3_WOAmountERP"
                                                        name="pay3_WOAmountERP"
                                                        value="{{ old('pay3_WOAmountERP', $blog->pay3_WOAmountERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_WONo" class="form-label">WO No.</label>
                                                    <input type="text" class="form-control" id="pay3_WONo"
                                                        name="pay3_WONo"
                                                        value="{{ old('pay3_WONo', $blog->pay3_WONo ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_WOIssueDateERP" class="form-label">WO Issue date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_WOIssueDateERP" name="pay3_WOIssueDateERP"
                                                        value="{{ old('pay3_WOIssueDateERP', $blog->pay3_WOIssueDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_WOApprovedDateERP" class="form-label">WO Approved
                                                        Date ERP</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_WOApprovedDateERP" name="pay3_WOApprovedDateERP"
                                                        value="{{ old('pay3_WOApprovedDateERP', $blog->pay3_WOApprovedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_DatesentWOtoSubCEmail" class="form-label">Date sent
                                                        WO to SubC
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_DatesentWOtoSubCEmail"
                                                        name="pay3_DatesentWOtoSubCEmail"
                                                        value="{{ old('pay3_DatesentWOtoSubCEmail', $blog->pay3_DatesentWOtoSubCEmail ?? '') }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <h2 id="accordion-open-heading-9">
                                        <button type="button"
                                            class="h-[60px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-open-body-9" aria-expanded="false"
                                            aria-controls="accordion-open-body-9">
                                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Billing</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-open-body-9" class="hidden"
                                        aria-labelledby="accordion-open-heading-9">
                                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_BillingAmount" class="form-label">Billing
                                                        Amount</label>
                                                    <input type="number" class="form-control" id="pay3_BillingAmount"
                                                        name="pay3_BillingAmount"
                                                        value="{{ old('pay3_BillingAmount', $blog->pay3_BillingAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_BillingRequestedDateEmail"
                                                        class="form-label">Billing Requested
                                                        date (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_BillingRequestedDateEmail"
                                                        name="pay3_BillingRequestedDateEmail"
                                                        value="{{ old('pay3_BillingRequestedDateEmail', $blog->pay3_BillingRequestedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_BillingApprovedDateEmail"
                                                        class="form-label">Billing Approved date
                                                        (Email)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_BillingApprovedDateEmail"
                                                        name="pay3_BillingApprovedDateEmail"
                                                        value="{{ old('pay3_BillingApprovedDateEmail', $blog->pay3_BillingApprovedDateEmail ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_BillingNoERP" class="form-label">Billing No.
                                                        (ERP)</label>
                                                    <input type="text" class="form-control" id="pay3_BillingNoERP"
                                                        name="pay3_BillingNoERP"
                                                        value="{{ old('pay3_BillingNoERP', $blog->pay3_BillingNoERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_BillingIssuedDateERP" class="form-label">Billing
                                                        Issued date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_BillingIssuedDateERP" name="pay3_BillingIssuedDateERP"
                                                        value="{{ old('pay3_BillingIssuedDateERP', $blog->pay3_BillingIssuedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_BillingApprovedDateERP" class="form-label">Billing
                                                        Approved date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_BillingApprovedDateERP"
                                                        name="pay3_BillingApprovedDateERP"
                                                        value="{{ old('pay3_BillingApprovedDateERP', $blog->pay3_BillingApprovedDateERP ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_DatesentBillingtoSubC" class="form-label">Date sent
                                                        Billing to
                                                        SubC</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_DatesentBillingtoSubC"
                                                        name="pay3_DatesentBillingtoSubC"
                                                        value="{{ old('pay3_DatesentBillingtoSubC', $blog->pay3_DatesentBillingtoSubC ?? '') }}">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_InvoicePlaceddatebySubC" class="form-label">Invoice
                                                        Placed date by
                                                        SubC</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_InvoicePlaceddatebySubC"
                                                        name="pay3_InvoicePlaceddatebySubC"
                                                        value="{{ old('pay3_InvoicePlaceddatebySubC', $blog->pay3_InvoicePlaceddatebySubC ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_SubC_InvoiceAmount" class="form-label">SubC -
                                                        Invoice
                                                        Amount</label>
                                                    <input type="number" class="form-control"
                                                        id="pay3_SubC_InvoiceAmount" name="pay3_SubC_InvoiceAmount"
                                                        value="{{ old('pay3_SubC_InvoiceAmount', $blog->pay3_SubC_InvoiceAmount ?? '') }}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="pay3_PaymentconfirmedDateERP" class="form-label">Payment
                                                        confirmed date
                                                        (ERP)</label>
                                                    <input type="date" class="form-control"
                                                        id="pay3_PaymentconfirmedDateERP"
                                                        name="pay3_PaymentconfirmedDateERP"
                                                        value="{{ old('pay3_PaymentconfirmedDateERP', $blog->pay3_PaymentconfirmedDateERP ?? '') }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <div class="container text-center mb-3 my-3">
                <input type="submit"
                    class="bg-blue-500 text-white border border-blue-600 w-32 px-2 py-2
                        rounded hover:bg-blue-700 transition"
                    value="อัปเดต">
                <a href="/towerDismantle/home"
                    class="text-black border border-red-700 w-48 px-4 py-2 
          rounded hover:bg-gray-100 transition">
                    ย้อนกลับ
                </a>
            </div>


        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            let confirmUpdate = confirm("ยืนยันการอัปเดตหรือไม่?");
            if (!confirmUpdate) {
                event.preventDefault(); // ยกเลิกการส่งฟอร์ม ถ้าผู้ใช้กด Cancel
                return;
            }

            // ซ่อนปุ่มอัปเดตและปุ่มยกเลิก
            document.getElementById("updateBtn").style.display = 'none';
            document.getElementById("cancelBtn").style.display = 'none';

            // แสดง Loader
            document.getElementById("loadingSpinner").classList.remove("hidden");

        });
    </script>


    <!-- JavaScript -->
    <script>
        function showForm(index) {
            const forms = document.querySelectorAll('.form-section');
            forms.forEach((form, i) => {
                form.classList.toggle('hidden', i !== index - 1);
            });
        }
    </script>

    <script>
        document.querySelectorAll('input[type="number"]').forEach(function(element) {
            // ถ้าไม่มี placeholder ให้ใส่ "กรุณากรอกตัวเลข"
            if (!element.hasAttribute('placeholder')) {
                element.setAttribute('placeholder', 'กรุณากรอกตัวเลข');
            }

            // ตั้งค่า step กับ min
            element.setAttribute('step', '0.01');
            element.setAttribute('min', '0');

            element.addEventListener('blur', function(e) {
                let value = e.target.value;
                if (value) {
                    value = parseFloat(value);
                    if (value < 0) {
                        e.target.value = '';
                        alert("ห้ามกรอกค่าติดลบ");
                    } else {
                        e.target.value = value.toFixed(2); // ปัดเศษทศนิยม 2 ตำแหน่ง
                    }
                }
            });
        });
    </script>


    <!-- CSS -->
    <style>
        .form-section.hidden {
            display: none;
        }
    </style>

    <style>
        .form-label {
            font-weight: bold;
        }
    </style>

    <style>
        h2 span {
            font-weight: bold;
            font-size: 18px
        }
    </style>

@endsection