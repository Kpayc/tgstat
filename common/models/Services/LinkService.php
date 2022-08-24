<?php

namespace common\models\Services;

use common\models\ActiveRecords\Link;
use yii\web\IdentityInterface;

class LinkService
{
    /**
     * @param IdentityInterface $user
     * @param string $url
     * @return Link
     */
    public function storeLink(IdentityInterface $user, string $url) : Link
    {
        $link = new Link();
        $link->url = $url;
        $link->user_id = $user->getId();
        $link->short_code = $this->generateShortCode();
        $link->save();

        return $link;
    }

    /**
     * Генерация случайной и уникальной строки
     * @return string
     */
    private function generateShortCode() : string
    {
        $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
        $code = substr(str_shuffle($permittedChars), 0, 5);
        if (Link::find()->byCode($code)->exists()) {
            return $this->generateShortCode();
        }
        return $code;
    }
}