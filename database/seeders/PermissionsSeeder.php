<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            "users" => ['access', 'create', 'update', 'delete'],
            "roles" => ['access', 'create', 'update', 'delete'],
            "programming_languages" => ['access', 'create', 'update', 'delete'],
            "projects" => ['access', 'create', 'update', 'delete'],
            "employees" => ['access', 'create', 'update', 'delete'],
            "tasks" => ['access', 'create', 'update', 'delete'],
        ]);

        $collection->each(function ($items, $key) {
            foreach ($items as $item)
                Permission::UpdateOrcreate(['name' => $item . '-' . $key], ['guard_name' => 'web', 'group' => $key]);

        });


        // Create a Super-Admin Role and assign all permissions to it
        $role = Role::updateOrCreate(["name" => "admin"], ['guard_name' => 'web', "name" => "admin"])
            ->givePermissionTo(Permission::all());
        Role::updateOrCreate(["name" => "user"], ['guard_name' => 'web', "name" => "user"]);

        $user = User::whereEmail('asmanq08@gmail.com')->first(); // enter your email here
        $user->assignRole('admin');


    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('Application')->plainTextToken;
            $success['name'] = $user->name;
            $success['email'] = $user->email;
            $success['phone'] = $user->phone;

            return $this->sendResponse($success, 'User logged successfully');

        }else {
            return $this->sendError('Unauthorised' , ['error'=>'Unauthorised'],403);
        }
    }
}

