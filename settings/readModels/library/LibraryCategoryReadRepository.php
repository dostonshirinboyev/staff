<?php

namespace settings\readModels\library;

use settings\entities\library\LibraryCategory;
use settings\forms\library\search\LibraryCategorySearchForm;
use settings\helpers\LanguageHelper;
use settings\status\GeneralStatus;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class LibraryCategoryReadRepository
{
    /**
     * @param LibraryCategorySearchForm $form
     * @return ActiveDataProvider
     */
    public function search(LibraryCategorySearchForm $form): ActiveDataProvider
    {
        $query = LibraryCategory::find()->andWhere(['status' => 1])->orderBy('id desc');

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'id'            => $form->id,
            'status'        => $form->status,
            'created_by'    => $form->created_by,
            'updated_by'    => $form->updated_by,
        ]);

        $query
            ->andFilterWhere(['ilike', 'title_ru', $form->title_ru])
            ->andFilterWhere(['ilike', 'title_uz', $form->title_uz])
            ->andFilterWhere(['ilike', 'title_oz', $form->title_oz])
            ->andFilterWhere(['ilike', 'code_name', $form->code_name])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $form->updated_at])
        ;

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }

    /**
     * @return ActiveDataProvider
     */
    public function find(): ActiveDataProvider
    {
        $query = LibraryCategory::find()
            ->andWhere(["status" => GeneralStatus::STATUS_ENABLED])
            ->orderBy("order asc");

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

    }
}