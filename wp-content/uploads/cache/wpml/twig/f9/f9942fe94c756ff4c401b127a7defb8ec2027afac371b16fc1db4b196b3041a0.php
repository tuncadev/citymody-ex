<?php

namespace WPML\Core;

use \WPML\Core\Twig\Environment;
use \WPML\Core\Twig\Error\LoaderError;
use \WPML\Core\Twig\Error\RuntimeError;
use \WPML\Core\Twig\Markup;
use \WPML\Core\Twig\Sandbox\SecurityError;
use \WPML\Core\Twig\Sandbox\SecurityNotAllowedTagError;
use \WPML\Core\Twig\Sandbox\SecurityNotAllowedFilterError;
use \WPML\Core\Twig\Sandbox\SecurityNotAllowedFunctionError;
use \WPML\Core\Twig\Source;
use \WPML\Core\Twig\Template;

/* setup/wizard-notice.twig */
class __TwigTemplate_63e2e8635537f477e9d779a95fcd5c04922e5009eee52f8fcd5405fbdf63d939 extends \WPML\Core\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div id=\"wcml-setup-wizard\" class=\"wcml-banner\">
    <p>";
        // line 2
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "prepare", []), "html", null, true);
        echo "</p>
    <p>";
        // line 3
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "help", []), "html", null, true);
        echo "</p>
    <ul class=\"wcml-notice-list\">
        <li>";
        // line 5
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "store", []), "html", null, true);
        echo "</li>
        <li>";
        // line 6
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "attributes", []), "html", null, true);
        echo "</li>
        <li>";
        // line 7
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "currencies", []), "html", null, true);
        echo "</li>
    </ul>
    </p>
    <div class=\"submit\">
        <a href=\"";
        // line 11
        echo \WPML\Core\twig_escape_filter($this->env, ($context["setup_url"] ?? null), "html", null, true);
        echo "\"
           class=\"button-primary\">";
        // line 12
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "start", []), "html", null, true);
        echo "</a>
        <a href=\"";
        // line 13
        echo ($context["skip_url"] ?? null);
        echo "\"
           class=\"button-secondary skip\">";
        // line 14
        echo \WPML\Core\twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "skip", []), "html", null, true);
        echo "</a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "setup/wizard-notice.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 14,  67 => 13,  63 => 12,  59 => 11,  52 => 7,  48 => 6,  44 => 5,  39 => 3,  35 => 2,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "setup/wizard-notice.twig", "/home/citymody/citymody.com/www/wp-content/plugins/woocommerce-multilingual/templates/setup/wizard-notice.twig");
    }
}
