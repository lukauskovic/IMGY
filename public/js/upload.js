var div = document.getElementById('div');
div.style.display = "none";
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    div.style.display = "block";
};
var count = 0;
function addTagInput () {
    //create tag input
    var tag_input = document.createElement("input");
    tag_input.setAttribute("id","tag"+count);
    tag_input.setAttribute("type","text");
    tag_input.setAttribute("name","tag[]");
    tag_input.setAttribute("class","form-control");
    tag_input.setAttribute("list","tagsList");
    tag_input.setAttribute("placeholder","Set Tag");
    tag_input.style.width = "90%";
    tag_input.style.float = "left";
    if(count == 0){
        //create delete button
        var delete_button = document.createElement("button");
        delete_button.setAttribute("name", "delete_button");
        delete_button.setAttribute("onclick", "deleteTagInput(); return false;");
        delete_button.setAttribute("class", "btn btn-danger");
        delete_button.style.marginLeft = "10px";
        delete_button.style.display = "inline";
        delete_button.style.width = "34px";
        delete_button.innerHTML = "-";
        document.getElementById('tag_from_group').appendChild(tag_input);
        document.getElementById('tag_from_group').appendChild(delete_button);
        count ++;
    }
    else if(count < 9){
        document.getElementById('tag_from_group').appendChild(tag_input);
        count ++;
    }
    else if (count == 9){
        var alert = document.createElement("p");
        alert.setAttribute("class","alert alert-danger");
        alert.style.clear = "both";
        alert.innerHTML = "You have reached max number of tags";
        document.getElementById('tag_from_group').appendChild(alert);
        count++;
    }

}
function deleteTagInput(){
    if(count == 10 || count == 1){
        document.getElementById("tag_from_group").lastChild.remove();
        if(count == 10) count--;
    }
    document.getElementById("tag_from_group").lastChild.remove();
    count--;
}