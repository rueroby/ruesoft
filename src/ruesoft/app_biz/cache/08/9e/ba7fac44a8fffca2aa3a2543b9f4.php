<?php

/* layout.html */
class __TwigTemplate_089eba7fac44a8fffca2aa3a2543b9f4 extends Twig_Template
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
            'leftside' => array($this, 'block_leftside'),
            'rightSide' => array($this, 'block_rightSide'),
            'content' => array($this, 'block_content'),
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
        // line 13
        echo "</head>
<body>
<div id='container'>
    <div id='pageheader'>
        <img alt=\"RueSoft dot Biz Logo\" src=\"../../src/ruesoft/src/biz/resources/images/ruesoft.gif\" width=\"250\" height=\"50\"/>
    </div>
    <div id='leftside' class='leftside'>
        ";
        // line 20
        $this->displayBlock('leftside', $context, $blocks);
        // line 50
        echo "    </div>
    <div id=\"rightSide\" class=\"rightside\">
        ";
        // line 52
        $this->displayBlock('rightSide', $context, $blocks);
        // line 53
        echo "    </div>
    <div id='content'>
        ";
        // line 55
        $this->displayBlock('content', $context, $blocks);
        // line 56
        echo "    </div>
    <div id='pagefooter'>
        ";
        // line 58
        $this->displayBlock('footer', $context, $blocks);
        // line 67
        echo "    </div>
</div>
";
        // line 69
        $this->displayBlock('scripts', $context, $blocks);
        // line 70
        echo "
</body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../../src/ruesoft/src/biz/resources/css/biz_style.css\" media='screen'/>
    ";
        // line 7
        $this->displayBlock('hdrlinks', $context, $blocks);
        // line 8
        echo "    ";
        $this->displayBlock('javascript', $context, $blocks);
        // line 12
        echo "    ";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_hdrlinks($context, array $blocks = array())
    {
    }

    // line 8
    public function block_javascript($context, array $blocks = array())
    {
        // line 9
        echo "    <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.9.0.min.js\"></script>
    <script type=\"text/javascript\" src=\"../../src/ruesoft/src/biz/resources/js/jquery.validate.js\"></script>
    ";
    }

    // line 20
    public function block_leftside($context, array $blocks = array())
    {
        // line 21
        echo "        <!--<span class=\"boxheading\"><strong>Site Admin</strong></span>-->
        <!--<ul class=\"navbox\">-->
        <!--<li><a href=\"admin/members_admin.php\">Members</a></li>-->
        <!--<li><a href=\"admin/products_admin.php\">Products</a></li>-->
        <!--<li><a href=\"admin/EditGrid.php\">Edit Grid</a></li>-->
        <!--<li><a href=\"admin/newscategory.php\">News Categories</a></li>-->
        <!--<li><a href=\"admin/news_insert.php\">Add News Article</a></li>-->
        <!--<li><a href=\"admin/mod_news_article.php\">Modify|Delete News Article</a></li>-->
        <!--</ul>-->
        <span class=\"boxheading\"><strong>Membership</strong></span>
        <!--<ul class=\"navbox\">-->
        <!--<li><a href=\"admin/members_admin.php\">Members</a></li>-->
        <!--<li><a href=\"admin/products_admin.php\">Products</a></li>-->
        <!--<li><a href=\"admin/EditGrid.php\">Edit Grid</a></li>-->
        <!--<li><a href=\"admin/newscategory.php\">News Categories</a></li>-->
        <!--<li><a href=\"admin/news_insert.php\">Add News Article</a></li>-->
        <!--<li><a href=\"admin/mod_news_article.php\">Modify|Delete News Article</a></li>-->
        <!--</ul>-->
        <ul class=\"navbox\">
            <li><a href=\"app_dev.php?controller=Biz&action=index\">Home</a></li>
            <li><a href=\"app_dev.php?controller=Biz&action=join\">Join RueSoft.biz</a></li>
            <li><a href=\"app_dev.php?controller=Biz&action=login\">Member Login</a></li>
            <li><a href=\"app_dev.php?controller=Biz&action=lostpw\">Forgot Password?</a></li>
        </ul>
        <span class=\"boxheading\"><strong>Catalog</strong></span>
        <ul class=\"navbox\">
            <li><a href=\"app_dev.php?controller=Biz&action=products\">All Products</a></li>
        </ul>
        ";
    }

    // line 52
    public function block_rightSide($context, array $blocks = array())
    {
    }

    // line 55
    public function block_content($context, array $blocks = array())
    {
    }

    // line 58
    public function block_footer($context, array $blocks = array())
    {
        // line 59
        echo "        <hr size=\"1\"/>
        <ul id=\"footernav\">
            <li><a href=\"#\">About RueSoft.biz</a></li>
            <li><a href=\"#\">Contact</a></li>
            <li><a href=\"mailto:rueroby@gmail.com\">Email</a></li>
        </ul>
        <div class=\"center\"><a href=\"http://www.ruesoft.biz\">RueSoft</a> Copyright &copy; 2005-2013</div>
        ";
    }

    // line 69
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  171 => 69,  160 => 59,  157 => 58,  152 => 55,  147 => 52,  115 => 21,  112 => 20,  106 => 9,  103 => 8,  98 => 7,  93 => 5,  89 => 12,  86 => 8,  84 => 7,  78 => 5,  75 => 4,  68 => 70,  66 => 69,  62 => 67,  60 => 58,  56 => 56,  54 => 55,  50 => 53,  48 => 52,  44 => 50,  42 => 20,  33 => 13,  31 => 4,  26 => 1,);
    }
}
