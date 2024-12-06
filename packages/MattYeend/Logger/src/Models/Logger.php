<?php

namespace MattYeend\Logger\Models;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    protected $table = 'logger';

    protected $fillable = [
        'action_id',
        'data',
        'logged_in_user_id',
        'related_to_user_id'
    ];

    public function loggedInUser(){
        return $this->belongsTo(User::class, 'logged_in_user_id');
    }

    public function relatedToUser(){
        return $this->belongsTo(User::class, 'related_to_user_id');
    }

    const ACTION_LOGIN = 1;
    const ACTION_LOGOUT = 2;
    const ACTION_CREATE_USER = 3;
    const ACTION_UPDATE_USER = 4;
    const ACTION_DELETE_USER = 5;
    const ACTION_SHOW_USER = 6;
    const ACTION_WELCOME_EMAIL_SENT = 7;
    const ACTION_CONFIRM_PASSWORD = 8;
    const ACTION_FORGOT_PASSWORD = 9;
    const ACTION_REGISTER_USER = 10;
    const ACTION_RESET_PASSWORD = 11;
    const ACTION_VERIFY_USER = 12;

    public static function log($action = 0, $data = null, $logged_in_user_id = null, $related_to_user_id = null){
        if(isset($action)){
            if(empty($logged_in_user_id)){
                $logged_in_user_id = Auth::user()->id;
            }
            if(in_array(gettype($data), ['array'])){
                $data = json_encode($data);
            }else{
                throw new \InvalidArgumentException('Data must be an array or null.');
            }

            $log = new Logger;
            $log->logged_in_user_id = $logged_in_user_id;
            $log->action_id = $action;
            $log->related_to_user_id = $related_to_user_id;
            $log->data = $data;
            $log->save();
        }
    }
}