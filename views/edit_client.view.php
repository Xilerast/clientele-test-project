<?php require './views/partials/head.php'; ?>

<div id="addClientForm">
    <form onsubmit="return submitBtn();" action="/edit_results" method="post">
        <label for="fName">First Name: </label>
        <input type="text" name="fName" id="fName" value="<?= $client[0]->getfName(); ?>" />
        <br />
        <label for="lName">Last Name: </label>
        <input type="text" name="lName" id="lName" value="<?= $client[0]->getlName(); ?>" />
        <br />
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone" value="<?= $client[0]->getPhone(); ?>" />
        <br />
        <label for="email">E-Mail: </label>
        <input type="email" name="email" id="email" value="<?= $client[0]->getEmail(); ?>" />
        <br />
        <input type="submit" value="Submit" />
    </form>
</div>

<?php require './views/partials/add_client_footer.php'; ?>