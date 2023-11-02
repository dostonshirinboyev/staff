<?php

namespace settings\readModels\library;

use settings\entities\library\LibraryFile;
use settings\forms\library\search\LibraryFileSearchForm;
use settings\status\GeneralStatus;
use yii\data\ActiveDataProvider;

class LibraryFileReadRepository
{
    public function search(LibraryFileSearchForm $form): ActiveDataProvider
    {
        $query = LibraryFile::find()->andWhere(['status' => 1])->orderBy('id desc');

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'id'                => $form->id,
            'hemis_id_number'   => $form->hemis_id_number,
            'hemis_id'          => $form->hemis_id,
            'category_id'       => $form->category_id,
            'user_id'           => $form->user_id,
            'status'            => $form->status,
            'updated_by'        => $form->updated_by,
            'created_by'        => $form->created_by,
        ]);

        $query
            ->andFilterWhere(['ilike', 'title_ru', $form->title_ru])
            ->andFilterWhere(['ilike', 'title_uz', $form->title_uz])
            ->andFilterWhere(['ilike', 'title_oz', $form->title_oz])
            ->andFilterWhere(['ilike', 'file', $form->file])
            ->andFilterWhere(['ilike', 'updated_at', $form->updated_at])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
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
        $query = LibraryFile::find()
            ->andWhere(["status" => GeneralStatus::STATUS_ENABLED])
            ->orderBy("id desc");

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

    }
}