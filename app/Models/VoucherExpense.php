<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherExpense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'voucher_header_id',
        'voucher_id',
        'expense_date',
        'expense',
        'amount',
    ];
}
