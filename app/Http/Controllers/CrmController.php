<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Crm;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrmController extends Controller
{
    public function addCrm()
    {
        return view('crm.add-crm');
    }

    public function storeCrm(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        if($validated)
        {

            $crm = new Crm();
            $crm->name = $request->name;
            $crm->address = $request->address;
            $crm->details = $request->details;

            if ($request->file('icon')) {
                $file = $request->file('icon');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/crm_icon'),$filename);
                $crm['icon'] = $filename;
            }

            $crm->save();
        }

        return redirect()->route('super_admin.all.crm');
    }

    public function allCrm()
    {
        $crms = Crm::all();
        return view('crm.all-crm',compact('crms'));
    }

    public function deleteCrm(Request $request)
    {
        $crm = Crm::find($request->crm_id);
        $crm->delete();

       return redirect()->back();
    }

    public function editCrm($id)
    {
        $crm = Crm::find($id);
        return view('crm.edit-crm',compact('crm'));
    }

    public function updateCrm(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        $crm = Crm::find($id);
        $crm->name = $request->name;
        $crm->address = $request->address;
        $crm->details = $request->details;

        if ($request->file('icon')) {
            $file = $request->file('icon');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/crm_icon'),$filename);
            $crm['icon'] = $filename;
        }

        $crm->save();

        return redirect()->route('super_admin.all.crm');
    }

    public function addCrmEmployee($crm_id)
    {
        $crm = Crm::find($crm_id);
        $admins = Admin::where('crm_id',$crm_id)->get();
        $employees = Employee::where('crm_id',$crm_id)->get();
        return view('crm.add-view-employee',compact('crm','admins','employees'));
    }

    public function storeCrmAdmin(Request $request, $crm_id)
    {

        if($request->password == $request->confirm_password)
        {
            $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:admins|max:200',
            'password' => 'required|min:8',
            'confirm_password' =>'required|min:8',
            'admin_image' =>'image|mimes:jpeg,png,jpg,gif|max:2048'

            ]);
            if($validated)
            {
                $admin = new Admin();
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = Hash::make($request->password);
                $admin->crm_id =$request->crm_id;
                if ($request->file('admin_image')) {
                    $file = $request->file('admin_image');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/admin'),$filename);
                    $finalFileName= 'upload/admin/' . $filename;
                    $admin->profile_photo_path = $finalFileName;
                }
                $admin->save();
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back()->with(['notMatched'=>'Password and Confirm Password did not match']);
        }



    }

    public function editCrmAdmin($id)
    {
        $admin = Admin::find($id);

        return view('crm.edit-admin',compact('admin'));
    }

    public function deleteCrmAdmin(Request $request)
    {
        $admin = Admin::find($request->admin_id);
        $admin->delete();

        return redirect()->back();
    }

    public function detailsUpdateCrmAdmin(Request $request,$id)
    {

            $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:200',
            'admin_image' =>'image|mimes:jpeg,png,jpg,gif|max:2048'

            ]);
            if($validated)
            {
                $admin = Admin::find($id);
                $admin->name = $request->name;
                $admin->email = $request->email;
                if ($request->file('admin_image')) {
                    unlink($admin->profile_photo_path);
                    $file = $request->file('admin_image');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/admin'),$filename);
                    $finalFileName= 'upload/admin/' . $filename;
                    $admin->profile_photo_path = $finalFileName;
                }
                $admin->save();
                return redirect()->route('super_admin.crm.add.employee',$admin->crm_id);
            }
            else
            {
                return redirect()->back();
            }

    }

    public function passwordUpdateCrmAdmin(Request $request,$id)
    {

         if($request->password == $request->confirm_password)
        {
            $validated = $request->validate([

            'password' => 'required|min:8',
            'confirm_password' =>'required|min:8',

            ]);
            if($validated)
            {
                $admin = Admin::find($id);

                $admin->password = Hash::make($request->password);

                $admin->save();
                return redirect()->route('super_admin.crm.add.employee',$admin->crm_id);
            }
        }
        else
        {
            return redirect()->back()->with(['notMatched'=>'Password and Confirm Password did not match']);
        }
    }

    public function storeCrmEmployee(Request $request, $crm_id)
    {
        if($request->password == $request->confirm_password)
        {
            $validated = $request->validate([
            'name' => 'required|max:100',
            'designation' => 'required|max:100',
            'department' => 'required|max:100',
            'email' => 'required|unique:employees|max:200',
            'password' => 'required|min:8',
            'confirm_password' =>'required|min:8',
            'employee_image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' =>'required|max:100'

            ]);
            if($validated)
            {
                $employee = new Employee();
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->designation = $request->designation;
                $employee->department = $request->department;
                $employee->address = $request->address;
                $employee->password = Hash::make($request->password);
                $employee->crm_id =$request->crm_id;
                if ($request->file('employee_image')) {
                    $file = $request->file('employee_image');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/employee'),$filename);
                    $finalFileName= 'upload/employee/' . $filename;
                    $employee->profile_photo_path = $finalFileName;
                }
                $employee->save();
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back()->with(['notMatched'=>'Password and Confirm Password did not match']);
        }
    }

    public function deleteCrmEmployee(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        $employee->delete();

        return redirect()->back();

    }

    public function editCrmemployee($id)
    {
        $employee = Employee::find($id);
        return view('crm.edit-employee',compact('employee'));
    }

    public function detailsUpdateCrmEmployee(Request $request,$id)
    {
            $validated = $request->validate([
            'name' => 'required|max:100',
            'designation' => 'required|max:100',
            'department' => 'required|max:100',
            'email' => 'required|unique:employees|max:200',
            'employee_image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' =>'required|max:100'

            ]);
            if($validated)
            {
                $employee = Employee::find($id);
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->designation = $request->designation;
                $employee->department = $request->department;
                $employee->address = $request->address;

                if ($request->file('employee_image')) {
                    unlink($employee->profile_photo_path);
                    $file = $request->file('employee_image');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/employee'),$filename);
                    $finalFileName= 'upload/employee/' . $filename;
                    $employee->profile_photo_path = $finalFileName;
                }
                $employee->save();
                return redirect()->route('super_admin.crm.add.employee',$employee->crm_id);
            }

    }

    public function passwordUpdateCrmEmployee(Request $request,$id)
    {
        if($request->password == $request->confirm_password)
        {
            $validated = $request->validate([

            'password' => 'required|min:8',
            'confirm_password' =>'required|min:8',

            ]);
            if($validated)
            {
                $employee = Employee::find($id);

                $employee->password = Hash::make($request->password);

                $employee->save();
                return redirect()->route('super_admin.crm.add.employee',$employee->crm_id);
            }
        }
        else
        {
            return redirect()->back()->with(['notMatched'=>'Password and Confirm Password did not match']);
        }
    }
}

