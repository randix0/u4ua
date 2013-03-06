<script type="text/javascript">
    {if $upload_type == 'judges'}
    Upload.callback = function(data){
        if (data.status == 'success') {
            console.log('good');
            console.log('file='+data.files[0].path);
            $('#judge_avatar_preview').addClass('active').css('background-image','url(/'+data.files[0].path+')');
            $('#judge_avatar_store_name').val(data.files[0].store_name);
            $('#judge_avatar_upload_path').val(data.upload_path);
            Window.close('win-upload');
        }
    };
    {elseif $upload_type == 'partners'}
    Upload.callback = function(data){
        if (data.status == 'success') {
            console.log('good');
            console.log('file='+data.files[0].path);
            $('#partner_avatar_preview').addClass('active').css('background-image','url(/'+data.files[0].path+')');
            $('#partner_avatar_store_name').val(data.files[0].store_name);
            $('#partner_avatar_upload_path').val(data.upload_path);
            Window.close('win-upload');
        }
    };
    {else}
    Upload.callback = function(data){
        if (data.status == 'success' && data.html) {
            $('#wrapper').html(data.html);
            Window.onBodyResize();
        }
    };
    {/if}
    Upload.init({$id},'{$upload_type}');
    //console.log('id={$id} upload_type={$upload_type}');
</script>
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

<section id="wrapper">
    <article>
        <div id="holder">
            <h3 class="tCenter">Drag & drop {if $multiple}files{else}file{/if} or <a onclick="$('#input_userfile').trigger('click');">choose</a></h3>
        </div>
        <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input id="input_userfile" type="file" {if $multiple}multiple="multiple"{/if} /></label></p>

        <p id="filereader">File API & FileReader API not supported</p>
        <p id="formdata">XHR2's FormData is not supported</p>
        <p id="progress">XHR2's upload progress isn't supported</p>

        <div><progress id="uploadprogress" min="0" max="100" value="0">0</progress></div>
    </article>
</section>