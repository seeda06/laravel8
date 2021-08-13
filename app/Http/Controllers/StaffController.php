<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            $perPage = 10; 
            //$sql = "select * from covid19s";
    
            //$covid19s = DB::select($sql, []);
            //$covid19s = Covid19::orderBy('date', 'desc')->get();
            $search = $request->get('search');        
            if (!empty($search)) {
    //กรณีมีข้อมูลที่ต้องการ search จะมีการใช้คำสั่ง where และ orWhere
    $staffs = Staff::where('Name', 'LIKE', "%$search%")
                    ->orWhere('Age', 'LIKE', "%$search%")
                    ->orWhere('Salary', 'LIKE', "%$search%")
                    ->orWhere('Phone', 'LIKE', "%$search%")
                    ->orderBy('Name', 'desc')->paginate($perPage);
            } else {
    //กรณีไม่มีข้อมูล search จะทำงานเหมือนเดิม
    $staffs = Staff::orderBy('Name','desc')->paginate($perPage);
            }
    
            //$staffs = Staff::orderBy('date', 'desc')->get();
    
            return view('staff/index', compact('staffs'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        
        Staff::create($requestData);

        return redirect('staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.show', compact('staff'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $requestData = $request->all();        
        $staff = Staff::findOrFail($id);
        $staff->update($requestData);
        return redirect('staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::destroy($id);

        return redirect('staff');
    }
}
