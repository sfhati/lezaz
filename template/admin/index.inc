<lezaz:block file="{template}admin/header"></lezaz:block>

<lezaz:block file="{template}admin/navbar"></lezaz:block>	
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <!-- PAGE CONTENT ENDS -->
    <lezaz:block file="{template}admin/sidebar"></lezaz:block>	


    <lezaz:block file="{template}admin/pages"></lezaz:block>

    <!-- PAGE CONTENT ENDS -->
    <lezaz:block file="{template}admin/footer"></lezaz:block>	                        

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

</body>
</html>