<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\BudgetSetting;
use App\Models\BudgetType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class budgetController extends Controller
{

    //show listBudget  all
    public function index(Request $request)
    {
        $yearNow = Carbon::now()->year;
        $getYear = $request->input('slcyear');
        $budgetTypeId = $request->input('budget_type'); // รับค่า type_id

        // ดึงรายการประเภทงบทั้งหมด
        $budgetTypes = BudgetType::all();

        // กำหนดค่าเริ่มต้นสำหรับ year และ budgetTypeId ถ้าไม่ได้รับค่า
        $budgetYear = $budgetYear = BudgetSetting::orderBy('by_year', 'desc')->get();



        // ดึงข้อมูลงบประมาณตามเงื่อนไข
        $query = DB::table('budgets')
            ->leftJoin('budget_setting', 'budgets.by_id', '=', 'budget_setting.id')
            ->leftJoin('fund', 'budgets.fund_id', '=', 'fund.fund_id')
            ->leftJoin('department', 'budgets.dep_id', '=', 'department.dep_id')
            ->leftJoin('activity', 'budgets.activity_id', '=', 'activity.activity_id')
            ->leftJoin('budget_type', 'budgets.type_id', '=', 'budget_type.id')
            ->select(
                'budgets.*',
                'budget_type.type_name',
                'budget_setting.by_year',
                'fund.fund_name',
                'department.dep_name',
                'activity.activity_name'
            )
            ->where('budget_setting.by_year', '>', $yearNow - 2);

        if ($getYear) {
            $query->where('by_id', $getYear);
        }

        if ($budgetTypeId) {
            $query->where('type_id', $budgetTypeId);
        }

        $budgets = $query->orderBy('budget_setting.by_year', 'desc')->get();



        return view('Admin.budget.index', compact('budgets', 'budgetYear', 'budgetTypeId', 'budgetTypes', 'getYear'));

    }

    //Add Budget 
    public function addBudget(Request $request)
    {
        return view('Admin.budget.add');

    }


    public function create()
    {
        $funds = DB::table('fund')->get();
        $departments = DB::table('department')->orderBy('dep_parent')->get();
        $activities = DB::table('activity')->get();
        $groups = DB::table('group')->get();

        // ดึงรายการประเภทงบทั้งหมด
        $budgetTypes = BudgetType::all();
        // กำหนดค่าเริ่มต้นสำหรับ year และ budgetTypeId ถ้าไม่ได้รับค่า
        $budgetYear = $budgetYear = BudgetSetting::orderBy('by_year', 'desc')->get();

        return view('Admin.budget.form', [
            'mode' => 'create',
            'budget' => null,
            'funds' => $funds,
            'departments' => $departments,
            'activities' => $activities,
            'groups' => $groups,
            'budgetTypes' => $budgetTypes,
            'budgetYear' => $budgetYear
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'budget_money' => 'required|numeric|between:0,9999999.99',
        ], [
            'budget_money.required' => 'กรุณากรอกจำนวนเงิน',
            'budget_money.numeric' => 'จำนวนเงินต้องเป็นตัวเลขเท่านั้น',
        ]);

        DB::table('budgets')->insert([
            'fund_id' => $request->fund_id,
            'dep_id' => $request->dep_id,
            'activity_id' => $request->activity_id,
            'budget_no' => $request->budget_no,
            'category' => $request->category,
            'budget_money' => $request->budget_money,
            'gid' => $request->gid,
            'plan' => $request->plan,
            'budget_detail' => $request->budget_detail,
            'by_id' => $request->sclyear,
            'type_id' => $request->type_id,
            'bdate' => now(),
            'is_withdraw' => 0,
            'budget_money_bal' => 0

        ]);

        return redirect()->route('budget.index')->with('success', 'บันทึกงบประมาณใหม่เรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $budget = DB::table('budgets')->where('budget_id', $id)->first();

        $funds = DB::table('fund')->get();
        $departments = DB::table('department')->orderBy('dep_parent')->get();
        $activities = DB::table('activity')->get();
        $groups = DB::table('group')->get();
        // ดึงรายการประเภทงบทั้งหมด
        $budgetTypes = BudgetType::all();
        // กำหนดค่าเริ่มต้นสำหรับ year และ budgetTypeId ถ้าไม่ได้รับค่า
        $budgetYear = $budgetYear = BudgetSetting::orderBy('by_year', 'desc')->get();

        return view('Admin.budget.form', [
            'mode' => 'edit',
            'budget' => $budget,
            'funds' => $funds,
            'departments' => $departments,
            'activities' => $activities,
            'groups' => $groups,
            'budgetTypes' => $budgetTypes,
            'budgetYear' => $budgetYear
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'budget_money' => 'required|numeric|between:0,9999999.99',
        ], [
            'budget_money.required' => 'กรุณากรอกจำนวนเงิน',
            'budget_money.numeric' => 'จำนวนเงินต้องเป็นตัวเลขเท่านั้น',
        ]);


        DB::table('budgets')->where('budget_id', $id)->update([
            'fund_id' => $request->fund_id,
            'dep_id' => $request->dep_id,
            'activity_id' => $request->activity_id,
            'budget_no' => $request->budget_no,
            'category' => $request->category,
            'budget_money' => $request->budget_money,
            'gid' => $request->gid,
            'plan' => $request->plan,
            'budget_detail' => $request->budget_detail,
            'by_id' => $request->sclyear,
            'type_id' => $request->type_id,
            'bdate' => now()

        ]);

        return redirect()->route('budget.index')->with('success', 'แก้ไขงบประมาณเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::table('budgets')->where('budget_id', $id)->delete();

        return redirect()->route('budget.index')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}
