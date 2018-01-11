<?php

/* all/index.html.twig */
class __TwigTemplate_b7233df542e399ac4b6106f9dee2abdc48b3593a349384424a8fe3471279f4a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "all/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_844808cecd83924a9f4cf28e9eea80a76f453ca600b763ad9961e474640e2252 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_844808cecd83924a9f4cf28e9eea80a76f453ca600b763ad9961e474640e2252->enter($__internal_844808cecd83924a9f4cf28e9eea80a76f453ca600b763ad9961e474640e2252_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "all/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_844808cecd83924a9f4cf28e9eea80a76f453ca600b763ad9961e474640e2252->leave($__internal_844808cecd83924a9f4cf28e9eea80a76f453ca600b763ad9961e474640e2252_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_f351d4dea763961185e57074050d486101ac9a9152ad7f7b81d57eff74dd3a5a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f351d4dea763961185e57074050d486101ac9a9152ad7f7b81d57eff74dd3a5a->enter($__internal_f351d4dea763961185e57074050d486101ac9a9152ad7f7b81d57eff74dd3a5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1><span>Welcome to</span> YASP !</h1>
    <hr>

    <div class=\"card-deck\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) || array_key_exists("videos", $context) ? $context["videos"] : (function () { throw new Twig_Error_Runtime('Variable "videos" does not exist.', 8, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
            // line 9
            echo "        <div class=\"card\" style=\"width: 15rem;\">
            <img class=\"card-img-top blurry\" src=\"data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16041245514%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16041245514%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22109.1328125%22%20y%3D%2297.2%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E\" alt=\"Card image cap\">
            <div class=\"card-body\">
                <h4 class=\"card-title\">";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["video"], "titre", array()), "html", null, true);
            echo "</h4>
                <p class=\"card-text\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["video"], "description", array()), "html", null, true);
            echo "</p>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </div>
";
        
        $__internal_f351d4dea763961185e57074050d486101ac9a9152ad7f7b81d57eff74dd3a5a->leave($__internal_f351d4dea763961185e57074050d486101ac9a9152ad7f7b81d57eff74dd3a5a_prof);

    }

    // line 20
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_7e47a8f318251fcc18aae017c6de175a7e95a71331d8c559e42cf4f396ebc74b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7e47a8f318251fcc18aae017c6de175a7e95a71331d8c559e42cf4f396ebc74b->enter($__internal_7e47a8f318251fcc18aae017c6de175a7e95a71331d8c559e42cf4f396ebc74b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 21
        echo "<style>
    .jumbotron{
        background-color: #11ffee00 !important;
    }
    .blurry:hover{
        -webkit-transition: 0.1s -webkit-filter linear;
        -webkit-filter:blur(1px);
    }
    
</style>
";
        
        $__internal_7e47a8f318251fcc18aae017c6de175a7e95a71331d8c559e42cf4f396ebc74b->leave($__internal_7e47a8f318251fcc18aae017c6de175a7e95a71331d8c559e42cf4f396ebc74b_prof);

    }

    // line 33
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_1ad33b3f6883aef91c812cb71a047d76e26c2a8bd50bbe1c8676db86d79bbc54 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1ad33b3f6883aef91c812cb71a047d76e26c2a8bd50bbe1c8676db86d79bbc54->enter($__internal_1ad33b3f6883aef91c812cb71a047d76e26c2a8bd50bbe1c8676db86d79bbc54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 34
        echo "
";
        
        $__internal_1ad33b3f6883aef91c812cb71a047d76e26c2a8bd50bbe1c8676db86d79bbc54->leave($__internal_1ad33b3f6883aef91c812cb71a047d76e26c2a8bd50bbe1c8676db86d79bbc54_prof);

    }

    public function getTemplateName()
    {
        return "all/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 34,  102 => 33,  85 => 21,  79 => 20,  71 => 17,  61 => 13,  57 => 12,  52 => 9,  48 => 8,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block body %}
    <h1><span>Welcome to</span> YASP !</h1>
    <hr>

    <div class=\"card-deck\">
        {% for video in videos %}
        <div class=\"card\" style=\"width: 15rem;\">
            <img class=\"card-img-top blurry\" src=\"data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16041245514%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16041245514%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22109.1328125%22%20y%3D%2297.2%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E\" alt=\"Card image cap\">
            <div class=\"card-body\">
                <h4 class=\"card-title\">{{ video.titre }}</h4>
                <p class=\"card-text\">{{ video.description }}</p>
            </div>
        </div>
        {% endfor %}
    </div>
{% endblock %}

{% block stylesheets %}
<style>
    .jumbotron{
        background-color: #11ffee00 !important;
    }
    .blurry:hover{
        -webkit-transition: 0.1s -webkit-filter linear;
        -webkit-filter:blur(1px);
    }
    
</style>
{% endblock %}

{% block javascripts %}

{% endblock %}
", "all/index.html.twig", "/home/ubuntu/workspace/yasp/templates/all/index.html.twig");
    }
}
