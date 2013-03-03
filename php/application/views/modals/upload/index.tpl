<script type="text/javascript">
    Upload.callback = function(data){
        if (data.status == 'success' && data.html) {
            $('#wrapper').html(data.html);
            Window.onBodyResize();
        }
    };
    Upload.init({$id},'{$upload_type}');
    //console.log('id={$id} upload_type={$upload_type}');
</script>
<section id="wrapper">
    <style>
        #holder { border: 3px dashed #ccc;  min-height: 40px; margin: 0 auto 10px auto;}
        #holder.hover { border: 3px dashed #0c0; }
        #holder img { display: block; margin: 10px auto; }
        #holder p { margin: 10px; font-size: 14px; }
        progress { width: 100%; }
        progress:after { content: '%'; }
        .fail { background: #c00; padding: 2px; color: #fff; }
        .hidden { display: none !important;}
    </style>
    <article>
        <div id="holder">
            <h3 class="tCenter">Drag & drop files or <a onclick="$('#input_userfile').trigger('click');">choose</a></h3>
        </div>
        <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input id="input_userfile" type="file"></label></p>

        <p id="filereader">File API & FileReader API not supported</p>
        <p id="formdata">XHR2's FormData is not supported</p>
        <p id="progress">XHR2's upload progress isn't supported</p>

        <div><progress id="uploadprogress" min="0" max="100" value="0">0</progress></div>

        {*<a onclick="$('#input_userfile').trigger('click');">choose</a>*}
    </article>
</section>