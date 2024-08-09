<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'id',
        'title',
        'author_id',
        'publishing_company_id',
        'category_id',
        'price',
        'tag',
        'publish_date',
        'quantity',
        'thumbnail',
        'synopsis',
    ];
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function publishing_company()
    {
        return $this->belongsTo(PublishingCompany::class, 'publishing_company_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
