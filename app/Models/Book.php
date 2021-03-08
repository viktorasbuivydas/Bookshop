<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cover_image_url', 'price', 'discount'
    ];
    protected $casts = [
        'price' => 'float'
    ];
    protected $perPage = 25;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function authors(){
        return $this->belongsToMany(Author::class);
    }
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function reviews(){
        return $this->hasMany(BookReview::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
    public function books(){
        return $this->hasMany(Book::class);
    }
    public function scopeIsApproved($query){
        return $query->where('is_approved', true);
    }
    public function scopeIsPending($query){
        return $query->whereNull('is_approved');
    }
    public function scopeIsRejected($query){
        return $query->where('is_approved', false);
    }
    public function getisNewAttribute(){
        return $this->created_at > now()->subWeek();
    }
    public function getCoverImagePathAttribute(){
        return '/storage/uploads/images/'.$this->cover_image_url;
    }
    public function getPriceAfterDiscountAttribute(){
        return $this->price * (1 - ($this->discount / 100));
    }

}
