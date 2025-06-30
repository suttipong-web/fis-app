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
                                    <option value="{{$y->by_id}}"
                                        {{ (request('slcyear') == $y->by_id) ? 'selected' : '' }}>
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
                                                    <button type="button" class="btn btn-primary" 
                                                        data-toggle="modal" 
                                                        data-target="#budgetPlanModal{{ $budget->budget_id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
  <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
</svg> ตั้งค่า
                                                    </button>         
                                                    <!-- Modal -->
                                                    <div class="modal fade " id="budgetPlanModal{{ $budget->budget_id }}" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">  
                                                             
                                                                    <div class="modal-header d-flex flex-wrap" style="white-space: normal; word-break: break-word;width: 100%;">
                                                                            <h5 class="modal-title">   {{$budget->type_name }}  ปี   {{ $budget->by_year }} 
                                                                                {{ $budget->fund_name }}  
                                                                                {{ $budget->activity_name }}  
                                                                                {{ $budget->category }}
                                                                                {{ $budget->budget_no }}
                                                                                {{ $budget->budget_detail }}
                                                                                จำนวนงบประมาณ ({{ number_format($budget->budget_money, 2) }}) </h5>
                                                                        
                                                                          
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5 class="text-center"> 
                                                                            จัดการข้อมูลรหัสย่อยงบประมาณ
                                                                        </h5>    
                                                                        <br/>                                                      
                                                                        <!-- ฟอร์มเพิ่ม -->
                                                                        <form id="addPlanForm{{ $budget->budget_id }}" onsubmit="event.preventDefault(); addPlan({{ $budget->budget_id }}, this);">
                                                                                @csrf
                                                                                <input type="hidden" name="budget_id"  value="{{ $budget->budget_id }}">
                                                                                <div class="form-row">
                                                                                    <input name="plan_no" class="form-control col-md-3" placeholder="รหัสแผน" required>
                                                                                    <input name="plan_title" class="form-control col-md-5 ml-2" placeholder="รายละเอียด" required>
                                                                                    <input name="plan_budget" class="form-control col-md-2 ml-2" placeholder="งบประมาณ" required>
                                                                                    <button type="submit" class="btn btn-success  btn-sm ml-2 justify-content-end">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                                                                        </svg> เพิ่ม 
                                                                                    </button>
                                                                                </div>
                                                                        </form>

                                                                        <hr>

                                                                        <!-- ตารางแผนย่อย -->
                                                                        <table class="table table-bordered mt-3" id="planTable{{ $budget->budget_id }}">
                                                                            <thead>
                                                                                <tr><th>รหัส</th><th>ชื่อ</th><th>งบประมาณ</th><th>จัดการ</th></tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($budgetplansMap[$budget->budget_id] ?? [] as $plan)
                                                                                    <tr id="planRow{{ $plan->pid }}">
                                                                                        <td style="width: 20%"><input class="form-control" value="{{ $plan->plan_no }}" data-field="plan_no" disabled></td>
                                                                                        <td style="width: 50%"><input class="form-control" value="{{ $plan->plan_title }}" data-field="plan_title" disabled></td>
                                                                                        <td style="width: 20%"><input class="form-control" value="{{ $plan->plan_budget }}" data-field="plan_budget" disabled></td>
                                                                                        <td style="width: 10%">
                                                                                            <button class="btn btn-warning btn-sm" onclick="enableEdit({{ $plan->pid }})" id="editBtn{{ $plan->pid }}">แก้ไข</button>
                                                                                            <button class="btn btn-success btn-sm d-none" onclick="saveEdit({{ $plan->pid }})" id="saveBtn{{ $plan->pid }}">บันทึก</button>
                                                                                            <button class="btn btn-danger btn-sm" onclick="deletePlan({{ $plan->pid }}, {{ $budget->budget_id }})">ลบ</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    
                                                                                @endforeach
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="2" class="text-right font-weight-bold">รวมงบประมาณ:</td>
                                                                                    <td colspan="2">
                                                                                        <strong>
                                                                                        <span id="planTotal{{ $budget->budget_id }}">
                                                                                            {{ number_format($budget->plan_total, 2) }} บาท
                                                                                        </span>
                                                                                        </strong>

                                                                                    </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                    </div>
                                                            </div>
                                                     </div>
                                                    </div>
                                                       <!-- END MODAL -->

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
<script>

function enableEdit(pid) {
    const row = document.querySelector('#planRow' + pid);
    row.querySelectorAll('input').forEach(input => input.removeAttribute('disabled'));

    // toggle ปุ่ม
    document.getElementById('editBtn' + pid).classList.add('d-none');
    document.getElementById('saveBtn' + pid).classList.remove('d-none');
}

