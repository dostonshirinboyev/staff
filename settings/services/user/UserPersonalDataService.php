<?php


namespace settings\services\user;


use settings\repositories\user\UserPersonalDataRepository;

class UserPersonalDataService
{
    private $userPersonalData;

    /**
     * EnumRoadPositionService constructor.
     * @param UserPersonalDataRepository $userPersonalData
     */
    public function __construct(
        UserPersonalDataRepository $userPersonalData
    ){
        $this->userPersonalData = $userPersonalData;
    }
}