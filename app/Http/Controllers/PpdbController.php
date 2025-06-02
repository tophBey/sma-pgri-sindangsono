<?php

namespace App\Http\Controllers;

use App\Models\RegistrationStatus;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    
    public function index()
    {
        $title = "PPDB";
        $students = User::where('role', '!=', 'admin')->search(request(['search']))->orderByDesc('id')->paginate(5)->withQueryString();
        $statusRegister = RegistrationStatus::all()->first();


        return view('admin.ppdb.index', compact('students','title', 'statusRegister'));
    }


    public function DetailStudent(User $student){

       
        $title = "PPDB";

        return view('admin.ppdb.detailPendaftaran', compact('student','title'));
    }

    public function destroy(User $user){
        // dd($user->student->attactment);
         DB::beginTransaction();
        try {
            
            if($user->student->student_photo != null){
                Storage::disk('public')->delete($user->student->student_photo);
            }


           if ($user->student->attactment) {
                if ($user->student->attactment->pip_card) {
                    Storage::disk('public')->delete($user->student->attactment->pip_card);
                }

                if ($user->student->attactment->school_certificate) {
                    Storage::disk('public')->delete($user->student->attactment->school_certificate);
                }

                if ($user->student->attactment->family_card) {
                    Storage::disk('public')->delete($user->student->attactment->family_card);
                }

                if ($user->student->attactment->birth_certificate) {
                    Storage::disk('public')->delete($user->student->attactment->birth_certificate);
                }
            }
            
           
            $user->delete();

            DB::commit();

            return redirect()->route('admin.ppdb.index');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.ppdb.index')->with('FailedTeacher', $exeption->getMessage());

        }
    }

    public function status(){
        
        $statusRegister = RegistrationStatus::all()->first();
        $title = "PPDB";

        return view('admin.ppdb.status_pendaftaran',compact('statusRegister','title'));
    }

    public function statusUpdate(RegistrationStatus $id){
         DB::beginTransaction();

        try {

            $id->is_open = !$id->is_open;

            $id->save();

            DB::commit();

            return redirect()->route('admin.ppdb.index')->with('successPPDB', 'Berhasil Mengubah Status pendaftaran');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }
    }


    public function statusNullUpdate(Student $student){
        DB::beginTransaction();

        try {

            
            $student->update([
                'status' => null
            ]);

            DB::commit();

            return redirect()->route('admin.ppdb.index')->with('successPPDB', 'Berhasil Mengubah Status pendaftaran');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }
    }
    public function statusRejectedUpdate(Student $student){
        DB::beginTransaction();

        try {

            
            $student->update([
                'status' => 'rejected'
            ]);

            DB::commit();

            return redirect()->route('admin.ppdb.index')->with('successPPDB', 'Berhasil Mengubah Status pendaftaran');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }
    }
    public function statusAcceptedUpdate(Student $student){
        DB::beginTransaction();

        try {

            
            $student->update([
                'status' => 'accepted'
            ]);

            DB::commit();

            return redirect()->route('admin.ppdb.index')->with('successPPDB', 'Berhasil Mengubah Status pendaftaran');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }
    }
}

