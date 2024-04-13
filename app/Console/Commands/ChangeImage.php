<?php

namespace App\Console\Commands;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\Image as ImageModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

class ChangeImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:change-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $img;
    protected $width;
    protected $height;
    protected $directory;
    protected $photo_name;
    protected $mime_type;
    protected $imagebleId;
    protected $imageableType;
    protected $extension;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Project::chunk(100, function ($projects) {
            foreach ($projects as $project) {
                $this->storeImage($project->image, 'projects', $project->id, Project::class);
            }
            foreach ($projects as $project) {
                // delete the original image
                if (Storage::exists('/public/' . $project->image)) {
                    Storage::delete('/public/' . $project->image);
                }
            }
        });

        Category::chunk(100, function ($categories) {
            foreach ($categories as $category) {
                $this->storeImage($category->image, 'categories', $category->id, Category::class);
            }
            foreach ($categories as $category) {
                // delete the original image
                if (Storage::exists('/public/' . $category->image)) {
                    Storage::delete('/public/' . $category->image);
                }
            }
        });

        Banner::chunk(100, function ($banners) {
            foreach ($banners as $banner) {
                $this->storeImage($banner->image, 'banners', $banner->id, Banner::class);
            }
            foreach ($banners as $banner) {
                // delete the original image
                if (Storage::exists('/public/' . $banner->image)) {
                    Storage::delete('/public/' . $banner->image);
                }
            }
        });
    }

    public function init($imagePath, $directory, $imagebleId, $imageableType)
    {
        $this->directory = $directory;
        $this->imagebleId = $imagebleId;
        $this->imageableType = $imageableType;
        $this->photo_name = Str::random(20);
        $this->createDirectory();

        $string = $imagePath;
        $lastDotPosition = strrpos($string, '.');

        if ($lastDotPosition !== false) {
            $substringAfterLastDot = substr($string, $lastDotPosition + 1);
            $this->extension = $substringAfterLastDot;
            $this->mime_type = $this->getImageExtension($this->mime_type);
        }

        $imagePath = storage_path('app/public/' . $imagePath);
        $this->img = Image::make($imagePath);

        $this->width = Image::make($imagePath)->width();
        $this->height = Image::make($imagePath)->height();

        // backup status
        $this->img->backup();
    }

    private function storeImage($imageOriginalPath, $directory, $imagebleId, $imageableType)
    {
        if (!Storage::exists('/public/' . $imageOriginalPath)) {
            return;
        }

        $this->init($imageOriginalPath, $directory, $imagebleId, $imageableType);

        // save the original image
        $this->storeOriginalImage();

        // reset image (return to backup state)
        $this->img->reset();

        $mediumSize = ($this->width > 1000) ? 1000 : $this->width;

        $sizes = ['thumbnail' => 200, 'medium' => $mediumSize];

        foreach ($sizes as $type => $size) {
            // reset image (return to backup state)
            $this->img->reset();

            $this->img->encode($this->extension, 80)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            // ex: app/public/users/original/yUm0504MCubkWiXNAb9D-2460.jpg
            $path = $this->directory . '/' . $type . '/' . $this->photo_name .
                '-' . $size . '.' . $this->extension;
            $this->img->save(storage_path('app/public/' . $path));

            $imagePath = Storage::path('public/' . $path);
            // Get the size of the image in bytes
            $sizeInBytes = File::size($imagePath);

            $this->createImage($path, $type, $sizeInBytes);
        }
    }

    private function storeOriginalImage()
    {
        $this->img->encode($this->extension, 50)->resize($this->width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $path = $this->directory . '/original/' . $this->photo_name . '.' . $this->extension;
        $this->img->save(storage_path('app/public/' . $path));
        $imagePath = Storage::path('public/' . $path);
        // Get the size of the image in bytes
        $sizeInBytes = File::size($imagePath);

        $this->createImage($path, 'original', $sizeInBytes);
    }

    private function createImage($path, $type, $size)
    {
        ImageModel::create([
            'path' => $path,
            'imageable_id' => $this->imagebleId,
            'imageable_type' => $this->imageableType,
            'type' => $type,
            'size' => $size,
            'mime_type' => $this->mime_type,
            'extension' => $this->extension
        ]);
    }

    private function createDirectory()
    {
        $publicDirectory = storage_path('app/public') . '/' . $this->directory;
        if (!file_exists($publicDirectory)) {
            mkdir($publicDirectory, 0700, true);
        }
        if (!file_exists($publicDirectory . '/original')) {
            mkdir($publicDirectory . '/original', 0700, true);
        }
        if (!file_exists($publicDirectory . '/medium')) {
            mkdir($publicDirectory . '/medium', 0700, true);
        }
        if (!file_exists($publicDirectory . '/thumbnail')) {
            mkdir($publicDirectory . '/thumbnail', 0700, true);
        }
    }

    private function getImageExtension($mime_type)
    {
        $extension = 'image/jpeg';
        if ($mime_type === 'png') {
            $extension = 'image/png';
        } elseif ($mime_type === 'jpg') {
            $extension = 'image/jpeg';
        } elseif ($mime_type === 'jpeg') {
            $extension = 'image/jpeg';
        } elseif ($mime_type === 'gif') {
            $extension = 'image/gif';
        } elseif ($mime_type === 'bmp') {
            $extension = 'image/bmp';
        } elseif ($mime_type === 'tiff') {
            $extension = 'image/tiff';
        } elseif ($mime_type === 'svg') {
            $extension = 'image/svg+xml';
        } elseif ($mime_type === 'webp') {
            $extension = 'image/webp';
        } elseif ($mime_type === 'ico') {
            $extension = 'image/x-icon';
        } elseif ($mime_type === 'jpe') {
            $extension = 'image/jpeg';
        } elseif ($mime_type === 'svgz') {
            $extension = 'image/svg+xml';
        } elseif ($mime_type === 'wbmp') {
            $extension = 'image/vnd.wap.wbmp';
        } elseif ($mime_type === 'xbm') {
            $extension = 'image/x-xbitmap';
        } elseif ($mime_type === 'dib') {
            $extension = 'image/bmp';
        } elseif ($mime_type === 'jfif') {
            $extension = 'image/jpeg';
        } elseif ($mime_type === 'pjpeg') {
            $extension = 'image/jpeg';
        } elseif ($mime_type === 'pjp') {
            $extension = 'image/jpeg';
        } elseif ($mime_type === 'tif') {
            $extension = 'image/tiff';
        } elseif ($mime_type === 'tiff') {
            $extension = 'image/tiff';
        } elseif ($mime_type === 'svgz') {
            $extension = 'image/svg+xml';
        } elseif ($mime_type === 'apng') {
            $extension = 'image/apng';
        } elseif ($mime_type === 'avif') {
            $extension = 'image/avif';
        } elseif ($mime_type === 'avifs') {
            $extension = 'image/avif';
        } elseif ($mime_type === 'heic') {
            $extension = 'image/heic';
        }

        return $extension;
    }
}
