## API для игры

### Методы

#### Пользователи

**Регистрация** *(v 0.1)*

```
URL: ilvgame/api/singup
Method: POST
Data: {
    1) nickname [required, unique, min:3, max:15, string]
    2) email [required, email, string]
    3) password [required, min:4, string]
    4) invite_user [min:3, exists:users]
}
Return: {
    User,
    create: false | true
}
Errors: default
``` 


### Структура объектов

**User**
```json
{
    "nickname": "qqqqq",
    "email": "alex@mail.ru",
    "invite_user": "admin",
    "money": 0,
    "status": "ban | active | ...",
    "privileges": [
        "p1", "p2", "p3"
    ],
    "theme": "blackhoooole"
}
```

### Структура ошибок

**Default**

Название поля из Data: текст ошибки  
Example:
```
{
    "nickname": "Nickname field already exists",
    "password": "min length 4 charset"
}
```
