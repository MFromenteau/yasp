<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_af0a1a7a2c4afee113f0394d76e4d3e60b980e86fec33f12edf92bcf9d421a16 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2c15910908312525aceba2389ed0e75ea321482496a409380faa30aa5ee9d184 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2c15910908312525aceba2389ed0e75ea321482496a409380faa30aa5ee9d184->enter($__internal_2c15910908312525aceba2389ed0e75ea321482496a409380faa30aa5ee9d184_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_2c15910908312525aceba2389ed0e75ea321482496a409380faa30aa5ee9d184->leave($__internal_2c15910908312525aceba2389ed0e75ea321482496a409380faa30aa5ee9d184_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_e545b2b089ec4cac52801189cd247bc76fcc7ac528531ab1c692bef662e5a463 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e545b2b089ec4cac52801189cd247bc76fcc7ac528531ab1c692bef662e5a463->enter($__internal_e545b2b089ec4cac52801189cd247bc76fcc7ac528531ab1c692bef662e5a463_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_e545b2b089ec4cac52801189cd247bc76fcc7ac528531ab1c692bef662e5a463->leave($__internal_e545b2b089ec4cac52801189cd247bc76fcc7ac528531ab1c692bef662e5a463_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_5c895956564c92d9896aad4de33838868c02dccf31b791b5e98b47b450e16add = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5c895956564c92d9896aad4de33838868c02dccf31b791b5e98b47b450e16add->enter($__internal_5c895956564c92d9896aad4de33838868c02dccf31b791b5e98b47b450e16add_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_5c895956564c92d9896aad4de33838868c02dccf31b791b5e98b47b450e16add->leave($__internal_5c895956564c92d9896aad4de33838868c02dccf31b791b5e98b47b450e16add_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_a5c7aa46303c1090b9d3f6df8c58c709f0a7c428ebe55497441590fb41fd6b0d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a5c7aa46303c1090b9d3f6df8c58c709f0a7c428ebe55497441590fb41fd6b0d->enter($__internal_a5c7aa46303c1090b9d3f6df8c58c709f0a7c428ebe55497441590fb41fd6b0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_a5c7aa46303c1090b9d3f6df8c58c709f0a7c428ebe55497441590fb41fd6b0d->leave($__internal_a5c7aa46303c1090b9d3f6df8c58c709f0a7c428ebe55497441590fb41fd6b0d_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 33,  108 => 10,  97 => 7,  85 => 34,  83 => 33,  73 => 26,  63 => 19,  56 => 15,  50 => 11,  48 => 10,  44 => 9,  40 => 8,  36 => 7,  30 => 4,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "/home/ubuntu/workspace/yasp/vendor/symfony/twig-bundle/Resources/views/layout.html.twig");
    }
}
