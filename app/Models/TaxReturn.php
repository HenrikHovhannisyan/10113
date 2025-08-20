<?php

namespace App\Models;

use App\Models\Forms\Other;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forms\BasicInfoForm;
use App\Models\Forms\Income;
use App\Models\Forms\Deduction;

class TaxReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'form_status',
        'payment_status',
        'payment_reference',
    ];

    /**
     * Get the user who owns the declaration.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the form is complete.
     */
    public function isComplete(): bool
    {
        return $this->form_status === 'complete';
    }

    /**
     * Check if the declaration has been paid.
     */
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    public function basicInfos()
    {
        return $this->hasMany(BasicInfoForm::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function other()
    {
        return $this->hasMany(Other::class);
    }
}
