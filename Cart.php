<?php
class Cart
{
    private array $items=[];


    private function getItems()
    {
        return $this->items;
    }
    private function setItems($items)
    {
         $this->items=$items;
    }
    public function addProduct(Product $product,int $quantity)
    {
        $cartItem=$this->findCartItems($product->getId());
        if($cartItem===null)
        {
            $cartItem=new CartItem($product,0);
            $this->items[$product->getId()]=$cartItem;

        }
        $cartItem->increaseQuantity($quantity);   
        return $cartItem;     
    }

    private function findCartItems(int $productid)
    {
        //return $this->items[$productid] ??null;
        foreach($this->items as $items)
        {
            if($items->getProduct()->getId()===$productid)
            { 
                return $items->getProduct();
            }

        }
        return null;

    }

    public function removeProduct(Product $product)
    {
        // unset($this->items[$product->getId()]);
        foreach($this->items as $index=>$item)
        {
            if($item->getProduct()->getId()===$product->getId())
            {
                unset($this->items[$index]);
                break;
            }
        }
        $cartItem=$this->findCartItems($product->getId());
        $index=array_search($cartItem,$this->items);
        unset($this->items[$index]);


    }
    public function getTotalQuantity()
    {
        $sum=0;
        foreach($this->items as $item)
        {
            $sum+=$item->getQuantity();
        }
        return $sum;

    }

    public function getTotalSum()
    {
        $totalsum=0;
        foreach($this->items as $item)
        {
            $totalsum+=($item->getQuantity()) *($item->getProduct()->getPrice()) ;
        }
        return $totalsum; 

    }

    






}







?>