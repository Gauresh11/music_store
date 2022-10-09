
<?php 

function header1() {
  //session_start();
  $count = 0;
  if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
    
} else {
  $count=0;
}
    $head="
    <header class=\"bg-dark w-100\">
    <nav class=\"nav-bar ai-c jc-sb py-1 max-w-80 w-90\">
        <div class=\"nav--left ai-c\">
          <div class=\"nav__brand\">
            <div class=\"nav__brand__logo mr-2\">
              <img
                class=\"nav__brand__logo__img\"
                src=\"images/waves-icon.png\"
                alt=\"waves-icon\"
              />
            </div>
            <div class=\"nav__brand__name\">
              <a class=\"brand-name--sm-w\" href=\"index.php\">MUSIC STORE</a>
            </div>
          </div>

          <div class=\"nav__menu--short px-3 py-1 ai-c\">
            <div>
              <a href=\"index.php\"><i class=\"fas fa-bars\"></i></a>
            </div>
          </div>

          <div class=\"nav__menu ai-c tupper\">
            <a class=\"nav__menu__item\" href=\"index.php\">
              <div class=\"nav__menu__item co-r ai-c\">
                <div class=\"nav__menu__item-icon mr-2\">
                  <i class=\"fas fa-home\"></i>
                </div>
                <div class=\"nav__menu_item-text\">HOME</div>
              </div>
            </a>

            <a class=\"nav__menu__item\" href=\"collect.php\">
              <div class=\"nav__menu__item co-l ai-c\">
                <div class=\"nav__menu__item-icon mr-2\">
                  <i class=\"fas fa-record-vinyl\"></i>
                </div>
                <div class=\"nav__menu_item-text\">collection</div>
              </div>
            </a>

            <a class=\"nav__menu__item\" href=\"search.php\">
              <div class=\"nav__menu__item co-l ai-c\">
                <div class=\"nav__menu__item-icon mr-2\">
                  <i class=\"fas fa-shopping-cart\"></i>
                </div>
                <div class=\"nav__menu_item-text\">shopping</div>
              </div>
            </a>
          </div>

          <a class=\"nav__menu__item\" href=\"about.html\">
            <div class=\"nav__menu__item co-l ai-c\">
              <div class=\"nav__menu__item-icon mr-2\">
                <i class=\"fas fa-record-vinyl\"></i>
              </div>
              <div class=\"nav__menu_item-text\">Aboutus</div>
            </div>
          </a>


        </div>
        <div class=\"profile-icon d-none d-md-flex d-lg-none\">
          <i class=\"fas fa-user\"></i>
        </div>
        <div class=\"nav--right ai-c d-none d-lg-flex h-100\">
          <div class=\"mr-4\">
            <a href=\"cart.php\"><i class=\"fas fa-shopping-cart\"></i></i> $count</a>
          </div>
          <div class=\" mr-4\"><a href=\"logout.php\"><i class=\"fas fa-sign-out-alt\"></i></i></a></div>
          <div class=\"profile h-100 ai-c\">
            <div class=\"profile__name co-w mr-2 f-gb\">
            ";
    echo $head;    
}
function header112(){
  $h1="</div>
  <div class=\"profile__img h-100 ai-c\">
    <img class=\"h-100 round\"";
  echo $h1;
  }
function h22(){
  $h23="\" alt=\"face \"/>
  </div>
</div>
</div>
</nav>
</header>
";
  echo $h23;
}
?>