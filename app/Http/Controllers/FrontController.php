<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStudentStoreRequest;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Custodian;
use App\Models\Extracurricullar;
use App\Models\News;
use App\Models\Prestasion;
use App\Models\RegistrationStatus;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{

    public function index(){

        $banners = Banner::all(['banner_image','title','subtitle']);
        // dd($banners);
        // $activities = Activity::select('photo_activity')->orderByDesc('id')->limit(8)->get();
        $activities = Activity::orderByDesc('id')->paginate(8);
        $news = News::orderByDesc('id')->limit('4')->get();
        $prestasion = Prestasion::all()->count();
        $teacher = Teacher::all()->count();
        return view('frontend.main.main', compact('banners','activities','news','prestasion','teacher'));
    }

    public function register(){
        
        $statusRegister = RegistrationStatus::orderByDesc('id')->first();
        

        return view('frontend.ppdb.index', compact('statusRegister'));
    }

    public function store(RegisterStudentStoreRequest $request){
        DB::beginTransaction();
        $validated =  $request->validated();
       
        try {
            

            
            User::create([
                'name' => $validated['fullname'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password'])
            ]);

            $user = User::where('email', $validated['email'])->first();

            Student::create([
                'user_id' => $user->id,
                'fullname' => $validated['fullname'],
                'nik' => $validated['nik'],
                'nisn' => $validated['nisn'],
                'place_of_birth' => $validated['place_of_birth'],
                'date_of_birth' => $validated['date_of_birth'],
                'gender' => $validated['gender'],
                'phone' => $validated['phone'],
                'address' => $validated['address']
            ]);

            $student = Student::where('nik', $validated['nik'])->first();

            StudentParent::create([
                'student_id' => $student->id,
                'father_name' => $validated['father_name'],
                'father_job' => $validated['father_job'],
                'mother_name' => $validated['mother_name'],
                'mother_job' => $validated['mother_job'],
                'parent_income' => $validated['parent_income'],
                'phone' => $validated['parent_phone'],
                'address' => $validated['parent_address'],
            ]);

            Custodian::create([
                'student_id' => $student->id,
                'name' => $validated['custodian_name'],
                'custodian_job' => $validated['custodian_job'],
                'custodian_income' => $validated['custodian_income'],
                'phone' => $validated['custodian_phone'],
                'address' => $validated['custodian_address'],
            ]);

            DB::commit();
            return redirect()->route('login')->with('SuccessRegister', 'Registrasi akun portal calon siswa berhasil dibuat, silahkan login');

        } catch (Exception $exeption) {

            DB::rollBack();
            Log::error('Error during registration: ' . $exeption->getMessage(), $exeption->getTrace());

            return redirect()->route('ppdb.register')->with('FailedRegister', $exeption->getMessage());

        }
        
    }

    public function teacher(){

        $teachers = Teacher::with('degrees')->orderByDesc('id')->paginate(6);

        return view('frontend.guru.index', compact('teachers'));
    }

    public function contact(){

        return view('frontend.contact.index');
    }

    public function announcement(){

        $anouncements = Announcement::orderByDesc('id')->paginate(6);

        return view('frontend.pengumuman.index', compact('anouncements'));
    }
    public function announcementDetail(Announcement $announcement){


        return view('frontend.pengumuman.detail_pengumuman', compact('announcement'));
    }

    public function news(Request $request){

        $news = News::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();
        $categories = Category::orderByDesc('id')->paginate('6')->withQueryString();
        $extracuricullars = Extracurricullar::select(['name'])->orderByDesc('id')->paginate('6');

        return view('frontend.berita.index', compact('news','categories','extracuricullars'));
    }

    public function newsDetail(News $news){


        return view('frontend.berita.newsDetail', compact('news'));
    }

    public function newsCategory(Category $category){
        
        $news = News::where('category_id', $category->id)->orderByDesc('id')->paginate(5);


        return view('frontend.berita.kategoriberita', compact('category','news'));
    }


    public function prestasi(){

        $prestasions = Prestasion::orderByDesc('id')->paginate(6);
        return view('frontend.prestasi.index', compact('prestasions'));
    }

    public function prestasiDetail(Prestasion $prestasion){

        return view('frontend.prestasi.prestasiDetail', compact('prestasion'));
    }

    public function esktrakulikuler(){

        $ekstrakulikulers = Extracurricullar::orderByDesc('id')->paginate(6);
        return view('frontend.ekstakulikuler.index', compact('ekstrakulikulers'));
    }

    public function activity(){

        $activities = Activity::orderByDesc('id')->paginate(6);
        return view('frontend.kegiatan.index', compact('activities'));
    }

    public function activityDetail(Activity $activity){
        
        return view('frontend.kegiatan.kegiatanDetail', compact('activity'));
    }
}
