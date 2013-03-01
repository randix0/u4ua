<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>u4ua</title>
    <meta name="description" content="">
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{$RESOURCES_URL}css/normalize.css">
    <link rel="stylesheet" href="{$RESOURCES_URL}css/main.css">
    <script src="{$RESOURCES_URL}js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="{$RESOURCES_URL}js/vendor/jquery-1.8.3.min.js"></script>
</head>
<body>

<form action="/ajax/upload" ondrop=""></form>
<h4 class="b-section-h4">Название файла</h4>
<div class="in-text mB25px"><input type="text" placeholder="Бизнес-план проекта"></div>
<h4 class="b-section-h4">Загрузить файл</h4>
<div class="in-file mB25px"><input type="file"></div>
<a class="button">Добавить</a>



<script>
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
        debugger;
        var formData = tests.formdata ? new FormData() : null;
        for (var i = 0; i < files.length; i++) {
            if (tests.formdata) formData.append('file', files[i]);
            previewfile(files[i]);
        }

        // now post a new XHR request
        if (tests.formdata) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/devnull.php');
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
</body>
</html>