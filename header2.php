<?php  

function header11(){
    $head="
    <header class=\"upper-page container-fluid bg-red py-3\">
      <img class=\"watermark\" src=\"images/waves-icon.png\" alt=\"wave-big\" />
      <div class=\"z-2 container max-w-80 w-90\">
        <div class=\"container flex-col\">
          <br>
          <div class=\"brand-name--lg-w-page w-mc\">MUSIC STORE</div>
          <h1 class=\"co-w f-hl w-mc\">
            Your marketplace for buying Musical Instruments
          </h1>
        </div>
        <br>
        <div class=\"search container-fluid ai-c jc-sb w-100\">
          <div class=\"search-top h-search ai-c\">
            <div
              class=\"search__dropdown bg-white h-100 w-20 bord-r-red ai-c pl-1 pr-3  d-none d-md-flex\"
            >
              <div class=\"search__dropdown-icon co-dt m-2\">
                
              </div>
              <div id=\"mydiv\" class=\"dropdown transparentbar\" style=\"z-index:4\">
                <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"mybyn\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                  Instruments
                  <span class=\"caret\"></span></button>
                  <ul class=\"dropdown-menu\" id=\"drop\">
                    <li><a href=\"#\">Guitar</a></li>
                    <li><a href=\"#\">Piano</a></li>
                  </ul> 
                </div>
            </div>
            <div
              class=\"search__question bg-white h-100 bord-r-red co-l ai-c f-gl pl-2\"
            >
              What do you search for?
            </div>
            <input
              type=\"text\"
              placeholder=\"Search\"
              class=\"search__input h-100 co-l\"
            />
          </div>
          <div class=\"search-btn-div h-100\">
            <button type=\"button\" class=\"search__button btn-dark w-100\">
              Search
            </button>
          </div>
        </div>
      </div>
      <br> 
    </header>
    ";
    echo $head;
}

?>