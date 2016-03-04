this is index.inc template , its default template !<br>
you can found this template in {{theme}} its theme template , you can change it from conf.php file. <br>

in plugin/test_plugin/index.php we add router <a href='/test/1/'>/@str/@num/</a> when you change str or number this str= lezaz:set(str) and number= lezaz:set(num)<br>


b
you can add router to include other index.inc template , just use <code> $lezaz->main_template='doc.inc';  </code> <br>
see our <a href='/documentation/'>documentation</a><br>

<br>
<lezaz:if id="bassam" condition="lezaz:get(m)" pass="yes" fail="no">
    
    you send <code> GET </code> var , m= <b>lezaz:get(m)</b> lezaz#bassam   
<lezaz_else/>
    try add /?m=your_name in URL lezaz#bassam
</lezaz:if>


