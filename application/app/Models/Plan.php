<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


    public function statusBadge($status){
        $html = '';
        if($this->status == 1){
            $html = '<span class="badge badge--success">'.trans('Active').'</span>';
        }else{
            $html = '<span class="badge badge--warning">'.trans('Inactive').'</span>';
        }

        return $html;
    }
}
