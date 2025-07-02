@extends('layout')
@section('addTaghead')
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<style type="text/css">
    #selectedRulesList{
      margin-left: 20px;
      padding: 10px;
    }
</style>
@endsection
@section('contents')
  <div class="col-md-12 mb-2 bg-light-blue">
  <div class="container-fluid">
        <h2 class="mb-4">เพิ่มรายการสำรองงบประมาณ</h2>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
              <div class="form-row">
              {{-- ประเภทงบประมาณ --}}
              <div class="form-group col-md-3">
                  <label>ประเภทงบประมาณ</label>
                   <select name="type_id" class="form-control">
                             @foreach ($budgetTypes as $type)
                              <option value="{{ $type->id }}"
                              {{ $budget?->type_id == $type->id ? 'selected' : '' }}>
                              {{ $type->type_name }}
                             </option>
                       @endforeach
                  </select>
              </div>
              {{-- ภาควิชา/หน่วยงาน --}}
              <div class="form-group col-md-9">
                  <label>ภาควิชา/หน่วยงาน</label>
                          <select name="department_id" class="form-control">
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
                    <input type="text"
                          id="doc_date"
                          name="doc_date"
                          class="form-control"
                          placeholder="เลือกวันที่"
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
                    <input type="text"
                          id="doc_date"
                          name="doc_date"
                          class="form-control"
                          placeholder="เลือกวันที่"
                          value="{{ old('doc_date', $budget->doc_date ?? '') }}">
                </div>
            </div>
           
            <div class="form-row">
                        {{-- จำนวนเงินที่เบิก --}}
                        <div class="form-group col-md-3">
                            <label>จำนวนเงินที่เบิก</label>
                            <input type="number" name="amount" class="form-control" step="0.01">
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
                        <tr   >
                          <td class="p-1" style="width: 100px" >{{$row->payment_types_name}}</td> 
                          <td class="p-1" >  <input type="text" name="payment_types{{$row->payment_types_id}}" class="form-control" > </td>                                                  
                        </tr>
                     @endforeach
                     </table>
               </div>

             <hr/>

             <div class="row">
               
                   <h5 class="mt-4">ระบุกฏระเบียบประกาศมหาวิทยาลัยเชียงใหม่</h5>
                     <div class="col-md-12">                     
                    
                      <select id="ruleSelect" name="ruleSelect[]"   multiple>
                         <option value="">   </option>
                          @foreach($rules as $rule)
                              <option value="{{ $rule->id }}">{{ $rule->rule_title }}</option>
                          @endforeach
                      </select>
                    
                  </div>
                  
             </div>
             <hr/>
             <br/>

            {{-- รายการรหัสงบประมาณหลายรายการ --}}
            <h5 class="mt-4">รายละเอียดงบประมาณที่ใช้</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>หน่วยงาน</th>
                        <th>รหัสงบประมาณ</th>
                        <th>รหัสงานแผน</th>
                        <th>รายการ</th>
                        <th>จำนวนเงิน</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 6; $i++)
                    <tr>
                        <td>
                            <select name="items[{{ $i }}][department]" class="form-control">
                                <option value="">รายการที่ {{ $i }} - เลือก</option>
                                <!-- เพิ่มตัวเลือกหน่วยงาน -->
                            </select>
                        </td>
                        <td>
                            <select name="items[{{ $i }}][budget_code]" class="form-control">
                                <option value="">-- เลือกรหัสงบประมาณ --</option>
                            </select>
                        </td>
                        <td>
                            <select name="items[{{ $i }}][plan_code]" class="form-control">
                                <option value="">-- เลือกรหัสงานแผน --</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="items[{{ $i }}][item_desc]" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="items[{{ $i }}][item_amount]" step="0.01" class="form-control">
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

            {{-- ปุ่มส่งฟอร์ม --}}
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">ยกเลิก</a>
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
$(document).ready(function() {
 

  new TomSelect("#ruleSelect", {
    plugins: ['remove_button'],
    persist: false,
    create: false,
    placeholder: "เลือกระเบียบ...",
  });


});


</script>
@endsection
