# TwigResource
Resource handling for Twig templates




## Examplesdss


  {% extends "base.twig" %}
  {% resource CSS 'css/home.css' %}
  {% resource JS 'js/home.js' %}

  {% block body %}
  <div class="container">
    HOME PAGE
  </div>
  {% endblock %}

