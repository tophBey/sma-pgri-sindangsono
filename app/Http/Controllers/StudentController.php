<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\UpdateCustodianRequest;
use App\Http\Requests\UpdateParentRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Attachment;
use App\Models\Custodian;
use App\Models\PreviousShcool;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $title = "PPDB";
        return view('student.index', compact('student','title'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "PPDB";

        $user = Auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        $previousShcool = PreviousShcool::where('student_id', $student->id)->first();
        $attachment = Attachment::where('student_id', $student->id)->first();
        
      
        if ($previousShcool === null || $attachment === null) {
            // Jika ada relasi yang belum lengkap, arahkan ke view untuk melengkapi data
                return view('student.update', compact('title'));
             }
       
        return redirect()->route('student.ppdb.index',compact('title'));
    }

    public function downloadStudentData(){
        
        $user = Auth()->user();
        $student = Student::where('user_id', $user->id)->first();


        $pdf = Pdf::loadView('student.pdf.student_data', compact('student'));
        

        // return $pdf->stream();
        return $pdf->download('data_siswa_' . $student->fullname . '.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request)
    {
        DB::beginTransaction();
        $validated =  $request->validated();
       
        try {
            
            $user = Auth()->user();
            $student = Student::where('user_id', $user->id)->first();

            // cek input student photo
            if($request->hasFile('student_photo')){
                $fotoPath = $request->file('student_photo')->store('student_photos', 'public');
                $validated['student_photo'] = $fotoPath;
            }

            $student->update([
                'student_photo' => $validated['student_photo']
            ]);
            

            // create previuous shcool
            PreviousShcool::create([
                'student_id' => $student->id,
                'shcool_name' => $validated['shcool_name'],
                'graduation_year' => $validated['graduation_year'],
                'address' => $validated['address']
            ]);



            if($request->hasFile('family_card')){
                $fotoPath = $request->file('family_card')->store('family_cards', 'public');
                $validated['family_card'] = $fotoPath;
            }

            if($request->hasFile('pip_card')){
                $fotoPath = $request->file('pip_card')->store('pip_cards', 'public');
                $validated['pip_card'] = $fotoPath;
            }

            if($request->hasFile('birth_certificate')){
                $fotoPath = $request->file('birth_certificate')->store('birth_certificates', 'public');
                $validated['birth_certificate'] = $fotoPath;
            }

            if($request->hasFile('school_certificate')){
                $fotoPath = $request->file('school_certificate')->store('school_certificates', 'public');
                $validated['school_certificate'] = $fotoPath;
            }
            // attactment atau lampiran
            Attachment::create([
                'student_id' => $student->id,
                'family_card' => $validated['family_card'],
                'pip_card' => $validated['pip_card'] ?? null,
                'birth_certificate' => $validated['birth_certificate'],
                'school_certificate' => $validated['school_certificate'],

            ]);
          
            DB::commit();
            return redirect()->route('student.ppdb.index')->with('SuccessUpdate', 'Data Berhasil Diperbarui');

        } catch (Exception $exeption) {

            DB::rollBack();
            Log::error('Error during registration: ' . $exeption->getMessage(), $exeption->getTrace());

            return redirect()->route('student.ppdb.index')->with('FailedUpdate', $exeption->getMessage());

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }



    public function editCustodian(Student $student){

        $title = "PPDB";


        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $custodian = Custodian::where('student_id',$student->id)->first();

        return view('student.wali.updateWali', compact('custodian', 'title'));
    }
    public function updateCustodian(UpdateCustodianRequest $request, Custodian $custodian){

        DB::beginTransaction();
        $validated = $request->validated();

          try {

            $custodian->update($validated);

            DB::commit();

            return redirect()->route('student.ppdb.index')->with('successPPDB', 'Berhasil Mengubah Wali Murid');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('student.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }
    }

    public function editStudent(Student $student){

        $title = "PPDB";


        return view('student.siswa.updateSiswa', compact('student','title'));
    }

    public function updateStudent(UpdateStudentRequest $request, Student $student){

        DB::beginTransaction();
        $validated = $request->validated();

         try {

            if($request->hasFile('student_photo')){

                if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }

                $fotoPath = $request->file('student_photo')->store('student_photos', 'public');
                $validated['student_photo'] = $fotoPath;
            }


            $user = User::find($student->user_id);

            $user->name = $validated['fullname'];
            $user->save();
         
            
            $student->update($validated);

            DB::commit();
            return redirect()->route('student.ppdb.index')->with('successPPDB', 'Berhasil merubah data murid');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('student.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }

    }


    public function editParent(Student $student){

        $parent = StudentParent::where('student_id', $student->id)->first();
        $title = "PPDB";


        return view('student.orangTua.updateOrangTua', compact('parent','title'));

    }

    public function updateParent(UpdateParentRequest $request, StudentParent $parent){

         DB::beginTransaction();
            $validated = $request->validated();

         try {

            $parent->update($validated);

            DB::commit();
            
            return redirect()->route('student.ppdb.index')->with('successPPDB', 'Berhasil merubah orang tua murid');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('student.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }

    }


    public function editSchool(Student $student){

        $title = "PPDB";


        $school = PreviousShcool::where('student_id', $student->id)->first();

        return view('student.asalSekolah.updateAsalSekolah', compact('school','title'));
    }

    public function updateSchool(UpdateSchoolRequest $request,PreviousShcool $school){

         DB::beginTransaction();
            $validated = $request->validated();

         try {

            $school->update($validated);

            DB::commit();
            
            return redirect()->route('student.ppdb.index')->with('successPPDB', 'Berhasil mengubah asal sekolah');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('student.ppdb.index')->with('FailedPPDB', $exeption->getMessage());
        }

    }


}
