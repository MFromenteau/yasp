<?php

/* base.html.twig */
class __TwigTemplate_6e65ff3f2283e1b113c42beaa1ab2c325c120cfea0444e4cac2978ac2883f3f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_424ab3d4e785b14379514c4d5d194fe1cdbfc11a2059c23b787c06299376153b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_424ab3d4e785b14379514c4d5d194fe1cdbfc11a2059c23b787c06299376153b->enter($__internal_424ab3d4e785b14379514c4d5d194fe1cdbfc11a2059c23b787c06299376153b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\" integrity=\"sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb\" crossorigin=\"anonymous\">
        <script src=\"https://use.fontawesome.com/849aa90f1f.js\"></script>
    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg navbar-light fixed-top\" style=\"background-color: #e3f2fd\">
          <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"#\">YASP !</a>

          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"nav navbar-nav mr-auto navbar-left\">
              <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"/\">Home<span class=\"sr-only\">(current)</span></a>
              </li>
            </ul>

            <form class=\"form-inline my-2 my-lg-0\" role=\"search\" style=\"padding-right: 10px;\">
              <input class=\"form-control mr-sm-2\" type=\"text\" placeholder=\"Search\">
              <button class=\"btn btn-outline-secondary my-2 my-sm-0\" type=\"submit\"><i class=\"fa fa-search\" aria-hidden=\"true\"></i></button>
            </form>

            <div class=\"navbar-form navbar-right btn-group\">
              <button type=\"button\" class=\"btn btn-outline-success\" data-toggle=\"modal\" data-target=\"#signinModal\">
                Sign in
              </button>
              <button type=\"button\" class=\"btn btn-outline-success\" data-toggle=\"modal\" data-target=\"#signupModal\">
                Sign up
              </button>
              <!--  Une fois connecté affiché =>
              <button type=\"button\" class=\"btn btn-info\">Profil</button>
              <button type=\"button\" class=\"btn btn-danger\">Disconnect</button>
              -->
            </div>
          </div>

        </nav>

        <div class=\"container\">
            <div class=\"jumbotron\">
                ";
        // line 48
        $this->displayBlock('body', $context, $blocks);
        // line 49
        echo "            </div>
        </div>

        <footer class=\"footer\">
          <div class=\"container\">
            <span class=\"text-muted\">YASP ! Realised by Alban Buffet, Alexandre Weisser, Marvin Fromenteau (Licence Sans thé)</span>
          </div>
        </footer>


        <!-- Modal -->
        <!-- Sign in Modal -->
        <div class=\"modal fade\" id=\"signinModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Sign in</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
              <form>
                <div class=\"modal-body\">
                  <div class=\"form-group\">
                    <label for=\"exampleInputEmail1\">Email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"emailLogin\" placeholder=\"Enter email\">
                  </div>
                  <div class=\"form-group\">
                    <label for=\"exampleInputPassword1\">Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"passwordLogin\" placeholder=\"Password\">
                  </div>
                </div>
                <div class=\"modal-footer\">
                  <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                  <button type=\"button\" class=\"btn btn-primary\">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Sign up Modal -->
        <div class=\"modal fade\" id=\"signupModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Sign up</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
              <div class=\"modal-body\">
                <form action=\"/user/register\" method=\"post\">
                  <div class=\"row\">
                    <div class=\"col\">
                      <label for=\"email\">Email</label>
                      <input id=\"email\" type=\"email\" class=\"form-control\" placeholder=\"Email\">
                    </div>
                    <div class=\"col\">
                      <label for=\"confEmail\">Confirm Email</label>
                      <input id=\"confEmail\" type=\"email\" class=\"form-control\" placeholder=\"Confirm Email\">
                    </div>
                  </div>
                  <hr />
                  <div class=\"row\">
                    <div class=\"col\">
                      <label for=\"firstname\">First Name</label>
                      <input id=\"firstname\" type=\"text\" class=\"form-control\" placeholder=\"First name\">
                    </div>
                    <div class=\"col\">
                      <label for=\"lastname\">Last Name</label>
                      <input id=\"lastname\" type=\"text\" class=\"form-control\" placeholder=\"Last name\">
                    </div>
                  </div>
                  <hr />
                  <div class=\"row\">
                    <div class=\"col\">
                      <label for=\"password\">Password</label>
                      <input id=\"password\" type=\"password\" class=\"form-control\" aria-describedby=\"passwordHelpInline\" placeholder=\"Password\">
                      <small id=\"passwordHelpInline\" class=\"form-text text-muted\">
                        Must be 8-20 characters long.
                      </small>
                    </div>
                    <div class=\"col\">
                      <label for=\"confPassword\">Confirm Password</label>
                      <input id=\"confPassword\" type=\"password\" class=\"form-control\" placeholder=\"Confirm Password\">
                    </div>
                  </div>
                </div>
                <div class=\"modal-footer\">
                  <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                  <button  type=\"submit\" class=\"btn btn-primary\">Enter new world</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <style>
          body{
              background-color: #f2f4f7 !important;
          }
        </style>

        ";
        // line 153
        $this->displayBlock('javascripts', $context, $blocks);
        // line 154
        echo "
        <script src=\"https://code.jquery.com/jquery-3.1.1.slim.min.js\" integrity=\"sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n\" crossorigin=\"anonymous\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js\" integrity=\"sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb\" crossorigin=\"anonymous\"></script>
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js\" integrity=\"sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn\" crossorigin=\"anonymous\"></script>
    </body>
</html>
";
        
        $__internal_424ab3d4e785b14379514c4d5d194fe1cdbfc11a2059c23b787c06299376153b->leave($__internal_424ab3d4e785b14379514c4d5d194fe1cdbfc11a2059c23b787c06299376153b_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_22c852a744752fefc991e73e6cf215b038b3d3de20923893455b66138a5d179e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_22c852a744752fefc991e73e6cf215b038b3d3de20923893455b66138a5d179e->enter($__internal_22c852a744752fefc991e73e6cf215b038b3d3de20923893455b66138a5d179e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "YASP !";
        
        $__internal_22c852a744752fefc991e73e6cf215b038b3d3de20923893455b66138a5d179e->leave($__internal_22c852a744752fefc991e73e6cf215b038b3d3de20923893455b66138a5d179e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b79ba4941c6886543d5d9fc59bf339941a27653a572a704c90d017803d46042a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b79ba4941c6886543d5d9fc59bf339941a27653a572a704c90d017803d46042a->enter($__internal_b79ba4941c6886543d5d9fc59bf339941a27653a572a704c90d017803d46042a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_b79ba4941c6886543d5d9fc59bf339941a27653a572a704c90d017803d46042a->leave($__internal_b79ba4941c6886543d5d9fc59bf339941a27653a572a704c90d017803d46042a_prof);

    }

    // line 48
    public function block_body($context, array $blocks = array())
    {
        $__internal_796ba8fee936b9221a29ec6ca3faecd74391b467a43afb18ab9c1987875471fc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_796ba8fee936b9221a29ec6ca3faecd74391b467a43afb18ab9c1987875471fc->enter($__internal_796ba8fee936b9221a29ec6ca3faecd74391b467a43afb18ab9c1987875471fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_796ba8fee936b9221a29ec6ca3faecd74391b467a43afb18ab9c1987875471fc->leave($__internal_796ba8fee936b9221a29ec6ca3faecd74391b467a43afb18ab9c1987875471fc_prof);

    }

    // line 153
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_846afcf121858937fa7e7354881738c5eb17f84c062a687b298e492ea2def848 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_846afcf121858937fa7e7354881738c5eb17f84c062a687b298e492ea2def848->enter($__internal_846afcf121858937fa7e7354881738c5eb17f84c062a687b298e492ea2def848_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_846afcf121858937fa7e7354881738c5eb17f84c062a687b298e492ea2def848->leave($__internal_846afcf121858937fa7e7354881738c5eb17f84c062a687b298e492ea2def848_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 153,  229 => 48,  218 => 6,  206 => 5,  193 => 154,  191 => 153,  85 => 49,  83 => 48,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}YASP !{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\" integrity=\"sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb\" crossorigin=\"anonymous\">
        <script src=\"https://use.fontawesome.com/849aa90f1f.js\"></script>
    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg navbar-light fixed-top\" style=\"background-color: #e3f2fd\">
          <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"#\">YASP !</a>

          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"nav navbar-nav mr-auto navbar-left\">
              <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"/\">Home<span class=\"sr-only\">(current)</span></a>
              </li>
            </ul>

            <form class=\"form-inline my-2 my-lg-0\" role=\"search\" style=\"padding-right: 10px;\">
              <input class=\"form-control mr-sm-2\" type=\"text\" placeholder=\"Search\">
              <button class=\"btn btn-outline-secondary my-2 my-sm-0\" type=\"submit\"><i class=\"fa fa-search\" aria-hidden=\"true\"></i></button>
            </form>

            <div class=\"navbar-form navbar-right btn-group\">
              <button type=\"button\" class=\"btn btn-outline-success\" data-toggle=\"modal\" data-target=\"#signinModal\">
                Sign in
              </button>
              <button type=\"button\" class=\"btn btn-outline-success\" data-toggle=\"modal\" data-target=\"#signupModal\">
                Sign up
              </button>
              <!--  Une fois connecté affiché =>
              <button type=\"button\" class=\"btn btn-info\">Profil</button>
              <button type=\"button\" class=\"btn btn-danger\">Disconnect</button>
              -->
            </div>
          </div>

        </nav>

        <div class=\"container\">
            <div class=\"jumbotron\">
                {% block body %}{% endblock %}
            </div>
        </div>

        <footer class=\"footer\">
          <div class=\"container\">
            <span class=\"text-muted\">YASP ! Realised by Alban Buffet, Alexandre Weisser, Marvin Fromenteau (Licence Sans thé)</span>
          </div>
        </footer>


        <!-- Modal -->
        <!-- Sign in Modal -->
        <div class=\"modal fade\" id=\"signinModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Sign in</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
              <form>
                <div class=\"modal-body\">
                  <div class=\"form-group\">
                    <label for=\"exampleInputEmail1\">Email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"emailLogin\" placeholder=\"Enter email\">
                  </div>
                  <div class=\"form-group\">
                    <label for=\"exampleInputPassword1\">Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"passwordLogin\" placeholder=\"Password\">
                  </div>
                </div>
                <div class=\"modal-footer\">
                  <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                  <button type=\"button\" class=\"btn btn-primary\">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Sign up Modal -->
        <div class=\"modal fade\" id=\"signupModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Sign up</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
              <div class=\"modal-body\">
                <form action=\"/user/register\" method=\"post\">
                  <div class=\"row\">
                    <div class=\"col\">
                      <label for=\"email\">Email</label>
                      <input id=\"email\" type=\"email\" class=\"form-control\" placeholder=\"Email\">
                    </div>
                    <div class=\"col\">
                      <label for=\"confEmail\">Confirm Email</label>
                      <input id=\"confEmail\" type=\"email\" class=\"form-control\" placeholder=\"Confirm Email\">
                    </div>
                  </div>
                  <hr />
                  <div class=\"row\">
                    <div class=\"col\">
                      <label for=\"firstname\">First Name</label>
                      <input id=\"firstname\" type=\"text\" class=\"form-control\" placeholder=\"First name\">
                    </div>
                    <div class=\"col\">
                      <label for=\"lastname\">Last Name</label>
                      <input id=\"lastname\" type=\"text\" class=\"form-control\" placeholder=\"Last name\">
                    </div>
                  </div>
                  <hr />
                  <div class=\"row\">
                    <div class=\"col\">
                      <label for=\"password\">Password</label>
                      <input id=\"password\" type=\"password\" class=\"form-control\" aria-describedby=\"passwordHelpInline\" placeholder=\"Password\">
                      <small id=\"passwordHelpInline\" class=\"form-text text-muted\">
                        Must be 8-20 characters long.
                      </small>
                    </div>
                    <div class=\"col\">
                      <label for=\"confPassword\">Confirm Password</label>
                      <input id=\"confPassword\" type=\"password\" class=\"form-control\" placeholder=\"Confirm Password\">
                    </div>
                  </div>
                </div>
                <div class=\"modal-footer\">
                  <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                  <button  type=\"submit\" class=\"btn btn-primary\">Enter new world</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <style>
          body{
              background-color: #f2f4f7 !important;
          }
        </style>

        {% block javascripts %}{% endblock %}

        <script src=\"https://code.jquery.com/jquery-3.1.1.slim.min.js\" integrity=\"sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n\" crossorigin=\"anonymous\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js\" integrity=\"sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb\" crossorigin=\"anonymous\"></script>
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js\" integrity=\"sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn\" crossorigin=\"anonymous\"></script>
    </body>
</html>
", "base.html.twig", "/home/ubuntu/workspace/yasp/templates/base.html.twig");
    }
}
