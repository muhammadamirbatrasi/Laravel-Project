<?php

namespace App\Services;

use App\Models\Photo;
use Illuminate\Http\UploadedFile;

class PhotoService
{
    /**
     * Store a new photo.
     *
     * @param array $data
     * @param UploadedFile|null $file
     * @return Photo|null
     */
    public function store(array $data, ?UploadedFile $file): ?Photo
    {
        if ($file) {
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path('images'), $imageName);

            return Photo::create([
                'title'      => $data['title'],
                'image_name' => $imageName,
                'job_id'     => $data['job_id'],
                'added_date' => now(),
            ]);
        }
        return null;
    }

    /**
     * Update an existing photo.
     *
     * @param Photo $photo
     * @param array $data
     * @param UploadedFile|null $file
     * @return bool
     */
    public function update(Photo $photo, array $data, ?UploadedFile $file): bool
    {
        if ($file) {
            // Delete old image if exists? (Optional, based on requirement)
            if (file_exists(public_path('images/' . $photo->image_name))) {
                @unlink(public_path('images/' . $photo->image_name));
            }

            $imageName = time() . '.' . $file->extension();
            $file->move(public_path('images'), $imageName);
            $photo->image_name = $imageName;
        }

        $photo->title = $data['title'];
        $photo->job_id = $data['job_id'];
        return $photo->save();
    }

    /**
     * Delete a photo (soft delete and file removal).
     *
     * @param Photo $photo
     * @return bool
     */
    public function delete(Photo $photo): bool
    {
        // Delete physical file
        if (file_exists(public_path('images/' . $photo->image_name))) {
            @unlink(public_path('images/' . $photo->image_name));
        }

        // Soft delete (update is_deleted = 1)
        return $photo->update([
            'is_deleted'   => 1,
            'updated_date' => now()
        ]);
    }
}
