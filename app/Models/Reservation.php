<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Reservation extends Model
{
    use HasFactory;
	protected $with = ['user', 'event'];
	
	// Use booking table
	protected $table = 'bookings';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
	 
    protected $fillable = [
        'user_id',
        'event_id',
        'seats'
    ];
	
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
	
    public function event(): BelongsTo
    {
        return $this->BelongsTo(Event::class);
    }
	
    public function delete(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
