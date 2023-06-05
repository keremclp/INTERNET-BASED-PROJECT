<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('panel.role.list',[
            'roles' => $roles
        ]);
    }
    public function createPage(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('panel.role.add');
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'permissions' => 'required|array',
            'permissions.*' => 'required|exists:permissions,name'
        ]);
        try {
            $role = Role::create([
                'name' => $request->name
            ]);
            $role->syncPermissions($request->permissions);
            return response()->json([
                'status' => 201,
                'message' => 'Role Created!',
                'href' => route('role.update',['role' => $role->id])
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()[2]
            ]);
        }
    }

    public function updatePage($role_id){
        $role = Role::findById($role_id);
        return view('panel.role.edit',[
            'role' => $role,
            'permissions' => $role->permissions->pluck('name')->toArray()
        ]);
    }
    public function update($role_id,Request $request){
        if( Auth::user()->hasPermissionTo('role:update') ){
            $request->validate([
                'name' => 'required|string',
                'permissions' => 'required|array',
                'permissions.*' => 'required|exists:permissions,name'
            ]);
            try {
                $role = Role::findById($role_id);
                $role->update([
                    'name' => $request->name
                ]);
                $role->syncPermissions($request->permissions);
                return response()->json([
                    'status' => 201,
                    'message' => 'Role Updated!',
                ]);
            }catch (\Exception $e){
                return response()->json([
                    'status' => 500,
                    'message' => $e->getMessage()[2]
                ]);
            }
        }else{
            return response()->json([
                'status' => 500,
                'message' => "Not authorized!"
            ]);
        }

    }

    public function delete(Request $request){
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);
        try {
            $role = Role::findById($request->role_id);
            $role->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Role Deleted!',
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()[2]
            ]);
        }
    }
}
