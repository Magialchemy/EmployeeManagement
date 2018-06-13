<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;
use Illuminate\Http\Response;
use App\Employee;
use Validator;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('msg')->only('update');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::where('isDeleted',false)->paginate(10);
        return view('employees.index',['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        $employee = new Employee;
        $validated = $request->validated();
        if(!$validated){
                    return redirect()->route('employee.create')->withErrors($validated)->withInput();
        }
        $form = $request->except('msg');
        $employee->fill($form)->save();
        
        return view('employees.edit',['employee' => $employee,'msg'=>'登録が完了しました。']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        return view('employees.edit',['employee' => $employee,'msg' => '']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id)
    {
        $employee = Employee::find($id);
        $validated = $request->validated();
        if(!$validated){
                    return redirect()->route('employees.edit',['employee' => $employee])->withErrors($validated)->withInput();
        }
        $form = $request->except('msg');
        $employee->fill($form)->save();
        return view('employees.edit',['employee' => $employee,'msg'=>'編集が完了しました。']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Employee::find($id)->delete();
        return view('employees.destroy');
    }
}
