<?php

namespace settings\services\enum;

use settings\entities\enums\EnumMenuCategory;
use settings\forms\enum\EnumMenuCategoryForm;
use settings\helpers\DeleteHelper;
use settings\repositories\enum\EnumMenuCategoryRepository;
use settings\status\enum\EnumMenuCategoryStatus;
use Throwable;
use yii\db\StaleObjectException;

class EnumMenuCategoryService
{
    private $enumMenuCategoryRepository;

    /**
     * EnumMenuCategoryRepository constructor.
     * @param EnumMenuCategoryRepository $enumMenuCategoryRepository
     */
    public function __construct(
        EnumMenuCategoryRepository $enumMenuCategoryRepository
    ){
        $this->enumMenuCategoryRepository = $enumMenuCategoryRepository;
    }

    /**
     * @param EnumMenuCategoryForm $form
     * @return EnumMenuCategory
     */
    public function create(EnumMenuCategoryForm $form): EnumMenuCategory
    {
        $enumMenuCategory = EnumMenuCategory::create(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->title_en,
            $form->code_name,
            $form->status
        );
        $this->enumMenuCategoryRepository->save($enumMenuCategory);
        return $enumMenuCategory;
    }

    /**
     * @param $id
     * @param EnumMenuCategoryForm $form
     */
    public function edit($id, EnumMenuCategoryForm $form)
    {
        $menu = $this->enumMenuCategoryRepository->get($id);
        $menu->edit(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->title_en,
            $form->code_name,
            $form->status
        );
        $this->enumMenuCategoryRepository->save($menu);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $enumMenuCategory = $this->enumMenuCategoryRepository->get($id);
        $enumMenuCategory->status = ($enumMenuCategory->status == EnumMenuCategoryStatus::STATUS_INACTIVE) ? EnumMenuCategoryStatus::STATUS_ACTIVE : EnumMenuCategoryStatus::STATUS_INACTIVE;
        $this->enumMenuCategoryRepository->save($enumMenuCategory);
    }

    /**
     * @param $id
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $enumMenuCategory = $this->enumMenuCategoryRepository->get($id);
        $enumMenuCategory->is_deleted = DeleteHelper::DELETE_YES;
        $this->enumMenuCategoryRepository->save($enumMenuCategory);
    }
}