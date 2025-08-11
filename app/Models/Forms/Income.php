<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaxReturn;

class Income extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'employer_abn' => 'array',
        'total_tax_withheld' => 'array',
        'gross_payments' => 'array',
        'income_items' => 'array',
        'allowances' => 'array',
        'fringe_benefits' => 'array',
        'reportable_super' => 'array',
        'account_holders' => 'array',
        'interest_tax_withheld' => 'array',
        'total_interest' => 'array',
        'dividend_account_holders' => 'array',
        'unfranked_amount' => 'array',
        'franked_amount' => 'array',
        'franking_credits' => 'array',
        'allowance_type' => 'array',
        'allowance_other' => 'array',
        'dividend_tax_withheld' => 'array',
        'allowance_tax_withheld' => 'array',
        'allowance_total_received' => 'array',
        'government_pensions' => 'array',
        'pension_tax_withheld' => 'array',
        'pension_total_received' => 'array',
        'etp_tax_withheld' => 'array',
        'etp_taxable_component' => 'array',
        'etp_code' => 'array',
        'etp_abn' => 'array',
        'payment_start_day' => 'array',
        'payment_start_month' => 'array',
        'payment_start_year' => 'array',
        'payment_end_day' => 'array',
        'payment_end_month' => 'array',
        'payment_end_year' => 'array',
        'tax_withheld' => 'array',
        'taxable_taxed' => 'array',
        'taxable_untaxed' => 'array',
        'tax_offset' => 'array',
        'lump_day' => 'array',
        'lump_month' => 'array',
        'lump_year' => 'array',
        'taxed_component' => 'array',
        'untaxed_component' => 'array',
        'tax_free_component' => 'array',
        'payer_abn' => 'array',
        'discount_upfront_eligible' => 'array',
        'discount_upfront_not_eligible' => 'array',
        'discount_deferral' => 'array',
        'tfn_withheld' => 'array',
        'foreign_discounts' => 'array',
        'foreign_tax_paid' => 'array',
        'foreign_income_type' => 'array',
        'foreign_income_other' => 'array',
        'deductible_expenses' => 'array',
        'gross_amount' => 'array',
        'nz_franking_credit' => 'array',
        'pension_type' => 'array',
        'gross_amount_pension' => 'array',
        'deductible_expenses_pension' => 'array',
        'undeducted_purchase_price' => 'array',
        'foreign_tax_paid_pension' => 'array',
        'employment_gross_amount' => 'array',
        'employment_income_description' => 'array',
        'foreign_income_country' => 'array',
        'foreign_income_occupation' => 'array',
        'foreign_income_gross_amount' => 'array',
        'other_income_type' => 'array',
        'other_income_amount' => 'array',
        'bal_adj_financial' => 'array',
        'bal_adj_rental' => 'array',
        'bal_adj_remaining' => 'array',
        'cgt_concession_active' => 'boolean',
        'cgt_concession_retirement' => 'boolean',
        'cgt_concession_rollover' => 'boolean',
        'psi_voluntary_agreement' => 'boolean',
        'psi_abn_not_quoted' => 'boolean',
        'psi_labour_hire' => 'boolean',
        'labour_hire' => 'boolean',
        'credit_paid_by_trustee' => 'boolean',
    ];

    public function taxReturn()
    {
        return $this->belongsTo(TaxReturn::class);
    }
}
