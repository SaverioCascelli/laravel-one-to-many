<?php

namespace App\Models;

use Illuminate\support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model

{
    use HasFactory;

    protected $fillable = ['name', 'client_name', 'summary', 'img', 'slug', 'img_original_name', 'type_id'];

    public static function generateSlug($string)
    {
        $slug = Str::slug($string, '-');
        /*
            - salvare lo slug originale
            - controllare se esiste
            - generarne uno con in aggiunta un contataore
            -- se esiste generarne un'altro e così via fino a che se ne trova uno non esistente
        */
        $original_slug = $slug;
        $c = 1;
        $exists = Project::where('slug', $slug)->first();
        while ($exists) {
            $slug = $original_slug . '-' . $c;
            $exists = Project::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }

    public  function type()
    {
        return $this->belongsTo(Type::class);
    }
}
