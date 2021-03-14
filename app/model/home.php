<!-- Main jumbotron for a primary marketing message or call to action -->
<?php
authorization();
?>
<main role="main">

<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Client Notification Manager</h1>
        <p>With this website you can manage your clients, notifications and your clients notifications.</p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Client Manager</h2>
            <p>With the client manager you can add clients to the database, modify existing clients and archive clients.</p>
            <p><a class="btn btn-secondary" href="?page=client_manager&action=view" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Notification Manager</h2>
            <p>With the notification manager you can add or modify different kinds of notifications.</p>
            <p><a class="btn btn-secondary" href="?page=notification_manager&action=view" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Client Event</h2>
            <p>With this module you can manage the type and frequency of the clients notifications.</p>
            <p><a class="btn btn-secondary" href="?page=client_event&action=view" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>User</h2>
            <p>With this module you can manage the type and frequency of the clients notifications.</p>
            <p><a class="btn btn-secondary" href="?page=user_manager&action=view" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

</div> <!-- /container -->
</main>