<?php

/* design/base.html */
class __TwigTemplate_cf6820773cda4f72b7aad69c3bc24077 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<meta name=\"description\" content=\"A layout example with a side menu that hides on mobile, just like the Pure website.\">

    <title>Responsive Side Menu &ndash; Layout Examples &ndash; Pure</title>

    


<link rel=\"stylesheet\" href=\"http://yui.yahooapis.com/pure/0.6.0/pure-min.css\">







  
    <!--[if lte IE 8]>
        <link rel=\"stylesheet\" href=\"templates/design/css/layouts/side-menu-old-ie.css\">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel=\"stylesheet\" href=\"templates/design/css/layouts/side-menu.css\">
    <!--<![endif]-->
  


    

    

</head>
<body>






<div id=\"layout\">
    <!-- Menu toggle -->
    <a href=\"#menu\" id=\"menuLink\" class=\"menu-link\">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id=\"menu\">
        <div class=\"pure-menu\">
            <a class=\"pure-menu-heading\" href=\"#\">Sweet shop</a>

            <ul class=\"pure-menu-list\">
                <li class=\"pure-menu-item\"><a href=\"items.php\" class=\"pure-menu-link\">Items</a></li>
                <li class=\"pure-menu-item\"><a href=\"offers.php\" class=\"pure-menu-link\">Offers</a></li>

            </ul>
        </div>
    </div>

    <div id=\"main\">
        <div class=\"content\">
            ";
        // line 64
        $this->displayBlock('content', $context, $blocks);
        // line 66
        echo "        </div>
</div>





<script src=\"templates/design/js/ui.js\"></script>


</body>
</html>
";
    }

    // line 64
    public function block_content($context, array $blocks = array())
    {
        // line 65
        echo "            ";
    }

    public function getTemplateName()
    {
        return "design/base.html";
    }

    public function getDebugInfo()
    {
        return array (  18 => 1,  132 => 51,  120 => 45,  113 => 41,  104 => 65,  101 => 64,  97 => 36,  89 => 34,  85 => 66,  83 => 64,  79 => 30,  75 => 29,  71 => 28,  68 => 27,  64 => 26,  41 => 8,  35 => 7,  29 => 3,  26 => 2,);
    }
}
