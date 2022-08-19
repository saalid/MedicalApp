<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Patient extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'national_code',
        'age',
        'height',
        'weight',
        'blood_type',
    ];

    /**
     * The users that belong to the patient.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}