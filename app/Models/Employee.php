<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
// use Pest\Support\Str;

class Employee extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * Primary key menggunakan UUID.
     */
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Field yang boleh diisi.
     */
    protected $fillable = [
        'nik',
        'full_name',
        'email',
        'gender',
        'position',
        'division',
        'date_of_birth',
        'date_of_joining',
        'phone_number',
        'address',
        'employment_status',
        'salary',
    ];

    /**
     * Casting otomatis.
     */
    protected $casts = [
        'date_of_birth'   => 'date',
        'date_of_joining' => 'date',
        'salary'          => 'decimal:2',
    ];

    /**
     * Generate UUID saat create.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Enum Values (Best practice: disimpan di model)
     */
    public const GENDERS = ['Laki-laki', 'Perempuan'];
    public const POSITIONS = ['Staff', 'Admin', 'Supervisor', 'Manager', 'Intern'];
    public const DIVISIONS = ['HRD', 'Finance', 'IT', 'Marketing', 'Operation', 'GA'];
    public const EMPLOYMENT_STATUS = ['Aktif', 'Non-aktif', 'Resign', 'Cuti'];
}
