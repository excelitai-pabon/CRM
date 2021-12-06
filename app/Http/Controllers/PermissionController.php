<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Admin;
use App\Models\AdminsRole;
use Illuminate\Support\Facades\Auth;



class PermissionController extends Controller
{
    //
    public function Permission()
    {
    	$dev_permission = Permission::where('slug','create-tasks')->first();
		$manager_permission = Permission::where('slug', 'edit-users')->first();

		//RoleTableSeeder.php
		$dev_role = new Role();
		$dev_role->slug = 'developer';
		$dev_role->name = 'Front-end Developer';
		$dev_role->save();
		$dev_role->permissions()->attach($dev_permission);

		$manager_role = new Role();
		$manager_role->slug = 'manager';
		$manager_role->name = 'Assistant Manager';
		$manager_role->save();
		$manager_role->permissions()->attach($manager_permission);

		$dev_role = Role::where('slug','developer')->first();
		$manager_role = Role::where('slug', 'manager')->first();

		$createTasks = new Permission();
		$createTasks->slug = 'create-tasks';
		$createTasks->name = 'Create Tasks';
		$createTasks->save();
		$createTasks->roles()->attach($dev_role);

		$editUsers = new Permission();
		$editUsers->slug = 'edit-users';
		$editUsers->name = 'Edit Users';
		$editUsers->save();
		$editUsers->roles()->attach($manager_role);

		$dev_role = Role::where('slug','developer')->first();
		$manager_role = Role::where('slug', 'manager')->first();
		$dev_perm = Permission::where('slug','create-tasks')->first();
		$manager_perm = Permission::where('slug','edit-users')->first();



		$manager = new Admin();
		$manager->name = 'admin1';
		$manager->email = 'admin1@gmail.com';
		$manager->password = bcrypt('12345678');
		$manager->save();
		$manager->roles()->attach($manager_role);
		$manager->permissions()->attach($manager_perm);


		return redirect()->back();
    }

    public function permission_show(){
        $user=Auth::guard('admin')->user();
        dd( $user);
    }

    public function powerOfAtorney()
    {
        $admins = Admin::all();
        $super_admins = AdminsRole::all();
        return view('powerOfAtorney.powerOfAtorney-add-view',compact('admins','super_admins'));
    }

    public function powerOfAtorneyStore(Request $request)
    {
        $find = AdminsRole::where('admin_id',$request->name)->first();
        if(isset($find->admin_id))
        {

            return redirect()->back()->with(['error'=>'Already Exists']);
        }
        else
        {

            AdminsRole::insert([
                'admin_id' => $request->name,
                'role_id' =>$request->check,
            ]);
            return redirect()->back()->with(['success'=>'success fully added as Super Admin']);

        }

    }

    public function powerOfAtorneyDelete($id)
    {
        $adminRole = AdminsRole::where('admin_id',$id)->delete();


        return redirect()->back();
    }
}
