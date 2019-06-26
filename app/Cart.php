<?php

namespace App;

class Cart
{
  public $items =null; // Lista de tours 
  public $totalQty=0;//numero de tours
  public $totalPrice =0; //totla price

  public function __construct($oldCart)
    {
        if($oldCart)
          {
                
                $this->items =$oldCart->items;
                $this->totalQty =$oldCart->totalQty;
                $this->totalPrice =$oldCart->totalPrice;

          }
    }

    public function add($item, $id,$can)
    {

       
        if($can=='can')
        {
           $storedItem = ['qty' => 0, 'price' =>$item->price_can, 'item' => $item, 'can'=>'can'];
       
        }else{
           $storedItem = ['qty' => 0, 'price' =>$item->price, 'item' => $item,'can'=>'']; 
           
        }
        

        
        if($this->items) {
                if(array_key_exists($id, $this->items))
                {
                    $storedItem=$this->items[$id];
                }
        }

        $storedItem['qty'] ++;//1

         if($can=='can')
        {
            $storedItem['price'] = $item->price_can * $storedItem['qty'] ;//precio 399

        }else
        {
            $storedItem['price'] = $item->price * $storedItem['qty'] ;//precio 399

        }
        
        
        
       
        $this->items[$id] = $storedItem; // array de carrito
  
        $this->totalQty++;
        
        if($can=='can')
        {
             $treintaP=$item->price_can*0.3;
             
        }else
        {
            $treintaP=$item->price*0.3;
            
        }
        
        $diezP=$treintaP*0.1;
        
        $subtotal=$treintaP+ $diezP;
        $this->totalPrice +=$subtotal;

    }
    
    public function reduceByOne($id) //id=7
    {
       
       $this->items[$id]['qty']--;
       $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
       $this->totalQty--;
       
       $treintaP=$this->items[$id]['item']['price']*0.3;
       $diezP=$treintaP*0.1;
        
        $subtotal=$treintaP+ $diezP;
       $this->totalPrice -= $subtotal;;
       
       if($this->items[$id]['qty']<=0)
       {
           unset($this->items[$id]);
           
       }
       
    }
    
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        
        $treintaP=$this->items[$id]['price']*0.3;
        $diezP=$treintaP*0.1;
        
        $subtotal=$treintaP+ $diezP;
        $this->totalPrice -= $subtotal;
        unset($this->items[$id]);
        
    }
    
    


}
