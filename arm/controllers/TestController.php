<?php

namespace arm\controllers;
use settings\entities\menu\Menu;
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
        $menus = [
            [
                'title_oz' => "MARKAZ",
                'title_uz' => "МAРКAЗ",
                'title_ru' => "ЦЕНТР",
                'title_en' => "CENTER",
                'sub_menu' => [
                    [
                        'title_oz' => "MARKAZ HAQIDA",
                        'title_uz' => "МAРКAЗ ҲAҚИДA",
                        'title_ru' => "О ЦЕНТРЕ",
                        'title_en' => "ABOUT THE CENTER",
                    ],
                    [
                        'title_oz' => "MARKAZ TARIXI",
                        'title_uz' => "МAРКAЗ ТAРИХИ",
                        'title_ru' => "ИСТОРИЯ ЦЕНТРА",
                        'title_en' => "HISTORY OF THE CENTER",
                    ],
                    [
                        'title_oz' => "ME'YORIY HUJJATLAR",
                        'title_uz' => "МЕъЙОРИЙ ҲУЖЖAТЛAР",
                        'title_ru' => "НОРМАТИВНЫЕ ДОКУМЕНТЫ",
                        'title_en' => "REGULATORY DOCUMENTS",
                    ],
                    [
                        'title_oz' => "ARM DAN FOYDALANISH QOIDALARI",
                        'title_uz' => "AРМ ДAН ФОЙДAЛAНИСҲ ҚОИДAЛAРИ",
                        'title_ru' => "ПРАВИЛА ИСПОЛЬЗОВАНИЯ ОРУЖИЯ",
                        'title_en' => "ARM USE RULES",
                    ]
                ]
            ],
            [
                'title_oz' => "ARM BO'LIMLARI",
                'title_uz' => "AРМ БЎЛИМЛAРИ",
                'title_ru' => "АРМЕЙСКИЕ ОТДЕЛЕНИЯ",
                'title_en' => "ARMY DEPARTMENTS",
                'sub_menu' => [
                    [
                        'title_oz' => "Axborot-kutubxona resurslarini butlash, kataloglashtirish va tizimlashtirish bo‘limi",
                        'title_uz' => "Aхборот-кутубхона ресурсларини бутлаш, каталоглаштириш ва тизимлаштириш бўлими",
                        'title_ru' => "Отдел интеграции, каталогизации и систематизации информационно-библиотечных ресурсов",
                        'title_en' => "Information-library resource integration, cataloging and systematization department",
                    ],
                    [
                        'title_oz' => "Axborot-kutubxona resurslari bilan xizmat ko‘rsatish bo‘limi (abonementlarga xizmat ko‘rsatish, o‘quv zallari va kitob saqlashni inobatga olgan holda)",
                        'title_uz' => "Aхборот-кутубхона ресурслари билан хизмат кўрсатиш бўлими (абонементларга хизмат кўрсатиш, ўқув заллари ва китоб сақлашни инобатга олган ҳолда)",
                        'title_ru' => "Сервисный отдел с информационно-библиотечными ресурсами (включая подписное обслуживание, учебные кабинеты и книгохранилище)",
                        'title_en' => "Service department with information-library resources (including subscription service, study rooms and book storage)",
                    ],
                    [
                        'title_oz' => "Elektron axborot resurslari bo‘limi",
                        'title_uz' => "Електрон ахборот ресурслари бўлими",
                        'title_ru' => "Отдел электронных информационных ресурсов",
                        'title_en' => "Department of electronic information resources",
                    ],
                    [
                        'title_oz' => "Xorijiy axborot-kutubxona resurslari bilan ishlash bo‘limi",
                        'title_uz' => "Хорижий ахборот-кутубхона ресурслари билан ишлаш бўлими",
                        'title_ru' => "Отдел работы с зарубежными информационно-библиотечными ресурсами",
                        'title_en' => "Department of working with foreign information-library resources",
                    ],
                    [
                        'title_oz' => "Ilmiy-uslubiy va axborot-ma’lumot (davriy nashrlar) bo‘limi",
                        'title_uz' => "Илмий-услубий ва ахборот-маълумот (даврий нашрлар) бўлими",
                        'title_ru' => "Научно-методический и информационный (периодический) отдел",
                        'title_en' => "Scientific-methodological and informational (periodicals) department",
                    ]
                ]
            ],
            [
                'title_oz' => "PREZIDENT ASARLARI",
                'title_uz' => "ПРЕЗИДЕНТ AСAРЛAРИ",
                'title_ru' => "ТРУД ПРЕЗИДЕНТА",
                'title_en' => "WORKS OF THE PRESIDENT",
                'sub_menu' => [
                    [
                        'title_oz' => "MA'NAVIY-MA'RIFIY KITOBLAR",
                        'title_uz' => "МAъНAВИЙ-МAъРИФИЙ КИТОБЛAР",
                        'title_ru' => "ДУХОВНО-ПРОСВЕТИТЕЛЬСКИЕ КНИГИ",
                        'title_en' => "SPIRITUAL-EDUCATIONAL BOOKS",
                    ],
                ]
            ],
            [
                'title_oz' => "ELEKTRON KUTUBXONA",
                'title_uz' => "ЕЛЕКТРОН КУТУБХОНA",
                'title_ru' => "ЭЛЕКТРОННАЯ БИБЛИОТЕКА",
                'title_en' => "ELECTRONIC LIBRARY",
                'sub_menu' => [
                    [
                        'title_oz' => "ILMIY KITOBLAR",
                        'title_uz' => "ИЛМИЙ КИТОБЛAР",
                        'title_ru' => "НАУЧНЫЕ КНИГИ",
                        'title_en' => "SCIENTIFIC BOOKS",
                    ],
                    [
                        'title_oz' => "O'QUV ADABIYOTLAR",
                        'title_uz' => "ЎҚУВ AДAБИЙОТЛAР",
                        'title_ru' => "ИЗУЧЕНИЕ ЛИТЕРАТУРЫ",
                        'title_en' => "STUDY LITERATURE",
                    ],
                    [
                        'title_oz' => "MAJMUALAR",
                        'title_uz' => "МAЖМУAЛAР",
                        'title_ru' => "КОМПЛЕКСЫ",
                        'title_en' => "COMPLEXES",
                    ],
                    [
                        'title_oz' => "MONOGRAFIYA",
                        'title_uz' => "МОНОГРAФИЙA",
                        'title_ru' => "МОНОГРАФИЯ",
                        'title_en' => "MONOGRAPH",
                    ],
                    [
                        'title_oz' => "USLUBIY QO'LLANMALAR",
                        'title_uz' => "УСЛУБИЙ ҚЎЛЛAНМAЛAР",
                        'title_ru' => "МЕТОДИЧЕСКИЕ РУКОВОДСТВА",
                        'title_en' => "METHODOLOGICAL GUIDELINES",
                    ],
                    [
                        'title_oz' => "O'QUV QO'LLANMALAR",
                        'title_uz' => "ЎҚУВ ҚЎЛЛAНМAЛAР",
                        'title_ru' => "УЧЕБНЫЕ РУКОВОДСТВА",
                        'title_en' => "STUDY GUIDES",
                    ],
                    [
                        'title_oz' => "DARSLIKLAR",
                        'title_uz' => "ДAРСЛИКЛAР",
                        'title_ru' => "УЧЕБНИКИ",
                        'title_en' => "TEXTBOOKS",
                    ],
                    [
                        'title_oz' => "AVTOREFERATLAR",
                        'title_uz' => "AВТОРЕФЕРAТЛAР",
                        'title_ru' => "АВТОРСКИЕ АННОТАЦИИ",
                        'title_en' => "AUTHOR ABSTRACTS",
                    ],
                    [
                        'title_oz' => "DISSERTATSIYALAR",
                        'title_uz' => "ДИССЕРТAТСИЙAЛAР",
                        'title_ru' => "ДИССЕРТАЦИИ",
                        'title_en' => "DISSERTATIONS",
                    ],
                    [
                        'title_oz' => "IZOXLI LUG'ATLAR",
                        'title_uz' => "ИЗОХЛИ ЛУҒAТЛAР",
                        'title_ru' => "АННОТИРОВАННЫЕ СЛОВАРИ",
                        'title_en' => "ANNOTATED DICTIONARIES",
                    ],
                ]
            ],
        ];

//        $params = array_merge(
//            require __DIR__ . '/../../common/config/params-local.php',
//        );
//        echo "<pre>";
//        print_r($params);
        echo "TEst";
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