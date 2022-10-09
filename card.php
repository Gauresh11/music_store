<?php  
function card($title,$price,$des,$time1,$by1,$pr_id,$Location,$img,$current){
$card1="
<div class=\"results__block bord-b mb-2\">
<form action=\"$current\" method=\"post\">
<div class=\"container w-100 ai-c h-100 px-0\">
  <div class=\"results__main flex-col w-100 h-100 px-3\">
    <div class=\"results__main_content jc-sb\">
      <div class=\"results__main_content-img\" id=\"image\"><img src=\"$img\" alt=\"\" width=\"350px\" height=\"230px\"></div>
      <div class=\"results__main_content-info py-3 pl-3\">
        <div class=\"jc-sb\">
          <h5 class=\"co-dt f-hm mb-0 ai-c\">
            $title
          </h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
          <button type=\"submit\" name=\"add\" class=\"plus--page co-l ai-c jc-c\">+</button>
        </div>
        <p class=\"co-r f-gb mx-0\">New</p>
        <p class=\"f-hl co-d\">
          $des
        </p>
        <br>
        <p class=\"co-d\">
          <b>By:</b> <span class=\"co-l f-hl\">$by1</span>
        </p>
        <p class=\"mb-0 co-d\">
          <b>Location:</b>
          <span class=\"co-l f-hl\">$Location</span>
        </p>
        <div
          class=\"results__main_content-info-bottom ai-c mt-2 jc-sb\"
        >
          <p class=\"co-l f-hm\">$time1</p>
          <div>
            <button type=\"button\" class=\"temp-btn btn-red\">
              Buy Now
            </button>
            <button type=\"button\" class=\"btn-red\">
              $price
            </button>
            <input type=\"hidden\" name=\"product_id\" value=$pr_id>
            <input type=\"hidden\" name=\"tit\" value=\"$title\">
            <input type=\"hidden\" name=\"desp\" value=\"$des\">
            <input type=\"hidden\" name=\"price\" value=\"$price\">
            <input type=\"hidden\" name=\"img\" value=\"$img\">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</div>
";
echo $card1;
}
function in($img,$tit,$current,$pri)
{
  $em="
  <form action=\"$current\" method=\"post\">
  <div class=\"products__display__cards-item\">
  <div class=\"products__display__cards-item--img h-50\"><img src=\"$img\" alt=\"\" width=\"170px\" height=\"180px\"></div>
  <div
    class=\"products__display__cards-item--content h-50 mx-3 pt-3\"
  >
  <br>
    <h6 class=\"co-dt\">$tit</h6>
    
    <div class=\"ai-c jc-sb mt-2\">
    <button type=\"submit\" name=\"add\" class=\"plus--page co-l ai-c jc-c\">+</button>
      <div class=\"price co-r f-hm\">$pri</div>
      
      <input type=\"hidden\" name=\"product_id\" value=\"\">
      <input type=\"hidden\" name=\"tit\" value=\"$tit\">
      <input type=\"hidden\" name=\"desp\" value=\"\">
      <input type=\"hidden\" name=\"price\" value=\"$pri\">
      <input type=\"hidden\" name=\"img\" value=\"$img\">
    </div>
  </div>
  
</div>
</form>
";
  echo $em;
}
function cartElement($producttitle, $productprice, $productimg, $productid,$qun)
{
    $count = 1;
    $element = "
        
                         <div class=\"border rounded\">
                           <div class=\"row bg-white\">
                                <div class=\"col-md-3 pl-0\">
                                    <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$producttitle</h5>
                                    <small class=\"text-secondary\"></small>
                                    <h5 class=\"pt-2 itotal\">₹</h5>
                                    <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                    </form>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div>
                                    <input type=\"hidden\" class=\"iprices\" value=\"$productprice\"</input>
                                    <form  action=\"cart.php?action=add&id=$productid\"method=\"post\">
                                    <input  class=\"iquant\" type='number' name ='mod_qut' onchange='this.form.submit();' value='$qun' min ='1' max='10'></input>
                                    <input type=\"hidden\" name=\"id2\" value=\"$productid\">
                                    </form>
                                    <input type=\"hidden\" name=\"qu\" value=\"itotal\">
                                    </div>
                                </div>
                            </div>
                        </div>        
        ";
    echo  $element;
}
