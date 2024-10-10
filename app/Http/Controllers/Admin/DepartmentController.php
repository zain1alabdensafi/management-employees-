<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function add_department(Request $request)
{
    try{
        DB::beginTransaction();
        $departmentExists = Department::query()->where('department_name','=',$request['department_name'])->exists();
        if($departmentExists){
                return redirect()->route('add_department')->withErrors('Departments is Exists');
        }
        else{
            $data = Validator::make($request->all(),[
            'department_name' => 'required'
            ]);
            Log::info('Attempting to Validate data: '. $data);
            if($data->fails())
            {
                DB::rollBack();
                return redirect()->route('add_department')->withErrors([$data->errors()]);
            }

            $id = Auth::id();
            $i = Employee::query()->where('id','=',$id)->first();
            Log::info('Attempting to add a new Department: ' . $request['department_name'] . ' By ' . $i->first_name  . now());
            $department = Department::create([
                'department_name' => $request['department_name']
            ]);
            $department->save();
            Log::info('Successfully added a new Department: ' . $request['department_name'] . ' By ' . $i->first_name  . now());
            DB::commit();
            return redirect()->route('add_department')->with(['success' => 'Department Created successfully', 'department_id' => $department->id]);
        }
    }
    catch (QueryException $e) {
        return redirect()->route('add_depatment')->withErrors('A database error occurred: ' . $e->getMessage());
    }
    catch (\Exception $e) {
        if($e->getMessage() == 'Department Name is exists')
        DB::rollBack();
        return redirect()->route('add_department')->withErrors('An error occurred: ' . $e->getMessage());
    }
    catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('add_department')->withErrors('An error occurred: ' . $e->getMessage());
    }
}


//-------------------------------------------------------------------------

public function edit_department(Request $request)
{
    try
    {
        DB::beginTransaction();
        $departmentExists=Department::query()->where('department_name', '=', $request['department_name'])->first();
        if($departmentExists)
        {
            $id = Auth::id();
            $i = Employee::query()->where('id','=',$id)->first();
            Log::info('Attempting to Updated Department: ' . $request['department_name']) . ' By ' . $i->first_name  . now();
            $departmentExists->department_name = $request['new_department_name'];
            $departmentExists->save();
            Log::info('Successfully Updated a Department: ' . $request['department_name'] .' By ' . $i->first_name  . now());
            DB::commit();
            return redirect()->route('edit_department')->with('success','Department Name is Updated');
        }
            DB::rollBack();
            return redirect()->route('edit_department')->withErrors('Departments is Not Exists');
        
    }
    catch (QueryException $e) {
        DB::rollBack();
        return redirect()->route('edit_department')->withErrors('A database error occurred: ' . $e->getMessage());
    }
    catch (\Exception $e) {
        if($e->getMessage() == 'Department Name is exists')
        DB::rollBack();
        return redirect()->route('edit_department')->withErrors('An error occurred: ' . $e->getMessage());
    }
    catch (\Exception $e) {
        DB::rollBack();
    return redirect()->route('edit_department')->withErrors('An error occurred: ' . $e->getMessage());
}

}

    //------------------------------------------------------------------------------------------------


    public function all_departments()
    {
    try{
        $department=Department::all();
        return view('all_departments')->with(['department' => $department]);
        }
        catch (QueryException $e) {
            return redirect()->route('all_employees')->withErrors('A database error occurred: ' . $e->getMessage());
        }
        catch(\Exception $e){
        return redirect()->route('all_departments')->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

    //------------------------------------------------------------------------------------------------

    public function delete_department(Request $request)
{
    $department = collect();
    try {
        DB::beginTransaction();
        if ($request->has('search')) {
            $department = Department::query()->where('department_name', 'like','%'.$request['search'].'%')->get();
        } elseif ($request->has('ids')) {
            foreach ($request['ids'] as $id) {
                Log::info('Attempting to find Department: ' . $id);
                $department = Department::find($id);
                if ($department) {
                    Log::info('Found Department: ' . $department['department_name']);
                    
                    $id = Auth::id();
                    $i = Employee::query()->where('id','=',$id)->first();
                    foreach ($department->employees as $employee) {
                        Log::info('Attempting to Delete employee for this department: ' . $department['department_name'] . '  By : ' . $i->first_name . now());
                        $employee->delete();
                    }
                    Log::info('Attempting to Delete Department: ' . $department['department_name'] . ' By : ' . $i->first_name  . now());
                    $department->delete();
                }
            }
            Log::info('Successfully deleted department ' . $department['department_name'] . ' By : ' . $i->first_name . now());
            DB::commit();
            return redirect()->back()->with(['success'=>'Department and its employees deleted successfully']);
        }
    }    catch (QueryException $e) {
        DB::rollBack();
        return redirect()->route('delete_department')->withErrors('A database error occurred: ' . $e->getMessage());
    }
    catch(\Exception $e){
        DB::rollBack();
        return redirect()->route('delete_department')->withErrors(['An error occurred: ' . $e->getMessage()]);
    }
    return view('Admin.delete_department')->with(['department'=>$department]);
}
}