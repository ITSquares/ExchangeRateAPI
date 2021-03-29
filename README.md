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
