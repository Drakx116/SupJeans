$(".select-picture").click(function(e){
    var picPath = $(".article-picture");
    var currentPath = picPath.attr("src");
    var picNameSplit = currentPath.split("_");
    var newPath = picNameSplit[0] + "_" + $(this).attr("name") + ".jpeg";
    picPath.attr("src", newPath);
});

$("#choose-number").change(function(){
    $('#range-text').html($(this).val());
});