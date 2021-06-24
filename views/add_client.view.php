<?php require './views/partials/head.php'; ?>

<div id="addClientForm">
    <form onsubmit="return submitBtn();" action="/add_results" method="post">
        <label for="fName">First Name: </label>
        <input type="text" name="fName" id="fName" />
        <br />
        <label for="lName">Last Name: </label>
        <input type="text" name="lName" id="lName" />
        <br />
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone" />
        <br />
        <label for="email">E-Mail: </label>
        <input type="email" name="email" id="email" />
        <br />
        <input type="submit" value="Submit" />
    </form>
</div>

<?php require './views/partials/add_client_footer.php'; ?>