<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    
    public function all_employees()
    {
        
        try{
        $employees = Employee::query()
            ->select('employees.first_name', 'employees.last_name',
            'employees.email','employees.hiredate','employees.salary',
            'departments.department_name', 'jobs.job_name')
            ->join('departments', 'departments.id', '=' , 'employees.department_id')
            ->join('jobs', 'jobs.id', '=' ,'employees.job_id')
            ->orderBy('employees.hiredate')
            ->get();
        return view('all_employees')->with(['employees' => $employees]);
        }
        catch (QueryException $e) {
            return redirect()->route('all_employees')->withErrors('A database error occurred: ' . $e->getMessage());
        }
        catch (\Exception $e) {
            return redirect()->route('all_employees')->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

    //-------------------------------------------------------------------------
    
    public function edit_employee(Request $request)
{
    
    try {
        
        DB::beginTransaction();
        $employeeExists = Employee::query()->where('id','=',$request['id'])->first();
        if($employeeExists)
        {
            $id = Auth::id();
            $i = Employee::query()->where('id','=',$id)->first();
            Log::info('Successfully added a new employee by ' . $i->first_name . ' at ' . now() . ': ' . $request['email'] );
            $employeeExists->update($request->all());
            $employeeExists->save();
            Log::info('Successfully updated Data employee by ' . $i->first_name . ' at ' . now() . ': ' . $request['email'] );
            DB::commit();
            return redirect()->route('edit_employee')->with('success','Employee is Updated');
        }
       else{ DB::rollBack();
        return redirect()->route('edit_employee')->withErrors(['error','Employee does not exist']);}
    }
    catch(\Exception $e){
        if ($e->getMessage() == 'Employee does not exist') {
            DB::rollBack();
            return redirect()->route('edit_employee')->withErrors(['error', $e->getMessage()]);
        }
    
    elseif ($e->getMessage() == 'Email already exists') {
            DB::rollBack();
            return redirect()->route('edit_employee')->withErrors(['error', $e->getMessage()]);
        }
        else{
        DB::rollBack();
        return redirect()->route('edit_employee')->withErrors('An error occurred: ' . $e->getMessage());
    }   }
}

    //------------------------------------------------------------------------------------------------

 
    public function delete_employee(Request $request)
    {
        $employ = collect();
        try {
            DB::beginTransaction();
            if ($request->has('search')) {
                $employ = Employee::query()->where('first_name', 'like', '%' . $request['name'] . '%')->with('job','department')->get();
            } elseif ($request->has('ids')) {
                $id = Auth::id();
                $i = Employee::query()->where('id','=',$id)->first();
                foreach ($request['ids'] as $id) {
                    Log::info('Attempting to Find id employee by : ' . $i->first_name . now());
                    $employee = Employee::find($id);
                    if ($employee) {
                        Log::info('Attempting to Delete employee: ' . $employee['email'] . now()); 
                        $employee->delete();
                    }
                }
                Log::info('Successfully Deleted employee: ' . $request['name'] .  '  By: ' . $i->first_name . now());
                DB::commit();
                return redirect()->back()->with(['success'=>'Employees deleted successfully']);
            }
        } 
        catch (QueryException $e) {
            return redirect()->route('delete_employee')->withErrors('A database error occurred: ' . $e->getMessage());
        }
        catch (\Exception $e) {
            if ($e->getMessage() == 'Employee is Not Exists') 
                DB::rollBack();
                return redirect()->route('delete_employee')->withErrors(['error', $e->getMessage()]);
            DB::rollBack();
            return redirect()->route('delete_employee')->withErrors(['An error occurred: ' . $e->getMessage()]);
        }
        return view('Admin.delete_employee')->with(['employ'=>$employ]);
    }

//------------------------------------------------------------------------------------
    
public function search_employees(Request $request)
{
    try {
        $employee = Employee::query()
            ->select('employees.first_name', 'employees.last_name', 'employees.email', 'employees.hiredate', 'employees.salary',
            'employees.comissions','departments.department_name', 'jobs.job_name')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('jobs', 'jobs.id', '=', 'employees.job_id')
            ->where('employees.first_name', 'like', '%' . $request['name'] . '%')
            ->get();
        return view('search_employees')->with(['employee' => $employee]);
    }    catch (QueryException $e) {
        return redirect()->route('search_employees')->withErrors('A database error occurred: ' . $e->getMessage());
    }
    catch   (\Exception $e) {
        if($e->getMessage() == 'Employee is Not exist'){
        DB::rollBack();
        return redirect()->route('search_employees')->withErrors('An error occurred: ' . $e->getMessage());
    }
        return redirect()->route('search_employees')->withErrors('An error occurred: ' . $e->getMessage());
    }
}

//-------------------------------------------------------------------------

public function employees_hiredate(Request $request)
{
    try{
        $employees = Employee::query()
        ->select('employees.first_name','employees.last_name','employees.email',
        'departments.department_name', 'jobs.job_name','employees.salary',
        'employees.comissions','employees.hiredate')
        ->join('departments',  'departments.id', '=','employees.department_id')
        ->join('jobs', 'jobs.id' , '=','employees.job_id' )
        ->whereBetween('employees.hiredate', [$request['startDate'], $request['endDate']])
        ->orderBy('hiredate','asc')
        ->get();
    
    return view('employees_hiredate', ['employees' => $employees]);
}catch(QueryException $e){
    return redirect()->route('employees_hiredate')->withErrors(['A database error occured: ' . $e->getMessage()]);
}
catch(\Exception $e){
    return redirect()->route('employees_hiredate')->withErrors(['An error occured: ' . $e->getMessage()]);
}
}

//------------------------------------------------------------------------------------------------

public function range_salary()
{
    try{
    $employees = DB::table('employees')
    ->join('jobs', 'jobs.id', '=', 'employees.job_id')
    ->join('departments', 'departments.id', '=', 'employees.department_id')
    ->select('employees.first_name','employees.salary','departments.department_name', DB::raw("
        CASE 
            WHEN employees.salary > jobs.max_salary THEN 'Greater than'
            WHEN employees.salary < jobs.min_salary THEN 'Lesser than'
            ELSE 'In Range'
        END AS salary_compared_to_range"
        ))
    ->orderBy('salary','asc')
    ->get();
    return view('range_salary', ['employees' => $employees]);
    }catch(QueryException $e){
    return redirect()->route('range_salary')->withErrors(['A database error occurred: ' . $e->getMessage()]);
    }
    catch(\Exception $e){
    return redirect()->route('range_salary')->withErrors(['An error occurred: ' . $e->getMessage()]);
    }
}

// ------------------------------------------------------------------------

public function employees_most_order(Request $request)
{
    try{
        
        $employees = Order::query()
        ->select('employees.first_name', DB::raw("COUNT(employee_id) AS Number_of_orders"))
        ->join('employees', 'employees.id', '=', 'orders.employee_id')
        ->whereBetween('orders.order_date', [$request['start_date'], $request['end_date']])
        ->groupBy('employees.first_name')
        ->orderBy('Number_of_orders', 'desc')
        ->get();

        session(['employees' => $employees]);
        if (!$request->has('export')) {
            return view('employees_most_order')->with(['employees' =>$employees]);
        }
        else{
        return $this->exportPDF('employees_most_order', ['employees' =>$employees]);}
        

    }catch(QueryException $e){
        return redirect()->route('employees_most_order')->withErrors(['A database error occurred: ' . $e->getMessage()]);
    }
    catch(\Exception $e){
        return redirect()->route('employees_most_order')->withErrors(['An error occurred: ' . $e->getMessage()]);
    }
}
//------------------------------------------------------------------------------------------------
public function exportPDF($viewName, $data)
{
    $pdf = PDF::loadView($viewName, $data);
    return $pdf->download($viewName . '.pdf');
}
}    



///log timestamp and who is logged and all fields 
//close transaction in finally 
//   //Password(AZ)   with character