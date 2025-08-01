<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $fillable = ['name'];

    /**
     * The users that belong to the subject.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subject_user')
            ->withTimestamps();
    }
}
