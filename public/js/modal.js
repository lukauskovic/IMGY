var nice_button = document.getElementById("niceButton");
var user_link = document.getElementById("user_link");
var fullname = document.getElementById("user_fullname");
var description = document.getElementById("description");
var tags = document.getElementById("tags");
var modal_image = document.getElementById("imagePreview");
const tagsTitle = document.getElementById("tags_title");

function image_modal(image) {
    modal_image.src = image.src;
    tags.innerHTML = "";
    $.get("/modal_content/" + image.id, function(data){
        fullname.innerHTML = data.user_fullname;
        description.innerHTML = data.image_description;
        if(data.image_tags.length === 0) tagsTitle.style.display = "none";
        else tagsTitle.style.display = "block";
        for (var index = 0; index < data.image_tags.length; ++index) {
            var tag = document.createElement("li");
            var tag_link = document.createElement("a");
            tag.appendChild(tag_link);
            tag_link.setAttribute("href", "/search?search=" + data.image_tags[index]);
            tag_link.innerHTML = data.image_tags[index];
            user_link.setAttribute("href", "/profile/" + data.image_user_id );
            tags.appendChild(tag);
        }
        //nice button
        nice_button.innerHTML = "Nice " + data.nices;
        if(data.nice_exists) nice_button.setAttribute("class", "btn btn-primary-nice");
        else nice_button.setAttribute("class", "btn btn-primary-notnice");
        nice_button.setAttribute("id", image.id);
    });

    $('#ImageModal').modal('show');
}

$('#ImageModal').on('hidden.bs.modal', function () {
    nice_button.setAttribute("id", "niceButton");
})

function nice(niceButton) {
    niceButton.disabled = true;
    $.get("/nice/" + niceButton.id , function (data) {
        var nices = data.nices;
        if(data.nice_exists){
            niceButton.setAttribute("class", "btn btn-primary-notnice");
            nices--;
            niceButton.innerHTML = "Nice " + nices ;
        }
        else{
            niceButton.setAttribute("class", "btn btn-primary-nice");
            nices++;
            niceButton.innerHTML = "Nice " + nices ;

        }
        niceButton.disabled = false;
    });
}