<?php

/* biz/login.html */
class __TwigTemplate_1a12574fb92d795d0deb82f54dfb9649 extends Twig_Template
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
        echo "<div align=\"center\" id=\"login\"><strong>Please Login</strong>
    <form action=\"app_dev.php?controller=Biz&action=login\" method=\"post\">
        <table cellspacing=\"0\">
            <tr><td id=\"userlabel\"><strong>Username:</strong>
            </td>
                <td =\"userinput\"><input type=\"text\" name=\"username\" id=\"username\" />
                </td>
            </tr>
            <tr><td id=\"pwdlabel\"><strong>Password:</strong>
            </td>
                <td id=\"pwdinput\"><input type=\"password\" name=\"password\" id=\"password\" />
                </td>
            </tr>
            <tr><td>&nbsp;
            </td>
                <td><div align=\"center\">
                    <input type=\"hidden\" name=\"req\" value=\"validate\" />
                    <input type=\"submit\" name=\"Submit\" value=\"Submit\" />
                </div>
                </td>
            </tr>
        </table>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "biz/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 4,  33 => 3,  27 => 2,);
    }
}
