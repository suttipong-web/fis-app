<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use App\Models\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetReservationController extends Controller
{
    //
    public function index()
    {
       // $reservations = DB::table('budget_reservations')->get();

        return view('Admin.reserve_budget.index', [
            'reservations' => ''
        ]);
    }

    public function create(Request $request)
    {
        $funds = DB::table('fund')->get();
        $departments = DB::table('department')->orderBy('dep_parent')->get();
        $activities = DB::table('activity')->get();
        $groups = DB::table('group')->get();  
        
        // กำหนดค่าเริ่มต้นสำหรับ year และ budgetTypeId ถ้าไม่ได้รับค่า
        $budgetYear = DB::table('budget_setting')->orderBy('by_year')->get();
        //พนักงานการเงินที่นำเสนอ
        $employeeFIS = DB::table('employee')->get(); 
        //ผู้อนุมัติ
        $approver = DB::table('approver')->get(); 
        // ประเภทการชำระเงิน         
        $payment_types = DB::table('payment_types')->get(); 

        $qRules = Rules::query();

        if ($request->filled('search')) {
                $search = $request->search;
                $qRules->where('title', 'like', "%{$search}%");
        }

        $rules = $qRules->get();
      
        // ดึงรายการประเภทงบทั้งหมด
        $budgetTypes = BudgetType::all();

        return response()->view('Admin.reserve_budget.create', [
            'mode' => 'create',
            'budget' => null,
            'funds' => $funds,
            'departments' => $departments,
            'activities' => $activities,
            'groups' => $groups,
            'budgetTypes' => $budgetTypes,
            'budgetYear' => $budgetYear,
            'rules'=>$rules,
            'employee'=> $employeeFIS,
            'approver'=>$approver,
            'payment_types'=>$payment_types
        ]);
    }


}
