CKEDITOR.replace("editor", {
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserFlashBrowseUrl: "/laravel-filemanager?type=Flash",
    filebrowserUploadUrl:
        "/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}",
    filebrowserFlashUploadUrl:
        "/laravel-filemanager/upload?type=Flash&_token={{ csrf_token() }}",

    language: "fa",
    contentsLangDirection: "rtl",
    toolbar: [
        {
            name: "document",
            items: ["Source", "-", "NewPage", "Preview"],
        },
        {
            name: "clipboard",
            items: ["Cut", "Copy", "Paste", "-", "Undo", "Redo"],
        },
        {
            name: "editing",
            items: ["Find", "Replace", "-", "SelectAll"],
        },
        "/",
        {
            name: "basicstyles",
            items: [
                "Bold",
                "Italic",
                "Underline",
                "Strike",
                "-",
                "RemoveFormat",
            ],
        },
        {
            name: "paragraph",
            items: [
                "NumberedList",
                "BulletedList",
                "-",
                "Outdent",
                "Indent",
                "-",
                "JustifyRight",
                "JustifyCenter",
                "JustifyLeft",
                "JustifyBlock",
            ],
        },
        {
            name: "links",
            items: ["Link", "Unlink"],
        },
        {
            name: "insert",
            items: ["Image", "Table", "HorizontalRule", "SpecialChar"],
        },
        "/",
        {
            name: "styles",
            items: ["Styles", "Format", "Font", "FontSize"],
        },
        {
            name: "colors",
            items: ["TextColor", "BGColor"],
        },
        {
            name: "tools",
            items: ["Maximize"],
        },
    ],
});
