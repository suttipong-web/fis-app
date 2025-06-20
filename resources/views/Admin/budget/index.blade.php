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
                        <a href="{{ route('budget.create') }}" class="btn btn-primary " role="button" >
                            + เพิ่มรายการงบประมาณ
                        </a>
                    </div>
                </div>
                <div class="row">

                   <div class="col-md-12 col-xl-12 justify-content-center">
                    <form action="{{ route('budget.index') }}" method="GET" class="form-inline mb-0">

                        <div class="form-group mr-2">
                            <label for="year">เลือกปีงบประมาณ:</label>
                            <select name="slcyear" id="slcyear" class="form-control ml-2">
                                @foreach ($budgetYear as $y)
                                    <option value="{{$y->id}}"
                                        {{ (request('slcyear') == $y->id) ? 'selected' : '' }}>
                                        {{ $y->by_year + 543 }}  </option>
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
        </div>
        <div  class="main-table">
        <div class="container-fluid">
                                  <div class="table-responsive" style="overflow-x: auto;">
                                    <table class="table  table-striped" id="myTable" >
                                        <thead>
                                            <tr>
                                                <th>การจัดการ</th>
                                                <th>ปรับปรุง </th>
                                                <th>รหัสงบประมาณ </th>
                                                <th>ชื่อกองทุน</th>
                                                <th>หน่วยงาน</th>
                                                <th>ชื่อกิจกรรม</th>
                                                <th>หมวดงบประมาณ</th>
                                                <th>งบประมาณ</th>
                                                <th > คำอธิบาย</th>
                                                <th>แยกตามรหัสงบประมาณ</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($budgets as $budget)
                                                <tr>
                                                      <td>
                                                        <a href="/admin/budget/{{ $budget->budget_id }}/edit"   title="แก้ไข" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a> &nbsp;|&nbsp;
       <a  href="/admin/budget/{{ $budget->budget_id }}" title="ลบ"  onclick="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้หรือไม่?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
</svg></a>
                                                    </td>
                                                    <td style="white-space: normal;text-align: center">{{ $budget->bdate }}</td>
                                                    <td>{{ $budget->budget_no }}</td>
                                                    <td>{{ $budget->fund_name }}</td>
                                                    <td>{{ $budget->dep_name }}</td>
                                                    <td>{{ $budget->activity_name }}</td>
                                                    <td style="white-space: normal;">{{ $budget->category }}</td>
                                                    <td>{{ number_format($budget->budget_money, 2) }} บาท</td>
                                                    <td style="white-space: normal;">{{ $budget->budget_detail }}</td>
                                                    <td>
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
    <!-- END session contents -->
    @endsection
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
   /* td, th {
        max-width: 200px;
        white-space: wrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }*/
</style>
<!-- jQuery (ต้องมีสำหรับ DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            // ตัวเลือกเสริม
            "order": [[1, 'DESC']], 
            scrollX: true,
             columnDefs: [
                    { width: "200px", targets: [5,7] },  // หรือเจาะจง column เช่น 0, 1
                     { width: "70px", targets: [1] }

                ],
            "language": {
                "search": "ค้นหา:",
                "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            }
        });
    });
</script>

    @section('corescript')
@endsession

