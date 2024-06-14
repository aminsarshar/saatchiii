<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\Users\UpdateUsersRequest;


class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('avatar');
        $avatar = '';
        if(!empty($file)){
            $avatar = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/users' , $avatar);
        }
        User::query()->create([
            'avatar'=>$avatar,
            'name' => $request->name,
            'email' => $request->email,
            'cellphone' => $request->cellphone,
            'password' => Hash::make($request->password),

        ]);

        alert()->success('کاربر با موفقیت ایجاد شد!', 'موفق');
        return redirect(route('admin.users.index'));
        // Display an error toast with no title

    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->name,
                'cellphone' => $request->cellphone,
                'role_id' => $request->role_id,

            ]);

            $user->syncRoles($request->role);

            $permissions = $request->except('_token', 'cellphone', 'role', 'name', '_method');
            $user->syncPermissions($permissions);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش نقش', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('کاربر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();


        alert()->success('کاربر مورد نظر حذف شد', 'باتشکر');
        return redirect()->route('admin.users.index');

    }
}