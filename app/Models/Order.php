<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Template;
use App\Models\GalleryPhoto;
use App\Models\Payment;
use App\Models\Rsvp;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'template_id',
        'slug',

        'nama_panggilan_laki',
        'nama_lengkap_laki',
        'ayah_laki',
        'ibu_laki',
        'foto_laki',

        'nama_panggilan_perempuan',
        'nama_lengkap_perempuan',
        'ayah_perempuan',
        'ibu_perempuan',
        'foto_perempuan',

        'hari',
        'tanggal',
        'jam_mulai',
        'jam_selesai',

        'location',
        'google_maps',

        'bank1',
        'norek_bank1',
        'atasnama_bank1',

        'bank2',
        'norek_bank2',
        'atasnama_bank2',

        'foto_cover',
        'foto_acara',
        'foto_bukutamu',
        'foto_gift',

        'music_url',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // RELATION
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function galleryPhotos()
    {
        return $this->hasMany(GalleryPhoto::class)->orderBy('sort_order');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }
}
