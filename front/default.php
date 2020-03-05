<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #wrapper {
            height: 100vh;
        }

        .form-container {
            border: 1px solid #eeeeee;
            width: 260px;
            border-radius: 10px;
            padding: 10px;
        }

    </style>
    <title>BQB</title>
</head>
<body>
<div id="wrapper" class="d-flex align-items-center justify-content-center">
    <div class="container form-container">
        <form method="post" action="http://localhost:8080">
            <label> D1:
                <input name="D1"  value="2" />
            </label>
            <label> D2:
                <input name="D2" value="06.11.2019" />
            </label>
            <label> D3:
                <input name="D3" value="1052" />
            </label>
            <label> D4:
                <input name="D4" value="6.81" />
            </label>
            <label> D5:
                <input name="D5" value="14" />
            </label>
            <button  type="submit" >Создать и скачать</button>
        </form>
    </div>
</div>

</body>
</html>