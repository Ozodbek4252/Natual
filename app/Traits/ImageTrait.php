<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Image as ImageModel;
use Image;

trait ImageTrait
{
    protected $img;
    protected $width;
    protected $height;
    protected $directory;
    protected $photo_name;
    protected $mime_type;
    protected $imagebleId;
    protected $imageableType;
    protected $extension;

    public function init($imageRequest, $directory, $imagebleId, $imageableType)
    {
        $this->directory = $directory;
        $this->imagebleId = $imagebleId;
        $this->imageableType = $imageableType;
        $this->photo_name = Str::random(20);
        $this->mime_type = $imageRequest->getMimeType();
        $this->extension = $imageRequest->getClientOriginalExtension();
        $this->createDirectory();
        $this->width = Image::make($imageRequest)->width();
        $this->height = Image::make($imageRequest)->height();
        $this->img = Image::make($imageRequest);

        // backup status
        $this->img->backup();
    }

    public function storeImage($imageRequest, $directory, $imagebleId, $imageableType): void
    {
        $this->init($imageRequest, $directory, $imagebleId, $imageableType);

        // save the original image
        $this->storeOriginalImage();

        // reset image (return to backup state)
        $this->img->reset();

        $sizes = ['thumbnail' => 200, 'medium' => 1000];

        foreach ($sizes as $type => $size) {
            // reset image (return to backup state)
            $this->img->reset();

            $this->img
                ->encode($this->extension, 80)
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
}
