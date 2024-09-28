<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_text',
        'answer',
        'explanation',
        'subject',
        'year',
    ];

    /**
     * Get the subject associated with the question.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Scope a query to only include questions from a specific year.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfYear($query, $year)
    {
        return $query->where('year', $year);
    }
}

