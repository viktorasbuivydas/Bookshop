<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Book extends Model
{
    protected $fillable = [
        'title', 'description', 'cover_image_url', 'price', 'discount'
    ];
    protected $casts = [
        'price' => 'float'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function authors(){
        return $this->belongsToMany(Author::class, 'book_authors');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genres');
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
    public function getPriceAfterDiscountAttribute(){
        return $this->price * (1 - ($this->discount / 100));
    }

}
