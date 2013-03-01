<?php /* Smarty version Smarty-3.1.13, created on 2013-03-01 18:54:40
         compiled from "application/views/modals/upload/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15627653295130d872c93047-12495926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66122df3d850c18da61aec9ccd5f78845201afb8' => 
    array (
      0 => 'application/views/modals/upload/index.tpl',
      1 => 1362156818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15627653295130d872c93047-12495926',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5130d872d02ea1_65842628',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5130d872d02ea1_65842628')) {function content_5130d872d02ea1_65842628($_smarty_tpl) {?><script>
    var holder = document.getElementById('holder'),
            tests = {
                filereader: typeof FileReader != 'undefined',
                dnd: 'draggable' in document.createElement('span'),
                formdata: !!window.FormData,
                progress: "upload" in new XMLHttpRequest
            },
            support = {
                filereader: document.getElementById('filereader'),
                formdata: document.getElementById('formdata'),
                progress: document.getElementById('progress')
            },
            acceptedTypes = {
                'image/png': true,
                'image/jpeg': true,
                'image/gif': true
            },
            progress = document.getElementById('uploadprogress'),
            fileupload = document.getElementById('upload');

    "filereader formdata progress".split(' ').forEach(function (api) {
        if (tests[api] === false) {
            support[api].className = 'fail';
        } else {
            // FFS. I could have done el.hidden = true, but IE doesn't support
            // hidden, so I tried to create a polyfill that would extend the
            // Element.prototype, but then IE10 doesn't even give me access
            // to the Element object. Brilliant.
            support[api].className = 'hidden';
        }
    });

    function previewfile(file) {
        if (tests.filereader === true && acceptedTypes[file.type] === true) {
            var reader = new FileReader();
            reader.onload = function (event) {
                var image = new Image();
                image.src = event.target.result;
                image.width = 250; // a fake resize
                holder.appendChild(image);
            };

            reader.readAsDataURL(file);
        }  else {
            holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
            console.log(file);
        }
    }

    function readfiles(files) {
        //debugger;
        var formData = tests.formdata ? new FormData() : null;
        for (var i = 0; i < files.length; i++) {
            if (tests.formdata) formData.append('file', files[i]);
            previewfile(files[i]);
        }

        // now post a new XHR request
        if (tests.formdata) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/ajax/uploadFile');
            xhr.onload = function() {
                progress.value = progress.innerHTML = 100;
            };

            if (tests.progress) {
                xhr.upload.onprogress = function (event) {
                    if (event.lengthComputable) {
                        var complete = (event.loaded / event.total * 100 | 0);
                        progress.value = progress.innerHTML = complete;
                    }
                }
            }

            xhr.send(formData);
        }
    }

    if (tests.dnd) {
        holder.ondragover = function () { this.className = 'hover'; return false; };
        holder.ondragend = function () { this.className = ''; return false; };
        holder.ondrop = function (e) {
            this.className = '';
            e.preventDefault();
            readfiles(e.dataTransfer.files);
        }
    } else {
        fileupload.className = 'hidden';
        fileupload.querySelector('input').onchange = function () {
            readfiles(this.files);
        };
    }

</script>
<section id="wrapper">
    <header>
        <h1>Drag and drop, automatic upload</h1>
    </header>

    <style>
        #holder { border: 3px dashed #ccc;  min-height: 60px; margin: 20px auto;}
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
        </div>
        <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
        <p id="filereader">File API & FileReader API not supported</p>
        <p id="formdata">XHR2's FormData is not supported</p>
        <p id="progress">XHR2's upload progress isn't supported</p>
        <p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>
        <p>Drag an image from your desktop on to the drop zone above to see the browser both render the preview, but also upload automatically to this server.</p>
    </article>
<?php }} ?>