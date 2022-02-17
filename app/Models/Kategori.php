<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table= 'kategoris';
        public function image()
    {
        if ($this->banner && file_exists(public_path('image/kategori/' . $this->banner))) {
            return asset('image/kategori/' . $this->banner);
        } else {
            return asset('image/no_image.png');
        }
    }
 
    public function deleteImage()
    {
        if ($this->banner && file_exists(public_path('image/kategori/' . $this->banner))) {
            return unlink(public_path('image/kategori/' . $this->banner));
        }
    }

}
