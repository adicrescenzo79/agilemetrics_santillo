Vue.config.devtools = true;
let app = new Vue({
    el: '#main-article-create-edit',
    data: {
        cover: '',
        oldNotChanged: true,
        uploadCover: 'cover'

    },
    mounted() {
        if ($('#old-pic')) {
            this.cover = $('#old-pic').attr('src');
        };

        tinymce.init({
            selector: 'textarea#myarticle',

            image_class_list: [
                { title: 'img-responsive', value: 'img-responsive' },
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });

    },
    methods: {
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;

            // console.log(e.target.files[0]);
            this.cover = e.target.files[0];

            this.createImage(files[0]);

        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vue = this;

            reader.onload = (e) => {
                vue.cover = e.target.result;
            };
            reader.readAsDataURL(file);

            this.oldNotChanged = false;
            this.uploadCover = 'cover';

        },
        removeImage: function (e) {
            event.preventDefault()
            this.cover = "";
            this.uploadCover = '';
        },


    },
});