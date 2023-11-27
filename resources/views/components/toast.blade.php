<?php
    $class = '';
    switch($type){
        case 'success':
            $class = 'bg-success';
            break;
        case 'danger':
            $class = 'bg-danger';
            break;
        case 'warning':
            $class = 'bg-warning';
            break;
        case 'info':
            $class = 'bg-info';
            break;
    }
?>
<div class="toast-container top-10 end-0 mt-3 me-3">
    <div class="toast text-bg-{{$type}} border-0" id="toast" name="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ $message }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close" onclick="($('#toast').hide('slow'))"></button>
        </div>
    </div>
</div>
<script id="exec">
    $(".toast").show('slow');
    var timeoutToast = setTimeout(() => {
        $(".toast").hide();
    }, 5000);
</script>