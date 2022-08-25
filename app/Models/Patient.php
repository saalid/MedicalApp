<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
  
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
        return $this->belongsToMany(User::class, 'patients_users');
    }
    /**
     * This function get patients
     */
    public function getPatients(){
        if($this->checkRoleUser()){
            return $this->getPatientsUser();
        }else{
            return Patient::orderBy('id','DESC')->paginate(5);
        }
        
    }

    /**
     * Check user only a doctor or not
     */
    private function checkRoleUser(){
        $roles = $this->getRolesUser();
        foreach($roles as $role){
            if($role->name  === "پزشک" && sizeof($roles) === 1){
                return true;
            }
        }
        return false;
    }

    /**
     * The get roles of user
     */
    private function getRolesUser(){
        $users = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('roles.*')
            ->where('role_user.user_id', '=', Auth::id())
            ->get();
            return $users;
    }

    /**
     * This function get Patients of user
     */
    private function getPatientsUser(){
        $patients = DB::table('patients_users')
            ->join('patients', 'patients.id', '=', 'patients_users.patient_id')
            ->select('patients.*')
            ->where('patients_users.user_id', '=', Auth::id())
            ->get();
            return $patients;
    }
}