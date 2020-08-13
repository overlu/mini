<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini</title>
    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        body {
            display: table;
        }

        .content {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            font-size: 24px;
            font-family: "Agency FB", serif;
        }
    </style>
</head>
<body>
<div class="content">{!! $value ?? 'Hello Mini' !!}</div>
</body>
</html>