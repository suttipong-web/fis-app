<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\BudgetSetting;
use App\Models\BudgetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class budgetController extends Controller
{
    //show listBudget  all
    public function index(Request $request){
    $year = $request->input('year');
    $budgetTypeId = $request->input('budget_type'); // รับค่า type_id

    // ดึงรายการประเภทงบทั้งหมด
    $budgetTypes = BudgetType::all();

    // กำหนดค่าเริ่มต้นสำหรับ year และ budgetTypeId ถ้าไม่ได้รับค่า
   $budgetYear = BudgetSetting::all();     


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
        );

    if ($year) {
        $query->where('by_id', $year);
    }

    if ($budgetTypeId) {
        $query->where('type_id', $budgetTypeId);
    }

    $budgets = $query->get();

    return view('Admin.budget.index', compact('budgets', 'budgetYear', 'budgetTypeId', 'budgetTypes'));

    }

    //Add Budget 
    public function addBudget(Request $request){

    }
    //Add Budget 
    public function updated(Request $request){

    }

    public  function delete(Request $request){

    }


}
