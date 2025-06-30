<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BudgetPlanController extends Controller
{
    // เพิ่มรหัสย่อย
    public function store(Request $request)
    {
        $request->validate([
            'budget_id' => 'required|integer',
            'plan_no' => 'required|string|max:255',
            'plan_title' => 'required|string|max:255',
            'plan_budget' => 'required|numeric'
        ]);


        $id = DB::table('budget_plan')->insertGetId([
            'budget_id' => $request->budget_id,
            'plan_no' => $request->plan_no,
            'plan_title' => $request->plan_title,
            'plan_budget' => $request->plan_budget,
            'plan_budget_bal' => $request->plan_budget
        ]);
        
        $plan = BudgetPlan::find($id);
        return response()->json($plan);

    }

    // แก้ไขรหัสย่อย
    public function update(Request $request, $id)
    {
        DB::table('budget_plan')->where('pid', $id)->update([
            'plan_no' => $request->plan_no,
            'plan_title' => $request->plan_title,
            'plan_budget' => $request->plan_budget,
        ]);

        return response()->json(['success' => true]);
    }

    // ลบรหัสย่อย
    public function destroy($id)
    {
        DB::table('budget_plan')->where('pid', $id)->delete();
        return response()->json(['success' => true]);
    }

    // BudgetPlanController.php
    public function list($budget_id)
    {
        $plans = DB::table('budget_plan')
            ->where('budget_id', $budget_id)
            ->orderBy('pid', 'asc')
            ->get();

        return response()->json($plans);
    }
}
