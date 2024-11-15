<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    /**
     * Upload an image to the specified folder and return the path.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $folder
     * @return string|null The path of the uploaded image, or null on failure.
     */
    public function uploadImage($image, $folder = 'images')
    {
        if (!$image || !$image->isValid()) {
            return null;
        }
        $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs($folder, $filename, 'public');
        return $folder."/".$filename;
    }

    /**
     * Delete an existing image file from storage.
     *
     * @param string $filePath
     * @return bool
     */
    public function deleteImage($filePath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->delete($filePath);
        }
        return false;
    }
}