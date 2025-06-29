<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\News;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index(){

        $title = "dashboard";

        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        
        
        $admins = User::where('role', 'admin')->count();
        $students = User::where('role', '!=', 'admin')->count();
        $teacher = Teacher::all()->count();
        $news = News::orderByDesc('id')->limit(3)->get();
        $announcememnts = Announcement::orderByDesc('id')->limit(3)->get();



        return view('admin.dashboard.index', compact('title', 'admins','student','students','teacher','news','announcememnts'));
    }

}
