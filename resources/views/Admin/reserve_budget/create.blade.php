@extends('layout')
@section('addTaghead')
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <style type="text/css">
        #selectedRulesList {
            margin-left: 20px;
            padding: 10px;
        }

    </style>
@endsection
@section('contents')
    <div class="col-md-12 mb-2 bg-light-blue">
        <div class="container-fluid">
            <h2 class="mb-4">เพิ่มรายการสำรองงบประมาณ</h2>

            <!--<form action="{{ route('reservations.store') }}" method="POST">-->
                @csrf
                <div class="form-row">
                    {{-- ประเภทงบประมาณ --}}
                    <div class="form-group col-md-3">
                        <label>ปีงบประมาณ</label>
                        <select name="budgetYear" class="form-control getslcBudget" id="budgetYear">
                            @foreach ($budgetYear as $byear)
                                <option value="{{ $byear->by_id }}">
                                    @if (!empty($byear->by_detail))
                                    {{ $byear->by_detail }}
                                    @else 
                                    {{ ($byear->by_year+543) }}
                                    @endif
                                    
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- ประเภทงบประมาณ --}}
                    <div class="form-group col-md-3">
                        <label>ประเภทงบประมาณ</label>
                        <select name="type_id" class="form-control getslcBudget" id="type_id">
                            @foreach ($budgetTypes as $type)
                                <option value="{{ $type->type_id }}" {{ $budget?->type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->type_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- ภาควิชา/หน่วยงาน --}}
                    <div class="form-group col-md-6">
                        <label>ภาควิชา/หน่วยงาน</label>
                        <select name="department_id" class="form-control getslcBudget">
                            @foreach($departments as $dep)
                                @php
                                    $indent = str_repeat('&nbsp;', $dep->dep_parent == 0 ? 0 : ($dep->dep_parent == 1 ? 4 : 8));
                                 @endphp
                                <option value="{{ $dep->dep_id }}" {!! isset($budget) && $budget->dep_id == $dep->dep_id ? 'selected' : '' !!}>
                                    {!! $indent !!}{{ $dep->dep_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- ตามหนังสือที่ / เลขที่รับ / ลงวันที่ --}}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>ตามหนังสือที่</label>
                        <input type="text" name="doc_ref" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="doc_date">ลงวันที่</label>
                        <input type="text" id="doc_date" name="doc_date" class="form-control" placeholder="เลือกวันที่"
                            value="{{ old('doc_date', $budget->doc_date ?? '') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>เลขที่รับ</label>
                        <input type="text" name="receive_no" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="doc_date">ลงวันที่</label>
                        <input type="text" id="doc_date" name="doc_date" class="form-control" placeholder="เลือกวันที่"
                            value="{{ old('doc_date', $budget->doc_date ?? '') }}">
                    </div>
                </div>

                <div class="form-row">
                    {{-- จำนวนเงินที่เบิก --}}
                    <div class="form-group col-md-3">
                        <label>จำนวนเงินที่เบิก</label>
                        <input type="number" name="amount" class="form-control" step="0.01" required>
                    </div>

                    {{-- รายการ --}}
                    <div class="form-group col-md-9">
                        <label>รายการ / คำอธิบาย </label>
                        <input type="text" name="purpose" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    {{-- ผู้ขออนุมัติ --}}
                    <div class="form-group col-md-3">
                        <label>ผู้ขออนุมัติ</label>
                        <select name="emp_id" class="form-control">
                            @foreach($employee as $emp)
                                <option value="{{ $emp->emp_id }}">
                                    {{ $emp->emp_name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-md-3">
                        <label>ผู้อนุมัติ </label>
                        <select name="approver" class="form-control">
                            @foreach($approver as $row)
                                <option value="{{ $row->approver_id }}">
                                    {{ $row->approver_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="form-group ">
                    <div>วิธีชำระเงิน </div>
                    <table style="margin-left: 20px;width: 95%;" class="table table-borderless">
                        @foreach($payment_types as $row)
                            <tr>
                                <td class="p-1" style="width: 100px">{{$row->payment_types_name}}</td>
                                <td class="p-1"> <input type="text" name="payment_types{{$row->payment_types_id}}"
                                        class="form-control"> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <hr />

                <div class="row">

                    <h5 class="mt-4">ระบุกฏระเบียบประกาศมหาวิทยาลัยเชียงใหม่</h5>
                    <div class="col-md-12">

                        <select id="ruleSelect" name="ruleSelect[]" multiple>
                            <option value=""> </option>
                            @foreach($rules as $rule)
                                <option value="{{ $rule->id }}">{{ $rule->rule_title }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <hr />
                <br />
              <!--  <form action="/admin/reservations/addSessionbudget" method="POST">
                @csrf-->
                {{-- รายการรหัสงบประมาณหลายรายการ --}}
                <h5 class="mt-4">รายละเอียดงบประมาณที่ใช้</h5>
                <div class="table-responsive">
                    <table class="table table-sm" style="border: 2px solid red">
                        <thead>
                            <tr>
                                <th>หน่วยงาน</th>
                                <th>รหัสงบประมาณ</th>
                                <th>รหัสย่อยสำนักงาน</th>                               
                                <th>จำนวนเงิน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 10%;word-wrap: break-word">
                                    <select name="dep_id" class="form-control" id="slcDep">
                                        <option value=""> -เลือกหน่วยงาน-</option>    
                                        @foreach($departments as $dep)
                                                @php
                                                    $indent = str_repeat('&nbsp;', $dep->dep_parent == 0 ? 0 : ($dep->dep_parent == 1 ? 4 : 8));
                                                @endphp
                                                <option value="{{ $dep->dep_id }}" {!! isset($budget) && $budget->dep_id == $dep->dep_id ? 'selected' : '' !!}>
                                                    {!! $indent !!}{{ $dep->dep_name }}
                                                </option>
                                            @endforeach                                       
                                    </select>
                                </td>
                                <td class="display_listbudget" style="width: 30%;word-wrap: break-word">                                                                  
                                    <select style="width:200px;padding:2px;overflow:hidden"  id="sclBudget" class="slc-plan form-control" name="budget_id">
                                        <option>--- เลือก รหัสงบประมาณ | กองทุน | แผนงาน | หมวด ---</option>
                                    </select>                                  
                                </td>
                                <td  style="width: 30%;word-wrap: break-word">
                                    <select name="plan_id" class="form-control" id="sclPlan"> 
                                        <option value="">-- เลือกรหัสงานแผน --</option>
                                    </select>
                                </td>                               
                                <td style="width: 120px">
                                    <input type="number" name="amount" id="amount" step="0.01"
                                        class="form-control" placeholder="ระบุจำนวนเงิน">
                                </td>
                                <td> <button class="btn btn-primary btnAddBudget" type="button"> +   เพิ่ม </button></td>
                            </tr>
                        </tbody>
                             <tbody id="sessionBudgetList"></tbody>
                    </table>
               
                    <div>
                  
                 <div class="mt-3">
                                {{-- ปุ่มส่งฟอร์ม --}}
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">ยกเลิก</a>
                  </div>
            </form>
        </div>
    </div>
@endsection



@section('corescript')
    <!-- CSS -->
    <!-- Flatpickr Script -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
    <!-- JS  -->
    <script src="/js/jquery.min.js"></script>


    <script>
        flatpickr("#doc_date", {
            dateFormat: "Y-m-d",          // ส่งค่ากลับแบบที่ Laravel ใช้ได้
            altInput: true,               // แสดง format ที่อ่านง่าย
            altFormat: "j F Y",           // แสดงแบบ "2 กรกฎาคม 2568"
            locale: "th",                 // ภาษาไทย
            disableMobile: true           // บังคับใช้ Flatpickr บนมือถือ
        });
    </script>

    <!-- พิมพ์แล้วค้นหา -->

<script>
    $(document).ready(function () {


            new TomSelect("#ruleSelect", {
                plugins: ['remove_button'],
                persist: false,
                create: false,
                placeholder: "เลือกระเบียบ...",
            });

    $(document).on('change', '#slcDep', function (e) {
        $.ajax({
                url: "/getBudgetAllbyDep",
                method: 'get',
                data: {
                    dep_id: $("#slcDep").val(),
                    type_id: $("#type_id").val(),
                    budgetYear: $("#budgetYear").val(),                    
                    _token: '{{ csrf_token() }}'
                }, success: function (response) {
                    console.log(response);
                     if (response.status == 200) {
                        let options = '<option value="">--------------- เลือก รหัสงบประมาณ | กองทุน | แผนงาน | หมวด ---------------</option>';
                        $.each(response.budgetsList, function (index, item) {
                            options += `<option value="${item.budget_id}">
                                ${item.budget_no} | ${item.fund_name} | ${item.activity_name} | ${item.category}
                            </option>`;
                        });
                        $('#sclBudget').html(options); // ใส่ options เข้า select
                    }
                }
        });    
    });

    $(document).on('change', '#sclBudget', function (e) {
        $.ajax({
                url: "/getBudgetPlanByBudgetID",
                method: 'get',
                data: {
                    budget_id: $("#sclBudget").val(),                 
                    _token: '{{ csrf_token() }}'
                }, success: function (response) {
                    console.log(response);
                     if (response.status == 200) {
                        let options = '<option value="">--------------- เลือกรหัสงานแผน -------------</option>';
                        $.each(response.budgetPlan, function (index, item) {
                            options += `<option value="${item.pid}">
                                ${item.plan_no} | ${item.plan_title} 
                            </option>`;
                        });
                        $('#sclPlan').html(options); // ใส่ options เข้า select
                    }
                }
        });     
    });
    
    $(document).on('click', '.btnAddBudget', function (e) {
            $.ajax({
                url: "/admin/reservations/addSessionbudget",
                method: 'post',
                data: {
                    dep_id: $("#slcDep").val(),
                    budget_id: $("#sclBudget").val(),
                    plan_id: $("#sclPlan").val(),
                    amount: $("#amount").val(),                  
                    _token: '{{ csrf_token() }}'
                }, success: function (response) {
                    console.log(response);
                      if (response.status === 200) {
                       loadSessionBudgets();
                    } else {
                        console.log(response.message);
                    }
               
                }
            });
    });

    function loadSessionBudgets() {
            $.ajax({
                url: '/admin/reservations/getSessionBudgets',
                method: 'get',
                success: function(response) {
                      console.log(response);
                    if (response.status === 200) {
                        let rows = '';
                        response.data.forEach(function(item) {
                           
                            rows += `<tr>
                                <td>${item.dep_name ?? '-'}</td>
                                <td>${item.budget_no} | ${item.fund_name} | ${item.activity_name} | ${item.category}</td>
                                <td>${item.plan_no ?? '-'}  ${item.plan_title}</td>
                                <td>${parseFloat(item.amount).toFixed(2)}</td>
                                <td><button class="btn btn-danger btn-sm btnRemoveRow">ลบ</button></td>
                            </tr>`;
                        });
                        $('#sessionBudgetList').html(rows);
                    } else {
                        console.log(response);
                    }
                }
            });
        }
    loadSessionBudgets() ;


    });


    </script>
@endsection