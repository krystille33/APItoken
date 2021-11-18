<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class jobapplication
 * @package App\Models
 * @version October 27, 2021, 9:56 am UTC
 *
 * @property string $firstname
 * @property string $lastname
 * @property string $address
 * @property string $email
 * @property integer $phonenumber
 * @property string $position
 */
class jobapplication extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'jobapplication';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'address',
        'email',
        'phonenumber',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'email' => 'string',
        'phonenumber' => 'integer',
        'position' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phonenumber' => 'nullable|integer',
        'position' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
