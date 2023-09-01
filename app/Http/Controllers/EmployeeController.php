<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     *  Lista paginada de empleados.
     */
    public function index()
    {
        $employees = Employee::select('employees.*','departments.name as department')
        ->join('departments','departments.id','=','employees.department_id')
        ->paginate(10);
        return response()->json($employees);
    }

    /**
     * Register
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|max:80',
            'phone' => 'required|max:15',
            'department_id' => 'required|numeric'
        ];

        $validator = Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
        }
        // 
        $employee = new Employee($request->input());
        $employee->save();

        return response()->json([
            'status' => true,
            'message' => 'Employee creadted sauccessfully'
        ],200);

    }

    /**
     * Buscar un empleado que coincida con el identificador proporcionado.
     * param: id
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'status' => true,
            'data' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|max:80',
            'phone' => 'required|max:15',
            'department_id' => 'required|numeric'
        ];

        $validator = Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
        }
        
        $employee->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Employee updated sauccessfully'
        ],400);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'status' => true,
            'message' => 'Employee deleted sauccessfully'
        ],400);

    }
    /**
     * Obtener el recuento de empleados por departamento.
     */
    public function EmployeesByDepartment(){
        $employees = Employee::select(DB::raw('count(employees.id) as count, departments.name'))
        ->join('departments','departments.id','=','employees.department_id')
        ->groupBy('departments.name')->get();
        return response()->json($employees);
    }
    /**
     * Obtener todos los empleados y sus respectivos departamentos
     */
    public function all(){
        $employees = Employee::select('employees.*','departments.name as department')
        ->join('departments','departments.id','=','employees.department_id')
        ->get();
        return response()->json($employees);
    }


}
