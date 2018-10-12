<?php

/* layout.html */
class __TwigTemplate_ddf80b71b0d2f105b85dfce1f937a10a08ba389cae62b751277cdc1142739721 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <title></title>
</head>
<body>
<header>头</header>
<content>
    ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 13
        echo "</content>
<footer>尾</footer>
</body>
</html>";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  47 => 11,  44 => 10,  37 => 13,  35 => 10,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <title></title>
</head>
<body>
<header>头</header>
<content>
    {% block content %}

    {% endblock %}
</content>
<footer>尾</footer>
</body>
</html>", "layout.html", "C:\\program\\work\\free\\application\\views\\layout.html");
    }
}
