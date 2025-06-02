<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Banner";
        $banners = Banner::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();

        return view('admin.banner.index', compact('banners', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Banner";

        return view('admin.banner.addBanner', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('banner_image')){
                $bannerPath = $request->file('banner_image')->store('banner', 'public');
                $validated['banner_image'] = $bannerPath;
            }

            Banner::create($validated);

            DB::commit();

            return redirect()->route('admin.banner.index')->with('successBanner', 'Berhasil Menambahkan Banner');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.banner.index')->with('FailedBanner', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $title = "Banner";

        return view('admin.banner.editBanner', compact('banner','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('banner_image')){

                if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }
                
               
                    $bannerPath = $request->file('banner_image')->store('banner', 'public');
                    $validated['banner_image'] = $bannerPath;
                
            }

            $banner->update($validated);

            DB::commit();

            return redirect()->route('admin.banner.index')->with('successBanner', 'Berhasil Mengubah Banner');

        } catch (Exception $exeption) {
            DB::rollBack();
            return redirect()->route('admin.banner.index')->with('FailedBanner', $exeption->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        DB::beginTransaction();

        try {
            
            if($banner->banner_image){
                Storage::disk('public')->delete($banner->banner_image);
            }
           
            $banner->delete();
            DB::commit();

            return redirect()->route('admin.banner.index');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.banner.index')->with('FailedTeacher', $exeption->getMessage());

        }
    }
}
