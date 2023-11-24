<?php

namespace settings\repositories\menu;

use settings\entities\menu\Menu;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class MenuRepository
{
    /**
     * @param $id
     * @return array|Menu|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|Menu[]|ActiveRecord[]
     */
    public static function findAllForSelect(): array
    {
        $menu = 'm';
        return Menu::find()
            ->select('*')
            ->alias("{$menu}")
            ->where(["{$menu}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    public static function findParentForSelect(): array
    {
        $menu = 'm';
        return Menu::find()
            ->joinWith(['parent'])
            ->alias("{$menu}")
            ->andWhere(["{$menu}.status" => GeneralStatus::STATUS_ENABLED])
//            ->andWhere(["{$menu}.parent_id" => null])
            ->asArray()
            ->orderBy('order asc')
            ->all();
    }

    /**
     * @param $fields
     * @return array|Menu[]|ActiveRecord[]
     */
    public function fieldAll($fields): array
    {
        return Menu::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|Menu|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($menu = Menu::find()->where($condition)->limit(1)->one())) {
            return $menu;
        }
        throw new NotFoundException(Yii::t('app', 'Menu is not found!'));
    }

    /**
     * @param Menu $menu
     */
    public function save(Menu $menu)
    {
        if (!$menu->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param Menu $menu
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(Menu $menu)
    {
        if (!$menu->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}