<?php

/* biz/index.html */
class __TwigTemplate_1254e2627cc052a21a04c857d8a12e7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "RueSoft.biz";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <p><strong>";
        if (isset($context["welcome"])) { $_welcome_ = $context["welcome"]; } else { $_welcome_ = null; }
        echo twig_escape_filter($this->env, $_welcome_, "html", null, true);
        echo "</strong></p>
    <p id=\"purpose\">";
        // line 5
        if (isset($context["purpose"])) { $_purpose_ = $context["purpose"]; } else { $_purpose_ = null; }
        echo twig_escape_filter($this->env, $_purpose_, "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "biz/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 5,  36 => 4,  33 => 3,  27 => 2,);
    }
}
