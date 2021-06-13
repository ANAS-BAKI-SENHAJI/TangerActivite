<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Reservation extends Model
    {
        use SoftDeletes;

        protected $fillable = [
            'activity_id', 'user_id', 'reservation_date', 'reservation_time' 
        ];

        // public function user()
        // {
        //     return $this->belongsTo(User::class, 'user_id');
        // }
        public function user(){
            return $this->belongsTo(User::class, 'user_id');
        }
        public function activity()
        {
            return $this->belongsTo(Activity::class, 'activity_id');
        }

    }
