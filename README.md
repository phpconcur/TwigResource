# TwigResource
Resource handling for Twig templates




## Example Template

*index.php*
```php
$loader = new Twig_Loader_Filesystem('/path/to/templates');
$twig = new Twig_Environment($loader);
$twig->addExtension ( new Concur\Resource\Twig () );
echo $twig->render('home.twig');
```

*base.twig*
```html
<!DOCTYPE html>
<html lang="en">
<head>
{% resource CSS '/css/bootstrap.min.css' %}
{% resource CSS '/css/bootstrap-theme.min.css' %}
{% resource JS '/js/jquery.min.js' %}
{% resource JS '/js/bootstrap.min.js' %}

{% for c in ResourceList('CSS')  %}
  <link rel="stylesheet" type="text/css" href="{{ c.name }}" />
{% endfor %}  
</head>
<body>
{% block body %}
{% endblock %}

{% for s in ResourceList('JS') %}
  <script src="{{ s.name }}" ></script>
{% endfor %}
</body>
</html>

```

*home.twig*
```html
{% extends "base.twig" %}
{% resource CSS '/css/home.css' %}
{% resource JS '/js/home.js' %}

{% block body %}
<div class="container">
  HOME PAGE
</div>
{% endblock %}
```

*render*
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" type="text/css" href="/css/home.css" /> 
</head>
<body>
  <div class="container">
    HOME PAGE
  </div>

  <script src="/js/jquery.min.js" ></script>
  <script src="/js/bootstrap.min.js" ></script>
  <script src="/js/home.js" ></script>
</body>
</html>
```
