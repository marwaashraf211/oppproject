<?php
class CartItem
{

    private Product $product;
    private int $quantity;

    public function __construct(Product $product,$quanity)
    {
        $this->product=$product;
        $this->quantity=$quanity;
        
    }

     public function increaseQuantity($amount=1)
    {
        if($this->getQuantity()+$amount>$this->getProduct()->getAvailableQuantity())
        {
            throw  new Exception("Product can not be more than :".$this->getProduct()->getAvailableQuantity());
        }
        $this->quantity+=$amount;
    }

    public function decreaseQuantity($amount=1)
    {
        if($this->getQuantity()-$amount<1)
        {
            throw  new Exception("Product afew 1 q");
        }
        $this->quantity-=$amount;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quanity)
    {
         $this->quantity=$quanity;
    }
    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
         $this->product=$product;
    }

    
}




?>