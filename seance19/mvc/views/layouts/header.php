<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{base}}/clients">Clients</a></li>
            {% if session.privilege_id == 1 %}
            <li><a href="{{base}}/user/create">Users</a></li>
            {% endif %}
            {% if guest %}
            <li><a href="{{base}}/login">Login</a></li>
            {% else %}
            <li><a href="{{base}}/logout">Logout</a></li>
             {% endif %}
        </ul>
        <span>
            {% if guest is empty %}
                Hello {{ session.user_name }}
            {% endif %}
        </span>
    </nav>
    <main>
