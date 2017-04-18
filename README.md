# TwigResource
Resource handling for Twig templates




## Examplesd

```
<!DOCTYPE html>
<html lang="en">
<head>
{% resource CSS '/css/bootstrap.min.css' %}
{% resource CSS '/css/bootstrap-theme.min.css' %}

{% resource JS '/js/jquery.min.js' %}
{% resource JS '/js/bootstrap.min.js' %}

{% for c in {{ ResourceList('CSS') }} %}
	<link rel="stylesheet" type="text/css" href="{{ c.name }}" />
{% endfor %}
  
</head>
<body>

	{% block body %}
	{% endblock %}

  {% for s in {{ ResourceList('JS') }} %}
       	<script src="{{ s.name }}" ></script>
  {% endfor %}
</body>
</html>

```

```
{% extends "base.twig" %}
{% resource CSS 'css/home.css' %}
{% resource JS 'js/home.js' %}

{% block body %}
<div class="container">
  HOME PAGE
</div>
{% endblock %}
```

