{{ include('layouts/header.php', {title: 'Client'})}}
        <h1>Client</h1>
        <p><strong>Name: </strong>{{ client.name }}</p>
        <p><strong>Address: </strong>{{ client.address }}</p>
        <p><strong>Phone: </strong>{{ client.phone }}</p>
        <p><strong>Email: </strong>{{ client.email }}</p>
        
        <a href="client-edit.php?id=" class="btn">Edit</a>
        <form action="client-delete.php" method="post">
            <input type="hidden" name="id" value="{{ client.id }}">
            <button type="submit" class="btn red">Delete</button>
        </form>
{{ include('layouts/footer.php')}}