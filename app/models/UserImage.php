<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;

/**
 * Class UserImage
 * @property User user
 */
class UserImage extends Eloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * @return string
     */
    public function imageUrl()
    {
        return sprintf('https://s3-ap-northeast-1.amazonaws.com/%s/%s/%d.jpg',
            Config::get('app.image.s3_bucket'),
            $this->user->name,
            $this->id);
    }
}
