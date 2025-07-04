<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetSetting;
use App\Models\BudgetType;
use App\Models\Rules;
use App\Models\sessionReservBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $budgetYear = DB::table('budget_setting')->orderBy('by_year', 'Desc')->get();
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
            'rules' => $rules,
            'employee' => $employeeFIS,
            'approver' => $approver,
            'payment_types' => $payment_types
        ]);
    }

    public function getBudgetAllbyDep(Request $request)
    {

        // กำหนดค่าเริ่มต้นสำหรับ year และ budgetTypeId ถ้าไม่ได้รับค่า        
        $budgetsetingID = 0;
        if ($request->budgetYear) {
            $budgetsetingID = $request->budgetYear;
        } else {
            $budgetYear = BudgetSetting::orderBy('by_year', 'desc')->first();
            $budgetsetingID = $budgetYear ? $budgetYear->by_id : null;
        }

        //  $userAdd = Session::get('cmuitaccount');

        // ดึงข้อมูลงบประมาณตามเงื่อนไข
        $query = DB::table('budgets')
            ->leftJoin('budget_setting', 'budgets.by_id', '=', 'budget_setting.by_id')
            ->leftJoin('fund', 'budgets.fund_id', '=', 'fund.fund_id')
            ->leftJoin('department', 'budgets.dep_id', '=', 'department.dep_id')
            ->leftJoin('activity', 'budgets.activity_id', '=', 'activity.activity_id')
            ->leftJoin('budget_type', 'budgets.type_id', '=', 'budget_type.type_id')
            ->select(
                'budgets.*',
                'budget_type.type_name',
                'budget_setting.by_year',
                'fund.fund_name',
                'department.dep_name',
                'activity.activity_name'
            )
            ->where('budgets.by_id', $budgetsetingID);
        if ($request->type_id) {
            $query->where('budgets.type_id', $request->type_id);
        }
        if ($request->dep_id) {
            $query->where('budgets.dep_id', $request->dep_id);
        }
        $budgetsList = $query->orderBy('budget_setting.by_year', 'desc')->get();

        return response()->json([
            'status' => 200,
            'budgetsList' => $budgetsList
        ]);
    }

    public function getBudgetPlanByBudgetID(Request $request)
    {
        $budgetId = $request->input('budget_id');

        if (!$budgetId) {
            return response()->json([
                'status' => 400,
                'message' => 'budget_id is required'
            ], 400);
        }
        $budgetPlan = DB::table('budget_plan')
            ->where('budget_id', $budgetId)
            ->get();

        return response()->json([
            'status' => 200,
            'budgetPlan' => $budgetPlan
        ]);
    }
    public function addSessionbudget(Request $request)
    {
        $sessionId = Session::getId();
        $cmuAccount = Session::get('cmuitaccount');

        // ตรวจสอบค่าที่จำเป็น
        echo "budget_id=>" . $request->budget_id;
        echo "<br/>plan_id=>" . $request->plan_id;
        echo "<br/>amount=>" . $request->amount;

        if (!$request->budget_id || !$request->plan_id || !$request->amount) {
            return response()->json([
                'status' => 400,
                'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
            ]);
        }

        // ตรวจสอบว่าข้อมูลซ้ำหรือยัง
        $exists = sessionReservBudget::where('session_id', $sessionId)
            ->where('budget_id', $request->budget_id)
            ->where('plan_id', $request->plan_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'status' => 409,
                'message' => 'มีการเพิ่มงบประมาณนี้ไว้ใน session แล้ว'
            ]);
        }
        // Insert ข้อมูลใหม่
        $item = sessionReservBudget::create([
            'session_id' => $sessionId,
            'cmuitaccount' => $cmuAccount ?? '-', // fallback ถ้าไม่มีใน session
            'budget_id' => $request->budget_id,
            'plan_id' => $request->plan_id,
            'amount' => $request->amount,
            'dep_id' => $request->dep_id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'เพิ่มข้อมูลสำเร็จ',
            'data' => $item
        ]);

    }

    public function getSessionBudgets(Request $request)
    {
        $sessionId = Session::getId();
        $cmuAccount = Session::get('cmuitaccount');

        // ดึงข้อมูลจาก session_reserv_budgets
      
        $query = DB::table('session_reserv_budgets as srb')
        ->leftJoin('budgets as b', 'srb.budget_id', '=', 'b.budget_id')
        ->leftJoin('department as d', 'b.dep_id', '=', 'd.dep_id')
        ->leftJoin('budget_plan as p', 'srb.plan_id', '=', 'p.pid')
        ->leftJoin('fund', 'b.fund_id', '=', 'fund.fund_id')        
        ->leftJoin('activity', 'b.activity_id', '=', 'activity.activity_id')
        ->leftJoin('budget_type', 'b.type_id', '=', 'budget_type.type_id')
        ->select(
            'srb.id',
            'srb.amount',
            'srb.session_id',
            'srb.cmuitaccount',

            'b.*',

            'd.dep_name',
            'p.plan_no',
            'p.plan_title',
            
            'budget_type.type_name',       
            'fund.fund_name',         
            'activity.activity_name'
        );
        // เลือกใช้ session_id หรือ cmuitaccount ในการค้นหา
        if ($cmuAccount) {
        $query->where('srb.cmuitaccount', $cmuAccount);
        } else {
            $query->where('srb.session_id', $sessionId);
        }

        // ดึงข้อมูลทั้งหมด
        $data = $query->get();

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);

    }
}
