# ExchangeRateAPI
> 모든 나라의 환전율을 불러옵니다.

# Contributors
> [송기호(GodVas)](https://github.com/GodVas)

# 소스 분석 
- 쉽게 클래스를 불러올 수 있습니다.
```php
include "ExchangeRateLoader.php";

$class = new ExchangeRateLoader();
```
* 만약 기록(Logger)이 활성화 되있다면 타임존 설정과 키 값 연결 등등.. 연결 부분에서 출력을 해줍니다.

- API 연결을 위한 현재 날짜를 호출할 수 있습니다.
```php
$class->getSearchDate();
```

- API 연결 주소를 설정값으로 변환 후 호출할 수 있습니다.
```php
$class->getVerifyURL();
```

- API 주소로 접근이 허용된다면 Json으로 변환 후 갑을 출력할 수도 있습니다.
```php
$class->toJson();
```

- 나라 이름으로 해당 나라의 환전율 전체 데이터를 불러올 수 있습니다.
```php
$class->getDataByCountry(string $name);
```

- 나라 이름으로 불러온 데이터에서 원하는 부분을 추출할 수 있습니다.
```php
$class->getSearchKeyByCountryData(string $name, string $key);
```

# 만들게 된 계기
> 팀 프로젝트를 진행하여 각자 역할을 나눠서 맡게 된 PHP 언어를 이용한 API 호출 메서드 제작입니다.

# 만든 소감
> 위 프로젝트를 진행하면서 소스에 조금 더 신경 쓰게 되었던 것 같습니다. 좋은 경험이였습니다.
