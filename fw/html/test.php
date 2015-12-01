<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
$str = file_get_contents('template.inc');
echo getelement($str);

function getelement($str) {
    if (!$str)
        return '';
    $html = str_get_html($str);
    $e = $html->find('lezaz:if,lezaz:sql,lezaz:var,lezaz:each', 0);
    if (!$e) {
        return $str;
    }
    $func = str_replace(':', "_", $e->tag);
    if (is_callable($func))
        $e->outertext = $func($e->attr, getelement($e->innertext));
    else
        $e->outertext = $e->innertext;

    $html->save();
    return getelement($html->outertext);
}

function lezaz_each($v, $html) {
    return "\n<?php foreach(\$$v[id] as \$$v[id]_key =>\$$v[id]_value){ ?> $html <?php } ?>\n";
}

function lezaz_if($v, $html) {
    $html = str_replace('<lezaz:else/>', "\n<?php }else{ ?>\n", $html);
    return "\n<?php if($v[condetion]){ ?>\n\t$html\n<?php } ?>\n";
}
?>













<?php
class B {
    public function method_from_b($s) {
        echo $s;
    }
}

class C {
    public function method_from_c($l, $l1, $l2) {
        echo $l.$l1.$l2;
    }
}

class A {

    public function __construct() {
        $this->c = new C;
        $this->b = new B;
    }

    public function __call($method, $args) {
        if (method_exists($this, $method)) {
            $reflection = new ReflectionMethod($this, $method);
            if (!$reflection->isPublic()) {
                throw new RuntimeException("Call to not public method ".get_class($this)."::$method()");
            }

            return call_user_func_array(array($this, $method), $args);
        } else {
            throw new RuntimeException("Call to undefined method ".get_class($this)."::$method()");
        }
    }
}


$a = new A;
$a->b->method_from_b("abc");
$a->c->method_from_c("d", "e", "f");
?>