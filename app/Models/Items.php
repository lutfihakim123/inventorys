<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_name',
        'unit',
        'stock',
        'price',
        'image'
    ];

    function image()
    {
        if ($this->image && file_exists(public_path('images/items/' . $this->image)))
            return asset('images/items/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/items/' . $this->image)))
            return unlink(public_path('images/items/' . $this->image));
    }
}