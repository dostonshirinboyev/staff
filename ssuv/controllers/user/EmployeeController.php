<?php

namespace ssuv\controllers\user;

use settings\readModels\library\LibraryCategoryReadRepository;
use settings\readModels\user\EmployeeReadRepository;
use settings\repositories\library\LibraryCategoryRepository;
use Yii;
use yii\web\Controller;

class EmployeeController extends Controller
{
    private $employeeReadRepository;
    private $libraryCategoryRepository;
    private $libraryCategoryReadRepository;

    public function __construct(
        $id,
        $module,
        EmployeeReadRepository     $employeeReadRepository,
        LibraryCategoryRepository  $libraryCategoryRepository,
        LibraryCategoryReadRepository  $libraryCategoryReadRepository,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->employeeReadRepository     = $employeeReadRepository;
        $this->libraryCategoryRepository  = $libraryCategoryRepository;
        $this->libraryCategoryReadRepository  = $libraryCategoryReadRepository;
    }

    public function actionLists()
    {
        $provider = $this->employeeReadRepository->search();
        return $this->render('lists', [
            'dataProvider' => $provider,
        ]);
    }

    /**
     * @return string
     */
    public function actionList(): string
    {
        $model = $this->employeeReadRepository->search(Yii::$app->request->get('id'));
        return $this->render('list', [
            'model'                      => $model,
            'library_category_provider'  => $this->libraryCategoryReadRepository->find()
        ]);
    }
}