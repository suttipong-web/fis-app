@extends('layout')

@section('contents')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-3 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg> จัดการงบประมาณ </h3>
                    <hr style="border: 1px solid #007bff; width: 100%; margin-top: 10px; margin-bottom: 10px;">
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="font-weight-bold">รายการงบประมาณหน่วยงาน</h4>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addBudgetModal">
                            + เพิ่มรายการงบประมาณ
                        </button>
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('budget.index') }}" method="GET" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <label for="year">เลือกปีงบประมาณ:</label>
                            <select name="year" id="year" class="form-control ml-2">
                                @foreach ($budgetYear as $y)
                                    <option value="{{ $y->by_id }}"
                                        {{ request('year') == $y->by_id ? 'selected' : '' }}>
                                        {{ $y->by_year + 543 }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mr-2">
                            <label for="budget_type">เลือกประเภทงบประมาณ:</label>
                            <select name="budget_type" id="budget_type" class="form-control ml-2">
                                <option value="">-- เลือกประเภทงบประมาณ --</option>
                                @foreach ($budgetTypes as $type)
                                    <option value="{{ $type->id }}"
                                        {{ request('budget_type') == $type->id ? 'selected' : '' }}>
                                        {{ $type->type_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">แสดงรายการ</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <p class="card-title">รายการงบประมาณ </p>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">

                                <div class="table-responsive">
                                    <table class="table  table-striped">
                                        <thead>
                                            <tr>
                                                <th>รหัสงบประมาณ </th>
                                                <th>ชื่อกองทุน</th>
                                                <th>หน่วยงาน</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th>หมวดงบประมาณ</th>
                                                <th>งบประมาณ</th>
                                                <th>คำอธิบาย</th>
                                                <th>แยกตามรหัสงบประมาณ</th>
                                                <th>การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($budgets as $budget)
                                                <tr>
                                                    <td>{{ $budget->budget_no }}</td>
                                                    <td>{{ $budget->fund_name }}</td>
                                                    <td>{{ $budget->dep_name }}</td>
                                                    <td>{{ $budget->activity_name }}</td>
                                                    <td>{{ $budget->category }}</td>
                                                    <td>{{ number_format($budget->budget_money, 2) }} บาท</td>
                                                    <td>{{ $budget->budget_detail }}</td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm">แก้ไข</button>
                                                        <button class="btn btn-danger btn-sm">ลบ</button>
                                                    </td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">ไม่พบข้อมูลงบประมาณ</td>
                                                </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- END session contents -->
    @endsection
    @section('corescript')
        @endsession
