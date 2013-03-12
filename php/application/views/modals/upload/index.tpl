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
            <h3 class="tCenter">{l}FILE_DRAG_N_DROP{/l} {if $multiple}{l}FILE_MULTI{/l}{else}{l}FILE_ONE{/l}{/if} {l}OR{/l} <a onclick="$('#input_userfile').trigger('click');">FILE_CHOOSE</a></h3>
        </div>
        <p id="upload" class="hidden"><label>{l}FILE_ERROR_0{/l}:<br><input id="input_userfile" type="file" {if $multiple}multiple="multiple"{/if} /></label></p>

        <p id="filereader">{l}FILE_ERROR_1{/l}</p>
        <p id="formdata">{l}FILE_ERROR_2{/l}</p>
        <p id="progress">{l}FILE_ERROR_3{/l}</p>

        <div><progress id="uploadprogress" min="0" max="100" value="0">0</progress></div>
    </article>
</section>