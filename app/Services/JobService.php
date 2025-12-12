<?php

namespace App\Services;

use App\Models\Jobs;

class JobService
{
    /**
     * Create a new job.
     *
     * @param array $data
     * @return Jobs
     */
    public function createJob(array $data): Jobs
    {
        return Jobs::create([
            'title'        => $data['title'],
            'description'  => $data['description'] ?? null,
            'location'     => $data['location'] ?? null,
            'last_date'    => $data['last_date'] ?? null,
            'is_deleted'   => 0,
            'added_date'   => now(),
            'updated_date' => now(),
        ]);
    }
    /**
     * Update a job.
     *
     * @param Jobs $job
     * @param array $data
     * @return bool
     */
    public function updateJob(Jobs $job, array $data): bool
    {
        return $job->update([
            'title'        => $data['title'],
            'description'  => $data['description'], // This was required in validation
            'location'     => $data['location'] ?? null,
            'last_date'    => $data['last_date'] ?? null,
            'updated_date' => now(),
        ]);
    }

    /**
     * Delete a job (soft delete).
     *
     * @param Jobs $job
     * @return bool
     */
    public function deleteJob(Jobs $job): bool
    {
        return $job->update([
            'is_deleted'   => 1,
            'updated_date' => now(),
        ]);
    }
}
