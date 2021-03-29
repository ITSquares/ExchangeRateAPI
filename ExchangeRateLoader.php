<?php

include "IExchangeRate.php";

final class ExchangeRateLoader implements IExchangeRate{
    use ExchangeRateTrait;

    private bool $logger = true;

    public function __construct() {
        //프로그램의 시간을 서울로 잡아줍니다.
        date_default_timezone_set("Asia/Seoul");
        if ($this->logger)
            echo "[Verify] 성공적으로 ExchangeRateLoader 클래스를 연결하였습니다.";

        if (trim(self::ACCESS_KEY) === "")
            echo "[Verify] 인증키 값을 적어주셔야 합니다.";
    }

    /**
     * 현재 날짜의 데이터를 time() 함수로 호출하고 동시에 date함수로 날짜값을 문자열로 변환해준다.
     *
     * @return string
     */
    public function getSearchDate(): string{
        return (string) date("Ymd", time());
    }

    /**
     * 환율 계산을 위해 불러오는 API 주소 입니다.
     * 모든 키 값은 IExchangeRate 에서 불러오거나 수정할 수 있습니다.
     *
     * @return string
     */
    public function getVerifyURL(): string{
        return "https://www.koreaexim.go.kr/site/program/financial/exchangeJSON?authkey=" . self::ACCESS_KEY . "&searchdate=" . $this->getSearchDate() . "&data=" . self::ACCESS_DATA;
    }

    /**
     * API 주소로 접근해서 json 데이터로 변환한다.
     * 단, 접근이 거부되면 result 값이 -1로 출력된다.
     *
     * @return array
     */
    public function toJSON(): array{
        $url = file_get_contents($this->getVerifyURL());
        if ($url !== null and $url !== false) {
            return json_decode($url);
        }

        return ["result" => -1];
    }

    /**
     * API 주소 접근 거부 오류를 해석해줍니다.
     *
     * @param int $result
     * @return string
     */
    public function toErrorConvert(int $result = -1): string{
        return self::RESULT_CONVERT[$result] ?? "접근 거부됨";
    }

    /**
     * API로 받을 수 있는 모든 나라를 출력합니다.
     *
     * @return array
     */
    public function getCountries(): array{
        return self::COUNTRIES;
    }

    /**
     * 해당 나라의 돈 단위를 출력합니다.
     *
     * @param string $name
     * @return string
     */
    public function convertCountryWonFormat(string $name): string{
        return self::COUNTRY_WON_FORMAT[$name] ?? "알 수 없음";
    }
}