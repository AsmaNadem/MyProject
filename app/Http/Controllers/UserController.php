<?php

namespace App\Http\Controllers;

//use App\Exports\UsersExport;
//use App\Imports\UsersImport;
//use App\Models\Product;
//use App\Models\User;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//use Maatwebsite\Excel\Facades\Excel;
//use mysql_xdevapi\Exception;
//use Spatie\Permission\Models\Role;


use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use mysql_xdevapi\Exception;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//    public function export()
//    {\
//        return Excel::download((new UsersExport)
//            ->forStatus(1)->forYear(2023), 'users.xlsx');
//    }


    public function export()
    {
//        return dd('dddddddddd');
        return Excel::download((new UsersExport), 'users.xlsx');
    }

//    public function import(Request $request)
//    {
//
//        dd($request);
//        $path = '';
//        if ($request->hasFile('file'))
//            $path = $request->file('file')->store('imports');
//        if ($path != "") {
//            try {
//                Excel::import(new UsersImport, 'storage/' . $path);
//                toastr()->success('Import completed successfully');
//            }
//            catch (Exception $ex)
//            {
//                toastr()->error($ex->getMessage());
//            }
//
//        }
//        return redirect(route('users.index'));
//    }


    public function import(Request $request)
    {
        return dd('dddddddddd');
        $path = '';
        if ($request->hasFile('file'))
            $path = $request->file('file')->store('imports');
        if ($path != "") {
            try {
                Excel::import(new UsersImport, 'storage/' . $path);
                toastr()->success('تم الاستيراد  بنجاح');
            } catch (Exception $ex) {
                toastr()->error($ex->getMessage());
            }

        }
        return redirect(route('users.index'));
    }

    public function index()
    {


        if (\request()->ajax()) {
//            $users = User::paginate(\request()->length);
//            return $users;
            $users = User::all();
//            return DataTables::of($data)->make(true);

//            return response()->json(['data' => $users]);
            return datatables()->collection(User::all())->toJson();
        }
        else
            return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("users.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'roles' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            "image" => [$request->id > 0 ? "nullable" : "required", "image", "max:51120"],
            'phone' => ['required', 'string', 'max:255'],
            'CV' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->id],

        ]);

        if ($request->id > 0)
            $user = User::findOrFail($request->id);
        $bath = "";
        if ($request->id > 0) {
            $bath = $user->image;
        }
        if ($request->hasFile('image'))
            $bath = $request->file('image')->store('users');


        $user = User::updateOrCreate(
            [
                'id' => $request->id,
            ]
            , [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $bath,
            'phone' => $request->phone,
            'CV' => $request->CV,
            'password' => Hash::make($request->password),
            'status' => isset($request->status)
        ]);

        $user->assignRole($request->roles);
        if ($request->id > 0)
            toastr()->success('User added successfully');
        else
            toastr()->success('User updated successfully');
        return redirect(route('users.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
