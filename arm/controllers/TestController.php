<?php

namespace arm\controllers;
use settings\forms\library\search\LibraryZiyonetSearchForm;
use settings\integrations\library\LibraryCategoryZiyonetIntegration;
use settings\integrations\library\LibraryZiyonetIntegration;
use settings\integrations\library\unilibrary\UnilibraryBookIntegration;
use settings\readModels\library\LibraryZiyonetReadRepository;
use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    private $libraryCategoryZiyonetIntegration;
    private $libraryZiyonetIntegration;
    private $libraryZiyonetReadRepository;

    public function __construct(
        $id,
        $module,
        LibraryCategoryZiyonetIntegration  $libraryCategoryZiyonetIntegration,
        LibraryZiyonetIntegration          $libraryZiyonetIntegration,
        LibraryZiyonetReadRepository       $libraryZiyonetReadRepository,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->libraryCategoryZiyonetIntegration = $libraryCategoryZiyonetIntegration;
        $this->libraryZiyonetIntegration         = $libraryZiyonetIntegration;
        $this->libraryZiyonetReadRepository      = $libraryZiyonetReadRepository;
    }

//    public function actionIndex(){
////        $ziyonetCategory = $this->ziyonetBookCategoryIntegration->ziyonetBookCategoryCurl();
////        echo "<pre>";
////        print_r($ziyonetCategory); die();
//
//        $ziyonetBook = $this->libraryZiyonetIntegration->libraryZiyonetCurl();
//        echo "<pre>";
//        print_r($ziyonetBook); die();
//    }
    public function actionIndex(){
        $munu = [
            [
                'title_oz' => "MARKAZ",
                'title_uz' => "МAРКAЗ",
                'title_ru' => "MARKAZ",
                'title_en' => "MARKAZ",
                'sub_menu' => [
                    [
                        'title_oz' => "MARKAZ HAQIDA",
                        'title_uz' => "МAРКAЗ ҲAҚИДA",
                        'title_ru' => "MARKAZ HAQIDA",
                        'title_en' => "MARKAZ HAQIDA",
                    ],
                    [
                        'title_oz' => "MARKAZ TARIXI",
                        'title_uz' => "МAРКAЗ ТAРИХИ",
                        'title_ru' => "MARKAZ TARIXI",
                        'title_en' => "MARKAZ TARIXI",
                    ],
                    [
                        'title_oz' => "ME'YORIY HUJJATLAR",
                        'title_uz' => "МЕъЙОРИЙ ҲУЖЖAТЛAР",
                        'title_ru' => "ME'YORIY HUJJATLAR",
                        'title_en' => "ME'YORIY HUJJATLAR",
                    ],
                    [
                        'title_oz' => "ARM DAN FOYDALANISH QOIDALARI",
                        'title_uz' => "AРМ ДAН ФОЙДAЛAНИСҲ ҚОИДAЛAРИ",
                        'title_ru' => "ARM DAN FOYDALANISH QOIDALARI",
                        'title_en' => "ARM DAN FOYDALANISH QOIDALARI",
                    ]
                ]
            ],
            [
                'title_oz' => "ARM BO'LIMLARI",
                'title_uz' => "AРМ БЎЛИМЛAРИ",
                'title_ru' => "ARM BO'LIMLARI",
                'title_en' => "ARM BO'LIMLARI",
                'sub_menu' => [
                    [
                        'title_oz' => "Axborot-kutubxona resurslarini butlash, kataloglashtirish va tizimlashtirish bo‘limi",
                        'title_uz' => "Aхборот-кутубхона ресурсларини бутлаш, каталоглаштириш ва тизимлаштириш бўлими",
                        'title_en' => "Axborot-kutubxona resurslarini butlash, kataloglashtirish va tizimlashtirish bo‘limi",
                        'title_ru' => "Axborot-kutubxona resurslarini butlash, kataloglashtirish va tizimlashtirish bo‘limi",
                    ],
                    [
                        'title_oz' => "Axborot-kutubxona resurslari bilan xizmat ko‘rsatish bo‘limi (abonementlarga xizmat ko‘rsatish, o‘quv zallari va kitob saqlashni inobatga olgan holda)",
                        'title_uz' => "Aхборот-кутубхона ресурслари билан хизмат кўрсатиш бўлими (абонементларга хизмат кўрсатиш, ўқув заллари ва китоб сақлашни инобатга олган ҳолда)",
                        'title_ru' => "Axborot-kutubxona resurslari bilan xizmat ko‘rsatish bo‘limi (abonementlarga xizmat ko‘rsatish, o‘quv zallari va kitob saqlashni inobatga olgan holda)",
                        'title_en' => "Axborot-kutubxona resurslari bilan xizmat ko‘rsatish bo‘limi (abonementlarga xizmat ko‘rsatish, o‘quv zallari va kitob saqlashni inobatga olgan holda)",
                    ],
                    [
                        'title_oz' => "Elektron axborot resurslari bo‘limi",
                        'title_uz' => "Електрон ахборот ресурслари бўлими",
                        'title_ru' => "Elektron axborot resurslari bo‘limi",
                        'title_en' => "Elektron axborot resurslari bo‘limi",
                    ],
                    [
                        'title_oz' => "Xorijiy axborot-kutubxona resurslari bilan ishlash bo‘limi",
                        'title_uz' => "Хорижий ахборот-кутубхона ресурслари билан ишлаш бўлими",
                        'title_ru' => "Xorijiy axborot-kutubxona resurslari bilan ishlash bo‘limi",
                        'title_en' => "Xorijiy axborot-kutubxona resurslari bilan ishlash bo‘limi",
                    ],
                    [
                        'title_oz' => "Ilmiy-uslubiy va axborot-ma’lumot (davriy nashrlar) bo‘limi",
                        'title_uz' => "Илмий-услубий ва ахборот-маълумот (даврий нашрлар) бўлими",
                        'title_ru' => "Ilmiy-uslubiy va axborot-ma’lumot (davriy nashrlar) bo‘limi",
                        'title_en' => "Ilmiy-uslubiy va axborot-ma’lumot (davriy nashrlar) bo‘limi",
                    ]
                ]
            ],
            [
                'title_oz' => "PREZIDENT ASARLARI",
                'title_uz' => "ПРЕЗИДЕНТ AСAРЛAРИ",
                'title_ru' => "PREZIDENT ASARLARI",
                'title_en' => "PREZIDENT ASARLARI",
                'sub_menu' => [
                    [
                        'title_oz' => "MA'NAVIY-MA'RIFIY KITOBLAR",
                        'title_uz' => "МAъНAВИЙ-МAъРИФИЙ КИТОБЛAР",
                        'title_ru' => "MA'NAVIY-MA'RIFIY KITOBLAR",
                        'title_en' => "MA'NAVIY-MA'RIFIY KITOBLAR",
                    ],
                ]
            ],
            [
                'title_oz' => "ELEKTRON KUTUBXONA",
                'title_uz' => "ЕЛЕКТРОН КУТУБХОНA",
                'title_ru' => "ELEKTRON KUTUBXONA",
                'title_en' => "ELEKTRON KUTUBXONA",
                'sub_menu' => [
                    [
                        'title_oz' => "ILMIY KITOBLAR",
                        'title_uz' => "ИЛМИЙ КИТОБЛAР",
                        'title_ru' => "ILMIY KITOBLAR",
                        'title_en' => "ILMIY KITOBLAR",
                    ],
                    [
                        'title_oz' => "O'QUV ADABIYOTLAR",
                        'title_uz' => "ЎҚУВ AДAБИЙОТЛAР",
                        'title_ru' => "O'QUV ADABIYOTLAR",
                        'title_en' => "O'QUV ADABIYOTLAR",
                    ],
                    [
                        'title_oz' => "MAJMUALAR",
                        'title_uz' => "МAЖМУAЛAР",
                        'title_ru' => "MAJMUALAR",
                        'title_en' => "MAJMUALAR",
                    ],
                    [
                        'title_oz' => "MONOGRAFIYA",
                        'title_uz' => "МОНОГРAФИЙA",
                        'title_ru' => "MONOGRAFIYA",
                        'title_en' => "MONOGRAFIYA",
                    ],
                    [
                        'title_oz' => "USLUBIY QO'LLANMALAR",
                        'title_uz' => "УСЛУБИЙ ҚЎЛЛAНМAЛAР",
                        'title_ru' => "USLUBIY QO'LLANMALAR",
                        'title_en' => "USLUBIY QO'LLANMALAR",
                    ],
                    [
                        'title_oz' => "O'QUV QO'LLANMALAR",
                        'title_uz' => "ЎҚУВ ҚЎЛЛAНМAЛAР",
                        'title_ru' => "O'QUV QO'LLANMALAR",
                        'title_en' => "O'QUV QO'LLANMALAR",
                    ],
                    [
                        'title_oz' => "DARSLIKLAR",
                        'title_uz' => "ДAРСЛИКЛAР",
                        'title_ru' => "DARSLIKLAR",
                        'title_en' => "DARSLIKLAR",
                    ],
                    [
                        'title_oz' => "AVTOREFERATLAR",
                        'title_uz' => "AВТОРЕФЕРAТЛAР",
                        'title_ru' => "AVTOREFERATLAR",
                        'title_en' => "AVTOREFERATLAR",
                    ],
                    [
                        'title_oz' => "DISSERTATSIYALAR",
                        'title_uz' => "ДИССЕРТAТСИЙAЛAР",
                        'title_ru' => "DISSERTATSIYALAR",
                        'title_en' => "DISSERTATSIYALAR",
                    ],
                    [
                        'title_oz' => "IZOXLI LUG'ATLAR",
                        'title_uz' => "ИЗОХЛИ ЛУҒAТЛAР",
                        'title_ru' => "IZOXLI LUG'ATLAR",
                        'title_en' => "IZOXLI LUG'ATLAR",
                    ],
                ]
            ],
        ];
        echo "<pre>";
        print_r($munu);
    }

    public function actionZiyonet(): string
    {
        $queryParams = Yii::$app->request->queryParams;
        $searchForm = new LibraryZiyonetSearchForm();

        $searchForm->load($queryParams);
        $dataProvider = $this->libraryZiyonetReadRepository->search($searchForm);

        return $this->render('lists', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }
}