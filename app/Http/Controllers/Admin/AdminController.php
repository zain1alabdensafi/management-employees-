<?php

namespace App\Http\Controllers\Admin;

use App\Events\EmployeeAdded;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Validators;

class AdminController extends Controller
{
    public function login(Request $request)
{
    try {
        $user = Employee::query()->where('email','=',$request['email'])->first();
        if($user)
        {
            if (!Hash::check($request->password, $user->password)) {
                return redirect('login')->withErrors(['email' => 'Password is incorrect']);
            }
            Auth::login($user);

            if($user->role_id==1){
                return view('Admin\home');
            }
            elseif($user->role_id==2){
                return view('User\home');
            }
        }
        return redirect('login')->withErrors(['email' => 'Email is not exist']);

    } 
    catch(\Exception $e){
        if($e->getMessage() == 'Email is not exist' || $e->getMessage() == 'Password is incorrect'){
            return redirect('login')->withErrors(['wrong',' Email Or Password is incorrect']);
    }
            return redirect('login')->withErrors(['error', 'An error : ' . $e->getMessage()]);
        }
    }

    
            public function logout()
            {
                auth()->logout();
                return redirect()->route('login');
            }
    
//------------------------------------------------------------------------------------

public function add_employee(Request $request)
{
    try {
        DB::beginTransaction();
        if(User::query()->where('email', '=', $request['email'])->exists()) {
            return redirect()->route('add_employee')->withErrors('This email is exist');
        }

        $data = Validator::make($request->all(),[
            'job_id' => 'required',
            'department_id' => 'required',
            'role_id'=>'required',
            'first_name' => 'required|min:3|max:15',
            'last_name' => 'required|min:2|max:15',
            'email' => 'required|email|unique:users',
            'password' => ['required','string','min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*?&]/'],
            'hiredate' => 'required',
            'salary'=>'required',
            'comissions' => 'required'
        ]);
        if($data->fails()) {
            return redirect()->route('add_employee')->withErrors([ $data->errors()]);
        }

        $startTime = now();
        $id = Auth::id();
        $i = Employee::query()->where('id','=',$id)->first();
        Log::info('Attempting to add a new employee by ' . $i->first_name . ' at ' . $startTime . ': ' . $request['email']);

        $employee = Employee::create([
            'job_id' => $request->job_id,
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'hiredate'=>$request->hiredate,
            'salary'=>$request->salary,
            'comissions'=>$request->comissions
        ]);
        $employee->save();

        Log::info('Successfully added a new employee by ' . $i->first_name . ' at ' . now() . ': ' . $request['email'] . '  And His id: '. $employee->id);

        DB::commit();


        return redirect()->route('add_employee')->with('success', 'Employee created successfully');
    
    } catch (QueryException $e) {
        DB::rollBack();
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            return redirect()->route('add_employee')->withErrors('Email already exists.');
        }
        return redirect()->route('add_employee')->withErrors('An error occurred: ' . $e->getMessage());
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('add_employee')->withErrors('An unexpected error occurred: ' . $e->getMessage());
    }
}

            
        }
        