<div class="container-sm">
    <footer>
        <p>Buyer Demand<br>
            <a href="mailto:hussainmahamud.swe@gmail.com">hussainmahamud.swe@gmail.com</a>
        </p>
    </footer>
</div>

<script src="<?php echo assets('bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg/dist/ui/trumbowyg.min.css">
<script src="https://cdn.jsdelivr.net/npm/trumbowyg/dist/trumbowyg.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js">
</script>
<script src="<?php echo assets('js/buyer_demand.js'); ?>"></script>
<script src="<?php echo assets('js/sweetalert2.min.js'); ?>"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
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