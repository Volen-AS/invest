<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $second_name
 * @property string|null $phone_number
 * @property string|null $reserve_phone_number
 * @property string|null $reserve_mail
 * @property string|null $skype
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereReserveMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereReservePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'second_name', 'phone_number', 'reserve_phone_number', 'reserve_mail', 'skype'];

	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

