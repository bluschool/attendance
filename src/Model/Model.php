

<?php namespace Bluschool\Courses\Model;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'id',
        'courseName',
        'code',
        'sectionName',
        'created_at',
        'updated_at'
    ];
?>