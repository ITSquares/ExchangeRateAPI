<?php

interface IExchangeRate{

    public const ACCESS_KEY = "";
    public const ACCESS_DATA = "AP01";

    public const KEY_RESULT = "result";
    public const RESULT_SUCCESS = 1;
    public const RESULT_DATA_ERROR = 2;
    public const RESULT_VERIFY_ERROR = 3;
    public const RESULT_CALLED_MAXIMUM = 4;
    public const RESULT_CONVERT = [
        self::RESULT_SUCCESS => "성공",
        self::RESULT_DATA_ERROR => "날짜값 오류",
        self::RESULT_VERIFY_ERROR => "인증코드 오류",
        self::RESULT_CALLED_MAXIMUM => "일일제한 최대 호출"
    ];

    public const COUNTRIES = [
        "아랍에미리트",
        "호주",
        "바레인",
        "브루니아",
        "캐나다",
        "스위스",
        "위안화",
        "덴마아크",
        "유로",
        "홍콩",
        "인도네시아",
        "일본",
        "한국",
        "쿠웨이트",
        "말레이지아",
        "노르웨이",
        "뉴질랜드",
        "사우디",
        "스웨덴",
        "싱가포르",
        "태국",
        "미국"
    ];

    public const COUNTRY_WON_FORMAT = [
        "아랍에미리트" => "디트함",
        "호주" => "달러",
        "바레인" => "디나르",
        "브루니아" => "달러",
        "캐나다" => "달러",
        "스위스" => "프랑",
        "위안화" => "위안화",
        "덴마아크" => "크로네",
        "유로" => "유로",
        "홍콩" => "달러",
        "인도네시아" => "루피아",
        "일본" => "옌",
        "한국" => "원",
        "쿠웨이트" => "디나르",
        "말레이지아" => "링기르",
        "노르웨이" => "크로네",
        "뉴질랜드" => "달러",
        "사우디" => "리얄",
        "스웨덴" => "크로나",
        "싱가포르" => "달러",
        "태국" => "바트",
        "미국" => "딜러"
    ];

    /**
     * 인터페이스를 상속받는 클래스가 사용해야될 메소드 입니다.
     * 검색할 날짜를 리턴해주는 역할 입니다.
     *
     * @return string
     */
    public function getSearchDate(): string;
}