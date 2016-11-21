<?php

/* items.html */
class __TwigTemplate_6a1df636d9d44b30d8a9787cec2d8b63 extends Twig_Template
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
        echo "    <h1>Items</h1>
    <form method=\"post\" class=\"pure-form pure-form\">
        <select name=\"filter_select\" class=\"pure-input-2-3\">
            <option value = \"both\" >Both</option>
            <option value = \"gluten\" ";
        // line 7
        if (((isset($context["selected_filter"]) ? $context["selected_filter"] : null) == "gluten")) {
            echo " selected ";
        }
        echo ">Contains gluten</option>
            <option value = \"glutenfree\" ";
        // line 8
        if (((isset($context["selected_filter"]) ? $context["selected_filter"] : null) == "glutenfree")) {
            echo " selected ";
        }
        echo ">Gluten-free</option>
        </select>
        <button class=\"pure-button\" type=\"submit\" name=\"filter\">Filter</button>
    </form>
<br>
    <table class=\"pure-table\" style=\"width:100%\">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Count</th>
                <th>Discount</th>
                <th>Gluten</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["table"]) ? $context["table"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 27
            echo "            <tr>
                <td> ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "name"), "html", null, true);
            echo " </td>
                <td> ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "price"), "html", null, true);
            echo "\$ </td>
                <td> ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "count"), "html", null, true);
            echo " </td>
                <td> ";
            // line 31
            if (($this->getAttribute((isset($context["row"]) ? $context["row"] : null), "discount_type") == "3_plus_1")) {
                // line 32
                echo "                        3+1
                     ";
            } elseif (($this->getAttribute((isset($context["row"]) ? $context["row"] : null), "discount_type") == "quantity_discount")) {
                // line 34
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "discount_percentage"), "html", null, true);
                echo "% if >= ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "discount_quantity"), "html", null, true);
                echo " bought
                    ";
            } else {
                // line 36
                echo "                        None
                    ";
            }
            // line 38
            echo "                </td>
                <td> ";
            // line 39
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : null), "gluten")) {
                echo " contains gluten ";
            } else {
                echo " gluten-free ";
            }
            echo " </td>
                <form method=\"post\">
                    <input type=\"hidden\" name=\"id\" value = ";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "id"), "html", null, true);
            echo ">
                    <td> <button class=\"pure-button\" type=\"submit\" name=\"delete\">Delete</button> </td>
                </form>
                <form method=\"get\" action=\"item_detail.php\">
                    <input type=\"hidden\" name=\"id\" value = ";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "id"), "html", null, true);
            echo ">
                    <td> <button class=\"pure-button\" type=\"submit\" name=\"modify\">Modify</button> </td>
                </form>
            </tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 51
        echo "        </tbody>
    </table>


    <button class=\"pure-button\" onclick=\"location='item_detail.php'\">Create new item</button>

</body>
";
    }

    public function getTemplateName()
    {
        return "items.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 51,  120 => 45,  113 => 41,  104 => 39,  101 => 38,  97 => 36,  89 => 34,  85 => 32,  83 => 31,  79 => 30,  75 => 29,  71 => 28,  68 => 27,  64 => 26,  41 => 8,  35 => 7,  29 => 3,  26 => 2,);
    }
}