function addPlan(budgetId, form) {
    const data = new FormData(form);

    fetch('/admin/plan', {
        method: 'POST',
        body: data
    })
    .then(async res => {
        const contentType = res.headers.get('Content-Type');
        if (!contentType.includes('application/json')) {
            const html = await res.text();
            console.error('ไม่ได้ JSON กลับมา:', html);
            throw new Error('ไม่ใช่ JSON');
        }
        return res.json();
    })
    .then(plan => {
        if (!plan || !plan.pid) {
            console.error('ข้อมูลไม่ครบ:', plan);
            return;
        }

        form.reset(); // ล้างฟอ  ร์ม
        console.log(plan);
        // ดึงข้อมูลใหม่ทั้งหมด
       fetchPlans(budgetId);
        showToast('เพิ่มข้อมูลเรียบร้อย');
    })
    .catch(error => {
        console.error('เกิดข้อผิดพลาดในการเพิ่ม:', error);
    });
}
function fetchPlans(budgetId) {
    fetch('/admin/plan/list/' + budgetId)
        .then(res => res.json())
        .then(plans => {
            const tbody = document.querySelector('#planTable' + budgetId + ' tbody');
            const totalEl = document.querySelector('#planTotal' + budgetId);
            tbody.innerHTML = '';

            let total = 0;

            plans.forEach(plan => {
                total += parseFloat(plan.plan_budget) || 0;

                const row = document.createElement('tr');
                row.id = 'planRow' + plan.pid;
                row.innerHTML = `
                    <td><input class="form-control" value="${plan.plan_no}" data-field="plan_no" disabled></td>
                    <td><input class="form-control" value="${plan.plan_title}" data-field="plan_title" disabled></td>
                    <td><input class="form-control" value="${plan.plan_budget}" data-field="plan_budget" disabled></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="enableEdit(${plan.pid})" id="editBtn${plan.pid}">แก้ไข</button>
                        <button class="btn btn-success btn-sm d-none" onclick="saveEdit(${plan.pid})" id="saveBtn${plan.pid}">บันทึก</button>
                        <button class="btn btn-danger btn-sm" onclick="deletePlan(${plan.pid}, ${budgetId})">ลบ</button>
                    </td>
                `;
                tbody.appendChild(row);
            });

            totalEl.textContent = total.toLocaleString('th-TH', { minimumFractionDigits: 2 }) + ' บาท';
        });
}


function editPlan(pid) {
    const row = document.querySelector('#planRow' + pid);
    const inputs = row.querySelectorAll('input');
    const data = { _method: 'PUT', _token: '{{ csrf_token() }}' };

    inputs.forEach(input => {
        const field = input.getAttribute('data-field');
        data[field] = input.value;
    });

    fetch('/admin/plan/' + pid, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(json => {
        if (json.success) console.log('แก้ไขสำเร็จ');
    });
    fetchPlans(budgetId);
}

function deletePlan(pid, budgetId) {
    Swal.fire({
        title: 'ลบข้อมูลนี้หรือไม่?',
        text: "หากลบแล้วจะไม่สามารถย้อนคืนได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'ลบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('/admin/plan/' + pid, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ _method: 'DELETE', _token: '{{ csrf_token() }}' })
            })
            .then(res => res.json())
            .then(json => {
                if (json.success) {
                    fetchPlans(budgetId);
                    showToast('ลบข้อมูลเรียบร้อย');
                }
            });
        }
    });
}

function saveEdit(pid) {
    const row = document.querySelector('#planRow' + pid);
    const inputs = row.querySelectorAll('input');
    const data = {
        _method: 'PUT',
        _token: '{{ csrf_token() }}'
    };

    inputs.forEach(input => {
        const field = input.getAttribute('data-field');
        data[field] = input.value;
    });

    fetch('/admin/plan/' + pid, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(json => {
        if (json.success) {
            // lock field อีกครั้ง
            inputs.forEach(input => input.setAttribute('disabled', true));
            // toggle ปุ่มกลับ
            document.getElementById('editBtn' + pid).classList.remove('d-none');
            document.getElementById('saveBtn' + pid).classList.add('d-none');
           
            const budgetId = row.closest('table').id.replace('planTable', ''); // ดึง budget_id จาก table id
            fetchPlans(budgetId); // โหลดแผนย่อยใหม่ รวมถึงยอดรวม
    
            showToast('บันทึกข้อมูลเรียบร้อย');
        } else {
            alert('เกิดข้อผิดพลาดในการบันทึก');
        }
    })
    .catch(err => {
        console.error('ผิดพลาด:', err);
        alert('เกิดข้อผิดพลาดขณะบันทึก');
    });
}
function showToast(message) {
    Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    });
}
</script>

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
    #myTable td {
        vertical-align: top;
        
    }
</style>
<!-- jQuery (ต้องมีสำหรับ DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

