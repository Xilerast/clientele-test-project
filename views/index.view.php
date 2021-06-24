<?php require './views/partials/head.php'; ?>

<div id="tableWrapper">
    <table id='clientTable'>
        <tbody id='clientTableBody'>
            <tr id='clientTableHeaders'>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>E-Mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($clients as $client) : ?>
                <tr class="clientTableInformation">
                    <td><?= $client->getfName(); ?></td>
                    <td><?= $client->getlName(); ?></td>
                    <td><?= $client->getPhone(); ?></td>
                    <td><?= $client->getEmail(); ?></td>
                    <td><a href="/edit_client?id=<?= $client->getId(); ?>"><button>Edit</button></a></td>
                    <td><a href="/delete?id=<?= $client->getId(); ?>"><button>Delete</button></a></td>
                </tr>
                <?php $_SESSION['max-id-page'] = $client->getId(); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div>
    <?php if ($_SESSION['page'] > 1) : ?>
        <a href="/index.php?page=<?= $_SESSION['page'] - 1; ?>"><button id="prevPage">Previous Page</button></a>
    <?php endif; ?>
    <a href="/add_client"><button id="addBtn">Add</button></a>
    <?php if ($_SESSION['max-id-page'] < $_SESSION['max-id']) : ?>
        <a href="/index.php?page=<?= $_SESSION['page'] + 1; ?>"><button id="prevPage">Next Page</button></a>
    <?php endif; ?>
</div>

<?php require './views/partials/footer.php'; ?>