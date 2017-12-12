function image_modal(image) {
    var modal_image = document.getElementById("imagePreview");
    modal_image.src = image.src;
    var user_link = document.getElementById("user_link");
    var fullname = document.getElementById("user_fullname");
    var description = document.getElementById("description");
    var tags = document.getElementById("tags");
    tags.innerHTML = "";
    $.get("/IMGY/public/modal_content/" + image.id, function(data){
        fullname.innerHTML = data.user_fullname;
        description.innerHTML = data.image_description;
        for (var index = 0; index < data.image_tags.length; ++index) {
            var tag = document.createElement("li");
            var tag_link = document.createElement("a");
            tag.appendChild(tag_link);
            tag_link.setAttribute("href", "/IMGY/public/search?search=" + data.image_tags[index]);
            tag_link.innerHTML = data.image_tags[index];
            user_link.setAttribute("href", "/IMGY/public/profile/" + data.image_user_id );
            tags.appendChild(tag);
        }
    });

    $('#ImageModal').modal('show');
}