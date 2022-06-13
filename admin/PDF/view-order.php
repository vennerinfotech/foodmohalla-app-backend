<?php
include("../Fpdf/fpdf.php");
include("../process/connection.php");
include("../session.php");

class myPDF extends FPDF
{

    function header()
    {
        $this->SetFont('Arial','B',18);
        $this->Cell(276,5,'FooD Mohalla',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',16);
        $this->Cell(276,10,'Order Details',0,0,'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTabale()
    {
        /*$this->SetFont('Times','B',16);
        $this->Cell(280,10,'Cleaning Parameters (Customer Area)(Manager/Owner/Owner Person s Responsible) ',1,0,'C'); 
        $this->Ln();*/
    }
    function ViewTbale($conn)
    {
        $id=$_REQUEST['id'];
        $stmt="SELECT products.name, order.order_number, shops.shop_name, users.first_name,users.last_name, grab_best_deal.deal_name, order_item.item_price,order_item.quantity,order_item.created_at,order_item.updated_at,order_item.id
		from order_item inner join shops on shops.id= order_item.shop_id inner join products on products.id = order_item.product_id inner join `order` on order.id=order_item.order_id inner join users on users.id = order_item.user_id inner join grab_best_deal on grab_best_deal.id=order_item.grab_best_deal_id  where order_item.order_id = $id ";

        $result = mysqli_query($conn, $stmt);
        $users = mysqli_fetch_assoc($result);
		
		$this->SetFont('Times','B',12);
        $this->Cell(70,10,'Order Number : '.$users['order_number'].'',1,1,'L');
        $this->Cell(140,10,'User Name : '.$users['first_name'].' '.$users['last_name'].' ',1,0,'L');
        $this->Cell(140,10,'Shop Name : '.$users['shop_name'].' ',1,1,'L');
        $this->Cell(140,10,'Product Name : '.$users['name'].' ',1,0,'L');
        $this->Cell(140,10,'Grab Best Deal : '.$users['deal_name'].' ',1,1,'L');
        $this->Cell(140,10,'Price : '.$users['item_price'].' ',1,0,'L');
        $this->Cell(140,10,'Quantity : '.$users['quantity'].' ',1,1,'L');
        $this->Cell(140,10,'Created At : '.$users['created_at'].' ',1,0,'L');
		
		$this->Ln();
	}
}

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L','A4',0);
$pdf -> headerTabale();
$pdf -> ViewTbale($conn);
$pdf -> output();

?>