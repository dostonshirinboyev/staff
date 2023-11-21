<?php

namespace settings\services\category;

use settings\entities\category\UniversityCategory;
use settings\forms\category\UniversityCategoryForm;
use settings\repositories\category\UniversityCategoryRepository;
use settings\status\category\UniversityCategoryStatus;
use Throwable;
use yii\db\StaleObjectException;

class UniversityCategoryService
{
    private $universityCategoryRepository;

    /**
     * UniversityCategoryRepository constructor.
     * @param UniversityCategoryRepository $universityCategoryRepository
     */
    public function __construct(
        UniversityCategoryRepository $universityCategoryRepository
    ){
        $this->universityCategoryRepository = $universityCategoryRepository;
    }

    /**
     * @param UniversityCategoryForm $form
     * @return UniversityCategory
     */
    public function create(UniversityCategoryForm $form): UniversityCategory
    {
        $universityCategory = UniversityCategory::create(
            $form->parent_id,
            $form->title_ru,
            $form->title_uz,
            $form->title_oz,
            $form->code_name,
            $form->order,
            $form->status
        );
        $this->universityCategoryRepository->save($universityCategory);
        return $universityCategory;
    }

    /**
     * @param $id
     * @param UniversityCategoryForm $form
     */
    public function edit($id, UniversityCategoryForm $form)
    {
        $universityCategory = $this->universityCategoryRepository->get($id);
        $universityCategory->edit(
            $form->parent_id,
            $form->title_ru,
            $form->title_uz,
            $form->title_oz,
            $form->code_name,
            $form->order,
            $form->status
        );
        $this->universityCategoryRepository->save($universityCategory);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $universityCategory = $this->universityCategoryRepository->get($id);
        $universityCategory->status = ($universityCategory->status == UniversityCategoryStatus::STATUS_INACTIVE) ? UniversityCategoryStatus::STATUS_ACTIVE : UniversityCategoryStatus::STATUS_INACTIVE;
        $this->universityCategoryRepository->save($universityCategory);
    }

    /**
     * @param $id
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $road = $this->universityCategoryRepository->get($id);
        $this->universityCategoryRepository->remove($road);
    }
}