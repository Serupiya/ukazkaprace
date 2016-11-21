<?php

/* offers.html */
class __TwigTemplate_f9527a3b3b4a6035167fa6930251901f extends Twig_Template
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
        echo "    <h1>Offers</h1>
    <table class=\"pure-table\" style=\"width:100%\">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["table"]) ? $context["table"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 14
            echo "            <tr>
                <td >";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "offer_name"), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "cost"), "html", null, true);
            echo "\$ </td>
                <form method=\"get\" action=\"offer_detail.php\">
                    <input type=\"hidden\" name=\"id\" value = ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "id"), "html", null, true);
            echo ">
                    <td><button class=\"pure-button\" type=\"submit\" name=\"details\" style=\"width:100%\">Details</button></td>
                </form>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 23
        echo "        </tbody>
    </table>
    <button class=\"pure-button\" onclick=\"location='create_offer.php'\">Create new offer</button>
";
    }

    public function getTemplateName()
    {
        return "offers.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 23,  57 => 18,  52 => 16,  48 => 15,  45 => 14,  41 => 13,  29 => 3,  26 => 2,);
    }
}
