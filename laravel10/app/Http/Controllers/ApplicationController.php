<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function index(){
        $applicants = Application::latest('id')->get();
        return view('index', compact('applicants'));
    }
    public function create(Request $request) {
        return view ('application');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email|unique:applications']);

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()
                    ]);
        }

        $result = Application::create($request->all());
        
        return response()->json(['success' => 'Form submitted successfully.']);
    }

    public function edit(Application $application) {
        return view('edit', compact('application'));
    }

    public function update(Request $request, Application $application) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:applications,email,'.$application->id,
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
    
        $application->update($request->all());
    
        return response()->json(['success' => 'Application updated successfully.']);
    }
    public function destroy(Application $application) {
        $application->delete();
    
        return response()->json(['success' => 'Application deleted successfully.']);
    }
        
    public function approve(Application $application) {
        $application->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Customer approved successfully.');
    }
    
    public function reject(Application $application) {
        $application->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Customer rejected successfully.');
    }
    
}