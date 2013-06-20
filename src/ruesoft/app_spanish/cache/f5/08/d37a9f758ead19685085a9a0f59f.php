<?php

/* layout.html */
class __TwigTemplate_f508d37a9f758ead19685085a9a0f59f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'hdrlinks' => array($this, 'block_hdrlinks'),
            'javascript' => array($this, 'block_javascript'),
            'subnav' => array($this, 'block_subnav'),
            'content' => array($this, 'block_content'),
            'rightSide' => array($this, 'block_rightSide'),
            'footer' => array($this, 'block_footer'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 15
        echo "</head>
<body>
    <div id='container'>
        <div id='header'>
            <h1>";
        // line 19
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>
            <div id='navigation'>
                <ul>
                    <li><a href=\"app_spanish.php?controller=Study&action=show\">Vocabulario</a></li>
                </ul>
            </div>
            <div id=\"subnav\" class=\"hide\">";
        // line 25
        $this->displayBlock('subnav', $context, $blocks);
        echo "</div>
        </div>
        <div id='content'>
            ";
        // line 28
        $this->displayBlock('content', $context, $blocks);
        // line 29
        echo "        </div>
        <div id=\"rightSide\">
            ";
        // line 31
        $this->displayBlock('rightSide', $context, $blocks);
        // line 32
        echo "        </div>
        <div id='footer'>";
        // line 33
        $this->displayBlock('footer', $context, $blocks);
        echo "</div>
    </div>
    ";
        // line 35
        $this->displayBlock('scripts', $context, $blocks);
        // line 36
        echo "</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8 \">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../../src/ruesoft/src/spanish/resources/css/spanish_style.css\" media='screen'>
    ";
        // line 8
        $this->displayBlock('hdrlinks', $context, $blocks);
        // line 9
        echo "    ";
        $this->displayBlock('javascript', $context, $blocks);
        // line 14
        echo "    ";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_hdrlinks($context, array $blocks = array())
    {
    }

    // line 9
    public function block_javascript($context, array $blocks = array())
    {
        // line 10
        echo "    <script type=\"text/javascript\" src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/jquery-ui.min.js\"></script>
    ";
    }

    // line 25
    public function block_subnav($context, array $blocks = array())
    {
    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
    }

    // line 31
    public function block_rightSide($context, array $blocks = array())
    {
    }

    // line 33
    public function block_footer($context, array $blocks = array())
    {
        echo "<a href=\"http://www.ruesoft.biz\">RueSoft</a> Copyright &copy; 2013";
    }

    // line 35
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 35,  131 => 33,  126 => 31,  121 => 28,  116 => 25,  109 => 10,  106 => 9,  101 => 8,  96 => 5,  92 => 14,  89 => 9,  87 => 8,  80 => 5,  77 => 4,  72 => 36,  65 => 33,  62 => 32,  60 => 31,  56 => 29,  54 => 28,  48 => 25,  39 => 19,  33 => 15,  31 => 4,  26 => 1,  102 => 21,  99 => 20,  93 => 17,  75 => 14,  70 => 35,  64 => 12,  46 => 11,  37 => 4,  34 => 3,  28 => 2,);
    }
}
