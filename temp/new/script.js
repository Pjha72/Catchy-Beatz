$(document).ready(function () {
    // var API_KEY = "AIzaSyBVKHyGXAnVWRlIoW7edGHAFe95unPZxGs"
    var API_KEY = "AIzaSyBVKHyGXAnVWRlIoW7edGHAFe95unPZxGs"
    var video = ""

    $("form").submit(function () {
        event.preventDefault()

        var search = $('#search').val()

        videoSearch(API_KEY, search, 1)


    })

    function videoSearch(key, search, maxResults) {

        $("#videos").empty()

        $.get("https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + search, function (data) {
            console.log(data)


            data.items.forEach(item => {
                var id = item.id.videoId;
                console.log(id);
                
            });


        })




    }

})
// <iframe src="https://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>
/*
< div style = "display:flex;justify-content:center;align-items:center;" >
    <div style="width:400px;height:300px;">
        <div data-video="${item.id.videoId}" data-autoplay="0" data-loop="1" id="youtube-audio"></div>
        <div style="clear:both;margin:10px;text-align:center"></div>
    </div>
                    </ >

<iframe src="https://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>
*/
var player;
function onYouTubeIframeAPIReady() {

    var ctrlq = document.getElementById("youtube-audio");
    ctrlq.innerHTML = '<img id="youtube-icon" src=""/><div id="youtube-player"></div>';
    ctrlq.style.cssText = 'width:150px;margin:2em auto;cursor:pointer;cursor:hand;display:none';
    ctrlq.onclick = toggleAudio;

    player = new YT.Player('youtube-player', {
        height: '0',
        width: '0',
        videoId: ctrlq.dataset.video,
        playerVars: {
            autoplay: ctrlq.dataset.autoplay,
            loop: ctrlq.dataset.loop,
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function togglePlayButton(play) {
    document.getElementById("youtube-icon").src = play ? "https://as2.ftcdn.net/v2/jpg/01/84/70/55/1000_F_184705557_2ex7eh35MUWVtoheM3QNO14NvTZAejfW.jpg" : "https://png.pngtree.com/png-vector/20190223/ourmid/pngtree-vector-play-icon-png-image_695339.jpg";
}

function toggleAudio() {
    if (player.getPlayerState() == 1 || player.getPlayerState() == 3) {
        player.pauseVideo();
        togglePlayButton(false);
    } else {
        player.playVideo();
        togglePlayButton(true);
    }
}

function onPlayerReady(event) {
    player.setPlaybackQuality("small");
    document.getElementById("youtube-audio").style.display = "block";
    togglePlayButton(player.getPlayerState() !== 5);
}

function onPlayerStateChange(event) {
    if (event.data === 0) {
        togglePlayButton(false);
    }
}