<?php

/* study/index.html */
class __TwigTemplate_9fd1187382ed8356975af69317ec2a1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
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
        echo "Estudia Palabras Españolas";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<input type=\"button\" id=\"btnEnglish\" value=\"Haz clic por Inglés\"/>
<table>
    <thead>
    <th>Español</th>
    <th class=\"englishOff\">Inglés</th>
    </thead>
    <tbody>
    ";
        // line 11
        if (isset($context["words"])) { $_words_ = $context["words"]; } else { $_words_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_words_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 12
            echo "    <tr id=\"row_";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
            echo "\">
        <td class=\"spanish\">";
            // line 13
            if (isset($context["row"])) { $_row_ = $context["row"]; } else { $_row_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_row_, "getSpanish", array(), "method"), "html", null, true);
            echo "</td>
        <td class=\"englishOff\">";
            // line 14
            if (isset($context["row"])) { $_row_ = $context["row"]; } else { $_row_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_row_, "getEnglish", array(), "method"), "html", null, true);
            echo "</td>
    </tr>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "    </tbody>
</table>
";
    }

    // line 20
    public function block_scripts($context, array $blocks = array())
    {
        // line 21
        echo "<script type=\"text/javascript\">
    \$(document).ready(function(){
        \$('#subnav').removeClass('hide');
        \$('#subnav').addClass('show');
        \$('#btnEnglish').click(function(){
            \$('.englishOff').toggle();
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "study/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 21,  99 => 20,  93 => 17,  75 => 14,  70 => 13,  64 => 12,  46 => 11,  37 => 4,  34 => 3,  28 => 2,);
    }
}
