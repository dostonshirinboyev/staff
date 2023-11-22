<?php

namespace settings\readModels\menu;

use settings\entities\menu\Menu;
use settings\forms\menu\search\MenuSearchForm;
use yii\data\ActiveDataProvider;

class MenuReadRepository
{
    public function search(MenuSearchForm $form): ActiveDataProvider
    {
        $query = Menu::find()->orderBy('id desc');

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'id'            => $form->id,
            'category_id'   => $form->category_id,
            'parent_id'     => $form->parent_id,
            'order'         => $form->order,
            'status'        => $form->status,
            'is_deleted'    => $form->is_deleted,
            'created_by'    => $form->created_by,
            'updated_by'    => $form->updated_by
        ]);

        $query->andFilterWhere(['ilike', 'title_ru', $form->title_ru])
            ->andFilterWhere(['ilike', 'title_uz', $form->title_uz])
            ->andFilterWhere(['ilike', 'title_oz', $form->title_oz])
            ->andFilterWhere(['ilike', 'title_en', $form->title_en])
            ->andFilterWhere(['ilike', 'code_name', $form->code_name])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $form->updated_at])
            ->andFilterWhere(['>=', 'created_at', $form->date_from ? $form->date_from . ' 00:00:00' : null])
            ->andFilterWhere(['<=', 'created_at', $form->date_to ? $form->date_to . ' 23:59:59' : null]);
        ;

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }
}