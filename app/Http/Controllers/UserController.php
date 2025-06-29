<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Admin";
        $admins = User::where('role', 'admin')->search(request(['search']))->paginate(5)->withQueryString();
        return view('admin.akun.list_admin', compact('admins', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Admin";

        return view('admin.akun.addAdmin', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $avatarPath;
            }
            $validated['password'] = bcrypt($validated['password']);
            $validated['role'] = 'admin';
            User::create($validated);

            DB::commit();

            return redirect()->route('admin.user.index')->with('successAdmin', 'Berhasil Menambahkan Admin Baru');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.user.index')->with('FailedAdmin', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = "Admin";

        return view('admin.akun.updateAdmin', compact('user','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
         DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('avatar')){

                 if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }
                 
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $avatarPath; 
            }

            // Check jika ada password
            if ($request->filled('password')) {
                $validated['password'] = bcrypt($request->input('password'));
            }else {
                // jika tidak pake yang lama
                unset($validated['password']);
            }
            
            $validated['role'] = 'admin';


            $user->update($validated);

            DB::commit();

            return redirect()->route('admin.user.index')->with('successAdmin', 'Berhasil Mengubah Admin Profile');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.user.index')->with('FailedAdmin', $exeption->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();

        try {
            
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }
           
            $user->delete();
            DB::commit();

            return redirect()->route('admin.user.index')->with('successAdmin', 'Berhasil Menghapus Admin');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.user.index')->with('FailedTeacher', $exeption->getMessage());

        }
    }
}

