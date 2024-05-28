<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Company;


class CompanyController extends Controller
{
    //
    public function index(){

        $companies = Company::paginate(10);
        return view('company.index', ['companies' => $companies]);

    }

    public function create(){

        return view('company.create');

    }

    public function insert(Request $request){

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|string'
        ]);

        if ($request->hasFile('logo')) {
            // Get the file
            $file = $request->file('logo');
    
            // Define the file name and path
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'public/logo';
    
            // Store the file in the specified directory
            $file->storeAs($path, $filename);
    
            // Save the file path in the $data array
            $data['logo'] = 'logo/' . $filename;
        }

        $employee = Company::create($data);

        return redirect()->route('company.index')->with('success', 'Company created successfully');;

    }

    public function edit($company_id){
       
        $company = Company::findOrFail($company_id);

        return view('company.edit', ['company' => $company]);
    }

    public function update(Request $request, $company){

        $company = Company::findOrFail($company);
        
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|string'
        ]);

        if ($request->hasFile('logo')) {
            // Get the file
            $file = $request->file('logo');
    
            // Define the file name and path
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'public/logo';
    
            // Store the file in the specified directory
            $file->storeAs($path, $filename);

            if ($company->logo) {
                Storage::delete('public/' . $company->logo);
            }
    
            // Save the file path in the $data array
            $data['logo'] = 'logo/' . $filename;
        }
        
        $company->update($data);

        return redirect()->route('company.index')->with('success', 'Company updated successfully');

    }

    public function destroy($company){
        $company = Company::findOrFail($company);
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully');
    }
}
