<?php

namespace settings\services\menu;

use settings\entities\menu\Menu;
use settings\forms\menu\MenuForm;
use settings\repositories\menu\MenuRepository;
use settings\status\menu\MenuStatus;
use Throwable;
use yii\db\StaleObjectException;

class MenuService
{
    private $menuRepository;

    /**
     * MenuRepository constructor.
     * @param MenuRepository $menuRepository
     */
    public function __construct(
        MenuRepository $menuRepository
    ){
        $this->menuRepository = $menuRepository;
    }

    /**
     * @param MenuForm $form
     * @return Menu
     */
    public function create(MenuForm $form): Menu
    {
        $menu = Menu::create(
            $form->category_id,
            $form->parent_id,
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->title_en,
            $form->code_name,
            $form->order,
            $form->status
        );
        $this->menuRepository->save($menu);
        return $menu;
    }

    /**
     * @param $id
     * @param MenuForm $form
     */
    public function edit($id, MenuForm $form)
    {
        $menu = $this->menuRepository->get($id);
        $menu->edit(
            $form->category_id,
            $form->parent_id,
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->title_en,
            $form->code_name,
            $form->order,
            $form->status
        );
        $this->menuRepository->save($menu);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $menu = $this->menuRepository->get($id);
        $menu->status = ($menu->status == MenuStatus::STATUS_INACTIVE) ? MenuStatus::STATUS_ACTIVE : MenuStatus::STATUS_INACTIVE;
        $this->menuRepository->save($menu);
    }

    /**
     * @param $id
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $menu = $this->menuRepository->get($id);
        $this->menuRepository->remove($menu);
    }
}