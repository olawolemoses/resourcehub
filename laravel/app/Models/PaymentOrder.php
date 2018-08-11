<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Payment
 * 
 * @property int $id
 * @property int $order_id
 * @property string $order_transaction
 * @property int $transaction_status
 * @property \Carbon\Carbon $payment_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class PaymentOrder extends Eloquent
{
    protected $table = 'payment_order';
    
}