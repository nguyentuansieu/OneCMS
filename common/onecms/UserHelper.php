<?php

namespace common\onecms;

class UserHelper {
    public static function isAdmin()
    {
        if (\Yii::$app->user->can('admin')) {
            return true;
        }
        return false;
    }
}