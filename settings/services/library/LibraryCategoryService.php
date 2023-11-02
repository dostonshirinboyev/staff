<?php

namespace settings\services\library;

use settings\entities\library\LibraryCategory;
use settings\forms\library\LibraryCategoryForm;
use settings\repositories\library\LibraryCategoryRepository;

class LibraryCategoryService
{
    private $libraryCategoryRepository;

    /**
     * LibraryCategoryService constructor.
     * @param LibraryCategoryRepository $libraryCategoryRepository
     */
    public function __construct(
        LibraryCategoryRepository $libraryCategoryRepository
    ){
        $this->libraryCategoryRepository = $libraryCategoryRepository;
    }

    /**
     * @param LibraryCategoryForm $form
     * @return LibraryCategory
     */
    public function create(LibraryCategoryForm $form): LibraryCategory
    {
        $libraryCategory = LibraryCategory::create(
            $form->title_ru,
            $form->title_uz,
            $form->title_oz,
            $form->code_name,
            $form->status
        );
        $this->libraryCategoryRepository->save($libraryCategory);
        return $libraryCategory;
    }

    /**
     * @param $id
     * @param LibraryCategoryForm $form
     */
    public function edit($id, LibraryCategoryForm $form)
    {
        $libraryCategory = $this->libraryCategoryRepository->get($id);
        $libraryCategory->edit(
            $form->title_ru,
            $form->title_uz,
            $form->title_oz,
            $form->code_name,
            $form->status
        );
        $this->libraryCategoryRepository->save($libraryCategory);
    }
}