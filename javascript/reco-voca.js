var recognition = new webkitSpeechRecognition();
recognition.continuous = false;
recognition.interimResults = true;

recognition.onresult = function (e) {
    var textarea = document.getElementById('text-bar');
    for (var i = e.resultIndex; i < e.results.length; ++i) {
        if (e.results[i].isFinal) {
            textarea.value += e.results[i][0].transcript + " ";
        }
    }
}