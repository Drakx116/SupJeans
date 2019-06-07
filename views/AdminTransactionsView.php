<body>
    <div class="main-container">
        <h1> All Transactions </h1>
        <?php
        if(count($data))
        {
            ?>
            <div class="transactions-table">
                <table id="admin-table">
                    <tbody>
                    <tr>
                        <th id="head-table"> Transaction </th>
                        <th id="head-table"> Date  </th>
                        <th id="head-table"> Client </th>
                        <th id="head-table"> Price </th>
                        <th id="head-table"> Edit </th>
                    </tr>
                    <?php
                    $cpt = 0;
                    foreach($data as $transactions)
                    {
                        $cpt++;
                        $articles = unserialize($transactions->getProducts());
                        ?>
                        <tr>
                            <td> <?= $transactions->getId() ?> </td>
                            <td> <?= date("d-m-Y H:i:s", strtotime($transactions->getOrderDate())) ?> </td>
                            <td> <?= $transactions->getEmail() ?> </td>
                            <td> <?= $transactions->getPrice() ?> € </td>
                            <td> <a id="pen-edit" href="<?= URL ?>administration/edit/<?= $transactions->getId() ?>"> <i class="fas fa-pencil-alt"></i> </a> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        else
        {
            ?>
            <h2> No transactions yet. </h2>
            <?php
        }
        ?>
    </div>
</body>