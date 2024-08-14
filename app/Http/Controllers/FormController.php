<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }
    public function apply(Request $request){

    $validatedData = $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|unique:users,email',
        'phone'       => 'required|numeric|digits_between:10,15',
        'marital'     => 'required',
        'region'      => 'required|string|max:255',
        'street'      => 'required|string|max:255',
        'age'         => 'required|integer|min:18|max:120',
        'district'    => 'required|string|max:255',
        'level'       => 'required|string|max:255',
        'preference'       => 'required|string|max:255',
        'nationality' => 'required',
        'is_working'  => 'required',
        'has_traveled' => 'required',
        'has_applied' => 'required',
        'has_passport' => 'required',
        'where_working'       => 'string|max:255',
        'where_traveled'       => 'string|max:255',
        'where_applied'       => 'string|max:255',
        'passport'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'cv'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ], [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'email.unique' => 'The email has already been taken.',
        'phone.required' => 'The phone field is required.',
        'phone.numeric' => 'The phone must be a number.',
        'phone.digits_between' => 'The phone must be between 10 and 15 digits.',
        'marital.required' => 'The marital status is required.',
        'region.required' => 'The region field is required.',
        'street.required' => 'The street field is required.',
        'age.required' => 'The age field is required.',
        'age.integer' => 'The age must be an integer.',
        'age.min' => 'The minimum age is 18.',
        'age.max' => 'The maximum age is 120.',
        'district.required' => 'The district field is required.',
        'level.required' => 'The level field is required.',
        'is_working.required' => 'The working status is required.',
        'is_working.boolean' => 'The working status must be true or false.',
        'has_traveled.required' => 'The traveled status is required.',
        'has_applied.required' => 'The applied status is required.',
        'preference.required' => 'The preference is required.',
        'passport.required' => 'A passport file is required.',
        'passport.file' => 'The passport must be a file.',
        'passport.mimes' => 'The passport must be a file of type: jpg, jpeg, png, pdf.',
        'passport.max' => 'The passport may not be greater than 2MB.',
        'cv.required' => 'A cv file is required.',
        'cv.file' => 'The cv must be a file.',
        'cv.mimes' => 'The cv must be a file of type: jpg, jpeg, png, pdf.',
        'cv.max' => 'The cv may not be greater than 2MB.',
    ]);

    // Handle file uploads
    $passportPath = $request->file('passport')->store('passports', 'public');
    $cvPath = $request->file('cv')->store('cvs', 'public');

    // Store data into the application table
    Application::create([
        'name'          => $validatedData['name'],
        'email'         => $validatedData['email'],
        'phone'         => $validatedData['phone'],
        'marital'       => $validatedData['marital'],
        'region'        => $validatedData['region'],
        'street'        => $validatedData['street'],
        'age'           => $validatedData['age'],
        'district'      => $validatedData['district'],
        'level'         => $validatedData['level'],
        'preference'    => $validatedData['preference'],
        'nationality'   => $validatedData['nationality'],
        'is_working'    => $validatedData['is_working'],
        'has_traveled'  => $validatedData['has_traveled'],
        'has_applied'   => $validatedData['has_applied'],
        'has_passport'  => $validatedData['has_passport'],
        'where_working' => $validatedData['where_working'] ?? null,
        'where_traveled' => $validatedData['where_traveled'] ?? null,
        'where_applied' => $validatedData['where_applied'] ?? null,
        'passport'      => $passportPath,
        'cv'            => $cvPath,
    ]);

    return redirect()->route('/form')->with('success', 'Data successfully saved!');

    }
}
