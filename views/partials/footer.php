<footer>This is footer</footer>
<script src="<?php echo assets('jquery/jquery.min.js');?>"></script>
<script src="<?php echo assets('bootstrap/js/bootstrap.min.js');?>"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg/dist/ui/trumbowyg.min.css">
<script src="https://cdn.jsdelivr.net/npm/trumbowyg/dist/trumbowyg.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js">
    </script>
    <script src="<?php echo assets('js/buyer_demand.js');?>"></script>
    <script>
        $(document).ready(function () {
            $('#items').trumbowyg({
                btns: [
                    ['formatting'],
                    ['bold', 'italic', 'underline'],
                    ['unorderedList', 'orderedList'],
                    ['link'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['removeformat'],
                    ['fullscreen']
                ],
                plugins: {
                    cleanpaste: {
                        allowedTags: ['h4', 'p', 'br']
                    }
                }
            });
        });
    </script>
</body>

</html>