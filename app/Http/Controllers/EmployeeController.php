<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    //
    public function index(){

        $employees = Employee::with('company')->paginate(10);
        return view('dashboard', ['employees' => $employees]);

    }

    public function create(){

        $companies = Company::all();

        return view('employee.create', ['companies' => $companies]);
    }

    public function insert(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable|string'
        ]);

        $employee = Employee::create($data);

        if ($employee) {
            return redirect()->route('dashboard')->with('success', 'Employee created successfully');
        } else {
            return redirect()->route('dashboard')->with('error', 'Failed to create employee');
        }
 
    }

    public function edit($employee_id){
       

        $employee = Employee::findOrFail($employee_id);
        $company = Company::findOrFail($employee->company_id);
        $companies = Company::all();

        return view('employee.edit', ['employee' => $employee, 'company' => $company, 'companies' => $companies]);
    }

    public function update(Request $request, $employee){
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable|string'
        ]);

        $employee = Employee::findOrFail($employee);
        $employee->update($data);

        $company = Company::findOrFail($employee->company_id);
        $company->update($data);

        if ($employee && $company) {
            return redirect()->route('dashboard')->with('success', 'Employee updated successfully');
        } else {
            return redirect()->route('dashboard')->with('error', 'Failed to update employee');
        }
       
    }

    public function destroy($employee){
        $employee = Employee::findOrFail($employee);
        $employee->delete($employee);

        return redirect()->route('dashboard')->with('success', 'Employee Deleted successfully');
    }
}
