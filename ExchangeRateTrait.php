<?php

include "ExchangeRateLoader.php";

trait ExchangeRateTrait{

    public function getDataByCountry(string $name): array{
        $json = $this->toJSON();
        if ($json["result"] !== self::RESULT_SUCCESS) {
            return ["Error" => $this->toErrorConvert($json["result"])];
        }

        foreach ($json as $arr) {
            foreach ($arr as $key => $value) {
                if ($key !== "cur_nm")
                    continue;

                if (strpos($value, $name) !== false)
                    return $arr[$key];
            }
        }

        return ["Error" => "Not Found Country Data."];
    }

    /**
     * 나라 데이터에서 원하는 데이터를 출력합니다.
     *
     * @param string $name
     * @param string $key
     * @return int|string|null
     */
    public function getSearchKeyByCountryData(string $name, string $key) {
        $data = $this->getDataByCountry($name);
        try {
            if (isset($data["Error"])) {
                throw new ExchangeRateException($data["Error"]);
            }

            if (!isset($data[$key])) {
                throw new ExchangeRateException("Not Founded.");
            }

        } catch (ExchangeRateException $exception) {
            $ref = new ReflectionClass(ExchangeRateLoader::class);
            $logger = false;
            if ($ref->hasProperty("logger")) {
                $logger = $ref->getProperty("logger")->getValue();
            }

            if ($logger) {
                echo $exception->getMessage();
            }
        } finally {
            return $data[$key] ?? null;
        }
    }
}
