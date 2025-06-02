<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $title = 'Berita';
        $news = News::where('user_id', $user->id)->orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();
        
        return view('admin.berita.index', compact('news', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderByDesc('id')->get();
        $title = 'Berita';
        return view('admin.berita.addNews', compact('categories','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

      
        try {

            // simpan tag p ke database 

            $wordPerParagraf = 60;
            $words = explode(' ', $validated['description']);
            $paragraphs = [];

            while (count($words) > 0) {
                $paragraph = array_splice($words, 0, $wordPerParagraf);
                $paragraphs[] = '<p>' . implode(' ', $paragraph) . '</p>';
             }
             $validated['description'] = implode('<br>', $paragraphs);

            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // siapa yang menulis berita
            $validated['user_id'] = Auth::user()->id;
            $validated['slug'] = Str::slug($validated['title']);


            News::create($validated);

            DB::commit();

            return redirect()->route('admin.news.index')->with('successNews', 'Berhasil Menambahkan Berita');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.news.index')->with('FailedNews', $exception->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::orderByDesc('id')->get();
        $title = 'Berita';
        return view('admin.berita.updateNews', compact('news','categories','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        DB::beginTransaction();
        $validated = $request->validated();

      
        try {

            // simpan tag p ke database 
            $wordPerParagraf = 40;
            $words = explode(' ', $validated['description']);
            $paragraphs = [];

            while (count($words) > 0) {
                $paragraph = array_splice($words, 0, $wordPerParagraf);
                $paragraphs[] = '<p>' . implode(' ', $paragraph) . '</p>';
             }
             $validated['description'] = implode('<br>', $paragraphs);

            if($request->hasFile('thumbnail')){

                // cek ada thumbnail lama 
                if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }

                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['user_id'] = Auth::user()->id;
            $validated['slug'] = Str::slug($validated['title']);


            $news->update($validated);

            DB::commit();

            return redirect()->route('admin.news.index')->with('successNews', 'Berhasil Mengedit Berita');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.news.index')->with('FailedNews', $exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        DB::beginTransaction();

        try {
            
            if($news->thumbnail){
                Storage::disk('public')->delete($news->thumbnail);
            }
           
            $news->delete();
            DB::commit();

            return redirect()->route('admin.news.index');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.news.index')->with('FailedNews', $exeption->getMessage());

        }
    }
}
