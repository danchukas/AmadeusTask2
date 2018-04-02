Amadeus Task 2

Увага:
- і процесінг і хендлінг і навіть алгоритм є по суті однаковою сутністю. 
  Різниця в тому що процесінг має контролювати можливість декодування.
  А хендлінг може в майбутньому мати 2 типа - з модификацією даних(форматер) і без(вотчер).   
  Тобто хендлінг+алгоритми можна об'єднати і визивати каскадом, через інтерфейсний метод run.
  Для контроля можливості декодування в конфігу до обєктів які впливають на декодування 
  додати свойство get_decode_param.  
  Якщо саме це рішення очікувалось - можу доробити.
  Чому зробив як є зараз - так coupled між алгоритмом, хендлером і процесінгом більш low.

Комент до рішення:
- ./demo/index.php робоче рішення, яке підтримує різноманітні конфіги.
- в якості параметра не привязувався до типу string
- щодо Low coupled, highly cohesive - інструмента поки не знайшов для перевірки цього. 
  Прикріпив звіти аналізатора pdepend. 
- в термін 40-90 хвилин не вклався.


Завдання:

Создать модуль(класс или иерархию классов), который будет служить сервисом для преобразования строкового аргумента.
Его функциональность:

Реализовывать процессинг
1. Возможность захешировать и вернуть строку алгоритмом md5($arg));
2. Возможность захешировать и вернуть строку алгоритмом md5(md5($arg));
3. Возможность захешировать и вернуть строку алгоритмом sha1($arg));
4. Возможность захешировать и вернуть строку алгоритмом md5(sha1($arg)));
5. Возможность зашифровать и вернуть строку, а также параметры необходимые для дальнейшей дешифровки алгоритмом aes-256-cbc;

------
Функционировать по правилам:

1. Какой именно процессинг будет использован, должно зависеть от конфига (файл в корне проекта. Можно include config.php, чтобы не связываться с парсингом.)
2. Логгировать входные данные, выходные данные, либо оба набора данных, независимо от процессинга. (должно зависеть от конфига, можно писать в строку или буфер и никуда не сохранять)


---------------------
Это задача на дизайн кода и владение ООП, а не на знание языка и хакинг. Допускаются пустые методы и реализации. Главное дизайн.
Необходимо написать код когерентный SOLID, DRY. Low coupled, highly cohesive.

