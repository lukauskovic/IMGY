function image_modal(image) {
    var modal_image = document.getElementById("imagePreview");
    modal_image.src = image.src;
    var fullname = document.getElementById("user_fullname");
    var description = document.getElementById("description");
    var tags = document.getElementById("tags");
    tags.innerHTML = "";
    $.get("modal_content/" + image.id, function(data){
        fullname.innerHTML = data.user_fullname;
        description.innerHTML = data.image_description;
        console.log(data.image_tags);
        for (var index = 0; index < data.image_tags.length; ++index) {
            var tag = document.createElement("li");
            tag.innerHTML = data.image_tags[index];
            tags.appendChild(tag);
        }
    });

    $('#ImageModal').modal('show');
}