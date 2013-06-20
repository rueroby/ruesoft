<?php

/* biz/join.html */
class __TwigTemplate_3b0ff36f20e0fcd29cce771aeed82f10 extends Twig_Template
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
        echo "<form method=\"post\" action=\"app_dev.php?controller=Biz&action=join\">
    <p id=\"become\">
        <strong>Become a Member!</strong>
    </p>

    <p id=\"joinus\">
        Join our website and enjoy the benefits of being a member!
    </p>

    <fieldset>
        <legend>Contact Information</legend>
        <div>
            <label for=\"first_name\">First Name</label>
            <input type=\"text\" id=\"first_name\" name=\"first_name\" class=\"required\"/>
        </div>
        <div>
            <label for=\"last_name\">Last Name</label>
            <input type=\"text\" id=\"last_name\" name=\"last_name\" class=\"required\"/>
        </div>
        <div>
            <label for=\"email_address\">Email Address</label>
            <input type=\"text\" id=\"email_address\" name=\"email_address\" class=\"required\"/>
        </div>
        <div>
            <label for=\"email_address2\">Verify Email Address</label>
            <input type=\"text\" id=\"email_address2\" name=\"email_address2\" class=\"required\"/>
        </div>
        <div class=\"clearfix\"></div>
        <div>
            <label for=\"username\">Desired username</label>
            <input name=\"username\" type=\"text\" id=\"username\">
        </div>
        <div class=\"clearfix\"></div>
        <div>
            <label for=\"password\">Password</label>
            <input name=\"password\" type=\"text\" id=\"password\">
        </div>
        <div>
            <label for=\"password2\">Confirm Password</label>
            <input name=\"password2\" type=\"text\" id=\"password2\">
        </div>
        <div class=\"clearfix\"></div>
        <div>
            <label for=\"bio\">Tell us about yourself</label>
            <textarea name=\"bio\"></textarea>
        </div>
        <input name=\"req\" type=\"hidden\" id=\"req\" value=\"process\">
        <input type=\"submit\" name=\"Submit\" value=\"Submit Information!\">
    </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "biz/join.html";
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
