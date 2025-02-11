<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;
use App\DataTables\RolesDataTable;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    private $table;

    public function __construct(Role $table) {
        $this->table = $table;
    }

    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('pages.role.index');
    }

    public function new()
    {
        $permissions = Permission::get();
        return view('pages.role.new')->with([
            'permissions' => $permissions
        ]);
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        $hasPermissions = $data->permissions->pluck('name')->toArray();
        $permissions = Permission::get();
        return view('pages.role.edit')->with([
            'permissions' => $permissions,
            'hasPermissions' => $hasPermissions,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $role = $this->table->create([
            'name' => $request->name
        ]);
        
        $role->syncPermissions([$request->permissions]);

        return redirect()->route('role.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $role = $this->table->findOrFail($request->id);

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions([$request->permissions]);

        return redirect()->route('role.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('role.index')->with('success', 'Data deleted successfully');
    }
}
