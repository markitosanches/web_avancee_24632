{{ include('layouts/header.php', {title: 'Clients Title'})}}
    <h1>Clients</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            {% for client in clients %}
            <tr>
                <td>{{ client.name }}</td>
                <td>{{ client.address }}</td>
                <td>{{ client.email }}</td>
                <td>{{ client.phone }}</td>
                <td><a href="{{ base }}/client/show?id={{ client.id }}" class="btn">View</a></td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
    <br><br>
    {% if guest is empty %}
    <a href="{{ base }}/client/create" class="btn">New Client</a>
    {% endif %}
{{ include('layouts/footer.php')}}