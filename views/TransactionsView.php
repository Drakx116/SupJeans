<body>
    <div class="main-container">
        <h1> My Transactions </h1>

    <?php
    if(count($data))
    {
        ?>
        <div class="transactions-table">
            <table>
                <tbody>
                <tr>
                    <th id="head-table"> Transaction </th>
                    <th id="head-table"> Date  </th>
                    <th id="head-table"> Quantity </th>
                    <th id="head-table"> Price </th>
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
                                <td> <?= count($articles); ?> Article<?php if(count($articles) > 1) { echo "s"; } ?> </td>
                                <td> <?= $transactions->getPrice() ?> € </td>
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