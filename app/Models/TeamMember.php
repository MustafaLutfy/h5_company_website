<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class TeamMember extends Model  
{  
    use HasFactory;  

    /**  
     * The attributes that are mass assignable.  
     *  
     * @var array  
     */  
    protected $fillable = [  
        'name_en', // English name  
        'name_ar', // Arabic name  
        'role_en', // English role  
        'role_ar', // Arabic role  
        'description_en', // English description  
        'description_ar', // Arabic description  
        'image', // Image path  
    ];  

    /**  
     * The attributes that should be cast to native types.  
     *  
     * @var array  
     */  
    protected $casts = [  
        'created_at' => 'datetime',  
        'updated_at' => 'datetime',  
    ];  

    /**  
     * Get the name based on the current locale.  
     *  
     * @return string  
     */  
    public function getNameAttribute()  
    {  
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;  
    }  

    /**  
     * Get the role based on the current locale.  
     *  
     * @return string  
     */  
    public function getRoleAttribute()  
    {  
        return app()->getLocale() == 'ar' ? $this->role_ar : $this->role_en;  
    }  

    /**  
     * Get the description based on the current locale.  
     *  
     * @return string  
     */  
    public function getDescriptionAttribute()  
    {  
        return app()->getLocale() == 'ar' ? $this->description_ar : $this->description_en;  
    }  
}  