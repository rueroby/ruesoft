<?php

/* biz/lostpw.html */
class __TwigTemplate_9d4baf5ea9184f2a4483bc16551b90ab extends Twig_Template
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
        echo "<p><strong>Reset My Password</strong></p>
<p>If you have lost your password, you may enter your email
    address below and a new password will be sent to your email address.</p>
<form name=\"form1\" action=\"lostpw.php\" method=\"post\">
    <table id=\"lostpw\" cellspacing=\"0\">
        <tr>
            <td>Your Email Address</td>
            <td><input name=\"email_address\" type=\"text\" id=\"email_address\"/></td>
            <td>
                <input name=\"req\" type=\"hidden\" id=\"req\" value=\"recover\"/>
                <input name=\"Go!\" type=\"submit\" id=\"Go!\" value=\"Go!\"/>
            </td>
        </tr>
    </table>
</form>
";
    }

    public function getTemplateName()
    {
        return "biz/lostpw.html";
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
