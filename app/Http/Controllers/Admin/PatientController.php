<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Events\PatientCreated;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Patient::orderBy('id','DESC')->paginate(5);
        return view('admin.patients.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = User::role('پزشک')->get()->pluck('name','id');
        return view('admin.patients.create',compact('doctors'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'national_code' => 'required|unique:patients,national_code',
            'phone_number' => 'required'
        ]);
    
        $input = $request->all();;
        $id  = Patient::create($input)->id;
        if(isset($input['doctors'])){
            $doctors = $input['doctors'];
            event(new PatientCreated($id, $doctors));
        }
        return redirect()->route('patients.index')
                        ->with('success','بیمار با موفقیت ایجاد شد');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        $doctors = [];
        foreach ($patient->users as $user) {
            $doctors[] = $user;
        }
        return view('admin.patients.show',compact('patient', 'doctors'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        $doctors = User::role('پزشک')->get()->pluck('name','id');
        $doctorsPatient = [];
        foreach ($patient->users as $user) {
            $doctorsPatient[] = $user->id;
        }
        return view('admin.patients.edit',compact('patient', 'doctors', 'doctorsPatient'));
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
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'national_code' => 'required|unique:patients,national_code,'.$id,
            'phone_number' => 'required'
        ]);
        $input = $request->all();
        $patient = Patient::find($id);
        $patient->update($input);
        $patient->users()->detach();
        if(isset($input['doctors'])){
            $doctors = $input['doctors'];
            event(new PatientCreated($id, $doctors));
        }
    
        return redirect()->route('patients.index')
                        ->with('success','بیمار با موفقیت ویرایش شد');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->users()->detach();
        $patient->delete();
        return redirect()->route('patients.index')
                        ->with('success','بیمار با موفقیت حذف شد');
    }

}
