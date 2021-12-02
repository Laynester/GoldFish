<!DOCTYPE html>
<html>
<head>
    <title>{{ ENV('APP_NAME') }} - Nitro</title>
</head>
<body>
    <iframe src="{{ ENV('APP_URL') }}/client/html5/index.html?sso={{$sso}}" style="border:none; overflow:hidden;height:100%;width:100%;margin:0;padding:0;position:absolute;top:0;left:0;"></iframe>
<div id=app></div>
</body>
</html>
