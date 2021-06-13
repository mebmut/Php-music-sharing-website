
audioPlayer();
function audioPlayer(){
    var currentSong = 0;
    $("#playList li a").click(function(e) {
        e.preventDefault();
        $("#audioPlayer")[0].src = this;
        $("#audioPlayer")[0].play();
        $("#playList li a").addClass("fa-play");
        $("#playList li").removeClass("current-song");
        currentSong = $(this).parent().index();
        $(this).parent().addClass("current-song");
        $(this).removeClass("fa-play");
        $("#audioPlayer").addClass("show");
    });
    $("#audioPlayer")[0].addEventListener("ended", function() {
        if (currentSong == $("#playList li a").length) currentSong = 0;
        $("#playList li").removeClass("current-song");
        $("#audioPlayer").removeClass("show");
        $("#playList li a").addClass("fa-play");
        $("#audioPlayer")[0].src = '';
    });
}
function openInfo(id) {
    $('#'+id).addClass("show");
}
function closeInfo(id) {
    $('#'+id).removeClass("show");
}


$(".download-song").click(function(e) {
    e.preventDefault();
    $("#holder").addClass("show");
});
$("#close").click(function(e) {
    $("#holder").removeClass("show");
});


$(".BtnPlay").click(function(e) {
    e.preventDefault();
    $("#audioPlayer")[0].src = this;
    $("#audioPlayer")[0].play();
    $("#audioPlayer").addClass("show");
});

$("#audioPlayer")[0].addEventListener("ended", function() {
    $("#audioPlayer").removeClass("show");
    $("#audioPlayer")[0].src = '';
});