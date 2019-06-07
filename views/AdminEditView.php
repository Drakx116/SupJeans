<body>
<div class="main-container">
    <h1> Edit </h1>
    <?php
        ob_get_clean();
        foreach($data as $transaction)
        {
            $price = 0;
            $articles = [];
            $product = "";
            $products = unserialize($transaction->getProducts());
            foreach($products as $product)
            {
                $product = unserialize($product);
                $price += $product["price"];
                $articles[] = $product["name"];
            }

            $pdf = new fpdf();
            $pdf->AddPage();
            $pdf->SetFont('Helvetica', 'bi', 32);
            $pdf->Cell(0,20, STORE . " Facture",0,0);
            $pdf->SetFont('Helvetica', 'bi', 22);
            $pdf->Ln();
            $pdf->Cell(0,20, "Transaction #" . $transaction->getId(),0,1);
            $pdf->SetFont("Helvetica", "i", 16);
            $pdf->Cell(0, 10, "Owner : " . $transaction->getEmail());
            $pdf->Ln();
            $pdf->Cell(0, 10, "Order Date : " . date("d-m-Y  /  H:i:s", strtotime($transaction->getOrderDate())));
            $pdf->Ln();
            $pdf->Cell(0, 10, "Price : " . number_format($price, "2") . " EUR.");
            $pdf->Ln();
            $pdf->Cell(0, 20, count($articles) . " article(s).");
            $pdf->Ln();
            for($i = 0; $i < count($products); $i++)
            {
                $pdf->Cell(0, 10, ucwords(str_replace("-", " ", $articles[$i])));
                $pdf->Ln();
            }
            $pdf->Ln();

            $pdf->SetFont("Helvetica", "bi", 16);
            $pdf->Cell(10, 10, "Billing Address : ");
            $pdf->SetFont("Helvetica", "i", 16);

            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getBillingAddress());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getBillingPc());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getBillingCity());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getBillingRegion());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getBillingCountry());
            $pdf->Ln();

            $pdf->SetFont("Helvetica", "bi", 16);
            $pdf->Cell(0, 20, "Billing Address : ");
            $pdf->SetFont("Helvetica", "i", 16);

            $pdf->Ln(15, 0);
            $pdf->Cell(0, 10, $transaction->getDeliveryAddress());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getDeliveryPc());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getDeliveryCity());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getDeliveryRegion());
            $pdf->Ln();
            $pdf->Cell(0, 10, $transaction->getDeliveryCountry());
            $pdf->Ln(0, 15);
            $pdf->Ln(0, 15);

            $pdf->Output();
        }
    ?>
</div>
</body>