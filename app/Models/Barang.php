<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
     public function image()
    {
        if ($this->cover && file_exists(public_path('image/barang/' . $this->cover))) {
            return asset('image/barang/' . $this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }
 
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('image/barang/' . $this->cover))) {
            return unlink(public_path('image/barang/' . $this->cover));
        }
    }

    public function pesanan_detail()
    {
        return $this->hasMany('App\Models\PesananDetail', 'barang_id','id');
    }
}
