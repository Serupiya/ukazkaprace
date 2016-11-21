<?php

/* item_detail.html */
class __TwigTemplate_4c0bf83f6fe40f9d0b4fa2877399ad2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("design/base.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "design/base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <h2> ";
        echo twig_escape_filter($this->env, (isset($context["announcement"]) ? $context["announcement"] : null), "html", null, true);
        echo " </h2>
    <form method=\"post\" class=\"pure-form pure-form-stacked\">
        ";
        // line 5
        if ($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "id")) {
            // line 6
            echo "            <input type=\"hidden\" name=\"id\" value = ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "id"), "html", null, true);
            echo ">
        ";
        }
        // line 8
        echo "        <fieldset>
            <legend>
                ";
        // line 10
        if ($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "id")) {
            // line 11
            echo "                    Modify item
                ";
        } else {
            // line 13
            echo "                    Add new item
                ";
        }
        // line 15
        echo "            </legend>
            <input class=\"pure-input-1\" name=\"name\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "name"), "html", null, true);
        echo "\" placeholder=\"Item name\" required>
            <input class=\"pure-input-1\" name=\"price\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "price"), "html", null, true);
        echo "\" placeholder=\"Item Price\" type=\"number\" min=\"0.01\" step=\"0.01\">
            <input class=\"pure-input-1\" name=\"count\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "count"), "html", null, true);
        echo "\" placeholder=\"Item count\" type=\"number\" min=\"1\">


            <select class=\"pure-input-1\" name=\"discount_type\" onchange=\"check_selection()\">
                <option value = \"none\" ";
        // line 22
        if (($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "discount_type") == "none")) {
            echo "selected ";
        }
        echo "> None </option>
                <option value = \"quantity_discount\" ";
        // line 23
        if (($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "discount_type") == "quantity_discount")) {
            echo " selected ";
        }
        echo "> Quantity discount </option>
                <option value = \"3_plus_1\" ";
        // line 24
        if (($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "discount_type") == "3_plus_1")) {
            echo " selected ";
        }
        echo "> 3+1 </option>
            </select>

            <input class=\"pure-input-1\" name=\"discount_quantity\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "discount_quantity"), "html", null, true);
        echo "\" placeholder=\"Minimal quantity for the discount\" type=\"hidden\" min=\"1\">
            <input class=\"pure-input-1\" name=\"discount_percentage\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "discount_percentage"), "html", null, true);
        echo "\" placeholder=\"Discount percentage\" type=\"hidden\" min=\"1\" max=\"100\">

            <select class=\"pure-input-1\" name=\"gluten\">
                <option value = \"1\" ";
        // line 31
        if (($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "gluten") == 1)) {
            echo " selected ";
        }
        echo ">Contains gluten</option>
                <option value = \"0\" ";
        // line 32
        if (($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "gluten") == 2)) {
            echo " selected ";
        }
        echo ">Gluten-free</option>
            </select>

            <button class=\"pure-button\" type=\"submit\" name=\"save\">Save</button>
            ";
        // line 36
        if ($this->getAttribute((isset($context["item_description"]) ? $context["item_description"] : null), "id")) {
            // line 37
            echo "                <button class=\"pure-button\" type=\"submit\" name=\"delete\">Delete</button>
            ";
        }
        // line 39
        echo "            <button style=\"float:right\" type=\"button\" class=\"pure-button\" onclick=\"location='items.php'\">Go back</button>
        </fieldset>
    </form>


    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>
    <script>

        function check_selection(){
            console.log(\"test\")
            console.log(\$( \"select[name='discount_type'] option:selected\").attr(\"value\"))
                if (\$( \"select option:selected\").attr(\"value\") == \"quantity_discount\"){
                    \$(\"input[name='discount_percentage']\").attr(\"type\", \"number\")
                    \$(\"input[name='discount_percentage']\").attr(\"required\", \"true\")
                    \$(\"input[name='discount_quantity']\").attr(\"type\", \"number\")
                    \$(\"input[name='discount_quantity']\").attr(\"required\", \"true\")
                }
                else{
                    \$(\"input[name='discount_percentage']\").attr(\"type\", \"hidden\")
                    \$(\"input[name='discount_percentage']\").attr(\"required\", \"false\")
                    \$(\"input[name='discount_quantity']\").attr(\"type\", \"hidden\")
                    \$(\"input[name='discount_quantity']\").attr(\"required\", \"false\")
                }
        }
        check_selection()
    </script>

";
    }

    public function getTemplateName()
    {
        return "item_detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 39,  122 => 37,  120 => 36,  111 => 32,  105 => 31,  99 => 28,  95 => 27,  87 => 24,  81 => 23,  75 => 22,  68 => 18,  64 => 17,  60 => 16,  57 => 15,  53 => 13,  49 => 11,  47 => 10,  43 => 8,  37 => 6,  35 => 5,  29 => 3,  26 => 2,);
    }
}
