<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecurringTransfer extends Model
{
    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'frequency' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Wallet>
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'source_id');
    }

    /**
     * @return BelongsTo<Wallet>
     */
    public function target(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'target_id');
    }
}
