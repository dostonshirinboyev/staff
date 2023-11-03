<?php

namespace settings\services\library;

use settings\entities\library\LibraryFile;
use settings\forms\library\LibraryFileForm;
use settings\repositories\library\LibraryFileRepository;

class LibraryFileService
{
    private $libraryFileRepository;

    /**
     * LibraryFileService constructor.
     * @param LibraryFileRepository $libraryFileRepository
     */
    public function __construct(
        LibraryFileRepository $libraryFileRepository
    ){
        $this->libraryFileRepository = $libraryFileRepository;
    }

    /**
     * @param LibraryFileForm $form
     * @return LibraryFile
     */
    public function create(LibraryFileForm $form): LibraryFile
    {
        $libraryFile = LibraryFile::create(
            $form->hemis_id_number,
            $form->hemis_id,
            $form->category_id,
            $form->user_id,
            $form->title_ru,
            $form->title_uz,
            $form->title_oz,
            $form->file,
            $form->status
        );
        $this->libraryFileRepository->save($libraryFile);
        return $libraryFile;
    }

    /**
     * @param $id
     * @param LibraryFileForm $form
     */
    public function edit($id, LibraryFileForm $form)
    {
        $libraryFile = $this->libraryFileRepository->get($id);
        $libraryFile->edit(
            $form->hemis_id_number,
            $form->hemis_id,
            $form->category_id,
            $form->user_id,
            $form->title_ru,
            $form->title_uz,
            $form->title_oz,
            $form->file,
            $form->status
        );
        $this->libraryFileRepository->save($libraryFile);
    }
}