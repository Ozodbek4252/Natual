<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Lang;
use App\ViewModels\Banner\BannerViewModel;
use App\ViewModels\Banner\IndexBannerViewModel;
use App\ViewModels\PaginationViewModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $page
     * @param int $limit
     * @return \Illuminate\Http\Response
     */
    public function index(int $page = 1, int $limit = 15)
    {
        $query = Banner::with('translations.lang')->orderBy('updated_at', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $banners = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($banners, IndexBannerViewModel::class))->toView('dashboard.banners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::where('is_published', true)->get();
        return view('dashboard.banners.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        try {
            DB::beginTransaction();

            // Store the image in a directory: 'public/banners/'
            $generatedName = 'banners-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('banners', $generatedName, 'public');

            $service = Banner::create([
                'image' => $imagePath,
                'link' => $request->input('link'),
                'is_published' => $request->input('is_published') == 'on' ? true : false,
            ]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $service->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'title',
                    'content' => $request->input('title_' . $lang->code),
                ]);

                $service->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'description',
                    'content' => $request->input('description_' . $lang->code),
                ]);

                $service->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'button',
                    'content' => $request->input('button_' . $lang->code),
                ]);
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('banners.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error. Can\'t store',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $langs = Lang::where('is_published', true)->get();

        $banner =  Banner::with('translations.lang')->find($banner->id);
        $banner = new BannerViewModel($banner);
        return view('dashboard.banners.edit', compact('langs', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        try {
            DB::beginTransaction();

            $imagePath = $banner->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $banner->image)) {
                    Storage::delete('/public/' . $banner->image);
                }
                // Store the image in a directory: 'public/banners/'
                $generatedName = 'banners-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('banners', $generatedName, 'public');
            }

            $banner->update([
                'image' => $imagePath,
                'link' => $request->input('link'),
                'is_published' => $request->input('is_published') == 'on' ? true : false,
            ]);
            $banner->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $banner->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'title',
                    ],
                    [
                        'content' => $request->input('title_' . $lang->code),
                    ]
                );
                $banner->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'description',
                    ],
                    [
                        'content' => $request->input('description_' . $lang->code),
                    ]
                );
                $banner->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'button',
                    ],
                    [
                        'content' => $request->input('button_' . $lang->code),
                    ]
                );
            }

            toastr('Updated successfully');

            DB::commit();
            return redirect()->route('banners.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error. Can\'t update',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $banner->image)) {
                Storage::delete('/public/' . $banner->image);
            }

            // delete banner's translations
            $banner->translations()->delete();
            $banner->delete();

            toastr('Deleted successfully');

            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error. Can\'t delete',
            ]);
        }
    }
}
