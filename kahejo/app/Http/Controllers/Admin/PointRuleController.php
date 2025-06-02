<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PointRuleController extends Controller
{
    public function index()
    {
        $rules = PointRule::latest()->paginate(10);
        return view('admin.point-rules.index', compact('rules'));
    }

    public function create()
    {
        return view('admin.point-rules.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'carbon_reduction_threshold' => 'required|numeric|min:0',
            'points_awarded' => 'required|integer|min:1',
            'badge_name' => 'nullable|string|max:255',
            'badge_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        
        if ($request->hasFile('badge_image')) {
            $path = $request->file('badge_image')->store('badges', 'public');
            $data['badge_image'] = $path;
        }

        PointRule::create($data);

        return redirect()->route('admin.point-rules.index')
            ->with('success', 'Point rule created successfully.');
    }

    public function edit(PointRule $pointRule)
    {
        return view('admin.point-rules.edit', compact('pointRule'));
    }

    public function update(Request $request, PointRule $pointRule)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'carbon_reduction_threshold' => 'required|numeric|min:0',
            'points_awarded' => 'required|integer|min:1',
            'badge_name' => 'nullable|string|max:255',
            'badge_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        
        if ($request->hasFile('badge_image')) {
            $path = $request->file('badge_image')->store('badges', 'public');
            $data['badge_image'] = $path;
        }

        $pointRule->update($data);

        return redirect()->route('admin.point-rules.index')
            ->with('success', 'Point rule updated successfully.');
    }

    public function destroy(PointRule $pointRule)
    {
        $pointRule->delete();
        return redirect()->route('admin.point-rules.index')
            ->with('success', 'Point rule deleted successfully.');
    }

    public function testRule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'carbon_reduction' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $carbonReduction = $request->carbon_reduction;
        $applicableRules = PointRule::where('is_active', true)
            ->where('carbon_reduction_threshold', '<=', $carbonReduction)
            ->get();

        $results = $applicableRules->map(function ($rule) use ($carbonReduction) {
            return [
                'rule_name' => $rule->name,
                'points_awarded' => $rule->points_awarded,
                'badge_name' => $rule->badge_name,
                'threshold_met' => $carbonReduction >= $rule->carbon_reduction_threshold
            ];
        });

        return response()->json(['results' => $results]);
    }
} 