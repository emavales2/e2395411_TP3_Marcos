<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{path}}css/main.css">
</head>

<body>
    <!-- Hello  {{ session.user_nom }}, -->
    
    <nav>       
        <h3><a href="{{ path }}">H O M E</a></h3>

        {% if guest %}
        <h3><a href="{{ path }}user/create_options">Créer Nouvelle Compte</a></h3>
        <h3><a href="{{ path }}login">LOG IN</a></h3>

        {% else %}
            {% if session.privilege == 1 %} 
            <h3><a href="{{ path }}user/index">Espace Admin</a></h3>
            <h3><a href="{{ path }}user/member_list">Membres</a></h3>
            <h3><a href="{{ path }}plant/index">Plantes</a></h3>
            {% endif %}

            {% if session.privilege == 2 %}   
            <h3><a href="{{ path }}user/index">Espace Membre</a></h3> 
            <h3><a href="{{ path }}plant/index">Plantes</a></h3>
            {% endif %}

            <h3><a href="{{ path }}login/logout">LOG OUT</a></h3>
            <h3><a href="{{ path }}log">View Activity Log</a></h3>
        {% endif %}

    </nav>

    
