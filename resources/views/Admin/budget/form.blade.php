@extends('layout')

@section('contents')
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">  <a href="{{ route('budget.index') }}">  
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg> จัดการงบประมาณ </a> /   <strong>{{ $mode == 'edit' ? 'แก้ไขงบประมาณ' : 'เพิ่มงบประมาณใหม่' }}</strong>  </h3>

          </div>

        </div>
      </div>
    </div>

                <div class="container">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <strong>{{ $mode == 'edit' ? 'แก้ไขงบประมาณ' : 'เพิ่มงบประมาณใหม่' }}</strong>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ $mode == 'edit' ? route('budget.update', $budget->budget_id) : route('budget.store') }}">
                                    @csrf


                                        {{-- ปีงบประมาณ --}}
                                    <div class="form-group">
                                        <label for="by_id">ปีงบประมาณ</label>
                                        <pre>

                                        <select name="sclyear" class="form-control">
                                            
                                            @if($budgetYear)
                                             @foreach ($budgetYear as $y)
                                               <option value="{{ $y->by_id }}" 
    {{ ($budget?->by_id == $y->by_id) ? 'selected' : '' }}>
    {{ $y->by_year + 543 }}
</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>

                                        {{-- ประเภทงบประมาณ --}}
                                    <div class="form-group">
                                        <label for="type_id">ประเภทงบประมาณ</label>
                                        <select name="type_id" class="form-control">
                                            @foreach ($budgetTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $budget?->type_id == $type->id ? 'selected' : '' }}>
                                                    {{ $type->type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>




                                    {{-- กองทุน --}}
                                    <div class="form-group">
                                        <label for="fund_id">กองทุน</label>
                                        <select name="fund_id" class="form-control">
                                            @foreach($funds as $f)
                                                <option value="{{ $f->fund_id }}" {{ isset($budget) && $budget->fund_id == $f->fund_id ? 'selected' : '' }}>
                                                    {{ $f->fund_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- หน่วยงาน --}}
                                    <div class="form-group">
                                        <label for="dep_id">หน่วยงาน</label>
                                        <select name="dep_id" class="form-control">
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

                                    {{-- แผนงาน/กิจกรรม --}}
                                    <div class="form-group">
                                        <label for="activity_id">แผนงาน/กิจกรรม</label>
                                        <select name="activity_id" class="form-control">
                                            @foreach($activities as $a)
                                                <option value="{{ $a->activity_id }}" {{ isset($budget) && $budget->activity_id == $a->activity_id ? 'selected' : '' }}>
                                                    {{ $a->activity_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- รหัสงบประมาณ --}}
                                    <div class="form-group">
                                        <label>รหัสงบประมาณ</label>
                                        <input type="text" name="budget_no" class="form-control" value="{{ $budget->budget_no ?? '' }}">
                                    </div>

                                    {{-- หมวดงบประมาณ --}}
                                    <div class="form-group">
                                        <label>หมวดงบประมาณ</label>
                                        <input type="text" name="category" class="form-control" value="{{ $budget->category ?? '' }}">
                                    </div>

                                    {{-- จำนวนเงิน --}}
                                    <div class="form-group">
                                        <label>จำนวนเงิน</label>                                        
                                        <input type="number" name="budget_money" class="form-control" value="{{ old('budget_money', $budget->budget_money ?? '') }}"  step="0.01">
                                    </div>

                                    {{-- งบรายจ่าย --}}
                                    <div class="form-group">
                                        <label>งบรายจ่าย</label>
                                        <select name="gid" class="form-control">
                                            @foreach($groups as $g)
                                                <option value="{{ $g->gid }}" {{ isset($budget) && $budget->gid == $g->gid ? 'selected' : '' }}>
                                                    {{ $g->group_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- แผนงาน --}}
                                    <div class="form-group">
                                        <label>แผนงาน</label>
                                        <input type="text" name="plan" class="form-control" value="{{ $budget->plan ?? '' }}">
                                    </div>

                                    {{-- คำอธิบาย --}}
                                    <div class="form-group">
                                        <label>คำอธิบาย</label>
                                        <textarea name="budget_detail" class="form-control" rows="4">{{ $budget->budget_detail ?? '' }}</textarea>
                                    </div>

                                    {{-- Hidden --}}
                                    @if($mode == 'edit')
                                        <input type="hidden" name="budget_id" value="{{ $budget->budget_id }}">
                                    @endif

                                    <input type="hidden" name="by_id" value="{{ session('sby_id') }}">
                                    <input type="hidden" name="ty_id" value="{{ session('sty_id') }}">

                                    {{-- ปุ่ม --}}
                                    <div class="form-group text-right mt-3">
                                        <a href="{{ route('budget.index') }}" class="btn btn-secondary mr-2">ยกเลิก</a>
                                        <button type="submit" class="btn btn-success">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



        
  

<!-- END session contents -->
@endsection

@section('corescript')
@endsession
