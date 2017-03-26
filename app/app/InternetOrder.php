<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternetOrder extends Model
{
    protected $fillable = [
        'first_name',
        'surname',
        'cell',
        'email',
        'tel',
        'fax',
        'company_name',
        'company_reg',
        'company_vat',
        'physical_address_line_1',
        'physical_address_line_2',
        'physical_address_city',
        'physical_address_province',
        'physical_address_postal_code',
        'postal_address_line_1',
        'postal_address_line_2',
        'postal_address_city',
        'postal_address_province',
        'postal_address_postal_code',
        'billing_address_line_1',
        'billing_address_line_2',
        'billing_address_city',
        'billing_address_province',
        'billing_address_postal_code',
        'bank_name',
        'bank_branch_name',
        'bank_branch_code',
        'bank_acc_number',
        'bank_acc_type',
        'terms_agreed',
    ];

    public function products()
    {
        return $this->hasMany('\App\InternetOrderProduct');
    }
}
